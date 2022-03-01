<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\EnsureIsAdmin;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware(EnsureIsAdmin::class)->group(function () {
    Route::get('/' , function () {
        return view('admin.admin' , [
            'countOfUsers' => count(\App\Models\User::all()),
            'countOfProducts' => count(\App\Models\Product::all()),
            'countOfCategories' => count(\App\Models\Category::all()),
            'countOfReviews' => count(\App\Models\Review::all()),
            'countOfOrders' => count(\App\Models\Order::all()),
            'countOfBanners' => count(\App\Models\Banner::all()),
        ]);
    })->name('admin.home');
    Route::resource('users' , UsersController::class);
    Route::resource('categories' , CategoryController::class);
    Route::resource('products' , ProductController::class);
    Route::resource('banners' , BannerController::class);
    Route::get('orders' , [OrdersController::class , 'index'])->name('orders.index');
    Route::get('reviews' , [ReviewsController::class , 'index'])->name('reviews.index');


});
