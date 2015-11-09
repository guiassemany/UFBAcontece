<?php

use Illuminate\Database\Seeder;

class EventosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('eventos')->insert([
          'categoria_id' => 2,
          'departamento_id' => 1,
          'titulo' => 'Congresso Nacional de Tecnologia',
          'descricao' => 'O Congresso de Tecnologia é um evento anual, organizado pela FATEC-SP, para promover a integração entre comunidade acadêmica, profissionais do mercado e empresas de tecnologia, quando são apresentados e discutidos assuntos ligados ao desenvolvimento tecnológico em diversas áreas de aplicação tecnológica.',
          'data_inicio' => '2015-11-09',
          'data_fim' => '2015-11-13',
          'endereco' => 'PAF 1, Ondina ,Universidade Federal da Bahia, Salvador - BA',
          'ativo' => 'Y',
          'imagem' => null,
          'usuario_id' => 1,
          'created_at' => '2015-11-01 07:00:00',
          'updated_at' => date('Y-m-d H:i:s'),
      ]);
    }
}
