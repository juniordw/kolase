<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleTag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::published()->with('categories', 'tags');

        // Filter by category
        if ($request->has('category')) {
            $query->whereHas('categories', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Filter by tag
        if ($request->has('tag')) {
            $query->whereHas('tags', function($q) use ($request) {
                $q->where('slug', $request->tag);
            });
        }

        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $articles = $query->latest('published_at')->paginate(9);
        $categories = ArticleCategory::orderBy('sort_order')->get();
        $popularArticles = Article::published()
            ->orderBy('views_count', 'desc')
            ->limit(5)
            ->get();

        return view('articles.index', compact('articles', 'categories', 'popularArticles'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->published()->firstOrFail();

        // Increment view count
        $article->incrementViews();

        $relatedArticles = Article::published()
            ->where('id', '!=', $article->id)
            ->whereHas('categories', function($q) use ($article) {
                $q->whereIn('article_categories.id', $article->categories->pluck('id'));
            })
            ->latest('published_at')
            ->limit(3)
            ->get();

        $popularArticles = Article::published()
            ->orderBy('views_count', 'desc')
            ->limit(5)
            ->get();

        return view('articles.show', compact('article', 'relatedArticles', 'popularArticles'));
    }

    public function category($slug)
    {
        $category = ArticleCategory::where('slug', $slug)->firstOrFail();

        $articles = Article::published()
            ->whereHas('categories', function($q) use ($category) {
                $q->where('article_categories.id', $category->id);
            })
            ->latest('published_at')
            ->paginate(9);

        return view('articles.category', compact('category', 'articles'));
    }
}
