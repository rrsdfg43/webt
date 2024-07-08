<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapitulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capitulos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anime_id')->unsigned();
            $table->string('titulo');
            $table->string('opcion1');
            $table->string('slug')->unique();
            $table->integer('capituloN');
            $table->integer('tiempoN');
            $table->integer('tiempoO');
            $table->integer('tiempoL');
            $table->integer('tiempoNS')->default('0');
            $table->integer('tiempoOS')->default('0');
            $table->integer('tiempoLS')->default('0');
            $table->timestamps();

            $table->foreign('anime_id')->references('id')->on('animes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capitulos');
    }
}
