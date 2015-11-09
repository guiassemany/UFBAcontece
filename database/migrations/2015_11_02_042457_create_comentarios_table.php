<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('eventos_comentarios', function(Blueprint $table){
        $table->increments('id');
        $table->integer('evento_id')->unsigned();
        $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');;
        $table->integer('usuario_id')->unsigned();
        $table->foreign('usuario_id')->references('id')->on('usuarios');
        $table->string('comentario', 500);
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
      Schema::drop('eventos_comentarios');
    }
}
