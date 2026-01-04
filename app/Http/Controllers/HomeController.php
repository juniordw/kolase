<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Article;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->get();
        $featuredService = Service::where('is_featured', true)->first();
        $testimonials = Testimonial::approved()->featured()->orderBy('sort_order')->limit(6)->get();
        $latestArticles = Article::published()->latest('published_at')->limit(3)->get();

        return view('home', compact('services', 'featuredService', 'testimonials', 'latestArticles'));
    }
}
