<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoEstablecimiento;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TipoEstablecimientoRequest;

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
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/tipo_establecimientos', $filename);
            $tipo_establecimiento->imagen = $filename;
        }
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

        if ($request->hasFile('imagen')) {
            // Eliminar la imagen antigua si existe
            if ($tipo_establecimiento->imagen) {
                Storage::delete('public/tipo_establecimientos/' . $tipo_establecimiento->imagen);
            }

            // Guardar la nueva imagen
            $file = $request->file('imagen');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/tipo_establecimientos', $filename);
            $tipo_establecimiento->imagen = $filename;
        }

        $tipo_establecimiento->save();

        return redirect()->route('tipo_establecimientos.index')->with('success', 'El tipo de establecimiento ha sido modificado!');
    }
}
