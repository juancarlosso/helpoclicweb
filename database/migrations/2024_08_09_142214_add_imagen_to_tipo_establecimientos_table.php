<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagenToTipoEstablecimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tipo_establecimientos', function (Blueprint $table) {
            $table->string('imagen')->nullable()->after('activo'); // Añadir el campo 'imagen' después del campo 'activo'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tipo_establecimientos', function (Blueprint $table) {
            $table->dropColumn('imagen'); // Eliminar el campo 'imagen' en caso de rollback
        });
    }
}
