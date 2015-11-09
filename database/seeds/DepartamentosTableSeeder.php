<?php

use Illuminate\Database\Seeder;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamentos')->insert(['titulo' => 'DCC - Departamento de Ciência da Computação',]);
        DB::table('departamentos')->insert(['titulo' => 'Departamento de Ciência e Tecnologia dos Materiais',]);
        DB::table('departamentos')->insert(['titulo' => 'Departamento de Engenharia Elétrica',]);
        DB::table('departamentos')->insert(['titulo' => 'DEM - Departamento de Engenharia Mecânica',]);
        DB::table('departamentos')->insert(['titulo' => 'Departamento de Engenharia Química',]);
        DB::table('departamentos')->insert(['titulo' => 'Departamento de Matemática',]);
        DB::table('departamentos')->insert(['titulo' => 'DPFILO - Departamento de Filosofia',]);
        DB::table('departamentos')->insert(['titulo' => 'Departamento de Letras Vernáculas',]);
        DB::table('departamentos')->insert(['titulo' => 'Departamento de Produção Animal',]);
        DB::table('departamentos')->insert(['titulo' => 'Departamento de Patologia e Clínicas',]);
        DB::table('departamentos')->insert(['titulo' => 'Departamento de Anestesiologia e Cirurgia',]);

    }
}
