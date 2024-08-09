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
        $cuentas = Cuenta::all();
        $tipos = TipoEstablecimiento::all();
        $estados = config('constantes.estados'); // Asegúrate de usar el nombre correcto del archivo
    
        return view('establecimientos.create', compact('cuentas', 'tipos', 'estados'));
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
    // Validar los datos del formulario en el request
    $validatedData = $request->validated();

    // Crear el establecimiento con los datos del formulario
    $establecimiento = Establecimiento::create($validatedData);

    // Asociar las cuentas seleccionadas si se proporcionaron
    if ($request->has('cuenta_ids')) {
        $establecimiento->cuentas()->attach($request->input('cuenta_ids'));
    }

    // Redirigir con un mensaje de éxito
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
    $establecimiento = Establecimiento::findOrFail($id);
    $cuentas = Cuenta::all();
    $tipos = TipoEstablecimiento::all();
    $estados = config('constantes.estados'); // Usa el nombre correcto del archivo de configuración

    return view('establecimientos.edit', compact('establecimiento', 'cuentas', 'tipos', 'estados'));
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
        // Encuentra el establecimiento por ID
        $establecimiento = Establecimiento::findOrFail($id);
        
        // Actualiza el establecimiento con los datos del request, exceptuando 'cuenta_ids'
        $establecimiento->update($request->except('cuenta_ids'));
    
        // Sincroniza las cuentas seleccionadas
        if ($request->has('cuenta_ids')) {
            $establecimiento->cuentas()->sync($request->input('cuenta_ids'));
        } else {
            $establecimiento->cuentas()->sync([]);
        }
    
        // Redirige con un mensaje de éxito
        return redirect()->route('establecimientos.index')->with('success', '¡Establecimiento actualizado!');
    }
    
    
}
