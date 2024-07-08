<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Capitulo extends Model
{
    protected $guarded = ['capituloN2', 'capituloL2', 'capituloO2', 'anime_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function animes()
    {
        return $this->belongsToMany(Anime::class)->withTimestamps();
    }

    public function setTituloAttribute($titulo)
    {
        $this->attributes['titulo'] = $titulo;
        $this->attributes['slug'] = Str::slug($titulo);
        $this->attributes['capituloN'] = Str::afterLast($titulo, '-');
    }

    public function setTiempoNAttribute($tiempoN)
    {
        $this->attributes['tiempoN'] = $tiempoN * 60/1;
    }

    public function setTiempoOAttribute($tiempoO)
    {
        $this->attributes['tiempoO'] = $tiempoO * 60/1;
    }

    public function setTiempoLAttribute($tiempoL)
    {
        $this->attributes['tiempoL'] = $tiempoL * 60/1;
    }

    public function setOpcion1Attribute($opcion1)
    {
        $this->attributes['opcion1'] = Str::afterLast($opcion1, '/');
    }

    public function savetime($t1)
    {
        return $t1 * 60 / 1;
    }

    public function convtime($t1)
    {
        return $t1 = [
            "tiempoNS" => $t1->tiempoN / 60 * 1,
            "tiempoOS" => $t1->tiempoO / 60 * 1,
            "tiempoLS" => $t1->tiempoL / 60 * 1,
        ];
    }
}
