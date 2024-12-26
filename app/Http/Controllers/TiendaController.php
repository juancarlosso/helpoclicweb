<?php

namespace App\Http\Controllers;

use App\Models\Establecimiento;
use App\Models\Producto;
use App\Models\TipoEstablecimiento;

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
    public function index($tipo)
    {
        $categorias = TipoEstablecimiento::where('activo', 1)->get();
        foreach($categorias as $cat){
            $establecimientos = Establecimiento::where('tipo_id', $cat->id)->get();
            $cat->establecimientos = $establecimientos;
        }

        $ultimoProducto = Producto::orderBy('id', 'desc')->first();
        $productosTendencia = Producto::orderBy('id', 'desc')->take(3)->get();

        return view('tienda.app', compact('categorias','ultimoProducto','productosTendencia'));
    }

    public function indexHome()
    {
        $categorias = TipoEstablecimiento::where('activo', 1)->get();
        foreach($categorias as $cat){
            $establecimientos = Establecimiento::where('tipo_id', $cat->id)->get();
            $cat->establecimientos = $establecimientos;
        }

        $ultimoProducto = Producto::orderBy('id', 'desc')->first();
        $productosTendencia = Producto::orderBy('id', 'desc')->take(3)->get();

        return view('tienda.app', compact('categorias','ultimoProducto','productosTendencia'));
    }

}
