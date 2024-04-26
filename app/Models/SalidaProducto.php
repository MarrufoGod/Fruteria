<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalidaProducto extends Model
{
    use HasFactory;
    protected $fillable = ['Fecha_salida', 'ID_producto', 'Cantidad', 'Precio_venta'];

    public function producto()
    {
        return $this->belongsTo(TbProducto::class, 'ID_producto');
    }
}
