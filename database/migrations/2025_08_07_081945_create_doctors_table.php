<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('profile_pic')->nullable();
            $table->string('specialty'); // like Dentist, Cardiologist, etc.
            $table->tinyInteger('overall_rating')->default(0); // out of 5
            $table->tinyInteger('doctor_rating')->default(0);
            $table->tinyInteger('assistant_rating')->default(0);
            $table->tinyInteger('clinic_rating')->default(0);
            $table->unsignedInteger('number_of_visitors')->default(0);
            $table->boolean('accept_promo_code')->default(false);
            $table->text('about')->nullable();
            $table->decimal('fee', 8, 2)->nullable();
            $table->string('waiting_time')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->integer('experience_years')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
