<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Review;
use App\Models\Organization;
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

Route::resource('/user', UserController::class);

Route::resource('/review', ReviewController::class);

Route::resource('cart', CartController::class);

Route::resource('/products', ProductController::class);

Route::controller(PaymentController::class)->group(function () {
    Route::get('/checkout', 'index')->name('checkout');
    Route::post('/checkout', 'checkout')->name('checkout.payment');
    Route::get('/success', 'success')->name('checkout.success');
    Route::get('/cancel', 'cancel')->name('checkout.cancel');
    Route::post('/calculate-cost', 'calculateShippingCost');
});

// Organization
Route::controller(OrganizationController::class)->group(function(){
    Route::get('/addorg', 'create')->name('organization.create');
    Route::post('/organizations', 'store')->name('organization.store');
    Route::get('/listorg', 'index')->name('organization.listorg');
    Route::get('/organizations/{organization_id}/edit', 'edit')->name('organization.edit');
    Route::put('/organizations/{organization_id}', 'update')->name('organization.update');
    Route::delete('/organizations/{organization_id}', 'destroy')->name('organization.destroy');
});