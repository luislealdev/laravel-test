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
        Schema::create('film_actor', function (Blueprint $table) {
            $table->unsignedBigInteger('actor_id');
            $table->unsignedBigInteger('film_id');
            $table->timestamp('last_update')->useCurrent()->useCurrentOnUpdate();
            
            // Clave primaria compuesta
            $table->primary(['actor_id', 'film_id']);
            
            // Claves foráneas
            $table->foreign('actor_id')->references('actor_id')->on('actors')->onDelete('cascade');
            $table->foreign('film_id')->references('film_id')->on('films')->onDelete('cascade');
            
            // Índices para mejorar rendimiento
            $table->index('actor_id');
            $table->index('film_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film_actor');
    }
};
