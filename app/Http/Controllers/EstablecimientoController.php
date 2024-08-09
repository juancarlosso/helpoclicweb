<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Establecimiento;
use App\Models\Cuenta;

use App\Http\Requests\EstablecimientoRequest;
use App\Models\TipoEstablecimiento;
use Illuminate\Support\Facades\Storage;

class EstablecimientoController extends Controller
{
    /*
    *
    * @brief
    * @author Gustavo Ramirez Yahuaca Ojeda
    * @param string
    * @return
    *
    */
    public function index()
    {
        $establecimientos = Establecimiento::orderBy('nombre')->paginate('50');
        return view('establecimientos.index')->with('establecimientos', $establecimientos);
    }

    /*
    *
    * @brief
    * @author Gustavo Ramirez Yahuaca Ojeda
    * @param string
    * @return
    *
    */
    public function create()
    {
        $cuentas = Cuenta::orderBy('nombre')->get();
        $tipos = TipoEstablecimiento::orderBy('nombre')->get();
        return view('establecimientos.create')->with('cuentas', $cuentas)->with('tipos', $tipos);
    }

    /*
    *
    * @brief
    * @author Gustavo Ramirez Yahuaca Ojeda
    * @param string
    * @return
    *
    */
    public function store(EstablecimientoRequest $request)
    {
        $establecimiento = Establecimiento::create($request->except('cuenta_ids'));
    
        // Asociar las cuentas seleccionadas
        if ($request->has('cuenta_ids')) {
            $establecimiento->cuentas()->attach($request->input('cuenta_ids'));
        }
    
        return redirect()->route('establecimientos.index')->with('success', '¡Establecimiento creado!');
    }
    
    /*
    *
    * @brief
    * @author Gustavo Ramirez Yahuaca Ojeda
    * @param string
    * @return
    *
    */
    public function destroy(Request $request, $id)
    {
        $establecimiento = Establecimiento::findOrFail($id);
        $establecimiento->delete();
        return redirect()->route('establecimientos.index')->with('success', '¡Establecimiento eliminado!');
    }

    /*
    *
    * @brief
    * @author Gustavo Ramirez Yahuaca Ojeda
    * @param string
    * @return
    *
    */
    public function edit($id)
    {
        $cuentas = Cuenta::orderBy('nombre')->get();
        $tipos = TipoEstablecimiento::orderBy('nombre')->get();
        $establecimiento = Establecimiento::findOrFail($id);
        return view('establecimientos.edit')->with('cuentas', $cuentas)->with('tipos', $tipos)->with('establecimiento', $establecimiento);
    }

    /*
    *
    * @brief
    * @author Gustavo Ramirez Yahuaca Ojeda
    * @param string
    * @return
    *
    */
    public function update(EstablecimientoRequest $request, $id)
    {
        $establecimiento = Establecimiento::findOrFail($id);
        $establecimiento->update($request->except('cuenta_ids'));
    
        // Sincronizar las cuentas seleccionadas
        if ($request->has('cuenta_ids')) {
            $establecimiento->cuentas()->sync($request->input('cuenta_ids'));
        } else {
            $establecimiento->cuentas()->sync([]);
        }
    
        return redirect()->route('establecimientos.index')->with('success', '¡Establecimiento actualizado!');
    }
    
}
