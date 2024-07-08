<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Categoria;
use App\Models\Capitulo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\AnimeValidationRequest;
use Illuminate\Support\Facades\Storage;

class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anime = Anime::get();
        $capitulo = Capitulo::take(8)->get();
        return view('admin.animes.index', compact('anime', 'capitulo'));
    }

    public function show(Anime $anime)
    {
        return view('show', [
            'anime' => $anime
        ]);
    }

    public function create()
    {
        $anime = new Anime;
        $categoria = Categoria::get();
        $id_categoria = Anime::take(1)->get();
        
        return view('admin.animes.create', compact('anime', 'categoria', 'id_categoria'));
    }

    public function store(AnimeValidationRequest $request)
    {
        
        $anime = Anime::create($request->all());
        
        if($request->id_categoria){
        $anime->categorias()->attach($request->id_categoria);
        return redirect()->route('admin.home');
        }
    }

    public function edit(Anime $anime)
    {
       
        $categoria = Categoria::get();
        $id_categoria = Anime::with('Categorias')->find($anime->id);
        $id_categoria = $id_categoria->categorias;
        
        return view('admin.animes.edit', compact('anime', 'categoria', 'id_categoria'));
    }

    public function update(Anime $anime, AnimeValidationRequest $request)
    {
        if($request->image){
        $url = Str::replace('storage', 'public', $anime->image);
        Storage::delete($url);
        }
        if($request->miniature){
        $url = Str::replace('storage', 'public', $anime->miniature);
        Storage::delete($url);
        }
        $anime->update($request->except('id_categoria'));
        $anime->categorias()->sync($request->id_categoria);
        return redirect()->route('admin.home');
    }

    public function destroy(Anime $anime, )
    {
        $url = Str::replace('storage', 'public', $anime->image);
        
        Storage::delete($url);

        $url = Str::replace('storage', 'public', $anime->miniature);
        Storage::delete($url);

        $anime->delete();

        return redirect()->route('admin.home');
    }
}

