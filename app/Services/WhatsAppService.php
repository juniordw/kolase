<?php

namespace App\Services;

use App\Models\Consultation;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    protected string $apiUrl;
    protected string $apiKey;

    public function __construct()
    {
        $this->apiUrl = config('services.whatsapp.api_url');
        $this->apiKey = config('services.whatsapp.api_key');
    }

    /**
     * Send booking confirmation to client
     */
    public function sendBookingConfirmation(Consultation $consultation): bool
    {
        $service = $consultation->service;

        $message = "*KONFIRMASI BOOKING - KOLASE*\n\n";
        $message .= "Terima kasih telah mempercayakan konsultasi menyusui Anda kepada kami! 🌸\n\n";
        $message .= "*Detail Booking:*\n";
        $message .= "📋 Kode Booking: *{$consultation->booking_code}*\n";
        $message .= "🛎️ Layanan: {$service->name}\n";
        $message .= "📅 Tanggal: " . $consultation->scheduled_date->isoFormat('dddd, D MMMM YYYY') . "\n";
        $message .= "⏰ Waktu: {$consultation->scheduled_time}\n";
        $message .= "📍 Lokasi: " . ($consultation->consultation_type === 'home_visit' ? 'Kunjungan Rumah' : ($consultation->consultation_type === 'clinic' ? 'Klinik' : 'Online')) . "\n\n";

        $message .= "*Data Ibu:*\n";
        $message .= "👤 Nama: {$consultation->mother_name}\n";
        $message .= "📞 Telepon: {$consultation->mother_phone}\n";

        if ($consultation->consultation_type === 'home_visit' && $consultation->mother_address) {
            $message .= "🏠 Alamat: {$consultation->mother_address}\n";
        }

        $message .= "\n*Status:* " . match($consultation->status) {
            'pending' => '⏳ Menunggu Konfirmasi',
            'confirmed' => '✅ Terkonfirmasi',
            'completed' => '✔️ Selesai',
            'cancelled' => '❌ Dibatalkan',
            default => 'Pending'
        } . "\n\n";

        $message .= "*Next Steps:*\n";
        $message .= "1. Tim kami akan menghubungi Anda maksimal 1x24 jam untuk konfirmasi\n";
        $message .= "2. Pastikan nomor telepon aktif WhatsApp\n";
        $message .= "3. Anda akan menerima reminder H-1 sebelum jadwal konsultasi\n\n";

        $message .= "Ada pertanyaan? Hubungi kami:\n";
        $message .= "📱 WhatsApp: 089560622054\n";
        $message .= "📧 Email: konsultasi@kolase.com\n\n";

        $message .= "_Salam Hangat,_\n";
        $message .= "*Tim KOLASE* 🌸";

        return $this->sendMessage($consultation->mother_phone, $message);
    }

    /**
     * Send new booking notification to admin
     */
    public function sendAdminNotification(Consultation $consultation): bool
    {
        $service = $consultation->service;
        $adminPhone = config('services.whatsapp.admin_phone', '6289560622054');

        $message = "*🔔 BOOKING BARU - KOLASE*\n\n";
        $message .= "Ada booking baru yang perlu dikonfirmasi!\n\n";
        $message .= "*Detail Booking:*\n";
        $message .= "📋 Kode: *{$consultation->booking_code}*\n";
        $message .= "🛎️ Layanan: {$service->name}\n";
        $message .= "📅 Tanggal: " . $consultation->scheduled_date->isoFormat('dddd, D MMMM YYYY') . "\n";
        $message .= "⏰ Waktu: {$consultation->scheduled_time}\n";
        $message .= "📍 Tipe: " . match($consultation->consultation_type) {
            'home_visit' => 'Kunjungan Rumah',
            'clinic' => 'Klinik',
            'online' => 'Online',
            default => $consultation->consultation_type
        } . "\n\n";

        $message .= "*Data Ibu:*\n";
        $message .= "👤 Nama: {$consultation->mother_name}\n";
        $message .= "📞 Telepon: {$consultation->mother_phone}\n";
        $message .= "📧 Email: {$consultation->mother_email}\n";
        $message .= "🏙️ Kota: {$consultation->mother_city}\n";

        if ($consultation->mother_address) {
            $message .= "🏠 Alamat: {$consultation->mother_address}\n";
        }

        if ($consultation->baby_name) {
            $message .= "\n*Data Bayi:*\n";
            $message .= "👶 Nama: {$consultation->baby_name}\n";
            $message .= "🎂 Usia: {$consultation->baby_age_months} bulan\n";
        }

        $message .= "\n*Keluhan:*\n";
        $message .= $consultation->concerns . "\n\n";

        $message .= "⚠️ *Action Required:*\n";
        $message .= "Hubungi klien dalam 1x24 jam untuk konfirmasi jadwal\n\n";

        $message .= "📱 Hubungi: {$consultation->mother_phone}\n";
        $message .= "🌐 Admin Panel: " . route('admin.consultations.index');

        return $this->sendMessage($adminPhone, $message);
    }

    /**
     * Send H-1 reminder to client
     */
    public function sendReminder(Consultation $consultation): bool
    {
        $service = $consultation->service;

        $message = "*REMINDER KONSULTASI - KOLASE*\n\n";
        $message .= "Halo {$consultation->mother_name}! 👋\n\n";
        $message .= "Ini adalah pengingat bahwa Anda memiliki jadwal konsultasi besok:\n\n";
        $message .= "*Detail Konsultasi:*\n";
        $message .= "📋 Kode Booking: *{$consultation->booking_code}*\n";
        $message .= "🛎️ Layanan: {$service->name}\n";
        $message .= "📅 Tanggal: " . $consultation->scheduled_date->isoFormat('dddd, D MMMM YYYY') . "\n";
        $message .= "⏰ Waktu: {$consultation->scheduled_time}\n";
        $message .= "📍 Lokasi: " . ($consultation->consultation_type === 'home_visit' ? 'Kunjungan Rumah' : ($consultation->consultation_type === 'clinic' ? 'Klinik' : 'Online')) . "\n\n";

        if ($consultation->consultation_type === 'home_visit') {
            $message .= "*Persiapan:*\n";
            $message .= "✅ Pastikan alamat dan nomor telepon aktif\n";
            $message .= "✅ Siapkan ruangan yang nyaman\n";
            $message .= "✅ Siapkan perlengkapan bayi jika diperlukan\n\n";
        } elseif ($consultation->consultation_type === 'online') {
            $message .= "*Persiapan:*\n";
            $message .= "✅ Pastikan koneksi internet stabil\n";
            $message .= "✅ Siapkan ruangan yang tenang\n";
            $message .= "✅ Link meeting akan dikirim 30 menit sebelum jadwal\n\n";
        }

        $message .= "Perlu reschedule? Hubungi kami minimal H-1:\n";
        $message .= "📱 WhatsApp: 089560622054\n\n";

        $message .= "Sampai jumpa besok! 🌸\n";
        $message .= "*Tim KOLASE*";

        return $this->sendMessage($consultation->mother_phone, $message);
    }

    /**
     * Send message via WhatsApp API (Fonnte/Wablas/Woowa compatible)
     */
    protected function sendMessage(string $phone, string $message): bool
    {
        try {
            // Clean phone number (remove spaces, dashes, plus signs)
            $phone = preg_replace('/[^0-9]/', '', $phone);

            // Add country code if not present
            if (!str_starts_with($phone, '62')) {
                $phone = '62' . ltrim($phone, '0');
            }

            // Send via HTTP API
            $response = Http::withHeaders([
                'Authorization' => $this->apiKey,
            ])->post($this->apiUrl, [
                'target' => $phone,
                'message' => $message,
            ]);

            if ($response->successful()) {
                Log::info('WhatsApp message sent successfully', [
                    'phone' => $phone,
                    'response' => $response->json(),
                ]);
                return true;
            }

            Log::error('WhatsApp API error', [
                'phone' => $phone,
                'status' => $response->status(),
                'response' => $response->body(),
            ]);

            return false;

        } catch (\Exception $e) {
            Log::error('WhatsApp send failed', [
                'phone' => $phone,
                'error' => $e->getMessage(),
            ]);

            return false;
        }
    }

    /**
     * Send status update notification
     */
    public function sendStatusUpdate(Consultation $consultation, string $oldStatus, string $newStatus): bool
    {
        $statusMessages = [
            'confirmed' => "✅ *Booking Anda Telah Dikonfirmasi!*\n\nKode Booking: {$consultation->booking_code}\nJadwal: " . $consultation->scheduled_date->isoFormat('dddd, D MMMM YYYY') . " - {$consultation->scheduled_time}\n\nTerima kasih! Tim kami akan menghubungi Anda segera.\n\n_Tim KOLASE_ 🌸",
            'completed' => "✔️ *Konsultasi Selesai*\n\nTerima kasih telah menggunakan layanan KOLASE!\n\nKami harap konsultasi hari ini bermanfaat. Jangan ragu untuk booking kembali jika membutuhkan.\n\nSilakan berikan testimonial Anda di website kami.\n\n_Tim KOLASE_ 🌸",
            'cancelled' => "❌ *Booking Dibatalkan*\n\nKode Booking: {$consultation->booking_code}\n\nBooking Anda telah dibatalkan. Jika ada pertanyaan, hubungi kami di 089560622054.\n\nKami tunggu booking Anda selanjutnya!\n\n_Tim KOLASE_ 🌸",
        ];

        $message = $statusMessages[$newStatus] ?? "Status booking Anda telah diupdate menjadi: {$newStatus}";

        return $this->sendMessage($consultation->mother_phone, $message);
    }
}
