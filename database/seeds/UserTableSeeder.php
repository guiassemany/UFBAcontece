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
      DB::table('usuarios')->insert([
          'nome' => 'Guilherme Assemany',
          'email' => 'guilherme@ufbacontece.com',
          'senha' => bcrypt('123'),
          'admin' => 'Y',
          'curso_id' => 15,
          'unidade_id' => 1,
          'created_at' => '2015-01-01 17:00:00',
          'updated_at' => '2015-01-01 17:00:00',
      ]);

      DB::table('usuarios')->insert([
          'nome' => 'Fran Almeida',
          'email' => 'fran@ufbacontece.com',
          'senha' => bcrypt('123'),
          'admin' => 'Y',
          'curso_id' => 15,
          'unidade_id' => 1,
          'created_at' => '2015-01-01 17:00:00',
          'updated_at' => '2015-01-01 17:00:00',
      ]);

      DB::table('usuarios')->insert([
          'nome' => 'Edmilson Lima',
          'email' => 'edmilson@ufbacontece.com',
          'senha' => bcrypt('123'),
          'admin' => 'Y',
          'curso_id' => 15,
          'unidade_id' => 1,
          'created_at' => '2015-01-01 17:00:00',
          'updated_at' => '2015-01-01 17:00:00',
      ]);

      DB::table('usuarios')->insert([
          'nome' => 'Monira Silva',
          'email' => 'monira@ufbacontece.com',
          'senha' => bcrypt('123'),
          'admin' => 'Y',
          'curso_id' => 15,
          'unidade_id' => 1,
          'created_at' => '2015-01-01 17:00:00',
          'updated_at' => '2015-01-01 17:00:00',
      ]);

      DB::table('usuarios')->insert([
          'nome' => 'Suzanne Loures',
          'email' => 'suzanne@ufbacontece.com',
          'senha' => bcrypt('123'),
          'admin' => 'Y',
          'curso_id' => 15,
          'unidade_id' => 1,
          'created_at' => '2015-01-01 17:00:00',
          'updated_at' => '2015-01-01 17:00:00',
      ]);

      DB::table('usuarios')->insert([
          'nome' => 'João Silva',
          'email' => 'jsilva@ufbacontece.com',
          'senha' => bcrypt('123'),
          'admin' => 'N',
          'curso_id' => 3,
          'unidade_id' => 2,
          'created_at' => '2015-01-01 17:00:00',
          'updated_at' => '2015-01-01 17:00:00',
      ]);

      DB::table('usuarios')->insert([
          'nome' => 'Alberto Costa',
          'email' => 'acosta@ufbacontece.com',
          'senha' => bcrypt('123'),
          'admin' => 'N',
          'curso_id' => 5,
          'unidade_id' => 3,
          'created_at' => '2015-01-01 17:00:00',
          'updated_at' => '2015-01-01 17:00:00',
      ]);

      DB::table('usuarios')->insert([
          'nome' => 'Mariana Rios',
          'email' => 'mrios@ufbacontece.com',
          'senha' => bcrypt('123'),
          'admin' => 'N',
          'curso_id' => 5,
          'unidade_id' => 2,
          'created_at' => '2015-01-01 17:00:00',
          'updated_at' => '2015-01-01 17:00:00',
      ]);

      DB::table('usuarios')->insert([
          'nome' => 'Amanda Benites',
          'email' => 'abenites@ufbacontece.com',
          'senha' => bcrypt('123'),
          'admin' => 'N',
          'curso_id' => 1,
          'unidade_id' => 1,
          'created_at' => '2015-01-01 17:00:00',
          'updated_at' => '2015-01-01 17:00:00',
      ]);

       //Gera usuários random com o Faker
       $faker = Faker\Factory::create('pt_BR');

       foreach(range(1,150) as $index)  
        {  
            DB::table('usuarios')->insert([
                'nome' => $faker->firstName." ".$faker->lastName,  
                'email' => $faker->unique()->email,  
                'senha' => bcrypt('123'),  
                'admin' => 'N',
                'curso_id' => $faker->numberBetween($min = 1, $max = 15),
                'unidade_id' => $faker->numberBetween($min = 1, $max = 6),  
                'created_at' => $faker->dateTimeThisMonth($max = 'now'),
                'updated_at' => $faker->dateTimeThisMonth($max = 'now'),
            ]);  
        }

    }
}
