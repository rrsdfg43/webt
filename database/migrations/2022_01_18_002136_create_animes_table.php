<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('image');
            $table->string('url')->unique();
            $table->text('descripcion');
            $table->string('year');
            $table->string('estado');
            $table->string('tipo');
            $table->string('sub');
            $table->integer('capitulosM');
            $table->decimal('rating', $precision = 2, $scale = 1);
            $table->integer('duration');
            $table->string('miniature');
            $table->string('keywords');
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
        Schema::dropIfExists('animes');
    }
}
