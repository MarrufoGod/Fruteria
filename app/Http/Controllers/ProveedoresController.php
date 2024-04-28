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
    
    

   public function update(Request $request, $id)
{
    try {
        $affectedRows = DB::table('tb_proveedores')
            ->where('ID_proveedor', $id)
            ->update([
                'Nombre' => $request->txtnombre,
                'Telefono' => $request->txttelefono,
                'Direccion' => $request->txtdireccion,
                'Correo_electronico' => $request->txtcorreo,
            ]);

        if ($affectedRows > 0) {
            return back()->with("success", "Proveedor actualizado correctamente.");
        } else {
            return back()->with("error", "Error al actualizar el proveedor.");
        }
    } catch (\Throwable $th) {
        return back()->with("error", "Error al actualizar el proveedor: " . $th->getMessage());
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
