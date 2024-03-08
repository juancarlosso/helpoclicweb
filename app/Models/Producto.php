<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
	use HasFactory;
	protected $table = 'productos';
	protected $fillable = [
		'establecimiento_id', 'tipo', 'nombre', 'descripcion',
		'imagen', 'condiciones', 'activo'
	];

	//Relaciones
	public function establecimiento()
	{
		return $this->belongsTo(Establecimiento::class, 'establecimiento_id');
	}
}
