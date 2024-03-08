<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cuenta;

use App\Http\Requests\UsuariosAltaRequest;
use App\Http\Requests\UsuariosEditarRequest;

use Illuminate\Http\Request;

class UsersController extends Controller
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
          $usuarios = User::orderBy('name')->get();
          return view('usuarios.index')->with('usuarios', $usuarios);
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
          //$cuentas = Cuenta::where('activa', 1)->orderBy('nombre')->get();
          return view('usuarios.create'); //->with('cuentas', $cuentas);
     }

     /*
    *
    * @brief
    * @author Gustavo Ramirez Yahuaca
    * @param string
    * @return
    *
    */
     public function store(UsuariosAltaRequest $request)
     {

          $usuario = User::create($request->all());
          return redirect()->route('usuarios.index')->with('success', 'Usuario creado!');
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
          User::where('id', $id)->delete();
          return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado!');
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
          $usuario = User::find($id);
          //$cuentas = Cuenta::where('estatus', 1)->orderBy('nombre')->get();
          return view('usuarios.edit')->with('usuario', $usuario); //->with('cuentas', $cuentas);
     }

     /*
    *
    * @brief
    * @author Gustavo Ramirez Yahuaca
    * @param string
    * @return
    *
    */
     public function update(UsuariosEditarRequest $request, $id)
     {
          $usuario = User::find($id);
          if (!$usuario) {
               return back()->with('error', 'Datos inconsistentes de usuario');
          }
          $usuario->name = $request->name;
          $usuario->perfil = $request->perfil;
          $usuario->save();
          return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado!');
     }

     /*
    *
    * @brief
    * @author Gustavo Ramirez Yahuaca
    * @param string
    * @return
    *
    */
     public function cambiarpwd(Request $request)
     {

          if ($request->nuevo == "" || $request->confirmar == "") {
               return redirect()->route('usuarios.index')->with('error', 'Debes capturar el password y la confirmación');
          }
          if (trim($request->nuevo) != ($request->confirmar)) {
               return redirect()->route('usuarios.index')->with('error', 'El password y la confirmación deben ser iguales');
          }
          if (strlen(trim($request->nuevo)) < 5) {
               return redirect()->route('usuarios.index')->with('error', 'El password debe tener al menos 5 caracteres');
          }

          $usuario = User::find($request->usuario_id);
          $usuario->password = $request->nuevo;
          $usuario->save();

          return redirect()->route('usuarios.index')->with('success', 'El password del usuario fué cambiado!');
     }
}
