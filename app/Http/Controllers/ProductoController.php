<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function listar(){
        $datos =DB::select("select * from tb_producto");
        return view("dashboard")->with("datos",$datos);
    }
}
