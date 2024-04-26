<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;

class ProveedoresController extends Controller
{
    public function listar(){
        $datos =DB::select("select * from tb_proveedores");
        return view("Proveedores")->with("datos",$datos);
    }
}
