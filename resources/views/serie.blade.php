@extends('layout')

@if ($capitulos->capituloN == '1')

@section('title', $animes->titulo)

@else

@section('title', $animes->titulo . ' ' . 'Cap' . ' ' . $capitulos->capituloN)

@endif

@section('description', 'Ver'.$animes->titulo . ' ' . 'Cap' . ' ' . $capitulos->capituloN)

@section('content')

{{-- details --}}
<section class="section section--head section--head-fixed section--gradient section--details-bg">
<div class="container">
    {{-- article --}}
    <div class="article">
        <div class="row">
            <div class="col-12 col-xl-8">
                {{-- article content --}}
                <div class="article__content">
                   
                        <h1>{{ $animes->titulo . ' ' . 'Cap' . ' ' . $capitulos->capituloN }}</h1>
                    
                </div>
                {{-- end article content --}}
            </div>


{{-- video player --}}
<div class="col-12 col-xl-8">
    <div class="content">
        <div class="contenido clearfix">
            <div class="video1">
                @livewire('video', ['capitulos' => $capitulos])
                </div>
            </div>
        </div>
        
        @livewire('capitulos', ['animes' => $animes])
        @livewireScripts
        @if ($animes->tipo == 'TV')    
        <div class="article__actions article__actions--details">
            <div class="article__arrows mt-0">
                @foreach ($capitulo as $animeItem)
                    @foreach ($animeItem->capitulos as $capituloItem)  
                    @if ($capitulos->capituloN > 1)    
                    <a class="categories__item mt-0" href="{{ route('serie', $animes->url.'-'.$capitulos->capituloN-1) }}"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M14.53 18.53a.75.75 0 0 1-1.06 0l-6-6a.75.75 0 0 1 0-1.06l6-6a.75.75 0 1 1 1.06 1.06L9.06 12l5.47 5.47a.75.75 0 0 1 0 1.06Z"/></svg> Anterior capitulo</a>
                    @endif
                    @if ($capituloItem->capituloN > $capitulos->capituloN )
                    <a class="categories__item mt-0" href="{{ route('serie', $animes->url.'-'.$capitulos->capituloN+1) }}"> Siguiente capitulo <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M9.47 5.47a.75.75 0 0 1 1.06 0l6 6a.75.75 0 0 1 0 1.06l-6 6a.75.75 0 1 1-1.06-1.06L14.94 12 9.47 6.53a.75.75 0 0 1 0-1.06Z"/></svg></a>
                    @endif
                    @endforeach
                    @endforeach
            </div>
            {{-- add .active class --}}
            <button class="article__favorites col-sm-3 mt-0" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16,2H8A3,3,0,0,0,5,5V21a1,1,0,0,0,.5.87,1,1,0,0,0,1,0L12,18.69l5.5,3.18A1,1,0,0,0,18,22a1,1,0,0,0,.5-.13A1,1,0,0,0,19,21V5A3,3,0,0,0,16,2Zm1,17.27-4.5-2.6a1,1,0,0,0-1,0L7,19.27V5A1,1,0,0,1,8,4h8a1,1,0,0,1,1,1Z"></path></svg> Add to favorites</button>
        </div>
        @endif
            {{-- article content --}}
            <div class="article__content">
                <h1>{{ $animes->titulo }}</h1>                    
                    <ul class='list'>
                    <li><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path d='M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z'/></svg>{{ $animes->rating }}</li>
                    @foreach ($animesa->categorias as $categoria)
                <a href="{{ route('directorio', 'genre%5B%5D%='.$categoria->id) }}" class="categories__item mt-0">{{ $categoria->nombre_categoria }}</a>
                @endforeach
                    <li>{{ $animes->year }}</li>
                    <li>{{ $animes->duration.' '.'min' }}</li>
                </ul>
                <div class='portext'>
                    <div class="card__hover">
                    <img src="{{ asset($animes->image) }}" alt="">
                    </div>
                    <p class='sinopsis text-justify hidden__text' style="margin">{{ $animes->descripcion }}</p>
                    <span class="text-show">
                        <div class="row justify-content-center">
                        <a class="article__show svg__rotate"><i class="fa-solid fa-angle-down"></i></a>
                        </div>
                    </span>
                    </div>

                </div>
            {{-- end article content --}}
            <div class="col-12">
            {{-- comments and reviews --}}
            <div class="comments">
                {{-- tabs nav --}}
                <ul class="nav nav-tabs comments__title comments__title--tabs" id="comments__tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">
                            <h4>Comentarios</h4>
                            <span>5</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">
                            <h4>Reviews</h4>
                            <span>3</span>
                        </a>
                    </li>
                </ul>
                {{-- end tabs nav --}}

                {{-- tabs --}}
                <div class="tab-content">
                    {{-- comments --}}
                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
                    <div id="disqus_thread"></div>
<script>
/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://anikawa.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    </div>
                    {{-- end comments --}}

                    {{-- reviews --}}
                    <div class="tab-pane fade" id="tab-2" role="tabpanel">
            
                    </div>
                    {{-- end reviews --}}
                </div>
                {{-- end tabs --}}		
            </div>
            {{-- end comments and reviews --}}
        </div>

        </div>
        {{-- end video player --}}
        <div class="col-12 col-xl-4">
            <div class="sidebar sidebar--mt">
                
                {{-- subscribe --}}
                <div class="row">
                    <div class="col-12">
                        <form action="#" class="subscribe">
                            <h4 class="subscribe__title">Unete Al Discord</h4>
                            <p class="subscribe__text">entra a nuestro Discord</p>
                            <button type="button" class="sign__btn"><i class="fa-brands fa-discord"></i></button>
                        </form>
                    </div>
                </div>
                {{-- end subscribe --}}

                {{-- new items --}}
                <div class="row row--grid">
                    <div class="col-12">
                        <h5 class="sidebar__title">Mira También</h5>
                    </div>
                        @foreach ($allanimes as $allanimesItem)
                            
                        <div class='col-6 col-sm-4 col-md-3 col-xl-6'>
                            <div class='card'>
                                    <a href="{{ route('serie', $allanimesItem->url.-1.) }}" class='card__cover'>
                                    <img src="{{ asset($allanimesItem->image) }}" alt="">
                                    <svg width='22' height='22' viewBox='0 0 22 22' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M11 1C16.5228 1 21 5.47716 21 11C21 16.5228 16.5228 21 11 21C5.47716 21 1 16.5228 1 11C1 5.47716 5.47716 1 11 1Z' stroke-linecap='round' stroke-linejoin='round'/><path fill-rule='evenodd' clip-rule='evenodd' d='M14.0501 11.4669C13.3211 12.2529 11.3371 13.5829 10.3221 14.0099C10.1601 14.0779 9.74711 14.2219 9.65811 14.2239C9.46911 14.2299 9.28711 14.1239 9.19911 13.9539C9.16511 13.8879 9.06511 13.4569 9.03311 13.2649C8.93811 12.6809 8.88911 11.7739 8.89011 10.8619C8.88911 9.90489 8.94211 8.95489 9.04811 8.37689C9.07611 8.22089 9.15811 7.86189 9.18211 7.80389C9.22711 7.69589 9.30911 7.61089 9.40811 7.55789C9.48411 7.51689 9.57111 7.49489 9.65811 7.49789C9.74711 7.49989 10.1091 7.62689 10.2331 7.67589C11.2111 8.05589 13.2801 9.43389 14.0401 10.2439C14.1081 10.3169 14.2951 10.5129 14.3261 10.5529C14.3971 10.6429 14.4321 10.7519 14.4321 10.8619C14.4321 10.9639 14.4011 11.0679 14.3371 11.1549C14.3041 11.1999 14.1131 11.3999 14.0501 11.4669Z' stroke-linecap='round' stroke-linejoin='round'/></svg>
                                </a>
                                <button class='card__add' type='button'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path d='M16,2H8A3,3,0,0,0,5,5V21a1,1,0,0,0,.5.87,1,1,0,0,0,1,0L12,18.69l5.5,3.18A1,1,0,0,0,18,22a1,1,0,0,0,.5-.13A1,1,0,0,0,19,21V5A3,3,0,0,0,16,2Zm1,17.27-4.5-2.6a1,1,0,0,0-1,0L7,19.27V5A1,1,0,0,1,8,4h8a1,1,0,0,1,1,1Z'/></svg></button>
                                <span class='card__rating'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path d='M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z'/></svg> 8.3</span>
                                <h3 class='card__title'><a href='{{ route('serie', $allanimesItem->url.'-1') }}'>{{ $allanimesItem->titulo }}</a></h3>
                                <ul class='card__list'>
                                    <li>{{ ($allanimesItem->tipo == 'MOVIE') ? 'Pelicula':$allanimesItem->tipo }}</li>
                                    <li>Action</li>
                                    <li>{{ $allanimesItem->year }}</li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                </div>
                {{-- end new items --}}
            </div>
        </div>
        </div>
    </div>

    <div class="row">
        
    </div>
</div>
{{-- end article --}}
</div>
</section>
{{-- end details --}}

{{-- similar --}}
<section class="section">

</section>
{{-- end similar --}}
@endsection

@section('scripts')
@include('scripts')
@endsection
