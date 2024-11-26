<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function recetas()
    {
        return $this->hasMany(Receta::class, 'plato_id');
    }

    public function detalleVentas()
    {
        return $this->hasMany(DetalleVenta::class, 'plato_id');
    }
}
