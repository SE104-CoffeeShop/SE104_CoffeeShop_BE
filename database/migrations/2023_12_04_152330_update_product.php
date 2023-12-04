<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('product', function ($table) {
            $table->string('type')->nullable;
        });
    }

    public function down()
    {
        Schema::table('product', function ($table) {
            $table->string('type')->nullable;
        });
    }
};
