<?php

namespace App\Console\Commands;

use App\Models\Consultation;
use App\Services\WhatsAppService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SendBookingReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bookings:send-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send H-1 reminders to clients with confirmed bookings scheduled for tomorrow';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Checking for bookings scheduled for tomorrow...');

        // Get consultations scheduled for tomorrow with confirmed status
        $tomorrow = now()->addDay()->toDateString();

        $consultations = Consultation::with('service')
            ->where('status', 'confirmed')
            ->whereDate('scheduled_date', $tomorrow)
            ->get();

        if ($consultations->isEmpty()) {
            $this->info('No confirmed bookings found for tomorrow.');
            return 0;
        }

        $this->info("Found {$consultations->count()} booking(s) for tomorrow. Sending reminders...");

        $whatsapp = new WhatsAppService();
        $successCount = 0;
        $failCount = 0;

        foreach ($consultations as $consultation) {
            try {
                $sent = $whatsapp->sendReminder($consultation);

                if ($sent) {
                    $successCount++;
                    $this->info("✓ Reminder sent to {$consultation->mother_name} ({$consultation->booking_code})");

                    Log::info('Reminder sent successfully', [
                        'booking_code' => $consultation->booking_code,
                        'scheduled_date' => $consultation->scheduled_date,
                    ]);
                } else {
                    $failCount++;
                    $this->error("✗ Failed to send reminder to {$consultation->mother_name} ({$consultation->booking_code})");

                    Log::warning('Reminder sending failed', [
                        'booking_code' => $consultation->booking_code,
                    ]);
                }
            } catch (\Exception $e) {
                $failCount++;
                $this->error("✗ Error sending reminder to {$consultation->mother_name}: {$e->getMessage()}");

                Log::error('Reminder sending exception', [
                    'booking_code' => $consultation->booking_code,
                    'error' => $e->getMessage(),
                ]);
            }
        }

        $this->newLine();
        $this->info("Reminder sending completed!");
        $this->info("Success: {$successCount} | Failed: {$failCount}");

        return 0;
    }
}

