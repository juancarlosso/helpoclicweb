<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
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
    return view('perfil.index');
  }

  /*
    *
    * @brief  
    * @author Gustavo Ramirez Yahuaca Ojeda
    * @param string
    * @return
    *
    */
  public function update(Request $request)
  {
    if ($request->name == "") {
      return redirect()->route('perfil.index')->with('error', 'El nombre no puede estar vacío');
    }
    $usuario = User::findOrFail($request->id);
    $usuario->name = $request->name;
    $usuario->save();
    return redirect()->route('perfil.index')->with('success', 'El perfil ha sido actualizado');
  }

  /*
    *
    * @brief  
    * @author Gustavo Ramirez Yahuaca Ojeda
    * @param string
    * @return
    *
    */
  public function cambiarpwd()
  {
    return view('perfil.cambiarpwd');
  }

  /*
    *
    * @brief  
    * @author Gustavo Ramirez Yahuaca Ojeda
    * @param string
    * @return
    *
    */
  public function updatepwd(Request $request)
  {
    if ($request->actual == "" || $request->nuevo == "" || $request->confirmar == "") {
      return redirect()->route('perfil.cambiarpwd')->with('error', 'Todos los campos son obligatorios');
    }
    if ($request->nuevo != $request->confirmar) {
      return redirect()->route('perfil.cambiarpwd')->with('error', 'El password y su confirmación deben ser iguales');
    }

    $usuario = User::findOrFail($request->id);

    if (!Hash::check($request->actual, $usuario->password)) {
      return redirect()->route('perfil.cambiarpwd')->with('error', 'El password actual es incorrecto');
    }

    $usuario->password = $request->nuevo;
    $usuario->save();

    return redirect()->route('perfil.cambiarpwd')->with('success', 'El password ha sido actualizado');
  }
}
