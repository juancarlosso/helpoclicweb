<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
     
    
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    
    /*
     *
     * @brief Muestra el formulario para cambiar de password
     * @param string 
     * @return
     *
    */        
    
    public function showResetForm($id, $hash, $token) {
       
       $usuario = User::where("id","=",$id)->first();
       if(!isset($usuario)){
         return view("alertas.mensaje_url")->with([
                  'mensaje'=>'El parámetro principal de la URL es inválido, favor de verificar',
                  'url'    => route('login'),
                  'logo'   => url('assets/images/brand/logobig.png')
               ]); 
       }
       
       $hash_generado = md5(".".$id);
       if($hash_generado!=$hash){
         return view("alertas.mensaje_url")->with([
                  'mensaje'=>'El parámetro secundario de la URL es inválido, favor de verificar',
                  'url'    => route('login'),
                  'logo'   => url('assets/images/brand/logobig.png')
               ]);         
       }
       
       if($token!=$usuario->remember_token){
         return view("alertas.mensaje_url")->with([
                  'mensaje'=>'El parámetro terciario de la URL es inválido, favor de verificar',
                  'url'    => route('login'),
                  'logo'   => url('assets/images/brand/logobig.png')
               ]);                 
       }
       
       $email = $usuario->email;
       $nombre= $usuario->name;
       
       return view('auth.passwords.reset')->with(['nombre'=>$nombre,'id'=>$id, 'token'=>$token, 'email'=>$email]);       
       
    }

    
    /*
     *
     * @brief 
     * @param string 
     * @return
     *
    */        
    public function reset(Request $request){
     
       $id = $request->id;
       $pwd = $request->password;
       $confirma = $request->password_confirmation;
       $token    = $request->token;
      
       $usuario = User::where("id","=",$id)->first();
       if(!isset($usuario)){        
         return back()->withInput($request->only('password'))->withErrors(['email' => 'Error de datos recibidos' . $id ]);  
       }      
     
      if(!isset($pwd)){
        return back()->withInput($request->only('password'))->withErrors(['password' => 'Debes capturar el nuevo password' ]);  
      }

      if(!isset($confirma)){
        return back()->withInput($request->only('password'))->withErrors(['password' => 'Debes capturar el nuevo password y también su confirmación' ]);  
      }

      if($pwd!=$confirma){
        return back()->withInput($request->only('password'))->withErrors(['password' => 'El password y la confirmación deben ser iguales' ]);  
      }
      
      if($token!=$usuario->remember_token){
         return view("alertas.mensaje_url")->with([
                  'mensaje'=>'Token inválido, favor de verificar el link e intentar de nuevo',
                  'url'    => route('login'),
                  'logo'   => url('assets/images/brand/logobig.png')
               ]);                 
      }

      $nuevoToken = bin2hex(random_bytes(10));
      $nuevo_password_e = Hash::make($pwd);     
      User::where('id','=',$id)->update([ 'password' => $nuevo_password_e, 'remember_token' => $nuevoToken ]);
      

      return view("alertas.mensaje_url")->with([
               'mensaje'=>'Tu password ha sido actualizado',
               'url'    => route('login'),
               'logo'   => url('assets/images/brand/logobig.png')
            ]);                 
      
     
    }     
     
}
