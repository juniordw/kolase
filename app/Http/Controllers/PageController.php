<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function faq()
    {
        $faqCategories = FaqCategory::with(['faqs' => function($query) {
            $query->active()->orderBy('sort_order');
        }])->orderBy('sort_order')->get();

        return view('pages.faq', compact('faqCategories'));
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function terms()
    {
        return view('pages.terms');
    }
}
