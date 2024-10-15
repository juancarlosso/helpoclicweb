<?php

namespace App\Http\Controllers;
use App\Helper\Push;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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

    /*
    *
    * @brief
    * @author Denys Sánchez
    * @param string
    * @return
    *
    */
    public function create()
    {
        return view('tienda.create');
    }

    /*
    *
    * @brief
    * @author Denys Sánchez
    * @param string
    * @return
    *
    */
    public function store(Request $request)
    {
      
        return redirect()->route('tienda.index')->with('success', 'Mensaje!');
    }

    /*
    *
    * @brief
    * @author Denys Sánchez
    * @param string
    * @return
    *
    */
    public function destroy($id)
    {
        return redirect()->route('tienda.index')->with('success', 'item eliminado');
    }

    /*
    *
    * @brief
    * @author Denys Sánchez
    * @param string
    * @return
    *
    */
    public function edit($id)
    {
        return view('tienda.edit');
    }

    /*
    *
    * @brief
    * @author Denys Sánchez
    * @param string
    * @return
    *
    */
    public function update(CuentasRequest $request, $id)
    {
        return redirect()->route('tienda.index')->with('success', 'El item ha sido modificado!');
    }
}
