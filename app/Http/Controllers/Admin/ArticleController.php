<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of articles
     */
    public function index(Request $request)
    {
        $query = Article::with(['categories', 'tags']);

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('author_name', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->whereHas('categories', function($q) use ($request) {
                $q->where('article_categories.id', $request->category);
            });
        }

        // Filter by featured
        if ($request->filled('featured')) {
            if ($request->featured === '1') {
                $query->where('is_featured', true);
            } elseif ($request->featured === '0') {
                $query->where('is_featured', false);
            }
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        // Pagination
        $articles = $query->paginate(15)->withQueryString();

        // Stats
        $stats = [
            'total' => Article::count(),
            'published' => Article::where('status', 'published')->count(),
            'draft' => Article::where('status', 'draft')->count(),
            'featured' => Article::where('is_featured', true)->count(),
        ];

        // Categories for filter dropdown
        $categories = ArticleCategory::orderBy('name')->get();

        return view('admin.articles.index', compact('articles', 'stats', 'categories'));
    }

    /**
     * Show the form for creating a new article
     */
    public function create()
    {
        $categories = ArticleCategory::orderBy('name')->get();
        $tags = ArticleTag::orderBy('name')->get();

        return view('admin.articles.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created article
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|string|max:255',
            'featured_image_alt' => 'nullable|string|max:255',
            'author_name' => 'required|string|max:255',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
            'is_featured' => 'boolean',
            'read_time_minutes' => 'nullable|integer|min:1',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:500',
            'seo_keywords' => 'nullable|string|max:500',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:article_categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:article_tags,id',
        ]);

        // Generate slug
        $validated['slug'] = Str::slug($validated['title']);

        // Ensure slug is unique
        $originalSlug = $validated['slug'];
        $count = 1;
        while (Article::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $count;
            $count++;
        }

        // Auto-set published_at if status is published and date not set
        if ($validated['status'] === 'published' && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        // Extract relationships
        $categories = $validated['categories'] ?? [];
        $tags = $validated['tags'] ?? [];
        unset($validated['categories'], $validated['tags']);

        // Create article
        $article = Article::create($validated);

        // Sync relationships
        $article->categories()->sync($categories);
        $article->tags()->sync($tags);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the article
     */
    public function edit(Article $article)
    {
        $categories = ArticleCategory::orderBy('name')->get();
        $tags = ArticleTag::orderBy('name')->get();

        return view('admin.articles.edit', compact('article', 'categories', 'tags'));
    }

    /**
     * Update the article
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|string|max:255',
            'featured_image_alt' => 'nullable|string|max:255',
            'author_name' => 'required|string|max:255',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
            'is_featured' => 'boolean',
            'read_time_minutes' => 'nullable|integer|min:1',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:500',
            'seo_keywords' => 'nullable|string|max:500',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:article_categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:article_tags,id',
        ]);

        // Update slug if title changed
        if ($validated['title'] !== $article->title) {
            $validated['slug'] = Str::slug($validated['title']);

            // Ensure slug is unique (except for current article)
            $originalSlug = $validated['slug'];
            $count = 1;
            while (Article::where('slug', $validated['slug'])->where('id', '!=', $article->id)->exists()) {
                $validated['slug'] = $originalSlug . '-' . $count;
                $count++;
            }
        }

        // Auto-set published_at if status changed to published and date not set
        if ($validated['status'] === 'published' && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        // Extract relationships
        $categories = $validated['categories'] ?? [];
        $tags = $validated['tags'] ?? [];
        unset($validated['categories'], $validated['tags']);

        // Update article
        $article->update($validated);

        // Sync relationships
        $article->categories()->sync($categories);
        $article->tags()->sync($tags);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil diupdate!');
    }

    /**
     * Remove the article
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil dihapus!');
    }
}
