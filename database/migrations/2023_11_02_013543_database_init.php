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
            $table->integer('unit_price');
            $table->timestamps();
        });

        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone_number')->unique();
            $table->timestamps();
        });

        Schema::create('voucher', function (Blueprint $table) {
            $table->id();
            $table->string('voucher_code')->unique();
            $table->string('type');
            $table->integer('amount');
            $table->integer('quantity');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamps();
        });

        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('customer_id')->nullable();
            $table->integer('table_number');
            $table->string('voucher_code')->nullable();
            $table->text('note')->nullable();
            $table->float('total_price');
            $table->float('discount_price')->default(0);
            $table->float('final_price');
            $table->string('status')->default('pending');
            $table->timestamps();
        });

        Schema::create('invoice_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->timestamps();
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
