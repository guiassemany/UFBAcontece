<?php

use Illuminate\Database\Seeder;

class EventosParticipantesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create('pt_BR');
    foreach(range(1,90) as $index)  
    {  	
      DB::table('eventos_participantes')->insert([
          'evento_id' => 1,
          'usuario_id' => $faker->unique()->numberBetween($min = 1, $max = 155),
          'created_at' => $faker->dateTimeThisMonth($max = 'now'),
          'updated_at' => $faker->dateTimeThisMonth($max = 'now'),
      ]);
  	}
    }
}
