<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tb_producto;
use Illuminate\Support\Facades\DB;


class InformesController extends Controller
{
    public function listar(){
        $datos = DB::select("select * from tb_producto");
        return view("informes")->with( "datos" , $datos);
    }
}
