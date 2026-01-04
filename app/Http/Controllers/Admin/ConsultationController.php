<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ConsultationController extends Controller
{
    public function index(Request $request)
    {
        $query = Consultation::with('service');

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by date range
        if ($request->filled('from_date')) {
            $query->whereDate('scheduled_date', '>=', $request->from_date);
        }

        if ($request->filled('to_date')) {
            $query->whereDate('scheduled_date', '<=', $request->to_date);
        }

        // Search by booking code, mother name, or phone
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('booking_code', 'like', "%{$search}%")
                    ->orWhere('mother_name', 'like', "%{$search}%")
                    ->orWhere('mother_phone', 'like', "%{$search}%");
            });
        }

        $consultations = $query->orderBy('scheduled_date', 'desc')
            ->orderBy('scheduled_time', 'desc')
            ->paginate(20);

        $stats = [
            'total' => Consultation::count(),
            'pending' => Consultation::where('status', 'pending')->count(),
            'confirmed' => Consultation::where('status', 'confirmed')->count(),
            'completed' => Consultation::where('status', 'completed')->count(),
            'cancelled' => Consultation::where('status', 'cancelled')->count(),
        ];

        return view('admin.consultations.index', compact('consultations', 'stats'));
    }

    public function show($id)
    {
        $consultation = Consultation::with('service')->findOrFail($id);

        return view('admin.consultations.show', compact('consultation'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'admin_notes' => 'nullable|string',
        ]);

        $consultation = Consultation::findOrFail($id);
        $oldStatus = $consultation->status;
        $newStatus = $request->status;

        // Update consultation
        $consultation->status = $newStatus;

        if ($request->filled('admin_notes')) {
            $consultation->admin_notes = $request->admin_notes;
        }

        $consultation->save();

        // Send WhatsApp notification for status change
        if ($oldStatus !== $newStatus) {
            try {
                $whatsapp = new WhatsAppService();
                $whatsapp->sendStatusUpdate($consultation, $oldStatus, $newStatus);

                Log::info('Status update notification sent', [
                    'booking_code' => $consultation->booking_code,
                    'old_status' => $oldStatus,
                    'new_status' => $newStatus,
                ]);
            } catch (\Exception $e) {
                Log::error('Failed to send status update notification', [
                    'booking_code' => $consultation->booking_code,
                    'error' => $e->getMessage(),
                ]);
            }
        }

        return redirect()
            ->route('admin.consultations.show', $consultation->id)
            ->with('success', 'Status berhasil diupdate');
    }
}

