<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function compras()
    {
        return $this->hasMany(Compra::class, 'proveedor_id');
    }
}
