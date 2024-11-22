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
        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("plato_id");
            $table->unsignedBigInteger("ingrediente_id");
            $table->foreign('plato_id')->references('id')->on('platos');
            $table->foreign('ingrediente_id')->references('id')->on('ingredientes');
            $table->decimal('cantidad_usada', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recetas');
    }
};
