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

class EventosController extends Controller
{

    public function index()
    {
      $eventos = Evento::with('categoria', 'departamento')->paginate(15);
      return view('backend.eventos.index', compact('eventos'));
    }

    public function create()
    {
        $categorias = Categoria::lists('titulo', 'id');
        $departamentos = Departamento::lists('titulo', 'id');
        return view('backend.eventos.create', compact('categorias','departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventoRequest $request)
    {
      $file = $request->file('imagem');
      $filename  = time() . '.' . $file->getClientOriginalExtension();
      $path = public_path('uploadsDoUsuario/' . $filename);
      Image::make($file->getRealPath())->resize('200','200')->save($path);

      $evento = new Evento(array(
        'categoria_id' => $request->get('categoria_id'),
        'departamento_id' => $request->get('departamento_id'),
        'titulo' => $request->get('titulo'),
        'descricao'  => $request->get('descricao'),
        'data_inicio'  => $request->get('data_inicio'),
        'data_fim'  => $request->get('data_fim'),
        'endereco'  => $request->get('endereco'),
        'ativo'  => $request->get('ativo'),
        'imagem'  => $filename
      ));

      if(!$evento->save()){
        return redirect()->back()
        ->with('status', 'Erro ao cadastrar Evento.');
      }

      return redirect()->action('Backend\EventosController@index')
      ->with('status', 'Evento '. $request->get('titulo') .' cadastrado.');



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
      return view('backend.eventos.edit', compact('evento', 'categorias', 'departamentos'));
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

        //Atribui os parametros aos campos correspondentes
        $evento->titulo           = $request->input('titulo');
        $evento->categoria_id     = $request->input('categoria_id');
        $evento->departamento_id  = $request->input('departamento_id');
        $evento->descricao        = $request->input('descricao');
        $evento->data_inicio      = $request->input('data_inicio');
        $evento->data_fim         = $request->input('data_fim');
        $evento->endereco         = $request->input('endereco');
        $evento->ativo            = $request->input('ativo');

        //Trata a imagem
        if ($request->hasFile('imagem')) {
          $file = $request->file('imagem');
          $filename  = time() . '.' . $file->getClientOriginalExtension();
          $path = public_path('uploadsDoUsuario/' . $filename);
          Image::make($file->getRealPath())->resize('200','200')->save($path);
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
      if($evento->delete()){
        return redirect()->action('Backend\EventosController@index')
        ->with('status', 'Evento '. $evento->titulo.' excluído.');
      }
    }
}
