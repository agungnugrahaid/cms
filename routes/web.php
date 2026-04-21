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