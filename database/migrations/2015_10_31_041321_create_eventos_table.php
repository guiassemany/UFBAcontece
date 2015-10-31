<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function(Blueprint $table){
          $table->increments('id');
          $table->integer('categoria_id')->unsigned();
          $table->integer('departamento_id')->unsigned();
          $table->string('titulo', 150);
          $table->text('descricao');
          $table->date('data_inicio');
          $table->date('data_fim');
          $table->string('endereco');
          $table->string('ativo', 1)->default('N');
          $table->string('imagem', 150)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('eventos');
    }
}
