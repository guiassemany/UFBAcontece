<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsuarioIdEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('eventos', function (Blueprint $table) {
        $table->integer('usuario_id')->unsigned()->nullable();
        $table->foreign('usuario_id')->references('id')->on('usuarios');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('eventos', function (Blueprint $table) {
        $table->dropForeign('eventos_usuario_id_foreign');
        $table->dropColumn(['usuario_id']);
      });
    }
}
