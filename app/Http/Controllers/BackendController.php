<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Curso;
use App\Unidade;
use App\Evento;
use App\User as Usuario;
use DB;
use Response;

class BackendController extends Controller
{
    public function index()
    {
        $cursos = Curso::lists('titulo', 'id');
        $unidades = Unidade::lists('titulo', 'id');
        $eventos = Evento::where('ativo', 'Y')->with('usuario', 'comentarios.usuario')->orderBy('created_at', 'desc')->get();
        return view('backend.dashboard.index', compact('cursos','unidades', 'eventos'));
    }

    public function eventosCalendario()
    {
      $eventos = Evento::all()->where('ativo', 'Y');
      return Response::json($eventos);
    }

    public function eventos()
    {
      return view('backend.dashboard.eventos');
    }

    public function detalharEvento($eventoId)
    {
      $evento = Evento::findOrFail($eventoId);
      $publicacoes = $evento->publicacoes()->orderby('created_at', 'desc')->get();
      return view('backend.evento.detalhe', compact('evento', 'publicacoes'));
    }

    public function participantesByCurso($eventoId)
    {
      $participantes = DB::table('eventos_participantes')
            ->join('usuarios', 'usuarios.id', '=', 'eventos_participantes.usuario_id')
            ->join('cursos', 'cursos.id', '=', 'usuarios.curso_id')
            ->select(DB::raw('count(*) as numero'), 'cursos.titulo')
            ->where('eventos_participantes.evento_id', $eventoId)
            ->groupBy('cursos.id')
            ->get();
            return $participantes;

    }
}
