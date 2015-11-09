<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\EventoPublicacaoCurtida;
use Auth;

class EventosPublicacoesCurtidasController extends Controller
{
  public function store(Request $request, $publicacaoId)
  {
    $curtida = new EventoPublicacaoCurtida();
    $curtida->usuario_id = Auth::user()->id;
    $curtida->publicacao_id  = $publicacaoId;
    $curtida->save();
    return redirect()->action('BackendController@detalharEvento', $curtida->publicacao->evento_id)
    ->with('status', 'Publicação Curtida.')
    ->with('aba', 'publicacoes');
  }

  public function destroy($publicaoId)
  {
    $curtida = EventoPublicacaoCurtida::where('usuario_id', Auth::user()->id)->where('publicacao_id', $publicaoId)->first();
    if($curtida->delete()){
      return redirect()->action('BackendController@detalharEvento', $curtida->publicacao->evento_id)
      ->with('status', 'Publicação excluída.')
      ->with('aba', 'publicacoes');
    }
  }
}
