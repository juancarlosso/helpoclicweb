<?php

namespace App\Http\Controllers;

class TiendaController extends Controller
{
    /*
    *
    * @brief
    * @author Denys Sánchez
    * @param string
    * @return
    *
    */
    public function index()
    {
       //$cuentas = Cuenta::orderBy('nombre')->paginate('50');
        return view('tienda.app');
    }

}
