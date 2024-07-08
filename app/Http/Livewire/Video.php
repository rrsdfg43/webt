<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Str;

class Video extends Component
{

    public $urls;

    public $capitulo;

    public function mount($capitulos)
    {
        $this->urls = $capitulos->opcion1;
    }

    public function render()
    {
        return view('livewire.video');
    }

    public function loadVideo()
    {
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->get('https://www.amazon.com/drive/v1/shares/'. $this->urls .'?resourceVersion=V2&ContentType=JSON&_=1649363862331');

            $key = json_decode($response->getBody());

            $id = $key->nodeInfo->id;
    
            $response2 = $client->get('https://www.amazon.com/drive/v1/nodes/' . $id . '/children?asset=ALL&limit=1&searchOnFamily=false&tempLink=true&shareId='. $this->urls .'&offset=0&resourceVersion=V2&ContentType=JSON&_=1649366423043');
    
            $url = json_decode($response2->getBody());
    
            $this->capitulo = $url->data[0]->tempLink;
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $urls = Str::before($this->urls, '.');

            $response = $client->get('https://www.amazon.com/drive/v1/search/groups/'. $urls .'?&searchContext=groups&tempLink=true&groupShareToken='. $this->urls .'&resourceVersion=V2&ContentType=JSON');

            $url = json_decode($response->getBody());
    
            $this->capitulo = $url->data[0]->tempLink;
        }
    }
}
