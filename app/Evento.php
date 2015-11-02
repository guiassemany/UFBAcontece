<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

use App\Participante;

class Evento extends Model
{
  use PresentableTrait;

  protected $presenter = 'App\Presenters\EventoPresenter';

  protected $table = 'eventos';

  protected $guarded = ['id'];

  public $timestamps = true;

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

  public function participantes()
  {
    return $this->hasMany('App\Participante');
  }

  public function usuarioEstaParticipando($usuarioId, $eventoId)
  {
    $participante = Participante::where('usuario_id', $usuarioId)->where('evento_id', $eventoId)->first();
    if(empty($participante)){
      return false;
    }
    return true;
  }

}
