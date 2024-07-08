<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\Capitulo;
use App\Models\Categoria;
use App\Models\Pivot;
use DateTimeZone;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Date;

class GlobalController extends Controller
{
    public function index()
    {
        $anime = Anime::take(12)->orderBy('id', 'desc')->get();
        $capitulo = Capitulo::all();
        $animes = Anime::with('capitulos')->get();
        $capitulos = Anime::orderBy(
            Pivot::select('created_at')
                ->whereColumn('anime_capitulo.anime_id', 'animes.id')
                ->latest()
                ->take(1),
            'desc'
        )->get()->map(function ($animes) {
            $animes->setRelation('capitulos', $animes->capitulos->sortByDesc('id')->take(1));
            return $animes;
        })->take(8);

        return view('home', compact('anime', 'capitulo', 'capitulos', 'animes'));
    }

    public function show(Capitulo $capitulo)
    {


        $capitulos = Capitulo::with('animes')->find($capitulo->id);
        $anime = $capitulos->animes[0];

        $animes = Anime::with('capitulos')->find($anime->id);

        $allanimes = Anime::inRandomOrder()->take(4)->get();

        $tablacapitulos = $animes->capitulos;

        $capitulo = Anime::with('capitulos')->where('id', 'like', $anime->id)->orderBy('id', 'desc')->take(8)->get()->map(function ($animes) {
            $animes->setRelation('capitulos', $animes->capitulos->sortByDesc('id')->take(1));
            return $animes;
        });

        $animesa = Anime::find($anime->id);
        $anigenre = $animesa->categorias[0];
        return view('serie', compact('capitulos', 'tablacapitulos', 'animes', 'allanimes', 'animesa', 'anigenre', 'capitulo'));
    }

    public function categoria(Request $request)
    {
        $animes = Anime::categoria($request)->paginate(20);
        $categorias = Categoria::get();
        $requests = $request->genre;
        $rang = collect()->range(1990, 2024);
        return view('directorio', compact('animes', 'categorias', 'request', 'requests', 'rang'));
    }

    public function guia(Request $request)
    {
        $animes = Anime::categoria($request)->paginate(22);
        $categorias = Categoria::get();
        $requests = $request->genre;
        $rang = collect()->range(1990, 2022);
        return view('guide', compact('animes', 'categorias', 'request', 'requests', 'rang'));
    }

    public function peticion(Request $request)
    {
        $animes = Anime::categoria($request)->paginate(22);
        $categorias = Categoria::get();
        $requests = $request->genre;
        $rang = collect()->range(1990, 2022);
        return view('peticion', compact('animes', 'categorias', 'request', 'requests', 'rang'));
    }
}
