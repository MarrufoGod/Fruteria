<?php

namespace App\Http\Controllers;

use App\Models\tb_proveedores;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;

class ProveedoresController extends Controller
{
    public function listar(){
        $proveedores = tb_proveedores::all();
        return view("Proveedores")->with("prove",$proveedores);
    }

}
