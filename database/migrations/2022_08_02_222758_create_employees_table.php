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
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->string('staff_id')->unique();
            $table->string('name');
            $table->string('name_dv')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->date('birth_date')->nullable();
            $table->string('nationality')->nullable()->default('maldivian');
            $table->string('nid')->unique();
            $table->string('passport')->nullable();

            $table->date('joined_date');
            $table->date('probation_end_date')->nullable();
            $table->date('term_end_date')->nullable();

            $table->enum('merital_status', ['unkown','single', 'married','widowed','separated'])->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('permanent_address')->nullable();
            $table->text('permanent_address_dv')->nullable();
            $table->text('current_address')->nullable();
            $table->text('current_address_dv')->nullable();

            $table->boolean('is_active')->nullable();

            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('job_id', 36)->nullable();

            $table->foreignId('user_id')->nullable();
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
        Schema::dropIfExists('employees');
    }
};
