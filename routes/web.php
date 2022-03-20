<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\websiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/' , [websiteController::class , 'index'])->name('home');

Route::get('shop' , [websiteController::class, 'shop'])->name('shop');
Route::get('shop/{id}' , [websiteController::class, 'showProduct'])->name('products.show');
Route::get('about_us' , [websiteController::class , 'aboutUs'])->name('about_us');
Route::get('myCart' , [websiteController::class , 'cart'])->name('cartWebsite');
Route::post('add-to-cart/{id}' , [websiteController::class , 'addToCart'])->name('addToCart');
Route::get('checkout' , [websiteController::class , 'checkout'])->name('checkout');
Route::post('create-order' , [websiteController::class , 'placeOrder'])->name('order.store');
Route::post('review' , [websiteController::class , 'makeReview'])->name('review.store');
Route::get('wishlist' , [websiteController::class , 'wishlist'])->name('wishlist');
Route::post('wishlist/add' , [websiteController::class , 'addToWishlist'])->name('addToWishList');
Route::get('wishlist/delete/{id}' , [websiteController::class , 'deleteFromWishlist'])->name('wishlist.delete');
Route::get('contact' , [websiteController::class , 'contact'])->name('contact-us');
Route::post('contact' , [websiteController::class , 'contactPost'])->name('contact-msg');






Route::get('cart_delete' , [websiteController::class , 'cartDelete'])->name('cart.delete');

