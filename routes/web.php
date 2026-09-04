<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Products
Route::get('/products/new', [ProductController::class, 'index'])->defaults('condition', 'new')->name('products.new');
Route::get('/products/used', [ProductController::class, 'index'])->defaults('condition', 'used')->name('products.used');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/categories/{slug}', [ProductController::class, 'category'])->name('categories.show');
Route::get('/brands/{slug}', [ProductController::class, 'brand'])->name('brands.show');

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Auth
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Static
Route::get('/about', fn() => inertia('Static/About'))->name('about');
Route::get('/faq', fn() => inertia('Static/Faq'))->name('faq');
Route::get('/terms', fn() => inertia('Static/Terms'))->name('terms');
Route::get('/privacy', fn() => inertia('Static/Privacy'))->name('privacy');
