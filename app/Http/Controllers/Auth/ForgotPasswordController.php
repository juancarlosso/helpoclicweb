<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;  
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Config; 

use App\Mail\CambiarPwdMail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    
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
     * @brief Sobrecarga del método (hecho solo a manera de ejemplificar)
     * @param  
     * @return vista con la solicitud del email
     *
    */        
    public function showLinkRequestForm() {
        return view('auth.passwords.email');
    }
    
    
    
    /*
     *
     * @brief Sobrecarga del método sendResetLinkEmail
     * @param string El requst con el email  ->email
     * @return
     *
    */          
    public function sendResetLinkEmail(Request $request) {             
             
        $usuario = User::where("email",trim($request->email))->first();
        if(!$usuario){
          return back()->withInput($request->only('email'))->withErrors(['email' => 'El email no existe en nuestros registros' ]);  
        }
    
        $id    = $usuario->id;
        $hash  = md5(".".$id);
        $token = bin2hex(random_bytes(10));
        $nombre= $usuario->name;
        $email = $request->email;
        
        User::where("email","=",$request->email)->update([ "remember_token" => $token ]);
    
        $enlace   = Config::get('app.url') . '/cambiar-password' ;    
        $enlace   = trim($enlace)  . "/" . $id . "/" . $hash . "/" . $token;
        $logotipo = trim(url('assets/images/brand/logobig.png')); 
        
        $datos    = new \stdClass();
        $datos->nombre = $nombre;
        $datos->enlace = $enlace;
        $datos->email  = $email;
        $datos->logo   = $logotipo;
        Mail::to(trim($request->email))->send(new CambiarPwdMail($datos));
        
        $mensaje = "Se han enviado instrucciones a tu email para que puedas cambiar tu password. ";
        $mensaje.= "Asegúrate de revisar incluso las bandejas de correo no deseado.";
            
        return view('alertas.mensaje_url')->with([ 'logo' => $logotipo, 'mensaje' => $mensaje, 'url'=>route('login') ]);  
        
        
    }
    
}
