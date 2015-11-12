<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Evento;
use App\Participante;
use App\EventoPublicacao;
use App\Comentario;

use DB;

class EstatisticasController extends Controller
{
    public function index()
    {
      $usuarios       = User::orderBy('created_at', 'desc')->take(8)->get();
      $numUsuarios    = count(User::all());
      $eventos        = Evento::orderBy('created_at', 'desc')->take(4)->get();
      $numEventos     = count(Evento::all());
      $numPresencas   = count(Participante::all());
      $numComentarios = count(EventoPublicacao::all()) + count(Comentario::all());

      $dadosEstudanteCurso = DB::select('SELECT count(*) as numero, cur.titulo as curso
                                         FROM usuarios usu
                                         INNER JOIN cursos cur ON cur.id = usu.curso_id
                                         GROUP BY cur.id');
                                         
      return view('backend.admin.estatisticas', compact('numUsuarios', 'numEventos', 'numPresencas', 'numComentarios', 'usuarios', 'eventos'));

    }
}
