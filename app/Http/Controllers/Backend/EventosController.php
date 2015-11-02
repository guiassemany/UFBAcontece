<?php

namespace App\Http\Controllers\Backend;

use App\Evento;
use App\Categoria;
use App\Departamento;
use Image;
use Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventoRequest;
use Carbon\Carbon;
use Auth;

class EventosController extends Controller
{

    public function index()
    {
      $eventos = Evento::with('categoria', 'departamento')->paginate(15);
      return view('backend.admin.eventos.index', compact('eventos'));
    }

    public function create()
    {
        $categorias = Categoria::lists('titulo', 'id');
        $departamentos = Departamento::lists('titulo', 'id');
        return view('backend.admin.eventos.create', compact('categorias','departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventoRequest $request)
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
        Image::make($file->getRealPath())->resize('600','400')->save($path);
        $evento->imagem = $filename;
      }

      $evento->save();

      return redirect()->action('Backend\EventosController@index')
      ->with('status', 'Evento '. $evento->titulo .' cadastrado.');



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $evento = Evento::findOrFail($id);
      $categorias = Categoria::lists('titulo', 'id');
      $departamentos = Departamento::lists('titulo', 'id');
      return view('backend.admin.eventos.edit', compact('evento', 'categorias', 'departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEventoRequest $request, $id)
    {
        //Busca no banco o Evento
        $evento = Evento::findOrFail($id);

        //Trata data_inicio
        //$dataInicioFormatada = Carbon::createFromFormat('d/m/Y', $request->get('data_inicio'))->format('yyyy-mm-dd');
        $dataInicioFormatada = str_replace('/', '-', $request->get('data_inicio'));
        $dataInicioFormatada = date('Y-m-d', strtotime($dataInicioFormatada));

        //Trata data_inicio
        //$dataFimFormatada = Carbon::createFromFormat('d/m/Y', $request->get('data_fim'))->format('yyyy-mm-dd');
        $dataFimFormatada = str_replace('/', '-', $request->get('data_fim'));
        $dataFimFormatada = date('Y-m-d', strtotime($dataFimFormatada));

        //Atribui os parametros aos campos correspondentes
        $evento->titulo           = $request->input('titulo');
        $evento->categoria_id     = $request->input('categoria_id');
        $evento->departamento_id  = $request->input('departamento_id');
        $evento->descricao        = $request->input('descricao');
        $evento->data_inicio      = $dataInicioFormatada;
        $evento->data_fim         = $dataFimFormatada;
        $evento->endereco         = $request->input('endereco');
        $evento->ativo            = $request->input('ativo');

        //Trata e salva a imagem nova
        if ($request->hasFile('imagem')) {

          //Deleta a imagem antiga se houver
          if(!empty($evento->imagem)){
              unlink('uploadsDoUsuario'.DIRECTORY_SEPARATOR.$evento->imagem);
          }

          $file = $request->file('imagem');
          $filename  = time() . $evento->id .'.' . $file->getClientOriginalExtension();
          $path = public_path('uploadsDoUsuario/' . $filename);
          Image::make($file->getRealPath())->resize('600','400')->save($path);
          $evento->imagem = $filename;
        }

        if($evento->save()){
          return redirect()->action('Backend\EventosController@index')
          ->with('status', 'Evento '. $evento->titulo.' atualizado.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $evento = Evento::findOrFail($id);

      //Deleta a imagem se houver
      if(!empty($evento->imagem)){
          unlink('uploadsDoUsuario'.DIRECTORY_SEPARATOR.$evento->imagem);
      }

      if($evento->delete()){
        return redirect()->action('Backend\EventosController@index')
        ->with('status', 'Evento '. $evento->titulo.' excluído.');
      }
    }

}
