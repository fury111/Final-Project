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
    Route::get('/addresses', function () {
        return view('user.addresses');
    })->name('addresses');

    // Cart Management
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');

    // Checkout
    Route::get('/checkout', function () {
        return view('user.checkout');
    })->name('checkout');

    // Order Management
    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders');
    Route::get('/order-detail/{id}', [App\Http\Controllers\OrderController::class, 'show'])->name('order.detail');

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
        Route::get('/login', function () {
            return view('admin.auth.login');
        })->name('login');

        Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('login.submit');
    });

    // Admin Logout
    Route::post('/logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('logout');

    // Protected Admin Routes
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Admin Management Routes
        Route::get('/products', function () {
            return view('admin.products');
        })->name('products.index');

        Route::get('/products/create', function () {
            return view('admin.productcreate');
        })->name('products.create');

        Route::get('/products/edit', function () {
            return view('admin.productedit');
        })->name('products.edit');

        Route::get('/categories', function () {
            return view('admin.categories');
        })->name('categories.index');

        Route::get('/categories/create', function () {
            return view('admin.categoriecreate');
        })->name('categories.create');

        Route::get('/categories/edit', function () {
            return view('admin.categorieedit');
        })->name('categories.edit');

        Route::get('/orders', function () {
            return view('admin.orders');
        })->name('orders.index');

        Route::get('/users', function () {
            return view('admin.users');
        })->name('users.index');

        Route::get('/users/create', function () {
            return view('admin.userscreate');
        })->name('users.create');

        Route::get('/users/profile', function () {
            return view('admin.adminprofile');
        })->name('users.profile');

        // Coupon Management
        Route::get('/coupon', function () {
            return view('admin.coupon');
        })->name('coupon.index');

        Route::get('/coupon/create', function () {
            return view('admin.couponcreate');
        })->name('coupon.create');

        Route::get('/coupon/edit', function () {
            return view('admin.couponedit');
        })->name('coupon.edit');

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

        // Flash Sales Management
        Route::get('/promo/flashsales', function () {
            return view('admin.flashsale');
        })->name('promo.flashsales');

        Route::get('/promo/flashsales/create', function () {
            return view('admin.flashsalescreate');
        })->name('promo.flashsales.create');

        Route::get('/promo/flashsales/edit', function () {
            return view('admin.flashsalesedit');
        })->name('promo.flashsales.edit');

        // Reviews & Ratings
        Route::get('/promo/ratings', function () {
            return view('admin.ratings');
        })->name('promo.ratings');

        Route::get('/promo/reviews', function () {
            return view('admin.reviews');
        })->name('promo.reviews');

        Route::get('/promo/discounts', function () {
            return view('admin.discounts');
        })->name('promo.discounts');
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