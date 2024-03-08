<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosAltaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    
    /**
     * Determine the name of the attributes for the request.
     *
     * @return array
     */
    public function attributes(){
     return [
      'name'      => '-Nombre-',
      'email'     => '-Email-',
      'password'  => '-Password-',
      'password_confirmation' => '-confirmar-',
     ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|confirmed',
            'password_confirmation' => 'required',
        ];
    }
}
