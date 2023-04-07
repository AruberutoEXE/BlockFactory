<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linea_carros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idProducto')->references('id')->on('productos');
            $table->foreignId('idCarro')->references('id')->on('carros');
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
        Schema::dropIfExists('linea_carros');
    }
};
