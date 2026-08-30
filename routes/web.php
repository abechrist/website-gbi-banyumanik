<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/jadwal-ibadah', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedule');
Route::get('/berita-renungan', [App\Http\Controllers\NewsController::class, 'index'])->name('news.index');
Route::get('/berita-renungan/{slug}', [App\Http\Controllers\NewsController::class, 'show'])->name('news.show');
Route::get('/galeri', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery');
Route::get('/kontak', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/kontak', [App\Http\Controllers\ContactController::class, 'store'])
    ->name('contact.store')
    ->middleware('throttle:contact');
