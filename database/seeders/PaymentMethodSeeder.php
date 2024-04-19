<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::create([
            'name' => 'Method PIX',
            'slug' => 'pix',
            'fee' => '1.5',
        ]);

        PaymentMethod::create([
            'name' => 'Method BOLETO',
            'slug' => 'boleto',
            'fee' => '2',
        ]);

        PaymentMethod::create([
            'name' => 'Method BANK TRANSFER',
            'slug' => 'bank_transfer',
            'fee' => '4',
        ]);
    }
}
