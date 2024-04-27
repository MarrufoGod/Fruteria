<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_proveedores extends Model
{
    use HasFactory;
    protected $fillable = ['Nombre', 'Telefono', 'Direccion', 'Correo_electronico'];

}
