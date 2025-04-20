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
        Schema::create('categories', function (Blueprint $table) {           
            $table->id(); // Crea una columna 'id' auto-incremental
            $table->unsignedBigInteger('parent_id'); // Columna para la relación padre-hijo
            $table->string('category_name'); // Columna para el nombre de la categoría           
            $table->string('description')->nullable(); // Columna para la descripción de la categoría
            $table->timestamps();          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
