<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\EventoAgenda;

use Carbon\Carbon;

use Response;

class EventosAgendasController extends Controller
{
    public function listarAtividadesAgenda($eventoId)
    {
      $atividades = EventoAgenda::where('evento_id', '=' ,$eventoId)->get();
      return Response::json($atividades);
    }
    public function store(Request $request, $eventoId)
    {

      //Prepara a data e hora em um array
      $dataHora = explode ('-', $request->input('dataHora'));

      $dataHoraInicio = Carbon::createFromFormat('d/m/Y H:i A', rtrim($dataHora[0]))->toDateTimeString();
      $dataHoraFim    = Carbon::createFromFormat('d/m/Y H:i A', ltrim($dataHora[1]))->toDateTimeString();

      $agenda = new EventoAgenda;
      $agenda->evento_id      = $eventoId;
      $agenda->diaHora_inicio = $dataHoraInicio;
      $agenda->diaHora_fim    = $dataHoraFim;
      $agenda->titulo         = $request->input('titulo');
      $agenda->sobre          = $request->input('sobre');

      if($agenda->save())
      {
        return redirect()->action('BackendController@detalharEvento', $eventoId)
        ->with('status', 'Registro da agenda incluído.')
        ->with('aba', 'admAgenda');
      }

    }

    public function destroy($agendaId)
    {
        $agenda = EventoAgenda::findOrFail($agendaId);
        if($agenda->delete())
        {
          return redirect()->action('BackendController@detalharEvento', $agenda->evento_id)
          ->with('status', 'Registro da agenda excluído.')
          ->with('aba', 'admAgenda');
        }
    }
}
