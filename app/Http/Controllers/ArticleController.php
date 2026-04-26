<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Exclude 'home-carousel' category from the sidebar list and only count published articles
        $categories = \App\Models\Category::withCount(['articles' => function ($query) {
            $query->where('is_published', true);
        }])
            ->where('slug', '!=', 'home-carousel')
            ->get();
        
        // Exclude articles from 'home-carousel' unless specifically filtered by it (though we hide the link)
        $query = \App\Models\Article::with('category')
            ->whereHas('category', function ($q) {
                $q->where('slug', '!=', 'home-carousel');
            })
            ->where('is_published', true)
            ->orderBy('published_at', 'desc');
        
        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }
        
        $articles = $query->paginate(10)->withQueryString();
        
        $totalCount = \App\Models\Article::where('is_published', true)
            ->whereHas('category', function ($q) {
                $q->where('slug', '!=', 'home-carousel');
            })->count();
        
        return view('articles.index', compact('articles', 'categories', 'totalCount'));
    }

    /**
     * Display a listing of the resource for admin.
     */
    public function adminIndex()
    {
        $articles = \App\Models\Article::with('category')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:articles,slug|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|url',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $validated['is_published'] = $request->has('is_published');
        $validated['published_at'] = $request->published_at ?? ($validated['is_published'] ? now() : null);

        Article::create($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = \App\Models\Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255|unique:articles,slug,' . $article->id,
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|url',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $validated['is_published'] = $request->has('is_published');
        if ($validated['is_published'] && !$article->published_at) {
            $validated['published_at'] = now();
        }
        
        $article->update($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Article deleted successfully.');
    }
}
