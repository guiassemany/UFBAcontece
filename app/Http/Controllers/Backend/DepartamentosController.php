<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Departamento;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DepartamentosController extends Controller
{

    public function index()
    {
        $departamentos = Departamento::paginate(15);
        return view('backend.admin.departamentos.index', compact('departamentos'));
    }

    public function store(Request $request)
    {
        $departamento = $request->only('titulo');
        if(Departamento::create($departamento)){
            return redirect()->action('Backend\DepartamentosController@index')
            ->with('status', 'Departamento '. $departamento['titulo'].' adicionado.');
        }
    }

    public function edit($id)
    {
        $departamento = Departamento::findOrFail($id);
        return view('backend.admin.departamentos.edit', compact('departamento'));
    }

    public function update(Request $request, $id)
    {
        $departamento = Departamento::findOrFail($id);
        $departamento->titulo = $request->input('titulo');
        if($departamento->save()){
          return redirect()->action('Backend\DepartamentosController@index')
          ->with('status', 'Departamento '. $departamento->titulo.' atualizado.');
        }
    }

    public function destroy($id)
    {
        $departamento = Departamento::findOrFail($id);
        if($departamento->delete()){
          return redirect()->action('Backend\DepartamentosController@index')
          ->with('status', 'Departamento '. $departamento->titulo.' excluído.');
        }
    }
}
