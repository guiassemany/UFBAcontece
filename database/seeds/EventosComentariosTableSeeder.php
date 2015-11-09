<?php

use Illuminate\Database\Seeder;

class EventosComentariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create('pt_BR');

      DB::table('eventos_comentarios')->insert([
          'evento_id' => 1,
          'usuario_id' => $faker->unique()->numberBetween($min = 1, $max = 155),
          'comentario' => 'Muito Legal! Gostaria muito de ir!',
          'created_at' => $faker->dateTimeThisMonth($max = 'now'),
          'updated_at' => $faker->dateTimeThisMonth($max = 'now'),
      ]);

      DB::table('eventos_comentarios')->insert([
          'evento_id' => 1,
          'usuario_id' => $faker->unique()->numberBetween($min = 1, $max = 155),
          'comentario' => 'Infelizmente acho que não poderei ir!',
          'created_at' => $faker->dateTimeThisMonth($max = 'now'),
          'updated_at' => $faker->dateTimeThisMonth($max = 'now'),
      ]);

      DB::table('eventos_comentarios')->insert([
          'evento_id' => 1,
          'usuario_id' => $faker->unique()->numberBetween($min = 1, $max = 155),
          'comentario' => 'Eu ouvi dizer que teria um workshop sobre desenvolvimento Web! Com certeza estarei lá!',
          'created_at' => $faker->dateTimeThisMonth($max = 'now'),
          'updated_at' => $faker->dateTimeThisMonth($max = 'now'),
      ]);

      DB::table('eventos_comentarios')->insert([
          'evento_id' => 1,
          'usuario_id' => $faker->unique()->numberBetween($min = 1, $max = 155),
          'comentario' => 'O preço está absurdo. Assim não dá.',
          'created_at' => $faker->dateTimeThisMonth($max = 'now'),
          'updated_at' => $faker->dateTimeThisMonth($max = 'now'),
      ]);
    }
}
