<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    /**
     * Display a listing of schedules
     */
    public function index(Request $request)
    {
        $query = Schedule::query()->orderBy('date', 'asc')->orderBy('time', 'asc');

        // Filter by date range if provided
        if ($request->filled('date_from')) {
            $query->where('date', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->where('date', '<=', $request->date_to);
        }

        // Filter by type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter by availability
        if ($request->filled('is_available')) {
            $query->where('is_available', $request->is_available);
        }

        $schedules = $query->paginate(20);

        return view('admin.schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new schedule
     */
    public function create()
    {
        return view('admin.schedules.create');
    }

    /**
     * Store a newly created schedule in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after:time',
            'type' => 'required|in:home_visit,clinic,online,regular',
            'max_bookings' => 'required|integer|min:1|max:10',
            'is_available' => 'boolean',
            'notes' => 'nullable|string|max:500',
        ]);

        $validated['current_bookings'] = 0;
        $validated['is_available'] = $request->has('is_available');

        Schedule::create($validated);

        return redirect()->route('admin.schedules.index')
            ->with('success', 'Jadwal berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified schedule
     */
    public function edit(Schedule $schedule)
    {
        return view('admin.schedules.edit', compact('schedule'));
    }

    /**
     * Update the specified schedule in storage
     */
    public function update(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after:time',
            'type' => 'required|in:home_visit,clinic,online,regular',
            'max_bookings' => 'required|integer|min:1|max:10',
            'is_available' => 'boolean',
            'notes' => 'nullable|string|max:500',
        ]);

        $validated['is_available'] = $request->has('is_available');

        $schedule->update($validated);

        return redirect()->route('admin.schedules.index')
            ->with('success', 'Jadwal berhasil diperbarui!');
    }

    /**
     * Remove the specified schedule from storage
     */
    public function destroy(Schedule $schedule)
    {
        // Check if schedule has bookings
        if ($schedule->current_bookings > 0) {
            return redirect()->route('admin.schedules.index')
                ->with('error', 'Tidak dapat menghapus jadwal yang sudah memiliki booking!');
        }

        $schedule->delete();

        return redirect()->route('admin.schedules.index')
            ->with('success', 'Jadwal berhasil dihapus!');
    }

    /**
     * Bulk create schedules
     */
    public function bulkCreate(Request $request)
    {
        $validated = $request->validate([
            'date_from' => 'required|date|after_or_equal:today',
            'date_to' => 'required|date|after_or_equal:date_from',
            'times' => 'required|array|min:1',
            'times.*' => 'required|date_format:H:i',
            'type' => 'required|in:home_visit,clinic,online,regular',
            'max_bookings' => 'required|integer|min:1|max:10',
            'skip_weekends' => 'boolean',
        ]);

        DB::beginTransaction();
        try {
            $dateFrom = Carbon::parse($validated['date_from']);
            $dateTo = Carbon::parse($validated['date_to']);
            $skipWeekends = $request->has('skip_weekends');

            $created = 0;

            while ($dateFrom->lte($dateTo)) {
                // Skip weekends if requested
                if ($skipWeekends && $dateFrom->isWeekend()) {
                    $dateFrom->addDay();
                    continue;
                }

                foreach ($validated['times'] as $time) {
                    // Check if slot already exists
                    $exists = Schedule::where('date', $dateFrom->format('Y-m-d'))
                        ->where('time', $time)
                        ->where('type', $validated['type'])
                        ->exists();

                    if (!$exists) {
                        Schedule::create([
                            'date' => $dateFrom->format('Y-m-d'),
                            'time' => $time,
                            'type' => $validated['type'],
                            'max_bookings' => $validated['max_bookings'],
                            'current_bookings' => 0,
                            'is_available' => true,
                        ]);
                        $created++;
                    }
                }

                $dateFrom->addDay();
            }

            DB::commit();

            return redirect()->route('admin.schedules.index')
                ->with('success', "Berhasil menambahkan {$created} jadwal!");

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.schedules.bulk-create')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Show bulk create form
     */
    public function showBulkCreate()
    {
        return view('admin.schedules.bulk-create');
    }

    /**
     * Toggle schedule availability
     */
    public function toggleAvailability(Schedule $schedule)
    {
        $schedule->update(['is_available' => !$schedule->is_available]);

        return redirect()->back()->with('success', 'Status ketersediaan berhasil diubah!');
    }
}
