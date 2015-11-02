<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Curso;
use App\Unidade;
use App\Evento;

class BackendController extends Controller
{
    public function index()
    {
        $cursos = Curso::lists('titulo', 'id');
        $unidades = Unidade::lists('titulo', 'id');
        $eventos = Evento::where('ativo', 'Y')->with('usuario', 'comentarios.usuario')->orderBy('data_inicio', 'desc')->get();
        //dd($eventos);
        return view('backend.dashboard.index', compact('cursos','unidades', 'eventos'));
    }

    public function eventos()
    {
        return view('backend.dashboard.eventos');
    }
}
