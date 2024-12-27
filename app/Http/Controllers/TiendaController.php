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
    public function indexHome()
    {
        return view('tienda.home');
    }
    
    public function index($tipo)
    {
        $productos = [];
        $ultimoProducto = [];
        $productosTendencia = [];
        $descuentos = [];
        $market = [];
        $tipo = TipoEstablecimiento::where('nombre', $tipo)->first();
        $establecimientosIds = Establecimiento::where('tipo_id', $tipo->id)->pluck('id')->toArray();
        if (count($establecimientosIds) > 0) {
            $productos = Producto::whereIn('establecimiento_id', $establecimientosIds)->get();

            $ultimoProducto = Producto::whereIn('establecimiento_id', $establecimientosIds)->where('activo', 1)->orderBy('id', 'desc')->first();
            $productosTendencia = Producto::whereIn('establecimiento_id', $establecimientosIds)->where('activo', 1)->orderBy('id', 'desc')->take(3)->get();

            $descuentos = Producto::whereIn('establecimiento_id', $establecimientosIds)->whereNotNull('descuento')->where('tipo', 2)->where('activo', 1)->get();
            $market = Producto::whereIn('establecimiento_id', $establecimientosIds)->where('tipo', 1)->where('activo', 1)->get();
        }
            
        
        return view('tienda.tipo_establecimiento.index', compact('productos','ultimoProducto','productosTendencia','descuentos','market'));
    }

   

}
