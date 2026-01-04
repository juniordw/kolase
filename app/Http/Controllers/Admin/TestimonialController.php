<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\Service;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the testimonials.
     */
    public function index(Request $request)
    {
        $query = Testimonial::with('service');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('client_name', 'like', "%{$search}%")
                  ->orWhere('testimonial', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by is_featured
        if ($request->filled('is_featured')) {
            $query->where('is_featured', $request->is_featured == '1');
        }

        // Order by sort_order and created_at
        $query->orderBy('sort_order')->latest();

        // Paginate results
        $testimonials = $query->paginate(15);

        // Calculate statistics
        $stats = [
            'total' => Testimonial::count(),
            'approved' => Testimonial::where('status', 'approved')->count(),
            'pending' => Testimonial::where('status', 'pending')->count(),
            'featured' => Testimonial::where('is_featured', true)->count(),
        ];

        return view('admin.testimonials.index', compact('testimonials', 'stats'));
    }

    /**
     * Show the form for creating a new testimonial.
     */
    public function create()
    {
        $services = Service::active()->ordered()->get();
        return view('admin.testimonials.create', compact('services'));
    }

    /**
     * Store a newly created testimonial in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'nullable|exists:services,id',
            'client_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'testimonial' => 'required|string',
            'service_date' => 'nullable|date',
            'status' => 'required|in:pending,approved,rejected',
            'is_featured' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        // Auto-set is_approved based on status
        $validated['is_approved'] = $validated['status'] === 'approved';
        $validated['is_featured'] = $request->has('is_featured');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        Testimonial::create($validated);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified testimonial.
     */
    public function edit(Testimonial $testimonial)
    {
        $services = Service::active()->ordered()->get();
        return view('admin.testimonials.edit', compact('testimonial', 'services'));
    }

    /**
     * Update the specified testimonial in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'service_id' => 'nullable|exists:services,id',
            'client_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'testimonial' => 'required|string',
            'service_date' => 'nullable|date',
            'status' => 'required|in:pending,approved,rejected',
            'is_featured' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        // Auto-set is_approved based on status
        $validated['is_approved'] = $validated['status'] === 'approved';
        $validated['is_featured'] = $request->has('is_featured');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $testimonial->update($validated);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial berhasil diperbarui');
    }

    /**
     * Remove the specified testimonial from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial berhasil dihapus');
    }

    /**
     * Quick approve testimonial.
     */
    public function approve(Testimonial $testimonial)
    {
        $testimonial->update([
            'status' => 'approved',
            'is_approved' => true,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Testimonial berhasil disetujui',
        ]);
    }

    /**
     * Quick reject testimonial.
     */
    public function reject(Testimonial $testimonial)
    {
        $testimonial->update([
            'status' => 'rejected',
            'is_approved' => false,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Testimonial berhasil ditolak',
        ]);
    }
}
