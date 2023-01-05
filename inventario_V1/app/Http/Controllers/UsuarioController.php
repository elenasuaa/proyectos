<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    function insertar(Usuario $usuario, Request $req){
        $usuario->nombre_usuario=$req->nombre_usuario;
        $usuario->correo=$req->correo;
        $usuario->contra=$req->contra;  
        $usuario->fkpersona=1;
        $usuario->estatus=1;  
        
        $usuario->save();
        return redirect()->route('productos.mostrar');
    }
}

