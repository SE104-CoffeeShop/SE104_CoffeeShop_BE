<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('invoice_detail', function ($table) {
            $table->integer('unit_price');
        });
    }

    public function down()
    {
        Schema::table('invoice_detail', function($table) {
            $table->dropColumn('unit_price');
        });
    }
};
