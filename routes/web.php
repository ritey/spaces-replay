<?php

use App\Http\Controllers\CreatorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/spaces', function () {
    return view('spaces');
});

Route::get('/exclude/og/image.png', [CreatorController::class, 'ogImageGeneral'])->name('og-image');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/search', function () {
    return view('search');
});
