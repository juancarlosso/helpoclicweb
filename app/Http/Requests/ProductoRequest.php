<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductoRequest extends FormRequest
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
			'establecimiento' => '-Establecimiento-',
			'tipo' => '-Tipo-',
			'nombre' => '-Nombre-',
			'imagen' => '-Imagen-',
			'condiciones' => '-Condiciones-',
		];
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [];

		if ($this->getMethod() == "POST") {
			return [
				'establecimiento' => 'required',
				'tipo' => 'required',
				'nombre' => 'required',
				'imagen' => 'required',
				'condiciones' => "required|mimes:pdf|max:10000"
			];
		} else {
			return [
				'establecimiento' => 'required',
				'tipo' => 'required',
				'nombre' => 'required',
				'imagen' => 'required',
				'condiciones' => "required|mimes:pdf|max:10000"
			];
		}
	}
}
