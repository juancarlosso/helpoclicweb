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
                'tipo_id' => 'required',
                'cuenta_ids' => 'required|array',
                'cuenta_ids.*' => 'exists:cuentas,id',
                'nombre' => 'required','estado' => 'required|string|size:2',
                'ciudad' => 'nullable|string|max:255',
            ];
        } else {
            return [
                'tipo_id' => 'required',
                'cuenta_ids' => 'required|array',
                'cuenta_ids.*' => 'exists:cuentas,id',
                'nombre' => 'required',
                'estado' => 'required|string|size:2',
                'ciudad' => 'nullable|string|max:255',
            ];
        }
    }
}
