<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMaisCamposTabelaUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('usuarios', function (Blueprint $table) {
        $table->integer('curso_id')->unsigned()->nullable();
        $table->foreign('curso_id')->references('id')->on('cursos');
        $table->integer('unidade_id')->unsigned()->nullable();
        $table->foreign('unidade_id')->references('id')->on('unidades');
        $table->string('apresentacao', 255)->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('usuarios', function (Blueprint $table) {
          $table->dropForeign('usuarios_unidade_id_foreign');
          $table->dropForeign('usuarios_curso_id_foreign');
          $table->dropColumn(['apresentacao','curso_id','unidade_id']);
      });
    }
}
