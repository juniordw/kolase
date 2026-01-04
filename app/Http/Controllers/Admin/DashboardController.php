<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistics
        $stats = [
            'total_bookings' => Consultation::count(),
            'pending_bookings' => Consultation::where('status', 'pending')->count(),
            'confirmed_bookings' => Consultation::where('status', 'confirmed')->count(),
            'total_services' => Service::count(),
            'pending_testimonials' => Testimonial::where('status', 'pending')->count(),
            'published_articles' => Article::published()->count(),
        ];

        // Recent bookings
        $recentBookings = Consultation::with('service')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Bookings by status
        $bookingsByStatus = Consultation::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();

        // Most popular services
        $popularServices = Service::withCount('consultations')
            ->orderBy('consultations_count', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentBookings', 'bookingsByStatus', 'popularServices'));
    }
}
