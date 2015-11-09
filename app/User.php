<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'email', 'senha'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['senha', 'remember_token'];

    public function getAuthPassword() {
        return $this->senha;
    }

    public function isAdmin(){
      if($this->admin == 'Y'){
        return true;
      }
      return false;
    }

    public function donoDaPublicacao($publicacaoUsuarioId){
      if($this->id == $publicacaoUsuarioId){
        return true;
      }
      return false;
    }

    public function donoDoEventoOuAdmin($eventoUsuarioId){
      if($this->id == $eventoUsuarioId || $this->isAdmin()){
        return true;
      }
      return false;
    }

    public function curso(){
      return $this->belongsTo('App\Curso');
    }

    public function unidade(){
      return $this->belongsTo('App\Unidade');
    }

    public function eventos(){
      return $this->hasMany('App\Evento', 'usuario_id');
    }

}
