<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id('film_id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->date('release_year');
            $table->string('language_id');
            $table->string('original_language_id')->nullable();
            $table->integer('rental_duration');
            $table->integer('rental_rate');
            $table->integer('length')->nullable();
            $table->decimal('replacement_cost', 5, 2);
            $table->string('rating')->nullable();
            $table->text('special_features')->nullable();
            $table->dateTime('last_update')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
