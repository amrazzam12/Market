<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;



Route::get('/panel' , function () {
   return view('admin.admin');
});


Route::resource('users' , UsersController::class);
Route::resource('categories' , CategoryController::class);
Route::resource('products' , ProductController::class);
Route::resource('banners' , BannerController::class);
