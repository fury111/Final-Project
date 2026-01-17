<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Coupon Routes
    Route::get('/coupon', function () {
        return view('admin.coupon');
    })->name('coupon.index');

    Route::get('/coupon/create', function () {
        return view('admin.couponcreate'); // Keeping your current naming
    })->name('coupon.create');

    Route::get('/coupon/edit', function () {
        return view('admin.couponedit'); // Keeping your current naming
    })->name('coupon.edit');

    // Promo Routes
    Route::get('/promo', function () {
        return view('admin.promobanner'); // Keeping your current naming
    })->name('promo.index');

    Route::get('/promo/create', function () {
        return view('admin.promobannercreate'); // Keeping your current naming
    })->name('promo.create');

    Route::get('/promo/edit', function () {
        return view('admin.promobanneredit'); // Keeping your current naming
    })->name('promo.edit');

    // Flash Sales Routes
    Route::get('/promo/flashsales', function () {
        return view('admin.flashsale'); // Keeping your current naming
    })->name('promo.flashsales');

    Route::get('/promo/flashsales/create', function () {
        return view('admin.flashsalescreate'); // Keeping your current naming
    })->name('promo.flashsales.create');

    Route::get('/promo/flashsales/edit', function () {
        return view('admin.flashsalesedit'); // Keeping your current naming
    })->name('promo.flashsales.edit');

     Route::get('/promo/ratings', function () {
        return view('admin.ratings'); // Keeping your current naming
    })->name('promo.ratings');

    Route::get('/promo/reviews', function () {
        return view('admin.reviews'); // Keeping your current naming
    })->name('promo.reviews');

    Route::get('/promo/discounts', function () {
        return view('admin.discounts'); // Keeping your current naming
    })->name('promo.discounts');

    Route::get('/products', function () {
        return view('admin.products');
    })->name('products.index');

    Route::get('/products/create', function () {
        return view('admin.productcreate');
    })->name('products.create');

    Route::get('/products/edit', function () {
        return view('admin.productedit');
    })->name('products.edit');

    Route::get('/categories/create', function () {
        return view('admin.categoriecreate');
    })->name('categories.create');

    Route::get('/categories/edit', function () {
        return view('admin.categorieedit');
    })->name('categories.edit');
    
    Route::get('/categories', function () {
        return view('admin.categories');
    })->name('categories.index');

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



});

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/landing', function () {
        return view('users.landing');
    })->name('landing');

});

Route::get('/', function () {
    return view('user.home');
})->name('home');

Route::get('/welcome', function () {
    return view('user.welcome');
})->name('welcome');

// About Page
Route::get('/about', function () {
    return view('user.about');
})->name('about');

// Contact Page
Route::get('/contact', function () {
    return view('user.contact');
})->name('contact');

// FAQ Page
Route::get('/faq', function () {
    return view('user.faq');
})->name('faq');

// Deals / Promotions Page
Route::get('/deals', function () {
    return view('user.deals');
})->name('deals');

// Category Pages (Dynamic or Static)
Route::get('/category/{slug}', function ($slug) {
    return view('user.category', ['slug' => $slug]);
})->name('category.show');

// Product Pages
Route::get('/product/{id}', function ($id) {
    return view('user.product', ['id' => $id]);
})->name('product.show');

// Shop / All Products
Route::get('/shop', function () {
    return view('user.shop');
})->name('shop');

// Cart Page
Route::get('/cart', function () {
    return view('user.cart');
})->name('cart.index');

// Checkout Page
Route::get('/checkout', function () {
    return view('user.checkout');
})->name('checkout.index');

// Order Confirmation
Route::get('/order/confirm', function () {
    return view('user.confirmation');
})->name('order.confirm');

// User Account / Profile
Route::middleware(['auth'])->group(function () {
    Route::get('/account', function () {
        return view('user.account');
    })->name('account.index');

    Route::get('/orders', function () {
        return view('user.orders');
    })->name('orders.index');

    Route::get('/addresses', function () {
        return view('user.addresses');
    })->name('addresses.index');

    Route::get('/wishlist', function () {
        return view('user.wishlist');
    })->name('wishlist.index');

    Route::get('/order/{id}', function ($id) {
        return view('user.order-detail', ['id' => $id]);
    })->name('order.show');
});

// Login / Register / Auth Routes (if not using Breeze)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

// Optional: Logout route (if not using Laravel's built-in)
Route::post('/logout', function () {
    auth()->logout();
    return redirect()->route('home');
})->name('logout');

// Search Route
Route::get('/search', function () {
    return view('user.search');
})->name('search');

// 404 Page (Optional)
Route::fallback(function () {
    return view('errors.404');
});