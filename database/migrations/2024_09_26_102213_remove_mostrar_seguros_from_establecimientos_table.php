<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveMostrarSegurosFromEstablecimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('establecimientos', function (Blueprint $table) {
            $table->dropColumn('mostrar_seguros');
        });
    }
    
    public function down()
    {
        Schema::table('establecimientos', function (Blueprint $table) {
            $table->boolean('mostrar_seguros')->default(0); // O ajusta según la definición original del campo
        });
    }
    
}
