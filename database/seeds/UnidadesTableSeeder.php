<?php

use Illuminate\Database\Seeder;

class UnidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidades')->insert(['titulo' => 'Salvador - Campus Ondina',]);
        DB::table('unidades')->insert(['titulo' => 'Salvador - Campus Federação',]);
        DB::table('unidades')->insert(['titulo' => 'Salvador - Campus Canela',]);
        DB::table('unidades')->insert(['titulo' => 'Vitória da Conquista',]);
        DB::table('unidades')->insert(['titulo' => 'Barreiras',]);
        DB::table('unidades')->insert(['titulo' => 'Salvador - Unidades Dispersas',]);

    }
}
