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
        DB::table('departamentos')->insert(['titulo' => 'DCTM - Departamento de Ciência e Tecnologia dos Materiais',]);
        DB::table('departamentos')->insert(['titulo' => 'DEE - Departamento de Engenharia Elétrica',]);
        DB::table('departamentos')->insert(['titulo' => 'DEM - Departamento de Engenharia Mecânica',]);
        DB::table('departamentos')->insert(['titulo' => 'DEQ - Departamento de Engenharia Química',]);
        DB::table('departamentos')->insert(['titulo' => 'DMAT - Departamento de Matemática',]);
        DB::table('departamentos')->insert(['titulo' => 'DPFILO - Departamento de Filosofia',]);
        DB::table('departamentos')->insert(['titulo' => 'DLV - Departamento de Letras Vernáculas',]);
        DB::table('departamentos')->insert(['titulo' => 'DPA - Departamento de Produção Animal',]);
        DB::table('departamentos')->insert(['titulo' => 'DPC - Departamento de Patologia e Clínicas',]);
        DB::table('departamentos')->insert(['titulo' => 'DAC - Departamento de Anestesiologia e Cirurgia',]);

    }
}
