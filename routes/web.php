<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $page = \App\Models\Page::where('slug', 'home')->first();
    $latestUpdates = \App\Models\Article::with('category')->whereHas('category', function($q) {
        $q->where('slug', '!=', 'home-carousel');
    })->where('is_published', true)->orderBy('published_at', 'desc')->take(3)->get();
    
    $carouselItems = \App\Models\Article::with('category')->whereHas('category', function($q) {
        $q->where('slug', 'home-carousel');
    })->where('is_published', true)->orderBy('published_at', 'desc')->get();
    
    return view('public.home', compact('page', 'latestUpdates', 'carouselItems'));
});

Route::get('/about', function () {
    $page = \App\Models\Page::where('slug', 'about')->first();
    return view('public.about', compact('page'));
});

Route::get('/contact', function () {
    $page = \App\Models\Page::where('slug', 'contact')->first();
    return view('public.contact', compact('page'));
});

Route::get('/status', function () {
    return view('public.status');
});

// Public Article Routes
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

// Redirect old dashboard to new admin dashboard
Route::get('/dashboard', function() {
    return redirect()->route('dashboard');
});

// Admin CRUD Routes
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        $stats = [
            'pages' => \App\Models\Page::count(),
            'categories' => \App\Models\Category::count(),
            'articles' => \App\Models\Article::count(),
            'articles_published' => \App\Models\Article::where('is_published', true)->count(),
            'articles_draft' => \App\Models\Article::where('is_published', false)->count(),
        ];
        return view('dashboard', compact('stats'));
    })->name('dashboard');

    Route::resource('pages', PageController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('articles', ArticleController::class)->except(['index', 'show']);
    // We'll add a specific index for admin articles to avoid conflict
    Route::get('/articles', [ArticleController::class, 'adminIndex'])->name('admin.articles.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
