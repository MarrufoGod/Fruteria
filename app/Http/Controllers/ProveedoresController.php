<?php

namespace App\Http\Controllers;

use App\Models\tb_proveedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedoresController extends Controller
{
    public function listar()
    {
        $proveedores = tb_proveedores::all();
        return view("Proveedores")->with("prove", $proveedores);
    }

    public function create(Request $request)
    {
        try {
            $sql = DB::insert("INSERT INTO tb_proveedores(id, Nombre, Telefono, Direccion, Correo_electronico) VALUES (?, ?, ?, ?, ?)", [
                $request->txtidproveedor,
                $request->txtnombre,
                $request->txttelefono,
                $request->txtdireccion,
                $request->txtcorreo,
            ]);
        } catch (\Throwable $th) {
            $sql = 0;
        }
    
        if ($sql == true) {
            return back()->with("success", "Proveedor registrado correctamente.");
        } else {
            return back()->with("error", "Error al registrar el proveedor.");
        }
    }
    
    

    public function update(Request $request)
    {
        try {
            $sql = DB::update("update tb_proveedores set Nombre=?,Telefono=?,Direccion=?,Correo_electronico=? where id=?",[

                $request->txtnombre,
                $request->txttelefono,
                $request->txtdireccion,
                $request->txtcorreo,
                $request->txtidproveedor
            ]);
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if ($sql == true) {
            return back()->with("Correcto" . "Proveedor Actualizado");
        } else {
            return back()->with("Error" . "Proveedor NO Actualizado");
        }
    }


    public function delete($id)
    {
        try {
            $sql = DB::delete("delete from tb_proveedores where id=$id");
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if ($sql == true) {
            return back()->with("success", "Proveedor eliminado correctamente.");
        } else {
            return back()->with("error", "Error al eliminar el proveedor.");
        }
    }
}
