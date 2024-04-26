<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngresoProducto extends Model
{
    use HasFactory;
    protected $fillable = ['Fecha_entrada', 'ID_producto', 'Cantidad', 'Precio_compra', 'ID_proveedor'];

    public function producto()
    {
        return $this->belongsTo(TbProducto::class, 'ID_producto');
    }

    public function proveedor()
    {
        return $this->belongsTo(TbProveedor::class, 'ID_proveedor');
    }
}
