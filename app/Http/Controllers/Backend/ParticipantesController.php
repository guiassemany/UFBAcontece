<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Participante;
use Auth;

class ParticipantesController extends Controller
{
    public function store($eventoId){
      $participante = new Participante;
      $participante->evento_id = $eventoId;
      $participante->usuario_id = Auth::user()->id;
      if($participante->save()){
          return redirect()->action('BackendController@index')
          ->with('statusParticipante', 'Presença confirmada.');
      }
    }

    public function destroy($eventoId){
      $participante = Participante::where('usuario_id', Auth::user()->id)->where('evento_id', $eventoId);
      if($participante->delete()){
        return redirect()->action('BackendController@index')
        ->with('statusParticipante', 'Presença cancelada.');
      }
    }
}
