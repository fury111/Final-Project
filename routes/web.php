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