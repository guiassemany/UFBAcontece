<?php

use Illuminate\Database\Seeder;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('cursos')->insert(['titulo' => 'Física (Lic. e Bach.)',]);
      DB::table('cursos')->insert(['titulo' => 'Física (Lic) - Noturno',]);
      DB::table('cursos')->insert(['titulo' => 'Geofísica',]);
      DB::table('cursos')->insert(['titulo' => 'Geologia',]);
      DB::table('cursos')->insert(['titulo' => 'Geografia (Lic. e Bach.)',]);
      DB::table('cursos')->insert(['titulo' => 'Geografia (Lic.) - Noturno',]);
      DB::table('cursos')->insert(['titulo' => 'Oceanografia',]);
      DB::table('cursos')->insert(['titulo' => 'Química (Lic. Bach. e Química Industrial)',]);
      DB::table('cursos')->insert(['titulo' => 'Química (Lic.)',]);
      DB::table('cursos')->insert(['titulo' => 'Ciência da Computação',]);
      DB::table('cursos')->insert(['titulo' => 'Estatística',]);
      DB::table('cursos')->insert(['titulo' => 'Matemática (Lic. e Bach.)',]);
      DB::table('cursos')->insert(['titulo' => 'Matemática (Lic.) - Noturno',]);
      DB::table('cursos')->insert(['titulo' => 'Licenciatura em Computação - Noturno',]);
      DB::table('cursos')->insert(['titulo' => 'Sistemas de Informação - Bacharelado',]);
    }
}
