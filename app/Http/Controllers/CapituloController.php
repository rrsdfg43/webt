<?php

namespace App\Http\Controllers;

use App\Http\Requests\CapituloValidationRequest;
use App\Models\Capitulo;
use App\Models\Anime;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CapituloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anime = Capitulo::get();

        return view('admin.capitulos.index', compact('anime'));
    }

    public function show(Anime $capitulo)
    {
        $capitulo = Anime::with('capitulos')->find($capitulo->id);

        $capitulos = $capitulo->capitulos;
        return view('admin.capitulos.show', compact('capitulos', 'capitulo'));
    }

    public function create(Request $request)
    {
        $anime = Anime::get();
        $capitulos = new Capitulo;

        $capitulo = new Capitulo();

        $tiempoO = new Capitulo;


        if ($request->id) {
            $animes = Anime::with('capitulos')->find($request->id);

            $ncapitulos = $animes->capitulos->last();
        } else {
            $animes = new Anime;
            $ncapitulos = new Capitulo;
        }

        return view('admin.capitulos.create', compact('anime', 'capitulos', 'capitulo', 'request', 'animes', 'ncapitulos', 'tiempoO'));
    }

    public function store(Capitulo $capitulo, CapituloValidationRequest $request)
    {
        $capitulos = Str::afterLast($request->titulo, '-');
        $animes = Anime::with('capitulos')->find($request->anime_id);
        $ncapitulos = $animes->capitulos->last();
        $capitulo = Capitulo::create($request->all());

        $capitulo->animes()->attach($request->anime_id);

        $anime = Anime::find($request->anime_id);

        return redirect()->route('admin.capitulos.show', $anime);
    }

    public function edit(Capitulo $capitulo)
    {
        $anime = Anime::get();
        $capitulos = Capitulo::with('Animes')->find($capitulo->id);
        $capitulos = $capitulos->animes[0];
        $request = new Request;

        $animes = new Anime;

        $tiempoO = $capitulo->convtime($capitulo);

        return view('admin.capitulos.edit', compact('anime', 'capitulo', 'capitulos', 'request', 'tiempoO'));
    }

    public function update(Capitulo $capitulo, CapituloValidationRequest $request)
    {
        $capitulo->update($request->all());
        $capitulo->animes()->sync($request->anime_id);
        $anime = Anime::find($request->anime_id);
        return redirect()->route('admin.capitulos.show', $anime);
    }

    public function destroy(Capitulo $capitulo)
    {
        $capitulo->delete();
        $capitulos = Str::beforeLast($capitulo->slug, '-');
        return redirect()->route('admin.capitulos.show', $capitulos);
    }
}
