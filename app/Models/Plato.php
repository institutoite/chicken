<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'precio',
        'category_id', // Asegúrate de que category_id está aquí
        'descripcion',
        'imagen',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id'); // Asegúrate de usar category_id como referencia
    }
}
