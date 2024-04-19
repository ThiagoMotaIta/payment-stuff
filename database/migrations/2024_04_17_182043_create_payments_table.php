<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_method');
            $table->string('client_name', 155);
            $table->string('cpf', 20);
            $table->string('description', 155)->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('status', 1);
            $table->timestamps();
        });

        //FK
        Schema::table('payments', function (Blueprint $table) {
            $table->foreign('payment_method')->references('id')->on('payment_methods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
