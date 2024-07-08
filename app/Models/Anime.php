<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Entrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class Anime extends Model
{
    use HasFactory;

    protected $guarded = ['id_categoria'];

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }
    
    public function capitulos()
    {
        return $this->belongsToMany(Capitulo::class);
    }

    public function latestorder()
    {
        return $this->hasMany(Capitulo::class);
    }

    public function scopeCategoria($query, $request)
    {
        $categoria = $request->genre;
        $year = $request->year;
        $type = $request->type;
        $state = $request->state;
        $q = $request->q;
        if($categoria){
            $query->whereHas('categorias', function ($q) use ($categoria) {
                $q->whereIn('categoria_id', $categoria);
            });
        }
        if($year){
            $query->whereIn('year', $year);
        }
        if($type){
            $query->where('tipo', 'like', $type);
        }
        if($state){
            $query->where('estado', 'like', $state);
        }
        if($q){
            $query->where('titulo', 'like', '%'.$q.'%')
            ->orWhere('keywords', 'like', '%'.$q.'%');
        }
        else{
            $query->get();
        }
    }

    public function setTituloAttribute($titulo)
    {
        $this->attributes['titulo'] = $titulo;
        $this->attributes['url'] = Str::slug($titulo);
    }

    public function setImageAttribute($image)
    {
        $image = $image->store('public/thumbs');

        $this->attributes['image'] = Storage::url($image);
    }

    public function setMiniatureAttribute($miniature)
    {
        $image = $miniature->store('public/thumbs');

        $this->attributes['miniature'] = Storage::url($image);
    }
}
