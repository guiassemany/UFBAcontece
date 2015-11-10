<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreEventoRequest;
use App\Http\Controllers\Controller;
use App\Categoria;
use App\Departamento;
use App\Curso;
use App\Unidade;
use App\Evento;
use App\User as Usuario;
use DB;
use Response;
use Auth;
use Image;

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

    public function eventosPresente()
    {
      $eventos = DB::table('eventos')
      ->join('eventos_participantes', 'eventos_participantes.evento_id', '=', 'eventos.id')
      ->select('eventos.id', 'eventos.titulo', 'eventos.endereco', 'eventos.imagem')
      ->where('eventos_participantes.usuario_id', Auth::user()->id)
      ->get();
      //var_dump($eventos);
      return view('backend.dashboard.eventosPresente', compact('eventos'));
    }

    public function eventosCriado()
    {
      $eventos = Evento::with('categoria', 'departamento')->where('usuario_id', Auth::user()->id)->paginate(15);
      return view('backend.dashboard.eventosCriado', compact('eventos'));
    }

    public function cadastrarEvento()
    {
      $categorias = Categoria::lists('titulo', 'id');
      $departamentos = Departamento::lists('titulo', 'id');
      return view('backend.dashboard.criarEvento', compact('categorias','departamentos'));
    }

    public function storeEventoUsuario(StoreEventoRequest $request)
    {
      //Trata data_inicio
      //$dataInicioFormatada = Carbon::createFromFormat('d/m/Y', $request->get('data_inicio'))->format('yyyy-mm-dd');
      $dataInicioFormatada = str_replace('/', '-', $request->get('data_inicio'));
      $dataInicioFormatada = date('Y-m-d', strtotime($dataInicioFormatada));

      //Trata data_inicio
      //$dataFimFormatada = Carbon::createFromFormat('d/m/Y', $request->get('data_fim'))->format('yyyy-mm-dd');
      $dataFimFormatada = str_replace('/', '-', $request->get('data_fim'));
      $dataFimFormatada = date('Y-m-d', strtotime($dataFimFormatada));

      $evento = new Evento(array(
        'categoria_id' => $request->get('categoria_id'),
        'departamento_id' => $request->get('departamento_id'),
        'titulo' => $request->get('titulo'),
        'descricao'  => $request->get('descricao'),
        'data_inicio'  => $dataInicioFormatada,
        'data_fim'  => $dataFimFormatada,
        'endereco'  => $request->get('endereco'),
        'ativo'  => $request->get('ativo'),
        'usuario_id'  => Auth::user()->id
      ));

      if(!$evento->save()){
        return redirect()->back()
        ->with('status', 'Erro ao cadastrar Evento.');
      }

      //Trata e salva a imagem nova
      if ($request->hasFile('imagem')) {
        $file = $request->file('imagem');
        $filename  = time() . $evento->id .'.' . $file->getClientOriginalExtension();
        $path = public_path('uploadsDoUsuario/' . $filename);
        Image::make($file->getRealPath())->fit('607','190')->save($path);
        $evento->imagem = $filename;
      }

      $evento->save();

      return redirect()->action('BackendController@eventosCriado')
      ->with('status', 'Evento '. $evento->titulo .' cadastrado.');
    }

    public function excluirEvento($id)
    {
      $evento = Evento::findOrFail($id);

      //Deleta a imagem se houver
      if(!empty($evento->imagem)){
          unlink('uploadsDoUsuario'.DIRECTORY_SEPARATOR.$evento->imagem);
      }

      if($evento->delete()){
        return redirect()->action('BackendController@eventosCriado')
        ->with('status', 'Evento '. $evento->titulo.' excluído.');
      }
    }

}
