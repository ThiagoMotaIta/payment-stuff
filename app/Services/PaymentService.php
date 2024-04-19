<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Auth;

class PaymentService {

    // List all Payments
    public function getAllPaymentService() {

        $payments = Payment::all();

        if ($payments->count() == 0){
            return response()->json([
              "message" => "There is no payment yet!"
            ], 202);
        } else {
            return response()->json([  
              "paymentList" => $payments
            ], 200);
        }
    }


    // List a Payment details
    public function getPaymentService($id) {

        $payment = Payment::find($id);

        if ($payment == null){
            return response()->json([
              "message" => "There is no payment for that ID!"
            ], 202);
        } else {
            return response()->json([
              "payment" => $payment
            ], 200);
        }
    }

    // Create a new payment
    public function createPaymentService(Request $request) {

        // Get selected payment method
        $paymentMethod = PaymentMethod::where('id', $request->payment_method)->get();

        if ($paymentMethod->count() > 0) {
            // Apply the fee according to the payment method
            $finalAmount = (($request->amount * $paymentMethod[0]->fee)/100) + $request->amount;

            // Create new payment
            $createPayment = new Payment;
            $createPayment->payment_method = $paymentMethod[0]->id;
            $createPayment->client_name = $request->client_name;
            $createPayment->cpf = $request->cpf;
            $createPayment->description = $request->description;
            $createPayment->amount = $finalAmount;
            $createPayment->status = $request->status;
            $createPayment->save();

            // Simulation of provider
            $post = [
                'payment_id' => $createPayment->id
            ];

            $ch = curl_init('http://localhost/payment-system/public/api/payment/process');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            $provider = curl_exec($ch);

            $providerProcess = json_decode($provider);

            // if provider validation is true
            if ($providerProcess->validation) {
                return response()->json([
                  "message" => "Payment Processed!"
                ], 200);
            } else {
                return response()->json([
                  "message" => "Payment registered, but NOT processed!"
                ], 200);
            }

        } else {
            return response()->json([
              "message" => "The payment method is not allowed!"
            ], 202);
        }

    }

}
