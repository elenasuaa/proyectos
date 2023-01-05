<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioModel;
use App\Models\personaModel;
use Error;

use function PHPUnit\Framework\isNull;

class UsuarioController extends Controller
{
    public function buscarUsuario(Request $req)
    {

        $usuario = new UsuarioModel();

        $correo = $usuario->correo_electronico = $req->correo_electronico;
        $contrasena = $usuario->contrasena = $req->contrasena;
        $busqueda = UsuarioModel::where('correo', '=', $correo)->where('contrasena', '=', $contrasena)->join('persona', 'usuario.fk_persona', '=', 'persona.id_persona')->first()->toArray();
        $id_usuario = $busqueda['id_usuario'];

        $correo_busqueda = $busqueda['correo'];
        $contrasena_busqueda = $busqueda['contrasena'];

        if ($correo == $correo_busqueda) {
            if ($contrasena == $contrasena_busqueda) {
                // return $busqueda;
                $req->session()->put('id_usuario', $busqueda['id_usuario']);
                $req->session()->put('nombre', $busqueda['nombre_persona']);
                $req->session()->put('apaterno', $busqueda['apaterno']);
                $req->session()->put('amaterno', $busqueda['amaterno']);
                $req->session()->put('id_persona', $busqueda['id_persona']);
                $req->session()->put('correo', $busqueda['correo']);
                $req->session()->put('estatus_usuario', $busqueda['estatus_usuario']);
                $req->session()->put('nombre_usuario', $busqueda['nombre_usuario']);
                $req->session()->put('contrasena', $busqueda['contrasena']);
                return "verificado";
            } else {
                return "error_contrasena";
            }
        } else {
            return "error_correo";
        }
    }

    public function cerrarSesion(Request $req)
    {
        if ($req->ajax()) {
            session()->pull('id_usuario');
            session()->pull('nombre');
            session()->pull('apaterno');
            session()->pull('amaterno');
            session()->pull('id_persona');
            session()->pull('correo');
            session()->pull('estatus_usuario');
            session()->pull('nombre_usuario');

            return "1";
        }
    }
    public function registrarUsuario(Request $req)
    {
        $persona = new personaModel();

        $persona->nombre_persona = $req->nombre_persona;
        $persona->apaterno = $req->apaterno;
        $persona->amaterno = $req->amaterno;

        $lastIdPersona = personaModel::orderBy('id_persona', 'desc')->take(1)->first();

        if (($persona->save()) == TRUE) {
            $usuario = new UsuarioModel();

            // $fk_persona = $lastIdPersona['id_persona'];
            $usuario->nombre_usuario = "";
            $usuario->contrasena = $req->contrasena;
            $usuario->correo = $req->correo_electronico;
            $usuario->estatus_usuario = '1';

            // CAMBIAR EL ESTATUS A QUE DETECTE LA ULTIMA PERSONA REGISTRADA
            $usuario->fk_persona = $lastIdPersona['id_persona'];

            if (($usuario->save()) == TRUE) {
                return "Se ha registrado con exito el usuario";
            } else {
                return "No se ha registrado con exito el usuario";
            }
        } else {
            return "OCURRIO UN ERROR AL GUARDAR LA PERSONA";
        }
    }

    public function availableUser(Request $req)
    {
        if ($req->ajax()) {

            $findUser = new UsuarioModel();
            $User = $req->usuario;

            $findUser = UsuarioModel::where('nombre_usuario', '=', $User)->get();

            // return $findUser[0]['id_usuario'];
            // return $findUser;

            if ($findUser[0]['nombre_usuario'] == $User) {
                return "unavailable";
            } else {
                return "available";
            }
            // return $req->usuario;
        }
    }
    public function act_datosP(Request $req)
    {
        if ($req->ajax()) {
            $usuario = UsuarioModel::where('id_usuario', session()->get('id_usuario'))->update([
                "contrasena" => $req->contrasena
            ]);
            if ($usuario) {
                session()->put('contrasena', $req->contrasena);
                return response()->json([
                    'respuesta' => 200
                ]);
            }
        }
        return response()->json([
            'respuesta' => 500 //ERROR INTERNO
        ]);
    }
}
