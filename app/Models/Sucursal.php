<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function movimientosInventario()
    {
        return $this->hasMany(Movimiento::class, 'sucursal_id');
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'sucursal_id');
    }
}
