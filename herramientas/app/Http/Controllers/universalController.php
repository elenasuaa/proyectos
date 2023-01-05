<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\TipoHerramienta;
use App\Models\Marca;
use App\Models\Persona;
use App\Models\Producto;
use App\Models\Entrada;
use App\Models\Salida;
use RealRashid\SweetAlert\Facades\Alert;


class universalController extends Controller
{

//CONTROLADOR CATEGORIA
    function insertar(Request $req){
        $categoria=new Categoria();

        $categoria->nombre_cat=$req->nombre_cat;
        $categoria->estatus=1;

        $categoria->save();
        alert()->success('Guardado')->toToast()->hideCloseButton();
        return redirect()->route("cat.formulario");
    }
    function mostrarfk(){
        $categoria=Categoria::all();
        $tipo=TipoHerramienta::select("tipo_hta.id","tipo_hta.tipo_hta", "categoria.nombre_cat", "fkcategoria")->join("categoria", "tipo_hta.fkcategoria", "=", "categoria.id")->where("tipo_hta.estatus", 1)->orderBy("tipo_hta", "desc")->get();
        return view("formulario_tipoHer", compact("categoria", "tipo"));
    }
    function mostrarCat(){
        $cat=Categoria::all();
        return view("formulario_categoria", compact("cat"));
    }
    function eliminar(Categoria $id){
        $id->delete();
        alert()->error('Eliminado')->toToast()->hideCloseButton();
        return redirect()->route("cat.formulario");
    }
    function editar(Categoria $id){
        return view ("editar_categoria", compact("id"));
    }
    function actualizar(Categoria $id, Request $req){
        $id->nombre_cat=$req->nombre_cat;
        $id->save();
        alert()->success('Actualizado')->toToast()->hideCloseButton();
        return redirect()->route("cat.formulario");
    }

//CONTROLADOR TIPO HERRAMIENTA
    function insertar1(Request $req){
        $tipo=new TipoHerramienta();

        $tipo->tipo_hta=$req->tipo_hta;
        $tipo->estatus=1;
        $tipo->fkcategoria=$req->fkcategoria;

        $tipo->save();
        alert()->success('Guardado')->toToast()->hideCloseButton();
        return redirect()->route("tipo.formulario");
        alert()->success('Guardado')->toToast()->hideCloseButton();
    }
    function mostrarfk1(){
        $tipo=TipoHerramienta::select("tipo_hta.id", "nombre_cat", "tipo_hta", "fkcategoria")->join("categoria", "tipo_hta.fkcategoria", "=", "categoria.id")->get();
        $marca=Marca::all();
        $cat=Categoria::all();
       
        
        return view("formulario_producto", compact("tipo", "marca","cat" ));
    }
    function eliminarTip(TipoHerramienta $id){
        $id->delete();
        alert()->error('Eliminado')->toToast()->hideCloseButton();
        return redirect()->route("tipo.formulario");
    }
    function editarTip(TipoHerramienta $id){
        $categoria=Categoria::all();
        return view ("editar_tipo", compact("id", "categoria"));
    }
    function actualizarTip(TipoHerramienta $id, Request $req){
        $id->tipo_hta=$req->tipo_hta;
        $id->fkcategoria=$req->fkcategoria;
        $id->save();
        alert()->success('Actualizado')->toToast()->hideCloseButton();
        return redirect()->route("tipo.formulario");
    }
//CONTROLADOR PERSONA
    function insertarPer(Request $req){
        $per=new Persona();

        $per->nombre=$req->nombre;
        $per->apellido_p=$req->apellido_p;
        $per->apellido_m=$req->apellido_m;
        $per->estatus=1;

        $per->save();
        alert()->success('Guardado')->toToast()->hideCloseButton();
        return "Guardado!";
    }
   
   
    function mostrarfk2(){
        $hta=Producto::all();
        $per=Persona::all();

        return view("formulario_entrada", compact("hta", "per"));
    }

    function mostrarfk3(){
        $hta=Producto::all();
        $per=Persona::all();

        return view("formulario_salida", compact("hta", "per"));
    }
   
    function insertarEnt(Request $req){
        $hta=new Producto();
        $ent=new Entrada();

        $ent->fkherramienta=$req->fkherramienta;
        $ent->cantidad=$req->cantidad;
        $ent->fkpersona=$req->fkpersona;

        // $hta->stock += $req->cantidad;
        // $hta->save();
        $ent->save();
        alert()->success('Guardado')->toToast()->hideCloseButton();
        return "Guardado!";
    }
    function insertarSal(Request $req){
        $sal=new Salida();

        $sal->fkherramienta=$req->fkherramienta;
        $sal->cantidad=$req->cantidad;
        $sal->fkpersona=$req->fkpersona;

        // $hta->stock += $req->cantidad;
        // $hta->save();
        $sal->save();
        alert()->success('Guardado')->toToast()->hideCloseButton();
        return "Guardado!";
    }
}

