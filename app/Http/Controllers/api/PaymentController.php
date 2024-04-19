<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PaymentService;

class PaymentController extends Controller
{
    // Here, we are using Dependency Injection to get all payments list
    public function getAllPayments(PaymentService $paymentService) {
        return $paymentService->getAllPaymentService();
    }

    // Here, we are using Dependency Injection to get payment details
    public function getPayment(PaymentService $paymentService, $id) {
        return $paymentService->getPaymentService($id);
    }

    // Here, we are using Dependency Injection to create new payment
    public function createPayment(PaymentService $paymentService, Request $request) {
        return $paymentService->createPaymentService($request);
    }

    // Payment provider simulation - For this only method, we will NOT use Dependency injection
    public function paymentProcess(Request $request) {

        // Simulation: if number lower than 30, validation is false
        // and if number bigger than 30, validation is true
        $validation = true;
        $number = rand(0, 99);

        if ($number <= 30) {
            $validation = false;
        }

        return response()->json([
          "validation" => $validation,
          "payment_id" => $request->payment_id
        ], 202);

    }
}
