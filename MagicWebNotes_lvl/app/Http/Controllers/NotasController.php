<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notasModel;
use Carbon\Carbon;


class NotasController extends Controller
{
    public function mostrarNotas()
    {
        return view('vistaNotas');
    }

    function crearNota(Request $req)
    {
        if ($req->ajax()) {
            $nota = new notasModel();

            $nota->titulo_nota = $req->tituloNota;
            $nota->descripcion = $req->descripcionNota;
            $nota->fecha_creacion = Carbon::now()->format('Y-m-d H:i:s');
            $nota->fecha_modificacion = Carbon::now()->format('Y-m-d H:i:s');
            $nota->fk_usuario = $req->id_usuario;
            $nota->estatus_nota = '1';

            // return $nota;
            usleep(500);
            if ($nota->save()) {
                return "1";
            } else {
                return "0";
            }
        }
    }

    function editarNota(Request $req)
    {
        if ($req->ajax()) {
            $nota = new notasModel();
            $nota_id = $req->id_nota;
            $nota = notasModel::where('id_nota', '=', $nota_id)->get();
            return $nota;
        }
    }
    function modificarNota(Request $req)
    {

        if ($req->ajax()) {
            $fecha_hora = Carbon::now()->format('Y-m-d H:i:s');

            $actualizar = notasModel::where('id_nota', $req->idNotaM)
                ->update([
                    "titulo_nota" => $req->tituloNotaM,
                    "descripcion" => $req->descripcionNotaM,
                    "fecha_modificacion" => $fecha_hora,
                ]);
            if ($actualizar) {
                return response()->json([
                    'respuesta' => 200
                ]);
            }
        }
        return response()->json([
            'respuesta' => 500 //ERROR INTERNO
        ]);
    }
    function eliminarNota(Request $req){
        if($req->ajax()){
           $id_nota = $req->id_nota;

           $nota_eliminar = notasModel::where('id_nota', $id_nota)->delete();
           
           return $nota_eliminar;
           
        }
    }
}
