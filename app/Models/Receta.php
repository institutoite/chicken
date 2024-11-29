<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function plato()
    {
        return $this->belongsTo(Plato::class);
    }

    public function ingrediente()
    {
        return $this->belongsTo(Ingrediente::class);
    }
    public function unidad()
    {
        return $this->belongsTo(Unidad::class);
    }
}
