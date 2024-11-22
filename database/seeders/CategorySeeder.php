<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['category' => 'Comida Rápida', 'descripcion' => 'Platos rápidos como hamburguesas y pizzas', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Bebidas', 'descripcion' => 'Bebidas frías y calientes', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Postres', 'descripcion' => 'Dulces, tortas y helados', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Platos Típicos', 'descripcion' => 'Comidas tradicionales de la región', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Ensaladas', 'descripcion' => 'Platos ligeros y saludables', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
