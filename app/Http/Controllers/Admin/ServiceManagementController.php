<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceManagementController extends Controller
{
    /**
     * Display a listing of services
     */
    public function index(Request $request)
    {
        $query = Service::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%")
                  ->orWhere('tagline', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            } elseif ($request->status === 'featured') {
                $query->where('is_featured', true);
            }
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'sort_order');
        $sortOrder = $request->get('sort_order', 'asc');
        $query->orderBy($sortBy, $sortOrder);

        // Pagination
        $services = $query->paginate(15)->withQueryString();

        // Stats
        $stats = [
            'total' => Service::count(),
            'active' => Service::where('is_active', true)->count(),
            'inactive' => Service::where('is_active', false)->count(),
            'featured' => Service::where('is_featured', true)->count(),
        ];

        return view('admin.services.index', compact('services', 'stats'));
    }

    /**
     * Show the form for creating a new service
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created service
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'short_description' => 'required|string|max:500',
            'full_description' => 'required|string',
            'features' => 'nullable|array',
            'features.*' => 'nullable|string',
            'target_clients' => 'nullable|array',
            'target_clients.*' => 'nullable|string',
            'cases_handled' => 'nullable|array',
            'cases_handled.*' => 'nullable|string',
            'duration_minutes' => 'required|integer|min:15',
            'price' => 'nullable|numeric|min:0',
            'price_note' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:10',
            'available_types' => 'nullable|array',
            'available_types.*' => 'nullable|in:home_visit,clinic,online',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'badge' => 'nullable|string|max:50',
            'badge_color' => 'nullable|in:rose,amber,blue,green',
            'launch_date' => 'nullable|date',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:500',
            'seo_keywords' => 'nullable|string|max:500',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        // Generate slug
        $validated['slug'] = Str::slug($validated['name']);

        // Ensure slug is unique
        $originalSlug = $validated['slug'];
        $count = 1;
        while (Service::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $count;
            $count++;
        }

        // Filter empty array values
        if (isset($validated['features'])) {
            $validated['features'] = array_filter($validated['features']);
        }
        if (isset($validated['target_clients'])) {
            $validated['target_clients'] = array_filter($validated['target_clients']);
        }
        if (isset($validated['cases_handled'])) {
            $validated['cases_handled'] = array_filter($validated['cases_handled']);
        }

        // Create service
        $service = Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the service
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the service
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'short_description' => 'required|string|max:500',
            'full_description' => 'required|string',
            'features' => 'nullable|array',
            'features.*' => 'nullable|string',
            'target_clients' => 'nullable|array',
            'target_clients.*' => 'nullable|string',
            'cases_handled' => 'nullable|array',
            'cases_handled.*' => 'nullable|string',
            'duration_minutes' => 'required|integer|min:15',
            'price' => 'nullable|numeric|min:0',
            'price_note' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:10',
            'available_types' => 'nullable|array',
            'available_types.*' => 'nullable|in:home_visit,clinic,online',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'badge' => 'nullable|string|max:50',
            'badge_color' => 'nullable|in:rose,amber,blue,green',
            'launch_date' => 'nullable|date',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:500',
            'seo_keywords' => 'nullable|string|max:500',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        // Update slug if name changed
        if ($validated['name'] !== $service->name) {
            $validated['slug'] = Str::slug($validated['name']);

            // Ensure slug is unique (except for current service)
            $originalSlug = $validated['slug'];
            $count = 1;
            while (Service::where('slug', $validated['slug'])->where('id', '!=', $service->id)->exists()) {
                $validated['slug'] = $originalSlug . '-' . $count;
                $count++;
            }
        }

        // Filter empty array values
        if (isset($validated['features'])) {
            $validated['features'] = array_filter($validated['features']);
        }
        if (isset($validated['target_clients'])) {
            $validated['target_clients'] = array_filter($validated['target_clients']);
        }
        if (isset($validated['cases_handled'])) {
            $validated['cases_handled'] = array_filter($validated['cases_handled']);
        }

        // Update service
        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil diupdate!');
    }

    /**
     * Remove the service
     */
    public function destroy(Service $service)
    {
        // Check if service has consultations
        if ($service->consultations()->count() > 0) {
            return back()->with('error', 'Tidak dapat menghapus layanan yang sudah memiliki konsultasi. Nonaktifkan saja layanan ini.');
        }

        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil dihapus!');
    }
}
