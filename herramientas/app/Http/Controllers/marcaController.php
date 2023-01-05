<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class marcaController extends Controller
{
    function insertar(Request $req){
        $marca=new Marca();

        $marca->nombre_marca=$req->nombre_marca;
        $marca->estatus=1;

        $marca->save();
        alert()->success('Guardado')->toToast()->hideCloseButton();
        return redirect()->route("marca.formulario");

    }
    function mostrar(){
        $marca=Marca::all();
        return view("formulario_marca", compact("marca"));
    }
    function eliminar(Marca $id){
        $id->delete();
        alert()->error('Eliminado')->toToast()->hideCloseButton();
        return redirect()->route("marca.formulario");
    }
    function editar(Marca $id){
        return view ("editar_marca", compact("id"));
    }
    function actualizar(Marca $id, Request $req){
        $id->nombre_marca=$req->nombre_marca;
        $id->save();
        alert()->success('Actualizado')->toToast()->hideCloseButton();
        return redirect()->route("marca.formulario");
    }

    //PDF
//     public function imprimir(){
       
//         $pdf = \PDF::loadView('pdf');
//         return $pdf->download('Reporte.pdf');
//    }

//    public function mostrarpdf(){
//     $productos=Producto::select("herramienta.id", "codigo_ID", "nombre_hta", "stock", "estado", "tipo_hta.tipo_hta", "categoria.nombre_cat", "marca.nombre_marca", "herramienta.created_at", "fktipo_hta", "fkmarca")->join("tipo_hta", "herramienta.fktipo_hta", "=", "tipo_hta.id")->join("marca", "herramienta.fkmarca", "=", "marca.id")->join("categoria", "tipo_hta.fkcategoria", "=", "categoria.id")->where("herramienta.estatus", 1)->orderBy("nombre_hta", "desc")->take(10)->get();
//     return view("pdf",compact("productos"));
// }
}
