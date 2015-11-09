<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosPublicacoesCurtidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos_publicacoes_curtidas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('publicacao_id')->unsigned()->nullable();
            $table->foreign('publicacao_id')->references('id')->on('eventos_publicacoes')->onDelete('cascade');
            $table->integer('usuario_id')->unsigned()->nullable();
            $table->foreign('usuario_id')->references('id')->on('usuarios');
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
        Schema::drop('eventos_publicacoes_curtidas');
    }
}
