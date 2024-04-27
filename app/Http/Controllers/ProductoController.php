<?php

namespace App\Http\Controllers;

use App\Models\tb_proveedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    //Mostar lista de los Proveedores pero solo el ID
 
    public function listar()
    {
        $proveedores = tb_proveedores::all();
        $datos = DB::select("select * from tb_producto");
        return view("dashboard", compact('proveedores', 'datos')); // Pasar los datos a la vista
        


    }
    public function create(Request $request)
    {
        try {
            $sql = DB::insert("insert into tb_producto(id,Nombre,Descripcion,Precio_compra,Precio_venta,Unidad_medida,cantidad,Categoria,ID_proveedor)values(?,?,?,?,?,?,?,?,?)", [

                $request->txtidproducto,
                $request->txtnombre,
                $request->txtdescripcion,
                $request->txtprecompra,
                $request->txtpreventa,
                $request->txtunidad,
                $request->txtcantidad,
                $request->txtcantegoria,
                $request->txtproveedor,
            ]);
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with("Correcto" . "Producto Registrado");
        } else {
            return back()->with("Error" . "Producto No Registrado");
        }
    }

    public function update(Request $request)
    {
        try {
            $sql = DB::update("update tb_producto set Nombre=?,Descripcion=?,Precio_compra=?,Precio_venta=?,Unidad_medida=?,cantidad=?,Categoria=?,ID_proveedor=? where id=?",[

                $request->txtnombre,
                $request->txtdescripcion,
                $request->txtprecompra,
                $request->txtpreventa,
                $request->txtunidadmed,
                $request->txtcantidad,
                $request->txtcantegoria,
                $request->txtproveedor,
                $request->txtidproducto,
            ]);
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with("Correcto" . "Producto Actualizado");
        } else {
            return back()->with("Error" . "Producto No Actualizado");
        }
    }

    public function delete($id){
        try {
            $sql = DB::delete("delete from tb_producto where id=$id");
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with("Correcto" . "Producto Registrado");
        } else {
            return back()->with("Error" . "Producto No Registrado");
        }

    }
}
