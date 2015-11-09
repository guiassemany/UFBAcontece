<?php

use Illuminate\Database\Seeder;

class EventosPublicacoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create('pt_BR');

        DB::table('eventos_publicacoes')->insert([
          'evento_id' => 1,
          'usuario_id' => $faker->unique()->numberBetween($min = 1, $max = 155),
          'imagem' => '',
          'texto' => 'Pessoal, gostaria de lembrar que para participar do mini curso de Java será necessário levar um computador pessoal. Os softwares necessários serão disponibilizados em um pendrive brinde do evento! O Valor da taxa de inscrição é de R$35 e pode ser pago até 2 horas antes do início do mini curso.',
          'created_at' => $faker->dateTimeThisMonth($max = 'now'),
          'updated_at' => $faker->dateTimeThisMonth($max = 'now'),
      ]);

        DB::table('eventos_publicacoes')->insert([
          'evento_id' => 1,
          'usuario_id' => $faker->unique()->numberBetween($min = 1, $max = 155),
          'imagem' => '',
          'texto' => 'O workshop de desenvolvimento Web irá proporcionar ao participantes uma experiência única de desenvolvimento utilizando as tecnologias mais adotadas no mercado. O participante irá aprender fundamentos do Gulp, Bower, Composer, AngularJS e PHP(Laravel) e sairá pronto para começar a se aprofundar na área.',
          'created_at' => $faker->dateTimeThisMonth($max = 'now'),
          'updated_at' => $faker->dateTimeThisMonth($max = 'now'),
      ]);
    }
}
