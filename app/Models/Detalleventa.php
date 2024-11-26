<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalleventa extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'venta_id');
    }

    public function plato()
    {
        return $this->belongsTo(Plato::class, 'plato_id');
    }
}
