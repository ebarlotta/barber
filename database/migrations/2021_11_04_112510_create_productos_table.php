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
            $table->string('name')->require();
            $table->text('descripcion')->nullable();
            $table->double('precio_compra');
            $table->double('existencia');

            $table->unsignedBigInteger('unidads_id');
            $table->unsignedBigInteger('categoriaproductos_id');
            $table->unsignedBigInteger('estados_id');
            $table->unsignedBigInteger('proveedor_id');

            $table->string('ruta');

            $table->timestamps();

            $table->foreign('unidads_id')->references('id')->on('unidads'); 
            $table->foreign('categoriaproductos_id')->references('id')->on('categoriaproductos'); 
            $table->foreign('estados_id')->references('id')->on('estados'); 
            $table->foreign('proveedors_id')->references('id')->on('proveedors');        
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
