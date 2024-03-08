<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('establecimiento_id')->nullable();
            $table->foreign('establecimiento_id')->references('id')->on('establecimientos')->onDelete('cascade');
            $table->integer('tipo')->nullable();
            $table->string('nombre')->nullable();
            $table->longText('descripcion')->nullable();
            $table->string('imagen')->nullable();
            $table->string('condiciones')->nullable(0);
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
        Schema::dropIfExists('productos');
    }
}
