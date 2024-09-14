<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DiscountCodeController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StripeWebhookController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');


Route::get('/register', function () {
    return view('user.register');
});

Route::post('/register-store', [UserController::class, 'register']);

Route::get('/login', function () {
    return view('user.login');
})->name('login');

Route::post('/login-store', [UserController::class, 'login'])->name('login-store');



Route::post('/logout', [UserController::class, 'logout'])->name('logout');






Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
Route::post('/brands', [BrandController::class, 'store'])->name('brands.store');
Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
Route::get('/brands/{brand}', [BrandController::class, 'show'])->name('brands.show');


Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');


Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{productId}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/items/{itemId}', [CartController::class, 'remove'])->name('cart.remove');

});

Route::get('/map', [MapController::class, 'index']);
Route::post('/update-marker', [MapController::class, 'updateMarker'])->name('update.marker');


Route::post('/apply-discount', [CartController::class, 'applyDiscount'])->name('cart.applyDiscount');

//Route::get('/generate-discount-code', [DiscountCodeController::class, 'generateCode'])->name('discount.generate');


Route::get('/discount/generate', [DiscountCodeController::class, 'showGenerateForm'])->name('discount.showGenerateForm');
Route::post('/discount/generate', [DiscountCodeController::class, 'generateCode'])->name('discount.generate');


Route::get('/home', [ProductController::class,'home'])->name('home');
Route::get('/about', [ProductController::class,'about']);






Route::post('/payment', [PayController::class,'pay'])->name('payment.firas');


Route::get('/admin/payment/{paymentId}', [PaymentController::class, 'showPaymentDetails'])->name('admin.payment.details');
Route::get('/admin/payments', [PaymentController::class, 'listPayments'])->name('admin.payments');



Route::get('/payment', [PaymentController::class,'showPaymentForm'])->name('payment.form');
Route::post('/process-payment', [PaymentController::class,'processPayment'])->name('process.payment');

Route::get('/payment/success', function () {
    return view('pay.payment-success');
})->name('payment.success');

Route::get('/payment/failure', function () {
    return view('pay.payment-failure');
})->name('payment.failure');





Route::post('/stripe/webhook', [StripeWebhookController::class, 'handleWebhook']);



