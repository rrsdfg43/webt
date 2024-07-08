<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimeCapituloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anime_capitulo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anime_id')->unsigned();
            $table->unsignedBigInteger('capitulo_id')->unsigned();
            $table->timestamps();
            $table->foreign('anime_id')->references('id')->on('animes')->onDelete('cascade');
            $table->foreign('capitulo_id')->references('id')->on('capitulos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anime_capitulo');
    }
}
