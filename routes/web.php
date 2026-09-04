<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Homepage
Route::get('/', fn() => Inertia::render('Welcome', [
    'canLogin' => true,
    'canRegister' => true,
]))->name('home');

// Products
Route::get('/products/new', fn() => Inertia::render('Products/Index', ['condition' => 'new']))->name('products.new');
Route::get('/products/used', fn() => Inertia::render('Products/Index', ['condition' => 'used']))->name('products.used');
Route::get('/products/{slug}', fn() => Inertia::render('Products/Show'))->name('products.show');

// Cart
Route::get('/cart', fn() => Inertia::render('Cart'))->name('cart');

// Auth
Route::get('/login', fn() => Inertia::render('Auth/Login'))->name('login');
Route::get('/register', fn() => Inertia::render('Auth/Register'))->name('register');

// Static Pages
Route::get('/about', fn() => Inertia::render('Static/About'))->name('about');
Route::get('/faq', fn() => Inertia::render('Static/Faq'))->name('faq');
Route::get('/terms', fn() => Inertia::render('Static/Terms'))->name('terms');
Route::get('/privacy', fn() => Inertia::render('Static/Privacy'))->name('privacy');
