<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;
use Carbon\Carbon;

class UsuarioPresenter extends Presenter {

    public function createdAtFormatada()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }

}
