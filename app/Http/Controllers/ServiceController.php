<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->get();

        return view('services.index', compact('services'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $relatedServices = Service::active()
            ->where('id', '!=', $service->id)
            ->ordered()
            ->limit(3)
            ->get();

        $testimonials = $service->testimonials()
            ->approved()
            ->orderBy('service_date', 'desc')
            ->limit(3)
            ->get();

        return view('services.show', compact('service', 'relatedServices', 'testimonials'));
    }
}
