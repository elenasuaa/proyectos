<?php

namespace App\Http\Controllers;

use App\Models\recordatorioModel;
use App\Models\recordatorioUsuario;
use Illuminate\Http\Request;
use Carbon\Carbon;


class RecordatorioController extends Controller
{
    public function mostrarRecordatorios(Request $req)
    {
        return view('vistaRecordatorios');
    }

    function publicarRecordatorio(Request $req)
    {
        if ($req->ajax()) {
            $recordatorio = new recordatorioModel();

            $recordatorio->titulo_recordatorio = $req->titulo_recordatorio;
            $recordatorio->descripcion_recordatorio = $req->descripcion_recordatorio;
            $recordatorio->fecha_finalizacion_recordatorio = $req->fecha_finalizacion_recordatorio;
            $recordatorio->estatus_recordatorio = '1';
            $recordatorio->fecha_inicio_recordatorio = $req->fecha_finalizacion_recordatorio;

            if ($recordatorio->save()) {


                $lastIdRecordatorio = recordatorioModel::orderBy('id_recordatorio', 'desc')->take(1)->first();


                $NewRecordatorio_usuario = new recordatorioUsuario();
                $NewRecordatorio_usuario->estatus_recordatorio_usuario = 1;
                $NewRecordatorio_usuario->fk_usuario = session()->get('id_usuario');
                $NewRecordatorio_usuario->fk_recordatorio = $lastIdRecordatorio['id_recordatorio'];
                sleep(3);
                if ($NewRecordatorio_usuario->save()) {
                    return 200;
                } else {
                    return 500;
                }
            } else {
                return 500;
            }
        }
    }
    function detalleRecordatorio(Request $req)
    {
        if ($req->ajax()) {
            $recordatorio = new recordatorioModel();
            $recordatorio_id = $req->id_recordatorio;
            $recordatorio = recordatorioModel::where('id_recordatorio', '=', $recordatorio_id)->get();
            return $recordatorio;
        }
    }
    function ultimoRecordatorio(Request $req)
    {
        if ($req->ajax()) {
            $ultimo_recordatorio = new recordatorioUsuario();
            $fk_usuario = session()->get('id_usuario');
            $fecha_hora_actual = Carbon::now()->format('Y-m-d H:i:s');
            $ultimo_recordatorio = recordatorioUsuario::join('usuario', 'recordatorio_usuario.fk_usuario', '=', 'usuario.id_usuario')->join('recordatorio', 'recordatorio_usuario.fk_recordatorio', '=', 'recordatorio.id_recordatorio')->where('recordatorio_usuario.fk_usuario', '=', $fk_usuario)->where('fecha_finalizacion_recordatorio', '>=', $fecha_hora_actual)->orderBy('fecha_finalizacion_recordatorio', 'asc')->get()->first();
            return $ultimo_recordatorio;
        }
    }
    function actualizarRecordatorio(Request $req)
    {
        if ($req->ajax()) {
            $actualizar = recordatorioModel::where('id_recordatorio', $req->id_recordatorio)
                ->update([
                    "titulo_recordatorio" => $req->titulo_recordatorio,
                    "descripcion_recordatorio" => $req->descripcion_recordatorio,
                    "fecha_finalizacion_recordatorio" => $req->fecha_finalizacion_recordatorio
                ]);
            if ($actualizar) {
                return response()->json([
                    'respuesta' => 200
                ]);
            }
            return response()->json([
                'respuesta' => 500
            ]);
        }
    }
    function eliminarRecordatorio(Request $req)
    {
        if ($req->ajax()) {
            $id_recordatorio = $req->id_recordatorio;
            $recordatorio_El = recordatorioUsuario::where('fk_recordatorio', $id_recordatorio)->delete();

            return $recordatorio_El;
            // if ($recordatorio_El) {
            //     return "ELIMINADO";
            // } else {
            //     return "ERROR";
            // }
        }
    }
}
