<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;
use Carbon\Carbon;

class ComentarioPresenter extends Presenter {

    public function dataHoraFormatada()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y \à\s H:i:s');
    }

}
