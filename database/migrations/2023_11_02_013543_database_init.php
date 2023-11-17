<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('request_form', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('expected');
            $table->string('sender_id');
            $table->string('manager_id');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('status')->default('pending');
            $table->text('reason')->nullable();
            $table->text('manager_reason')->nullable();
        });
    }
    public function down()
    {
        Schema::dropIfExists('request_form');
    }
};
