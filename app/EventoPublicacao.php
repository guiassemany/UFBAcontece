<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventoPublicacao extends Model
{
  protected $table = 'eventos_publicacoes';

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

  public function comentarios()
  {
    return $this->hasMany('App\EventoPublicacaoComentario');
  }

  public function curtidas()
  {
    return $this->hasMany('App\EventoPublicacaoCurtida');
  }

}
