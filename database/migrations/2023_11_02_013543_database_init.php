<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('image')->nullable();
            $table->float('unit_price');
        });

        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone_number');
        });

        Schema::create('voucher', function (Blueprint $table) {
            $table->id();
            $table->string('voucher_code');
            $table->string('type');
            $table->integer('amount');
            $table->integer('quantity');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
        });

        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('customer_id');
            $table->string('voucher_code')->nullable();
            $table->float('price');
            $table->float('discount_price');
            $table->float('final_price');
            $table->dateTime('date');
            $table->text('note');
        });

        Schema::create('invoice_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id');
            $table->integer('product_id');
            $table->integer('quantity');
        });
    }
    public function down()
    {
        Schema::dropIfExists('product');
        Schema::dropIfExists('customer');
        Schema::dropIfExists('voucher');
        Schema::dropIfExists('invoice');
        Schema::dropIfExists('invoice_detail');
    }
};
