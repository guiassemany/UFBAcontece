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

    public function status(){

      if($this->ativo == 'N'){
        return "Inativo";
      }

      return "Ativo";

    }

}
