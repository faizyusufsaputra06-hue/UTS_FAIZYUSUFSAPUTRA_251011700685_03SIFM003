<?php

use App\Http\Controllers\FurnitureController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FurnitureController::class, 'home'])->name('home');
Route::get('/produk', [FurnitureController::class, 'index'])->name('products.index');
Route::get('/produk/{furniture}', [FurnitureController::class, 'show'])->name('products.show');
Route::get('/kategori', [FurnitureController::class, 'categories'])->name('categories');
Route::view('/tentang-kami', 'pages.about')->name('about');


