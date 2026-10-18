<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FurnitureController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FurnitureController::class, 'home'])->name('home');
Route::get('/produk', [FurnitureController::class, 'index'])->name('products.index');
Route::get('/produk/{furniture}', [FurnitureController::class, 'show'])->name('products.show');
Route::get('/kategori', [FurnitureController::class, 'categories'])->name('categories');
Route::view('/tentang-kami', 'pages.about')->name('about');

Route::get('/checkout/{furniture}', [CheckoutController::class, 'create'])->name('checkout.create');
Route::post('/checkout/{furniture}', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/pesanan/{order}', [CheckoutController::class, 'success'])->name('checkout.success');
