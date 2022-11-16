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
        Schema::create('attendance_logs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('uid')->nullable();
            $table->date('date');
            $table->time('time');
            $table->integer('state')->nullable();
            $table->integer('type')->nullable();
            $table->foreignUuid('attendance_id')->nullable();
            $table->foreignUuid('biometric_device_id')->nullable();
            $table->integer('staff_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_logs');
    }
};
