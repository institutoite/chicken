<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detalleventas()
    {
        return $this->hasMany(DetalleVenta::class);
    }

   
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($venta) {
            $venta->sucursal_id = auth()->user()->sucursal_id; // Sucursal del usuario autenticado
            $venta->user_id = auth()->id();                   // ID del usuario autenticado
        });

        static::saved(function ($venta) {
            // Calculamos el total de la venta sumando los detalles
            $venta->total = $venta->detalleventas->sum(function ($detalle) {
                return $detalle->cantidad * $detalle->precio_unitario;
            });

            
    
            // Guardamos la venta sin disparar el evento de nuevo
            $venta->saveQuietly();
        });

        
    }

}
