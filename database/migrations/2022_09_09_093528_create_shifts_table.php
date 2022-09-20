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
            $table->string('color')->nullable()->default('#34ebab');
            $table->time('check_in_start')->nullable();
            $table->time('check_in_end');
            $table->time('break_start')->nullable();
            $table->time('break_end')->nullable();
            $table->time('break_allowed_duration')->nullable();
            $table->time('check_out_start');
            $table->time('check_out_end')->nullable();
            $table->time('shift_total')->nullable();
            $table->foreignUuid('work_site_id')->nullable();
            $table->foreignUuid('job_id')->nullable();
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
