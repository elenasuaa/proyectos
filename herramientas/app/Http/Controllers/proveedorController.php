<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use RealRashid\SweetAlert\Facades\Alert;


class proveedorController extends Controller
{
    function insertar(Request $req){
        $proveedor=new Proveedor();

        $proveedor->nombre_prov=$req->nombre_prov;
        $proveedor->telefono=$req->telefono;
        $proveedor->estatus=1;

        $proveedor->save();
        alert()->success('Guardado')->toToast()->hideCloseButton();
        return redirect()->route("pro.formulario");

    }
    function mostrar(){
        $pro=Proveedor::all();
        return view("formulario_proveedor", compact("pro"));
    }
    function eliminar(Proveedor $id){
        $id->delete();
        alert()->error('Eliminado')->toToast()->hideCloseButton();
        return redirect()->route("pro.formulario");
    }
    function editar(Proveedor $id){
        return view ("editar_proveedor", compact("id"));
    }
    function actualizar(Proveedor $id, Request $req){
        $id->nombre_prov=$req->nombre_prov;
        $id->telefono=$req->telefono;
        $id->save();
        alert()->success('Actualizado')->toToast()->hideCloseButton();
        return redirect()->route("pro.formulario");
    }
}
