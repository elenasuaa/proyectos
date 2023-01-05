<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;

class VentaController extends Controller
{
    public function insertarVenta(Request $req){
        $productos= new Producto();

        $productos->codigo_venta=$req->codigo_venta;
        $productos->fec_venta=$req->fec_venta;
        $productos->fkcliente=$req->fkcliente;
        
    }
    
}

