<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablecimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establecimientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_id')->nullable();
            $table->foreign('tipo_id')->references('id')->on('tipo_establecimientos')->onDelete('cascade');
            $table->unsignedBigInteger('cuenta_id')->nullable();
            $table->foreign('cuenta_id')->references('id')->on('cuentas')->onDelete('cascade');
            $table->string('nombre')->nullable();
            $table->integer('mostrar_seguros')->default(0);
            $table->integer('mostrar_productos')->default(0);
            $table->integer('activo')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('establecimientos');
    }
}
