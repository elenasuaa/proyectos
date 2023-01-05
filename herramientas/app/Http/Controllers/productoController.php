<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Marca;
use App\Models\TipoHerramienta;
use App\Models\Entrada;
use App\Models\Salida;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use PDF;

class productoController extends Controller
{
    public function insertar(Request $req){
        $productos=new Producto(); 

        $productos->codigo_ID=$req->codigo_ID;
        $productos->nombre_hta=$req->nombre_hta;
        $productos->stock=$req->stock;
        $productos->estado=$req->estado;
        $productos->fktipo_hta=$req->fktipo_hta;
        $productos->fkmarca=$req->fkmarca;
        $productos->estatus=1;

        $productos->save();
        alert()->success('Guardado')->toToast()->hideCloseButton();
        return redirect()->route('productos.mostrar');

    }
    public function mostrar(){
        /*  $productos=Producto::all();
		return view("lista_productos",compact("productos"));*/
        $productos=Producto::select("herramienta.id", "codigo_ID", "nombre_hta", "stock", "estado", "tipo_hta.tipo_hta", "categoria.nombre_cat", "marca.nombre_marca", "herramienta.created_at", "fktipo_hta", "fkmarca")->join("tipo_hta", "herramienta.fktipo_hta", "=", "tipo_hta.id")->join("marca", "herramienta.fkmarca", "=", "marca.id")->join("categoria", "tipo_hta.fkcategoria", "=", "categoria.id")->where("herramienta.estatus", 1)->orderBy("nombre_hta", "desc")->take(10)->get();
        return view("lista_producto",compact("productos"));
    }
    function eliminarProducto(Producto $id){
        $id->delete();
        alert()->error('Eliminado')->toToast()->hideCloseButton();
        return redirect()->route("productos.mostrar");
    }
    function editarProducto(Producto $id){
        $tipo=TipoHerramienta::select("tipo_hta.id", "nombre_cat", "tipo_hta", "fkcategoria")->join("categoria", "tipo_hta.fkcategoria", "=", "categoria.id")->get();
        $marca=Marca::all();
        return view ("editar_producto", compact("id", "tipo", "marca"));
    }
    function actualizarProducto(Producto $id, Request $req){
        $id->codigo_ID=$req->codigo_ID;
        $id->nombre_hta=$req->nombre_hta;
        $id->fktipo_hta=$req->fktipo_hta;
        $id->fkmarca=$req->fkmarca;
        $id->estado=$req->estado;

        $id->save();

        alert()->success('Actualizado')->toToast()->hideCloseButton();
        return redirect()->route("productos.mostrar");
    }

    function entrada(Producto $id){
        $usuario=User::all();
        return view ("formulario_entradas", compact("id", "usuario"));
    }
    function insertarEntrada(Producto $id, Request $req){
        $entrada=new Entrada();
        $entrada->cantidad=$req->cantidad;
        $entrada->fkherramienta=$req->fkherramienta;
        $entrada->fkpersona=$req->fkpersona;
        $entrada->save();
 
        $id->stock += $req->cantidad;
        $id->save();
         return redirect()->route("productos.mostrar");
     }
     function salida(Producto $id){
         $usuario=User::all();
         return view ("formulario_salida", compact("id", "usuario"));
     }
     function insertarSalida(Producto $id, Request $req){
         $salida=new Salida();
         $salida->cantidad=$req->cantidad;
         $salida->fkherramienta=$req->fkherramienta;
         $salida->fkpersona=$req->fkpersona;
  
         $salida->save();
  
         $id->stock -= $req->cantidad;
         $id->save();
          return redirect()->route("productos.mostrar");
      }
      function mostrarEntrada(){
        $entrada=Entrada::select("entrada.id","entrada.cantidad", "herramienta.codigo_ID", "herramienta.nombre_hta", "entrada.created_at", "name", "fkpersona", "fkherramienta")->join("herramienta", "entrada.fkherramienta", "=", "herramienta.id")->join("users", "entrada.fkpersona", "=", "users.id")->orderBy("entrada.created_at", "desc")->take(10)->get();
        return view("lista_movimiento",compact("entrada"));
    }
    function mostrarSalida(){
        $salida=Salida::select("salida.id","salida.cantidad", "herramienta.codigo_ID", "herramienta.nombre_hta", "salida.created_at", "name", "fkpersona", "fkherramienta")->join("herramienta", "salida.fkherramienta", "=", "herramienta.id")->join("users", "salida.fkpersona", "=", "users.id")->orderBy("salida.created_at", "desc")->take(10)->get();
        return view("lista_movimientoSalida",compact("salida"));
    }

    public function imprimir(){
        $productos=Producto::select("herramienta.id", "codigo_ID", "nombre_hta", "stock", "estado", "tipo_hta.tipo_hta", "categoria.nombre_cat", "marca.nombre_marca", "herramienta.created_at", "fktipo_hta", "fkmarca")->join("tipo_hta", "herramienta.fktipo_hta", "=", "tipo_hta.id")->join("marca", "herramienta.fkmarca", "=", "marca.id")->join("categoria", "tipo_hta.fkcategoria", "=", "categoria.id")->where("herramienta.estatus", 1)->orderBy("nombre_hta", "desc")->take(10)->get();
        $entrada=Entrada::select("entrada.id","entrada.cantidad", "herramienta.codigo_ID", "herramienta.nombre_hta", "entrada.created_at", "fkherramienta")->join("herramienta", "entrada.fkherramienta", "=", "herramienta.id")->orderBy("entrada.created_at", "desc")->take(10)->get();
        $salida=Salida::select("salida.id","salida.cantidad", "herramienta.codigo_ID", "herramienta.nombre_hta", "salida.created_at", "fkherramienta")->join("herramienta", "salida.fkherramienta", "=", "herramienta.id")->orderBy("salida.created_at", "desc")->take(10)->get();
        

        $today = Carbon::now()->format('d/m/Y');
        $pdf = \PDF::loadView('pdf',compact("productos", "today","entrada","salida"));
        return $pdf->download('Reporte.pdf');
   }

    
 }

 

