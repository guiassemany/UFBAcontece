<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Curso;
use App\Unidade;
use App\Evento;

use Response;

class BackendController extends Controller
{
    public function index()
    {
        $cursos = Curso::lists('titulo', 'id');
        $unidades = Unidade::lists('titulo', 'id');
        $eventos = Evento::where('ativo', 'Y')->with('usuario', 'comentarios.usuario')->orderBy('created_at', 'desc')->get();
        //dd($eventos);
        return view('backend.dashboard.index', compact('cursos','unidades', 'eventos'));
    }

    public function eventosCalendario(){
      $eventos = Evento::all()->where('ativo', 'Y');
      //dd($eventos);
      //exit;
      return Response::json($eventos);
      //return response()->json($eventos);
    }

    public function eventos()
    {
        return view('backend.dashboard.eventos');
    }
}
