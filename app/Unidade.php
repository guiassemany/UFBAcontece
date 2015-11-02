<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
  protected $table = 'unidades';

  protected $guarded = ['id'];

  public $timestamps = false;

  public function usuario(){
    return $this->hasMany('App\User');
  }

}
