<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;
use Carbon\Carbon;

class EventoPublicacaoPresenter extends Presenter {

    public function createdAtFormatada()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y \à\s H:i:s');
    }

}
