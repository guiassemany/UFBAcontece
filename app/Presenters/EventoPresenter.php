<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;
use Carbon\Carbon;

class EventoPresenter extends Presenter {

    public function dataInicioFormatada()
    {
        return Carbon::parse($this->data_inicio)->format('d/m/Y');
    }

    public function dataFimFormatada()
    {
        return Carbon::parse($this->data_fim)->format('d/m/Y');
    }

    public function createdAtFormatada()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y \à\s H:i:s');
    }

    public function status(){

      if($this->ativo == 'N'){
        return "Pendente de Aprovação";
      }

      return "Aprovado e Ativo";

    }

}
