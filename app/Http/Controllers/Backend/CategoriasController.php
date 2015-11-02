<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Categoria;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoriasController extends Controller
{

    public function index()
    {
        $categorias = Categoria::paginate(15);
        return view('backend.admin.categorias.index', compact('categorias'));
    }

    public function store(Request $request)
    {
        $categoria = $request->only('titulo');
        if(Categoria::create($categoria)){
            return redirect()->action('Backend\CategoriasController@index')
            ->with('status', 'Categoria '. $categoria['titulo'].' adicionada.');
        }
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('backend.admin.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->titulo = $request->input('titulo');
        if($categoria->save()){
          return redirect()->action('Backend\CategoriasController@index')
          ->with('status', 'Categoria '. $categoria->titulo.' atualizado.');
        }
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        if($categoria->delete()){
          return redirect()->action('Backend\CategoriasController@index')
          ->with('status', 'Categoria '. $categoria->titulo.' excluído.');
        }
    }
}
