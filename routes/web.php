<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Enjoy building your API!
|
*/

// ========================================
// AUTHENTICATION ROUTES
// ========================================
Auth::routes();

// ========================================
// GUEST-ONLY PAGES (Redirect if logged in)
// ========================================
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    Route::get('/forgot-password', function () {
        return view('auth.passwords.email');
    })->name('password.request');
});

// ========================================
// AUTHENTICATED USER PAGES
// ========================================
Route::middleware(['auth'])->group(function () {
    // Account Management
    Route::get('/account', [App\Http\Controllers\AccountController::class, 'show'])->name('account');
    Route::put('/account', [App\Http\Controllers\AccountController::class, 'update'])->name('account.update');

    // Addresses
    // Addresses
Route::get('/addresses', [App\Http\Controllers\AddressController::class, 'index'])->name('addresses');
Route::get('/addresses/create', [App\Http\Controllers\AddressController::class, 'create'])->name('addresses.create'); // Add this line
Route::post('/addresses', [App\Http\Controllers\AddressController::class, 'store'])->name('addresses.store');
Route::put('/addresses/{id}', [App\Http\Controllers\AddressController::class, 'update'])->name('addresses.update');
Route::delete('/addresses/{id}', [App\Http\Controllers\AddressController::class, 'destroy'])->name('addresses.destroy');
Route::put('/addresses/{id}/set-default', [App\Http\Controllers\AddressController::class, 'setDefault'])->name('addresses.set-default');

    // Cart Management
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');
    Route::post('/cart/apply-coupon', [App\Http\Controllers\CartController::class, 'applyCoupon'])->name('cart.apply-coupon');
    Route::post('/cart/remove-coupon', [App\Http\Controllers\CartController::class, 'removeCoupon'])->name('cart.remove-coupon');

    // Checkout
    Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/order/confirm/{id}', [App\Http\Controllers\OrderController::class, 'show'])->name('order.confirm');

    // Order Management
    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders');
    Route::get('/order-detail/{id}', [App\Http\Controllers\OrderController::class, 'show'])->name('order.detail');
    Route::post('/order-cancel/{id}', [App\Http\Controllers\OrderController::class, 'cancel'])->name('order.cancel');

    // Wishlist
    Route::get('/wishlist', function () {
        return view('user.wishlist');
    })->name('wishlist');
});

// ========================================
// PUBLIC PAGES (Available to everyone)
// ========================================
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/about', function () {
        return view('user.about');
})->name('about');

Route::get('/contact', function () {
        return view('user.contact');
})->name('contact');

Route::get('/deals', function () {
        return view('user.deals');
})->name('deals');

Route::get('/faq', function () {
        return view('user.faq');
})->name('faq');

// Category Routes
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
Route::get('/category/{slug}', [App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');

// Product Routes
Route::get('/product/{slug}', [App\Http\Controllers\ProductController::class, 'show'])->name('product');
Route::get('/product-page', function () {
        return view('user.product-page');
})->name('product.page');

// ========================================
// ADMIN AUTHENTICATION
// ========================================
Route::prefix('admin')->name('admin.')->group(function () {
    // Admin Login Routes
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('login.submit');
    });

    // Admin Logout
    Route::post('/logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('logout');

    // Protected Admin Routes
    Route::middleware(['auth:admin'])->group(function () {
        // Dashboard
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        // Product Management (Resource Routes)
        Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
        
        // Category Management (Resource Routes)
        Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);

        // Order Management (Resource Routes)
        Route::resource('orders', App\Http\Controllers\Admin\OrderController::class)->except(['create', 'store']);

        // User Management
        Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'users'])->name('users.index');
        Route::get('/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
        Route::get('/users/profile', [App\Http\Controllers\Admin\UserController::class, 'profile'])->name('users.profile');

        // Profile Management
        Route::get('/profile', [App\Http\Controllers\Admin\UserController::class, 'profile'])->name('profile');
        Route::put('/profile', [App\Http\Controllers\Admin\UserController::class, 'updateProfile'])->name('profile.update');

        // Coupon Management (Resource Routes)
        Route::resource('coupon', App\Http\Controllers\Admin\CouponController::class);

        // Discount Management (Resource Routes)
        Route::resource('discounts', App\Http\Controllers\Admin\DiscountController::class)->names([
            'index' => 'discounts.index',
            'create' => 'discounts.create',
            'store' => 'discounts.store',
            'show' => 'discounts.show',
            'edit' => 'discounts.edit',
            'update' => 'discounts.update',
            'destroy' => 'discounts.destroy',
        ]);

        // Flash Sales Management (Resource Routes)
        Route::resource('flashsales', App\Http\Controllers\Admin\FlashSaleController::class)->names([
            'index' => 'admin.flashsales.index',
            'store' => 'admin.flashsales.store',
            'update' => 'admin.flashsales.update',
            'destroy' => 'admin.flashsales.destroy',
        ]);

        // Add the toggle route separately
        Route::put('/flashsales/toggle', [App\Http\Controllers\Admin\FlashSaleController::class, 'toggleGlobal'])
            ->name('admin.flashsales.toggle');

        // Promo Management
        Route::get('/promo', function () {
            return view('admin.promobanner');
        })->name('promo.index');

        Route::get('/promo/create', function () {
            return view('admin.promobannercreate');
        })->name('promo.create');

        Route::get('/promo/edit', function () {
            return view('admin.promobanneredit');
        })->name('promo.edit');

        // Legacy Flash Sales Routes (for backward compatibility)
        Route::get('/promo/flashsales', [App\Http\Controllers\Admin\FlashSaleController::class, 'index'])->name('promo.flashsales');
        Route::get('/promo/flashsales/create', function () {
            return view('admin.flashsalescreate');
        })->name('promo.flashsales.create');
        Route::get('/promo/flashsales/edit', function () {
            return view('admin.flashsalesedit');
        })->name('promo.flashsales.edit');

        // Reviews & Ratings (Individual Routes - FIXED)
        Route::get('/ratings', [App\Http\Controllers\Admin\RatingController::class, 'index'])->name('admin.ratings.index');
        Route::delete('/ratings/{id}', [App\Http\Controllers\Admin\RatingController::class, 'destroy'])->name('admin.ratings.destroy');

        Route::get('/reviews', [App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('admin.reviews.index');
        Route::delete('/reviews/{id}', [App\Http\Controllers\Admin\ReviewController::class, 'destroy'])->name('admin.reviews.destroy');

        // Add custom review actions
        Route::put('/reviews/{id}/approve', [App\Http\Controllers\Admin\ReviewController::class, 'approve'])->name('admin.reviews.approve');
        Route::put('/reviews/{id}/hide', [App\Http\Controllers\Admin\ReviewController::class, 'hide'])->name('admin.reviews.hide');

        // Legacy Routes (for backward compatibility)
        Route::get('/promo/ratings', [App\Http\Controllers\Admin\RatingController::class, 'index'])->name('promo.ratings');
        Route::get('/promo/reviews', [App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('promo.reviews');
        Route::get('/promo/discounts', [App\Http\Controllers\Admin\DiscountController::class, 'index'])->name('promo.discounts');
    });
});

// ========================================
// LOGOUT ROUTES
// ========================================
// Regular user logout (handled by Laravel's Auth::routes())
Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/home')->with('success', 'Logged out successfully.');
})->name('logout');

// ========================================
// FALLBACK ROUTE
// ========================================
Route::fallback(function () {
    return view('errors.404');
});