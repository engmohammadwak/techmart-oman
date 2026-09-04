<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Account\DashboardController;
use App\Http\Controllers\Account\OrderController;
use App\Http\Controllers\Account\WishlistController;
use App\Http\Controllers\Account\AddressController;
use App\Http\Controllers\Account\WalletController;
use App\Http\Controllers\Account\PointsController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Products
Route::get('/products/new', [ProductController::class, 'new'])->name('products.new');
Route::get('/products/used', [ProductController::class, 'used'])->name('products.used');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/categories/{slug}', [ProductController::class, 'category'])->name('categories.show');
Route::get('/brands/{slug}', [ProductController::class, 'brand'])->name('brands.show');

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/order-confirmation/{order_number}', [CheckoutController::class, 'confirmation'])->name('order.confirmation');
Route::get('/track-order', [CheckoutController::class, 'track'])->name('order.track');

// Auth
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/forgot-password', [LoginController::class, 'forgotPassword'])->name('password.request');
Route::post('/forgot-password', [LoginController::class, 'sendResetLink']);
Route::get('/reset-password/{token}', [LoginController::class, 'resetPassword'])->name('password.reset');
Route::post('/reset-password', [LoginController::class, 'updatePassword']);

// Account (Authenticated)
Route::middleware('auth')->prefix('account')->name('account.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/orders/{id}/track', [OrderController::class, 'track'])->name('orders.track');
    Route::post('/orders/{id}/return', [OrderController::class, 'return'])->name('orders.return');
    Route::post('/orders/{id}/review', [OrderController::class, 'review'])->name('orders.review');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
    Route::post('/wishlist/{id}', [WishlistController::class, 'add'])->name('wishlist.add');
    Route::delete('/wishlist/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');
    Route::get('/addresses', [AddressController::class, 'index'])->name('addresses');
    Route::post('/addresses', [AddressController::class, 'store'])->name('addresses.store');
    Route::put('/addresses/{id}', [AddressController::class, 'update'])->name('addresses.update');
    Route::delete('/addresses/{id}', [AddressController::class, 'destroy'])->name('addresses.destroy');
    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet');
    Route::post('/wallet/topup', [WalletController::class, 'topup'])->name('wallet.topup');
    Route::get('/points', [PointsController::class, 'index'])->name('points');
    Route::get('/notifications', [DashboardController::class, 'notifications'])->name('notifications');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
    Route::put('/settings', [DashboardController::class, 'updateSettings'])->name('settings.update');
});

// Static Pages
Route::get('/about', fn() => Inertia::render('Static/About'))->name('about');
Route::get('/faq', fn() => Inertia::render('Static/Faq'))->name('faq');
Route::get('/terms', fn() => Inertia::render('Static/Terms'))->name('terms');
Route::get('/privacy', fn() => Inertia::render('Static/Privacy'))->name('privacy');
Route::get('/help', fn() => Inertia::render('Static/Help'))->name('help');
