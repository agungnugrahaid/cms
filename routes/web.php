<?php

// use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('public.home');
});

Route::get('/about', function () {
    return view('public.about');
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