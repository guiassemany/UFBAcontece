<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionaFkDepCatEmEventos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('eventos', function (Blueprint $table) {
        $table->foreign('categoria_id')->references('id')->on('categorias');
        $table->foreign('departamento_id')->references('id')->on('departamentos');
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
        $table->dropForeign('eventos_categoria_id_foreign');
        $table->dropForeign('eventos_departamento_id_foreign');
      });
    }
}
