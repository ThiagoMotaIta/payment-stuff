<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PaymentController;
use App\Http\Controllers\api\AuthController;

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

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});


// List payments
Route::get('payments', [PaymentController::class, 'getAllPayments']);

// Get a payment details
Route::get('payment/{id}', [PaymentController::class, 'getPayment']);

// Post a Payment
Route::post('payment', [PaymentController::class, 'createPayment']);

// Simulating a provider
Route::post('payment/process', [PaymentController::class, 'paymentProcess']);