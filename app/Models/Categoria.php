<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  protected $guarded = [];

  public function getRouteKeyName()
  {
      return 'nombre_categoria';
  }
  
    public function animes()
  {
    return $this->belongsToMany(Anime::class);
    }
}
