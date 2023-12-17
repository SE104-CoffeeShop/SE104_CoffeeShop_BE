<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('invoice_detail', function ($table) {
            $table->integer('unit_price');
            $table->string('product_name');
        });
    }

    public function down()
    {
        Schema::table('invoice_detail', function ($table) {
            $table->dropColumn('unit_price');
            $table->dropColumn('product_name');
        });
    }
};
