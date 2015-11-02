<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Comentario;
use Auth;

class ComentariosController extends Controller
{
  public function store(Request $request, $eventoId)
  {

    $comentario = new Comentario;
    $comentario->evento_id = $request->get('evento_id');
    $comentario->usuario_id = Auth::user()->id;
    $comentario->comentario = $request->get('comentario');

    if($comentario->save()){
        return redirect()->action('BackendController@index')
        ->with('statusComentario', 'Comentário adicionado');
    }
  }

  public function destroy($id){
    $comentario = Comentario::findOrFail($id);
    if($comentario->delete()){
      return redirect()->action('BackendController@index')
      ->with('statusComentario', 'Comentário exlcuído');
    }
  }
}
