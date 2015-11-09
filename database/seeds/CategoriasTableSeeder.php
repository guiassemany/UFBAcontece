<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert(['titulo' => 'Calourada',]);
        DB::table('categorias')->insert(['titulo' => 'Congresso',]);
        DB::table('categorias')->insert(['titulo' => 'Curso',]);
        DB::table('categorias')->insert(['titulo' => 'Festival de Música',]);
        DB::table('categorias')->insert(['titulo' => 'Palestra',]);
        DB::table('categorias')->insert(['titulo' => 'Premiação',]);
        DB::table('categorias')->insert(['titulo' => 'Saúde',]);
        DB::table('categorias')->insert(['titulo' => 'Seminário',]);
        DB::table('categorias')->insert(['titulo' => 'Simpósio',]);
        DB::table('categorias')->insert(['titulo' => 'Workshop',]);
    }
}
