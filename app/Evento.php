<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Evento extends Model
{
  use PresentableTrait;

  protected $presenter = 'App\Presenters\EventoPresenter';

  protected $table = 'eventos';

  protected $guarded = ['id'];

  public $timestamps = false;

  public function categoria(){
      return $this->belongsTo('App\Categoria');
  }

  public function departamento(){
      return $this->belongsTo('App\Departamento');
  }

  public function usuario(){
      return $this->belongsTo('App\User');
  }

  public function comentarios()
    {
        return $this->hasMany('App\Comentario');
    }

}
