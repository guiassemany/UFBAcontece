<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{

  protected $table = 'eventos_participantes';

  protected $guarded = ['id'];

  public $timestamps = false;

  public function evento()
  {
    return $this->belongsTo('App\Evento');
  }

  public function usuario()
  {
    return $this->belongsTo('App\User');
  }

}
