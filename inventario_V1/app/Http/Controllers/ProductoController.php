<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Venta;

class ProductoController extends Controller
{
    public function insertar(Request $req){
        $productos= new Producto();

        $productos->nombre=$req->nombre;
    	$productos->precio=$req->precio;
        $productos->costo=$req->costo;   
    	$productos->descripcion=$req->descripcion;
        $productos->stock=$req->stock;
        $productos->iva=16;
        $productos->estatus=1;
        $productos->fkcategoria=$req->fkcategoria;

    	$productos->save();
        return redirect()->route('productos.mostrar');
        
    }
    public function mostrar(){
        /*  $productos=Producto::all();
		return view("lista_productos",compact("productos"));*/
        $productos=Producto::orderBy("nombre", "ASC")->get();
        return view("lista_productos",compact("productos"));
    }
    public function mostrarPorId(Producto $producto){
        $registro=Producto::find($producto);
        return view("comprarProducto", compact("producto"));
      }
    public function editar(Producto $producto){
        return view("editar_producto", compact("producto"));
    }
    public function actualizar(Producto $producto, Request $req){
        $producto->nombre=$req->nombre;
    	$producto->precio=$req->precio;
        $producto->costo=$req->costo;   
    	$producto->descripcion=$req->descripcion;
        $producto->stock=$req->stock;
        $producto->iva=16;
        $producto->estatus=1;
        $producto->fkcategoria=$req->fkcategoria;

        $producto->save();
       return redirect()->route('productos.mostrar');
       
    }
    public function comprar(Request $req){
        $compra=new Venta();
        $compra->codigo_venta=1;
        $compra->fec_venta=NOW();
        $compra->total_venta=$req->costo;
        $compra->fkcliente=$req->fkcliente;
        $compra->fkproducto=$req->fkproducto;
        $compra->save();
        $idproducto=$req->fkproducto;
        $producto= Producto::find($idproducto);
        $stock=$producto->stock;
        $stock_nuevo=$stock-$req->cantidad;
        $producto->stock=$stock_nuevo;
        $producto->save();

       return redirect()->route('productos.mostrar');
    }
    public function comprar_formulario(Producto $producto){
        return view("comprar_producto", compact("producto"));
    }
}
