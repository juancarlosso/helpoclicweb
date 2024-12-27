<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoAltaRequest;
use App\Http\Requests\ProductoEditarRequest;
use App\Http\Requests\ProductoRequest;
use App\Models\Establecimiento;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $rqt)
	{
		$establecimientos = Establecimiento::orderBy('nombre')->get();
		$productos = Producto::orderBy('nombre')->paginate('50');
		return view('productos.index', compact('productos', 'establecimientos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$establecimientos = Establecimiento::orderBy('nombre')->get();
		return view('productos.create', compact('establecimientos'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ProductoRequest $rqt)
	{
		$producto = Producto::create([
			'establecimiento_id' => $rqt->establecimiento,
			'tipo' => $rqt->tipo,
			'nombre' => $rqt->nombre,
			'activo' => $rqt->activo,
			'descripcion' => $rqt->descripcion,
			'imagen' => '',
			'condiciones' => '',
			'precio' => $rqt->tipo == 1 ? $rqt->precio : null, // Si es marketplace, guarda el precio, si no, deja null
			'descuento' => $rqt->descuento != null ||  $rqt->descuento != ''? $rqt->descuento : null, 
			'url' => $rqt->url,
		]);

		$establecimiento_id = $rqt->establecimiento;
		if ($rqt->hasFile('imagen')) {
			$file = $rqt->imagen;
			$path = "{$establecimiento_id}/{$producto->id}";
			$path_imagen = $file->storeAs($path, $file->hashName(), 'public');
		}
		if ($rqt->hasFile('condiciones')) {
			$file = $rqt->condiciones;
			$path = "{$establecimiento_id}/{$producto->id}";
			$path_condiciones = $file->storeAs($path, $file->hashName(), 'public');
		}

		$producto->update([
			'imagen' => $path_imagen ?? '', // Si no hay imagen, deja el valor como vacío
			'condiciones' => $path_condiciones ?? '', // Si no hay condiciones, deja el valor como vacío
		]);

		return redirect()->route('productos.index')->with('success', 'Producto creado');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$producto = Producto::findOrFail($id);
		$establecimientos = Establecimiento::orderBy('nombre')->get();
		return view('productos.edit', compact('establecimientos', 'producto'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(ProductoRequest $rqt, $id)
	{
		$producto = Producto::findOrFail($id);
		if ($rqt->hasFile('imagen')) {
			$disk = Storage::disk('public');
			if ($disk->exists($producto->imagen)) {
				$disk->delete($producto->imagen);
			}
			$establecimiento = Establecimiento::findOrFail($rqt->establecimiento);
			$file = $rqt->imagen;
			$path = "{$establecimiento->id}/{$producto->id}";
			$path_imagen = $file->storeAs($path, $file->hashName(), 'public');
			$producto->imagen = $path_imagen;
		}

		if ($rqt->hasFile('condiciones')) {
			$disk = Storage::disk('public');
			if ($disk->exists($producto->condiciones)) {
				$disk->delete($producto->condiciones);
			}
			$establecimiento = Establecimiento::findOrFail($rqt->establecimiento);
			$file = $rqt->condiciones;
			$path = "{$establecimiento->id}/{$producto->id}";
			$path_condiciones = $file->storeAs($path, $file->hashName(), 'public');
			$producto->condiciones = $path_condiciones;
		}

		$producto->establecimiento_id = $rqt->establecimiento;
		$producto->tipo = $rqt->tipo;
		$producto->nombre = $rqt->nombre;
		$producto->activo = $rqt->activo;
		$producto->descripcion = $rqt->descripcion;
		$producto->precio = $rqt->tipo == 1 ? $rqt->precio : null; // Actualizar precio si el tipo es 1 (Marketplace)
		$producto->descuento = $rqt->descuento != null ||  $rqt->descuento != ''? $rqt->descuento : null; // Actualizar precio si el tipo es 1 (Marketplace)
		$producto->url = $rqt->url; // Actualizar la URL
		$producto->save();
		return redirect()->route('productos.index')->with('success', 'Producto actualizado');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$producto = Producto::findOrFail($id);
		$disk = Storage::disk('public');
		if ($disk->exists($producto->imagen)) {
			$disk->delete($producto->imagen);
		}
		if ($disk->exists($producto->condiciones)) {
			$disk->delete($producto->condiciones);
		}
		$producto->delete();
		return redirect()->route('productos.index')->with('success', 'Producto eliminado!');
	}
}
