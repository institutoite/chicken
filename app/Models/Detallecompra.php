<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallecompra extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function compra()
    {
        return $this->belongsTo(Compra::class, 'compra_id');
    }

    public function ingrediente()
    {
        return $this->belongsTo(Ingrediente::class, 'ingrediente_id');
    }
}
