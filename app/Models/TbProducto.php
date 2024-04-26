<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbProducto extends Model
{
    use HasFactory;
    protected $fillable = ['Nombre', 'Descripcion', 'Precio_compra', 'Precio_venta', 'Unidad_medida', 'cantidad', 'Categoria', 'ID_proveedor'];

    public function proveedor()
    {
        return $this->belongsTo(TbProveedor::class, 'ID_proveedor');
    }
}
