<?php

use App\Models\Payment;
use App\Providers\RouteServiceProvider;

test('get all payments', function () {
    $payment = Payment::all();
    $response = $this
        ->get('api/payments');

    $response->assertStatus(202);
});


test('get payment details', function () {
    $payment = Payment::find(1);
    $response = $this
        ->get('api/payments/1');

    $response->assertStatus(202);
});


test('create new Payment', function () {
    $response = $this->post('api/payment', [
        'payment_method' => 2,
        'client_name' => "Thiago Mota",
        'cpf' => '54924375004',
        'description' => 'Something goes here',
        'amount' => 600,
        'status' => 1
    ]);
    // Missing user_id due to no Authenticated user
    $response->assertStatus(202);
});