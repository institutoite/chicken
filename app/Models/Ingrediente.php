<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function recetas()
    {
        return $this->hasMany(Receta::class, 'ingrediente_id');
    }

    public function movimientosInventario()
    {
        return $this->hasMany(Movimiento::class, 'ingrediente_id');
    }
}
