<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\CartController;
Route::get('/user', function (Request $request) {
    return response()->json(["test"]);
});


// Show all hotels
Route::get('/hotels/showHotel', [HotelController::class, 'showHotel']);
//show form to create hotel
Route::get('/hotels/create-page', [HotelController::class,'storeForm']);
Route::post('/hotels/store', [HotelController::class,'store']);
Route::delete('/hotels/{id}', [HotelController::class, 'destroy']);

Route::post('/hotels/test', [HotelController::class, 'test']);


Route::get('/hotels/search', [HotelController::class,'search']);


Route::post('/apply-discountawdw', [CartController::class, 'applyDiscount']);

Route::post('/stripe/webhook', [StripeWebhookController::class, 'handleWebhook']);


Route::post('/cart/{productId}', [CartController::class, 'add']);