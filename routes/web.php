<?php

# ivy nambahin dari sini
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
# sampe sini

use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\CarbonCalculatorController;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Review;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

# nambahin login dan register ya dr sini
Route::get('/', function () {
    return redirect()->route('signup');
});

Route::get('/', function () {
    return redirect()->route('signin'); 
});

// Route untuk menampilkan form Sign Up
Route::get('/signup', [RegisterController::class, 'showRegistrationForm'])->name('signup');
// Route untuk data form Sign Up
Route::post('/signup', [RegisterController::class, 'register'])->name('register.submit');

// --- BAGIAN BARU / PERBARUAN UNTUK SIGN IN ---
// Route untuk menampilkan form Sign In
Route::get('/signin', [LoginController::class, 'showLoginForm'])->name('signin');

// Route untuk data form Sign In (nantinya)
Route::post('/signin', [LoginController::class, 'login'])->name('login.submit');

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/about', function() {
    return view('about');
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

Route::controller(CarbonCalculatorController::class)->group(function () {
    Route::get('/carbon-calculator', 'index')->name('carbon-calculator');
    Route::get('/carbon-calculator/question', 'question')->name('carbon-calculator.question');
    Route::get('/carbon-calculator/result', 'result')->name('carbon-calculator.result');
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