<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unidades = [
            ['unidad' => 'Kilogramos', 'abreviatura' => 'kg'],
            ['unidad' => 'Gramos', 'abreviatura' => 'g'],
            ['unidad' => 'Litros', 'abreviatura' => 'l'],
            ['unidad' => 'Mililitros', 'abreviatura' => 'ml'],
            ['unidad' => 'Piezas', 'abreviatura' => 'pz'],
            ['unidad' => 'Cajas', 'abreviatura' => 'cjs'],
            ['unidad' => 'Paquetes', 'abreviatura' => 'paqs'],
            ['unidad' => 'Botellas', 'abreviatura' => 'bot'],
            ['unidad' => 'Latas', 'abreviatura' => 'lat'],
            ['unidad' => 'Bolsas', 'abreviatura' => 'bol'],
            ['unidad' => 'Raciones', 'abreviatura' => 'raciones'],
            ['unidad' => 'Docenas', 'abreviatura' => 'doc'],
            ['unidad' => 'Metros', 'abreviatura' => 'm'],
            ['unidad' => 'Centímetros', 'abreviatura' => 'cm'],
            ['unidad' => 'Unidades', 'abreviatura' => 'unid'],
            ['unidad' => 'Galones', 'abreviatura' => 'gal'],
            ['unidad' => 'Barriles', 'abreviatura' => 'barr'],
            ['unidad' => 'Porciones', 'abreviatura' => 'porc'],
            ['unidad' => 'Cubos', 'abreviatura' => 'cubos'],
        ];

        DB::table('unidads')->insert($unidades);
    }
}
