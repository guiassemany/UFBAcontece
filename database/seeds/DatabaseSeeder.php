<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Desativa proteção contra o Mass assignment
        Model::unguard();
        
        //Desabilita Verificação de FK para excluir os dados sem problemas
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        //Seleciona todas as tabelas do banco de dados
        $nomeDB = env('DB_DATABASE', 'homestead');
        $campoNomeTabela = "Tables_in_".$nomeDB;
        $tables = DB::select('SHOW TABLES');
        
        //Faz um loop para truncar todas as tabelas e pula apenas a tabela de migrações
        foreach ($tables as $table)
        {
            if ($table->{$campoNomeTabela} !== 'migrations')
            {
                DB::table($table->{$campoNomeTabela})->truncate();
            }
        }

        //Habilita Verificação de FK antes de colocar novos dados
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        //Inicia as seeds
        $this->call(CategoriasTableSeeder::class);
        $this->call(DepartamentosTableSeeder::class);
        $this->call(CursosTableSeeder::class);
        $this->call(UnidadesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(EventosTableSeeder::class);
        $this->call(EventosComentariosTableSeeder::class);
        $this->call(EventosParticipantesTableSeeder::class);
        $this->call(EventosAgendasTableSeeder::class);
        $this->call(EventosPublicacoesTableSeeder::class);

        //Ativa proteção contra o Mass assignment
        Model::reguard();
    }
}
