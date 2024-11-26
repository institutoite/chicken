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
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sucursal_id');
            $table->unsignedBigInteger('ingrediente_id');
            $table->unsignedBigInteger('registrado_por')->nullable(); // Usuario que registra el movimiento
            $table->unsignedBigInteger('sucursal_destino_id')->nullable(); // Para transferencias
            $table->enum('tipo', ['ingreso', 'egreso', 'transferencia']);
            $table->decimal('cantidad', 10, 2);
            $table->text('descripcion')->nullable();
            $table->foreign('sucursal_id')->references('id')->on('sucursals')->onDelete('cascade');
            $table->foreign('ingrediente_id')->references('id')->on('ingredientes')->onDelete('cascade');
            $table->foreign('registrado_por')->references('id')->on('users')->onDelete('set null');
            $table->foreign('sucursal_destino_id')->references('id')->on('sucursals')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }
};
