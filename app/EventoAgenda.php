<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class EventoAgenda extends Model
{
  use PresentableTrait;

  protected $presenter = 'App\Presenters\EventoAgendaPresenter';

  protected $table = 'eventos_agendas';

  protected $guarded = ['id'];

  public $timestamps = true;

  public function evento()
  {
    return $this->belongsTo('App\Evento');
  }
}
