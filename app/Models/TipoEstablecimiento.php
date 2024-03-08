<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEstablecimiento extends Model
{
    use HasFactory;
    protected $table = 'tipo_establecimientos';

    protected $fillable = [
        'nombre',
        'activo'
    ];
}
