<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Models\Cart;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/about', function() {
    return view('about');
});

Route::get('/carbon-calculator', function () {
    return view('carbon-calculator');
});

Route::get('/carbon-question', function () {
    return view('carbon-question');
});

Route::get('/edit-profile', function () {
    return view('edit-profile');
});

Route::resource('/user', UserController::class);

Route::resource('/review', ReviewController::class);

Route::resource('cart', CartController::class);

Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout.payment');
Route::get('/success', [PaymentController::class, 'success'])->name('checkout.success');
Route::get('/cancel', [PaymentController::class, 'cancel'])->name('checkout.cancel');

Route::post('/calculate-cost', [PaymentController::class, 'calculateShippingCost']);

Route::get('/checkout', function (Request $request){
    $cartIds = $request->query('carts');
    return view('checkout', ["carts" => $cartIds]);
})->name('checkout');