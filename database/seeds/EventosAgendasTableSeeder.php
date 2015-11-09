<?php

use Illuminate\Database\Seeder;

class EventosAgendasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('eventos_agendas')->insert([
          'evento_id' => 1,
          'diaHora_inicio' => '2015-11-09 07:00:00',
          'diaHora_fim' => '2015-11-09 08:30:00',
          'titulo' => 'Abertura do Congresso',
          'sobre' => 'A Abertura do congresso ...',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
      ]);

        DB::table('eventos_agendas')->insert([
          'evento_id' => 1,
          'diaHora_inicio' => '2015-11-09 09:00:00',
          'diaHora_fim' => '2015-11-09 11:30:00',
          'titulo' => 'Curso de Desenvolvimento para Mobile',
          'sobre' => 'O curso de desenvolvimento para mobile vai preparar o estudante para conhecer o básico e já desenvolver o seu primeiro aplicativo.',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
      ]);

        DB::table('eventos_agendas')->insert([
          'evento_id' => 1,
          'diaHora_inicio' => '2015-11-09 14:30:00',
          'diaHora_fim' => '2015-11-09 17:30:00',
          'titulo' => 'Palestra sobre Segurança da Informação',
          'sobre' => 'A Palestra sobre segurança da informação será ....',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
      ]);

        DB::table('eventos_agendas')->insert([
          'evento_id' => 1,
          'diaHora_inicio' => '2015-11-10 07:30:00',
          'diaHora_fim' => '2015-11-10 11:30:00',
          'titulo' => 'Workshop de Desenvolvimento Web',
          'sobre' => 'O workshop de desenvolvimento web vai guiar o estudante/interessado no desenvolvimento do seu primeiro aplicativo web.',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
      ]);

        DB::table('eventos_agendas')->insert([
          'evento_id' => 1,
          'diaHora_inicio' => '2015-11-11 09:00:00',
          'diaHora_fim' => '2015-11-11 12:30:00',
          'titulo' => 'Mini curso de Java',
          'sobre' => 'Curso básico de Java.',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
      ]);

        DB::table('eventos_agendas')->insert([
          'evento_id' => 1,
          'diaHora_inicio' => '2015-11-11 09:00:00',
          'diaHora_fim' => '2015-11-11 12:30:00',
          'titulo' => 'Seminário DevOps',
          'sobre' => 'No seminário DevOps o participante ouvirá sobre principais ....',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
      ]);

        DB::table('eventos_agendas')->insert([
          'evento_id' => 1,
          'diaHora_inicio' => '2015-11-12 13:00:00',
          'diaHora_fim' => '2015-11-12 17:30:00',
          'titulo' => 'Oficina de Robótica',
          'sobre' => 'A Oficina de Robótica do congresso...',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
      ]);

        DB::table('eventos_agendas')->insert([
          'evento_id' => 1,
          'diaHora_inicio' => '2015-11-13 17:00:00',
          'diaHora_fim' => '2015-11-13 19:00:00',
          'titulo' => 'Encerramento do Congresso',
          'sobre' => 'Serão sorteados ...',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
      ]);
    }
}
