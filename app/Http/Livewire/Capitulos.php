<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Capitulo;
use App\Models\Anime;

class Capitulos extends Component
{

    public $idanime;

    public $search;

    public function mount($animes)
    {
        $this->idanime = $animes->id;
    }

    public function render()
    {

        $animes = Anime::with(['capitulos' => function ($query){
            $query->where('titulo', 'like', '%'.$this->search.'%');
        }])->find($this->idanime);
        
        $capitulos = $animes->capitulos;
        return view('livewire.capitulos', compact('capitulos','animes'));
    }
}
