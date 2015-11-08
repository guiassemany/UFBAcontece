<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventoPublicacaoComentario extends Model
{
  protected $table = 'eventos_publicacoes_comentarios';

  protected $guarded = ['id'];

  public $timestamps = true;

  public function publicacao()
  {
    return $this->belongsTo('App\EventoPublicacao');
  }
}
