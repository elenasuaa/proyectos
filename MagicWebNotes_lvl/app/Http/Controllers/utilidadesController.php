<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class utilidadesController extends Controller
{
    public function acerca_deForm()
    {
        return view('acerca_deForm');
    }

    public function datos_personalesForm()
    {
        sleep(1);

        return view('datos_personalesForm');
    }

    public function mi_PerfilForm()
    {
        sleep(1);
        return view('mi_perfilForm');
    }
}
