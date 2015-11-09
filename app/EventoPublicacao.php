<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

use App\EventoPublicacaoCurtida;
use Auth;

class EventoPublicacao extends Model
{
  use PresentableTrait;

  protected $presenter = 'App\Presenters\EventoPublicacaoPresenter';

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
    return $this->hasMany('App\EventoPublicacaoCurtida', 'publicacao_id');
  }

  public function usuarioCurtiu($publicaoId)
  {
    $curtiu = EventoPublicacaoCurtida::where('usuario_id', Auth::user()->id)->where('publicacao_id', $publicaoId)->first();
    if(empty($curtiu)){
      return false;
    }
    return true;
  }
}
