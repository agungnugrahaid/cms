<?php

// use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $page = \App\Models\Page::where('slug', 'home')->first();
    $latestUpdates = \App\Models\Article::with('category')->whereHas('category', function($q) {
        $q->where('slug', '!=', 'home-carousel');
    })->orderBy('published_at', 'desc')->take(3)->get();
    
    $carouselItems = \App\Models\Article::with('category')->whereHas('category', function($q) {
        $q->where('slug', 'home-carousel');
    })->orderBy('published_at', 'desc')->take(4)->get();
    
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

Route::get('/kb', function () {
    return view('kb.index');
});

use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;

Route::resource('pages', PageController::class);
Route::resource('categories', CategoryController::class);
Route::resource('articles', ArticleController::class);