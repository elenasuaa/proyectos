<?php

namespace App\Http\Controllers;

use App\Models\personaModel;
use Illuminate\Http\Request;

class personaController extends Controller
{
    function modificar_persona(Request $req)
    {
        if ($req->ajax()) {
            $actualizar = personaModel::where('id_persona', session()->get('id_persona'))
                ->update([
                    'nombre_persona' => $req->nombre_persona,
                    'apaterno' => $req->apaterno,
                    'amaterno' => $req->amaterno
                ]);
            if ($actualizar) {
                session()->put('nombre', $req->nombre_persona);
                session()->put('apaterno', $req->apaterno);
                session()->put('amaterno', $req->amaterno);
                return response()->json([
                    'respuesta' => 200
                ]);
            }
        }
        return response()->json([
            'respuesta' => 500
        ]);
    }
}
