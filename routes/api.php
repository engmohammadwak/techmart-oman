<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    // Public APIs
    Route::get('/homepage', [App\Http\Controllers\Api\HomeController::class, 'index']);
    Route::get('/products', [App\Http\Controllers\Api\ProductController::class, 'index']);
    Route::get('/products/{slug}', [App\Http\Controllers\Api\ProductController::class, 'show']);
    Route::get('/categories', [App\Http\Controllers\Api\CategoryController::class, 'index']);
    Route::get('/brands', [App\Http\Controllers\Api\BrandController::class, 'index']);
    Route::get('/faqs', [App\Http\Controllers\Api\FaqController::class, 'index']);
    Route::get('/legal/{slug}', [App\Http\Controllers\Api\LegalController::class, 'show']);

    // Cart (Session-based for guests)
    Route::get('/cart', [App\Http\Controllers\Api\CartController::class, 'index']);
    Route::post('/cart/add', [App\Http\Controllers\Api\CartController::class, 'add']);
    Route::put('/cart/{id}', [App\Http\Controllers\Api\CartController::class, 'update']);
    Route::delete('/cart/{id}', [App\Http\Controllers\Api\CartController::class, 'remove']);
    Route::post('/cart/apply-coupon', [App\Http\Controllers\Api\CartController::class, 'applyCoupon']);

    // Checkout
    Route::post('/orders', [App\Http\Controllers\Api\OrderController::class, 'store']);
    Route::get('/orders/{order_number}/confirmation', [App\Http\Controllers\Api\OrderController::class, 'confirmation']);
    Route::get('/track-order', [App\Http\Controllers\Api\OrderController::class, 'track']);

    // Support
    Route::post('/support-tickets', [App\Http\Controllers\Api\SupportController::class, 'store']);

    // Authenticated APIs
    Route::middleware('auth:sanctum')->group(function () {
        // Auth
        Route::post('/auth/register', [App\Http\Controllers\Api\AuthController::class, 'register']);
        Route::post('/auth/verify-otp', [App\Http\Controllers\Api\AuthController::class, 'verifyOtp']);
        Route::post('/auth/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
        Route::post('/auth/forgot-password', [App\Http\Controllers\Api\AuthController::class, 'forgotPassword']);
        Route::post('/auth/reset-password', [App\Http\Controllers\Api\AuthController::class, 'resetPassword']);
        Route::post('/auth/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);

        // Account
        Route::get('/account', [App\Http\Controllers\Api\AccountController::class, 'index']);
        Route::get('/account/orders', [App\Http\Controllers\Api\AccountController::class, 'orders']);
        Route::get('/account/orders/{id}', [App\Http\Controllers\Api\AccountController::class, 'orderShow']);
        Route::post('/account/orders/{id}/return', [App\Http\Controllers\Api\AccountController::class, 'returnOrder']);
        Route::post('/account/orders/{id}/review', [App\Http\Controllers\Api\AccountController::class, 'reviewOrder']);
        Route::get('/account/wishlist', [App\Http\Controllers\Api\AccountController::class, 'wishlist']);
        Route::post('/account/wishlist/{id}', [App\Http\Controllers\Api\AccountController::class, 'addToWishlist']);
        Route::delete('/account/wishlist/{id}', [App\Http\Controllers\Api\AccountController::class, 'removeFromWishlist']);
        Route::get('/account/addresses', [App\Http\Controllers\Api\AccountController::class, 'addresses']);
        Route::post('/account/addresses', [App\Http\Controllers\Api\AccountController::class, 'createAddress']);
        Route::put('/account/addresses/{id}', [App\Http\Controllers\Api\AccountController::class, 'updateAddress']);
        Route::delete('/account/addresses/{id}', [App\Http\Controllers\Api\AccountController::class, 'deleteAddress']);
        Route::get('/account/wallet', [App\Http\Controllers\Api\AccountController::class, 'wallet']);
        Route::post('/account/wallet/topup', [App\Http\Controllers\Api\AccountController::class, 'topupWallet']);
        Route::get('/account/points', [App\Http\Controllers\Api\AccountController::class, 'points']);
        Route::get('/account/notifications', [App\Http\Controllers\Api\AccountController::class, 'notifications']);
        Route::put('/account/settings', [App\Http\Controllers\Api\AccountController::class, 'updateSettings']);

        // Admin APIs
        Route::middleware(['role:super_admin|store_manager|sales_staff|inventory_staff|accountant'])->group(function () {
            Route::get('/admin/dashboard-stats', [App\Http\Controllers\Api\Admin\DashboardController::class, 'stats']);
            Route::get('/admin/orders', [App\Http\Controllers\Api\Admin\OrderController::class, 'index']);
            Route::put('/admin/orders/{id}/status', [App\Http\Controllers\Api\Admin\OrderController::class, 'updateStatus']);
            Route::post('/admin/pos/sale', [App\Http\Controllers\Api\Admin\OrderController::class, 'posSale']);
            Route::get('/admin/returns', [App\Http\Controllers\Api\Admin\OrderController::class, 'returns']);
            Route::put('/admin/returns/{id}', [App\Http\Controllers\Api\Admin\OrderController::class, 'updateReturn']);
            Route::get('/admin/products', [App\Http\Controllers\Api\Admin\ProductController::class, 'index']);
            Route::post('/admin/products', [App\Http\Controllers\Api\Admin\ProductController::class, 'store']);
            Route::put('/admin/products/{id}', [App\Http\Controllers\Api\Admin\ProductController::class, 'update']);
            Route::get('/admin/warehouses', [App\Http\Controllers\Api\Admin\WarehouseController::class, 'index']);
            Route::post('/admin/inventory/transfer', [App\Http\Controllers\Api\Admin\InventoryController::class, 'transfer']);
            Route::get('/admin/inventory/alerts', [App\Http\Controllers\Api\Admin\InventoryController::class, 'alerts']);
            Route::get('/admin/invoices', [App\Http\Controllers\Api\Admin\InvoiceController::class, 'index']);
            Route::post('/admin/expenses', [App\Http\Controllers\Api\Admin\ExpenseController::class, 'store']);
            Route::get('/admin/reports/financial', [App\Http\Controllers\Api\Admin\ReportController::class, 'financial']);
            Route::get('/admin/vat', [App\Http\Controllers\Api\Admin\ReportController::class, 'vat']);
            Route::get('/admin/customers', [App\Http\Controllers\Api\Admin\CustomerController::class, 'index']);
            Route::get('/admin/reports/sales', [App\Http\Controllers\Api\Admin\ReportController::class, 'sales']);
            Route::get('/admin/branches', [App\Http\Controllers\Api\Admin\BranchController::class, 'index']);
            Route::post('/admin/staff', [App\Http\Controllers\Api\Admin\StaffController::class, 'store']);
            Route::get('/admin/settings', [App\Http\Controllers\Api\Admin\SettingController::class, 'index']);
            Route::post('/admin/coupons', [App\Http\Controllers\Api\Admin\CouponController::class, 'store']);
        });
    });
});
