<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoEstablecimientoRequest extends FormRequest
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
            'nombre' => '-Nombre-',
            'imagen' => '-Imagen-',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'nombre' => 'required|string|max:255',
            'activo' => 'required|boolean',
        ];

        if ($this->getMethod() == "POST") {
            $rules['imagen'] = 'nullable|image|max:2048'; // Máx. 2 MB para la imagen
        } else {
            // Si es una actualización, la imagen es opcional pero debe ser válida si se proporciona
            $rules['imagen'] = 'nullable|image|max:2048';
        }

        return $rules;
    }
}
