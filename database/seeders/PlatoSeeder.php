<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PlatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $platos = [
            [
                'nombre' => 'Salteñas',
                'slug' => Str::slug('Salteñas'),
                'precio' => 5.00,
                'category_id' => 1, // Suponiendo que existe la categoría de "Desayunos"
                'descripcion' => 'Empanadas rellenas con carne, pollo o queso, típicas de Bolivia.',
                'imagen' => 'saltenas.jpg',
                'disponible' => true,
            ],
            [
                'nombre' => 'Pique Macho',
                'slug' => Str::slug('Pique Macho'),
                'precio' => 35.00,
                'category_id' => 2, // Suponiendo que existe la categoría de "Platos Fuertes"
                'descripcion' => 'Carne de res, papas fritas, salchichas y vegetales con un toque picante.',
                'imagen' => 'pique_macho.jpg',
                'disponible' => true,
            ],
            [
                'nombre' => 'Silpancho',
                'slug' => Str::slug('Silpancho'),
                'precio' => 25.00,
                'category_id' => 2,
                'descripcion' => 'Filete de carne apanado con arroz, papas fritas, y huevo frito encima.',
                'imagen' => 'silpancho.jpg',
                'disponible' => true,
            ],
            [
                'nombre' => 'Chicharrón',
                'slug' => Str::slug('Chicharrón'),
                'precio' => 40.00,
                'category_id' => 2,
                'descripcion' => 'Carne de cerdo frita acompañada de mote y llajwa.',
                'imagen' => 'chicharron.jpg',
                'disponible' => true,
            ],
            [
                'nombre' => 'Sopa de Maní',
                'slug' => Str::slug('Sopa de Maní'),
                'precio' => 18.00,
                'category_id' => 3, // Suponiendo que existe la categoría de "Sopas"
                'descripcion' => 'Deliciosa sopa elaborada con maní, carne y verduras.',
                'imagen' => 'sopa_mani.jpg',
                'disponible' => true,
            ],
            [
                'nombre' => 'Majadito',
                'slug' => Str::slug('Majadito'),
                'precio' => 20.00,
                'category_id' => 2,
                'descripcion' => 'Arroz cocido con charque (carne seca) y plátano frito.',
                'imagen' => 'majadito.jpg',
                'disponible' => true,
            ],
            [
                'nombre' => 'Anticucho',
                'slug' => Str::slug('Anticucho'),
                'precio' => 15.00,
                'category_id' => 4, // Suponiendo que existe la categoría de "Comidas Rápidas"
                'descripcion' => 'Brochetas de corazón de res acompañadas de papas y salsa de maní.',
                'imagen' => 'anticucho.jpg',
                'disponible' => true,
            ],
            [
                'nombre' => 'Api con Pastel',
                'slug' => Str::slug('Api con Pastel'),
                'precio' => 10.00,
                'category_id' => 1,
                'descripcion' => 'Bebida caliente de maíz morado acompañada de un pastel frito relleno de queso.',
                'imagen' => 'api_pastel.jpg',
                'disponible' => true,
            ],
        ];

        DB::table('platos')->insert($platos);
    }
}
