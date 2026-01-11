<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

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