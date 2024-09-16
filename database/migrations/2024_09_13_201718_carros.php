<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Carros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carros', function (Blueprint $table) {
            $table->id();
            $table->string('placa', 8);
            $table->unsignedBigInteger('cor_id');
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('modelo_id');
            $table->foreign('cor_id')->references('id')->on('cors');
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->foreign('modelo_id')->references('id')->on('modelos');
            $table->softDeletes();
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
        Schema::dropIfExists('carros');
    }
}
