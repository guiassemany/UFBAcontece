<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventoPublicacaoCurtida extends Model
{
  protected $table = 'eventos_publicacoes_curtidas';

  protected $guarded = ['id'];

  public $timestamps = true;

  public function publicacao()
  {
    return $this->belongsTo('App\EventoPublicacao');
  }
}
