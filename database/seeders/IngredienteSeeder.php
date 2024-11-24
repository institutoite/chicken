<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ingredientes')->insert([
            [
                'nombre' => 'Harina',
                'cantidad_disponible' => 50.00,
                'unidad' => 'kg',
                'stock_minimo' => 10.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Azúcar',
                'cantidad_disponible' => 30.00,
                'unidad' => 'kg',
                'stock_minimo' => 5.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Huevos',
                'cantidad_disponible' => 100.00,
                'unidad' => 'unidades',
                'stock_minimo' => 20.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Leche',
                'cantidad_disponible' => 20.00,
                'unidad' => 'litros',
                'stock_minimo' => 5.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Mantequilla',
                'cantidad_disponible' => 15.00,
                'unidad' => 'kg',
                'stock_minimo' => 3.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
