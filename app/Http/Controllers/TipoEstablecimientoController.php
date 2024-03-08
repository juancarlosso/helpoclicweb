<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoEstablecimientoRequest;
use App\Models\TipoEstablecimiento;
use Illuminate\Http\Request;

class TipoEstablecimientoController extends Controller
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
        $tipos_establecimientos = TipoEstablecimiento::orderBy('nombre')->paginate('50');
        return view('tipo_establecimientos.index')->with('tipos_establecimientos', $tipos_establecimientos);
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
        return view('tipo_establecimientos.create');
    }

    /*
    *
    * @brief
    * @author Gustavo Ramirez Yahuaca
    * @param string
    * @return
    *
    */
    public function store(TipoEstablecimientoRequest $request)
    {

        $tipo_establecimiento = new TipoEstablecimiento();
        $tipo_establecimiento->nombre = $request->nombre;
        $tipo_establecimiento->activo = $request->activo;
        $tipo_establecimiento->save();

        return redirect()->route('tipo_establecimientos.index')->with('success', 'el Tipo Establecimiento ha sido creado!');
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
        TipoEstablecimiento::where('id', $id)->delete();
        return redirect()->route('tipo_establecimientos.index')->with('success', 'Tipo Establecimiento eliminado');
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
        $tipo_establecimiento = TipoEstablecimiento::findOrFail($id);
        return view('tipo_establecimientos.edit')->with('tipo_establecimiento', $tipo_establecimiento);
    }

    /*
    *
    * @brief
    * @author Gustavo Ramirez Yahuaca
    * @param string
    * @return
    *
    */
    public function update(TipoEstablecimientoRequest $request, $id)
    {

        $tipo_establecimiento = TipoEstablecimiento::findOrFail($id);

        $tipo_establecimiento->nombre = $request->nombre;
        $tipo_establecimiento->activo = $request->activo;
        $tipo_establecimiento->save();

        return redirect()->route('tipo_establecimientos.index')->with('success', 'El tipo_establecimiento ha sido modificado!');
    }
}
