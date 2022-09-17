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
        Schema::create('shifts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('date')->nullable();
            $table->enum('day_of_week', ['sunday','monday','tuesday','wednesday','thursday','friday','saturday'])->nullable();
            $table->string('type'); // fixed, flexible
            $table->time('check_in_start')->nullable();
            $table->time('check_in_end');
            $table->time('break_start')->nullable();
            $table->time('break_end')->nullable();
            $table->time('break_allowed_duration')->nullable();
            $table->time('checkout_start');
            $table->time('checkout_end')->nullable();
            $table->time('shift_total')->nullable();
            $table->float('work_day_count',3,2);
            $table->foreignUuid('wrok_site_id')->nullable();
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
        Schema::dropIfExists('shifts');
    }
};
