<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Http\Requests\CuentasRequest;

use App\Helper\Push;

use Illuminate\Http\Request;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CuentasController extends Controller
{
    /*
    *
    * @brief
    * @author Gustavo Ramirez Yahuaca
    * @param string
    * @return
    *
    */
    public function index()
    {
        $cuentas = Cuenta::orderBy('nombre')->paginate('50');
        return view('cuentas.index')->with('cuentas', $cuentas);
    }

    /*
    *
    * @brief
    * @author Gustavo Ramirez Yahuaca
    * @param string
    * @return
    *
    */
    public function create()
    {
        return view('cuentas.create');
    }

    /*
    *
    * @brief
    * @author Gustavo Ramirez Yahuaca
    * @param string
    * @return
    *
    */
    public function store(CuentasRequest $request)
    {
        $cuenta = new Cuenta();
        $cuenta->nombre = $request->nombre;
        $cuenta->activa = $request->activa;
        $cuenta->mostrar_seguros = $request->mostrar_seguros; 
        $cuenta->save();

        return redirect()->route('cuentas.index')->with('success', 'La cuenta ha sido creada!');
    }

    /*
    *
    * @brief
    * @author Gustavo Ramirez Yahuaca
    * @param string
    * @return
    *
    */
    public function destroy($id)
    {
        Cuenta::where('id', $id)->delete();
        return redirect()->route('cuentas.index')->with('success', 'Cuenta eliminada');
    }

    /*
    *
    * @brief
    * @author Gustavo Ramirez Yahuaca
    * @param string
    * @return
    *
    */
    public function edit($id)
    {
        $cuenta = Cuenta::findOrFail($id);
        return view('cuentas.edit')->with('cuenta', $cuenta);
    }

    /*
    *
    * @brief
    * @author Gustavo Ramirez Yahuaca
    * @param string
    * @return
    *
    */
    public function update(CuentasRequest $request, $id)
    {

        $cuenta = Cuenta::findOrFail($id);

        $cuenta->nombre = $request->nombre;
        $cuenta->activa = $request->activa;
        $cuenta->mostrar_seguros = $request->mostrar_seguros;
        $cuenta->save();

        return redirect()->route('cuentas.index')->with('success', 'La cuenta ha sido modificada!');
    }
}
