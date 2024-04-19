<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PaymentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


// List payments
Route::get('payments', [PaymentController::class, 'getAllPayments'])->middleware('auth');

// Get a payment details
Route::get('payments/{id}', [PaymentController::class, 'getPayment'])->middleware('auth');

// Post a Payment
Route::post('payment', [PaymentController::class, 'createPayment'])->middleware('auth');

// Simulating a provider
Route::post('payment/process', [PaymentController::class, 'paymentProcess'])->middleware('auth');