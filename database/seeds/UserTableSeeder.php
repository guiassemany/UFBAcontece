<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /*DB::table('usuarios')->insert([
          'nome' => str_random(10),
          'email' => str_random(10).'@ufbacontece.com',
          'senha' => bcrypt('secret'),
      ]);*/

      DB::table('usuarios')->insert([
          'nome' => 'Guilherme Assemany',
          'email' => 'guilherme@ufbacontece.com',
          'senha' => bcrypt('123'),
      ]);

      DB::table('usuarios')->insert([
          'nome' => 'Fran Almeida',
          'email' => 'fran@ufbacontece.com',
          'senha' => bcrypt('123'),
      ]);

      DB::table('usuarios')->insert([
          'nome' => 'Edmilson Lima',
          'email' => 'edmilson@ufbacontece.com',
          'senha' => bcrypt('123'),
      ]);

      DB::table('usuarios')->insert([
          'nome' => 'Monira Silva',
          'email' => 'monira@ufbacontece.com',
          'senha' => bcrypt('123'),
      ]);

      DB::table('usuarios')->insert([
          'nome' => 'Suzanne Loures',
          'email' => 'suzanne@ufbacontece.com',
          'senha' => bcrypt('123'),
      ]);


    }
}
