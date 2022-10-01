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
        Schema::create('attendances', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('date')->nullable();
            $table->time('check_in_at')->nullable();
            $table->time('check_out_at')->nullable();
            $table->string('status')->default('scheduled');
            $table->time('total_late')->nullable();
            $table->time('break_late')->nullable();
            $table->foreignUuid('duty_id')->nullable();
            $table->foreignUuid('employee_id')->nullable();
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
        Schema::dropIfExists('attendances');
    }
};
