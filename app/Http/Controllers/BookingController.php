<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Schedule;
use App\Models\BlockedDate;
use App\Models\Consultation;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->get();

        return view('booking.index', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'consultation_type' => 'required|in:home_visit,clinic,online',
            'scheduled_date' => 'required|date|after:today',
            'scheduled_time' => 'required|string',
            'mother_name' => 'required|string|max:255',
            'mother_phone' => 'required|string|max:20',
            'mother_email' => 'required|email',
            'city' => 'required|string|max:100',
            'address' => 'nullable|string',
            'baby_status' => 'nullable|in:newborn,infant,toddler',
            'baby_age_months' => 'nullable|integer|min:0',
            'baby_birthdate' => 'nullable|date|before:today',
            'baby_weight' => 'nullable|numeric|min:0',
            'concerns' => 'required|string|min:10',
            'notes' => 'nullable|string',
            'utm_source' => 'nullable|string',
            'utm_medium' => 'nullable|string',
            'utm_campaign' => 'nullable|string',
        ]);

        // Add referrer from header
        $validated['referrer'] = $request->headers->get('referer');

        // Map city and address to database column names
        $validated['mother_city'] = $validated['city'];
        $validated['mother_address'] = $validated['address'] ?? null;
        unset($validated['city'], $validated['address']);

        $consultation = Consultation::create($validated);

        // Send WhatsApp notifications
        try {
            $whatsapp = new WhatsAppService();

            // Send confirmation to client
            $whatsapp->sendBookingConfirmation($consultation);

            // Send notification to admin
            $whatsapp->sendAdminNotification($consultation);

            Log::info('WhatsApp notifications sent successfully', [
                'booking_code' => $consultation->booking_code,
            ]);
        } catch (\Exception $e) {
            // Log error but don't fail the booking
            Log::error('WhatsApp notification failed', [
                'booking_code' => $consultation->booking_code,
                'error' => $e->getMessage(),
            ]);
        }

        return response()->json([
            'success' => true,
            'booking_code' => $consultation->booking_code,
            'message' => 'Booking berhasil! Konfirmasi akan dikirim ke WhatsApp Anda dalam 1x24 jam.'
        ]);
    }

    public function getAvailableSlots(Request $request)
    {
        $date = $request->input('date');
        $type = $request->input('type', 'regular');

        // Check if date is blocked
        $isBlocked = BlockedDate::where('date', $date)->exists();

        if ($isBlocked) {
            return response()->json([
                'available' => false,
                'slots' => []
            ]);
        }

        // Get available time slots
        $slots = Schedule::where('date', $date)
            ->where('type', $type)
            ->available()
            ->orderBy('time')
            ->get(['id', 'time', 'end_time', 'max_bookings', 'current_bookings']);

        return response()->json([
            'available' => $slots->count() > 0,
            'slots' => $slots
        ]);
    }

    public function success($bookingCode)
    {
        $consultation = Consultation::where('booking_code', $bookingCode)->firstOrFail();

        return view('booking.success', compact('consultation'));
    }
}
