<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    use HasFactory;
    protected $table = 'establecimientos';
    protected $fillable = [
        'tipo_id',
        'cuenta_id',
        'nombre',
        'mostrar_seguros',
        'mostrar_productos',
        'activo',
        'estado',
        'ciudad'
    ];

    public function tipo()
    {
        return $this->belongsTo(TipoEstablecimiento::class, 'tipo_id');
    }

    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class, 'cuenta_id');
    }

    public function cuentas()
{
    return $this->belongsToMany(Cuenta::class, 'cuenta_establecimiento');
}

}
