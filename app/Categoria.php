<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  protected $table = 'categorias';

  protected $guarded = ['id'];

  public $timestamps = false;
}
