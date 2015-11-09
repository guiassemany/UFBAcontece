<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;
use Carbon\Carbon;

class EventoAgendaPresenter extends Presenter {

    public function diaHoraInicioFormatada()
    {
        return Carbon::parse($this->diaHora_inicio)->format('d/m/Y \à\s H:i');
    }

    public function diaHoraFimFormatada()
    {
        return Carbon::parse($this->diaHora_fim)->format('d/m/Y \à\s H:i');
    }

    public function createdAtFormatada()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y \à\s H:i:s');
    }

}
