<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Comentario extends Model
{
  use PresentableTrait;
  
  protected $presenter = 'App\Presenters\ComentarioPresenter';

  protected $table = 'eventos_comentarios';

  protected $guarded = ['id'];

  public $timestamps = true;

  public function evento()
  {
    return $this->belongsTo('App\Evento');
  }

  public function usuario()
  {
    return $this->belongsTo('App\User');
  }

}
