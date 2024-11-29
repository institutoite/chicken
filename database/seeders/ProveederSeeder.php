<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProveederSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proveedors = [
            [
                'empresa' => 'Distribuidora Santa Cruz',
                'representante' => 'Juan Pérez',
                'telefono' => '72134567',
                'email' => 'contacto@santacruz.com',
                'activo' => true,
            ],
            [
                'empresa' => 'Agroindustrial La Paz',
                'representante' => 'María López',
                'telefono' => '78965432',
                'email' => 'ventas@agrolapaz.com',
                'activo' => true,
            ],
            [
                'empresa' => 'Central de Abastos Cochabamba',
                'representante' => 'Carlos Rodríguez',
                'telefono' => '76098754',
                'email' => 'abastos@cochabamba.com',
                'activo' => true,
            ],
            [
                'empresa' => 'Frutas y Verduras Sucre',
                'representante' => 'Ana Gutiérrez',
                'telefono' => '74236985',
                'email' => 'frutasysucre@gmail.com',
                'activo' => false,
            ],
            [
                'empresa' => 'Importadora Bolivia',
                'representante' => 'Pedro Mendoza',
                'telefono' => '70123456',
                'email' => 'info@importadorabolivia.com',
                'activo' => true,
            ],
            [
                'empresa' => 'Carnes del Oriente',
                'representante' => 'Laura Ríos',
                'telefono' => '75532168',
                'email' => 'ventas@carnesoriente.com',
                'activo' => true,
            ],
            [
                'empresa' => 'Panadería Don Pancho',
                'representante' => 'Francisco Martínez',
                'telefono' => '78965412',
                'email' => 'donpancho@gmail.com',
                'activo' => true,
            ],
        ];

        DB::table('proveedors')->insert($proveedors);
    }
}
