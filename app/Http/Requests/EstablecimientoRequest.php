<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstablecimientoRequest extends FormRequest
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
    public function attributes()
    {
        return [
            'cuenta_id' => '-Cuenta-',
            'tipo_id'   => '-Tipo Establecimiento-',
            'nombre'    => '-Nombre-',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->getMethod() == "POST") {
            return [
                'tipo_id' => "required",
                'cuenta_id' => "required",
                'nombre'    => "required",
            ];
        } else {
            return [
                'tipo_id' => "required",
                'cuenta_id' => "required",
                'nombre' => "required",
            ];
        }
    }
}
