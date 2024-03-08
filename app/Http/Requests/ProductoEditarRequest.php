<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductoEditarRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
   * Determine the name of the attributes for the request.
   *
   * @return array
   */
	public function attributes(){
		return [
			'proveedor' => '-Proveedor-',
			'clave' => '-Clave-',
			'nombre' => '-Nombre-',
			'precio' => '-Precio-',
			'img' => '-Foto-'
		];
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'proveedor' => 'required',
			'clave' => [
				'required',
				Rule::unique('productos')->where(function ($query) {
					return $query->where('proveedor_id', request()->proveedor);
				})->ignore($this->producto)
			],
			'nombre' => 'required',
			'precio' => 'required',
		];
	}
}
