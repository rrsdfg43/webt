@extends('layout')

@section('title', 'Anime Online - Anikawa')

@section('description', 'Anikawa es un sitio para ver anime en español online y gratis. Descubre la mejor web para ver anime en español sub y latino.')

@section('css')
<link
rel="stylesheet"
href="https://unpkg.com/swiper/swiper-bundle.min.css"
/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>

@endsection

@section('content')

        <div class="home">
		{{-- Swiper --}}
<div class="container">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
					<a class="swiper-slide card__cover" style="display:flex">
						<img src="https://www.themoviedb.org/t/p/original/kLx1IuDOeAK6MhNAD7lUPdkhw2G.jpg" alt="">
						<span class="gray"></span>
					<div class="home__swiper">
							<h1>Kimetsu No Yaiba</h1>
							<div class="col-sm-10">
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut sed odit laboriosam reprehenderit, vitae aliquam sequi nemo at animi, alias consequuntur a ducimus dolorum obcaecati quo nostrum est ipsum iusto.</p>
							</div>
							<button>Mirar Ahora</button>
						</div>
					</a>
					<a class="swiper-slide card__cover" style="display:flex"><img src="https://www.themoviedb.org/t/p/original/kLx1IuDOeAK6MhNAD7lUPdkhw2G.jpg" alt="">
						<span class="purple"></span>
						<div class="home__swiper">
							<h1>Kimetsu No Yaiba</h1>
							<div class="col-sm-10">
								<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui eveniet temporibus veniam ab maxime quam ut architecto numquam cupiditate eligendi voluptatum labore, necessitatibus enim error quia obcaecati ad distinctio placeat.</p>
							</div>
							<button>Mirar Ahora</button>
						</div>
					</a>
					<a class="swiper-slide card__cover" style="display:flex"><img src="https://www.themoviedb.org/t/p/original/4Soyn6zU3BgWQhvaC5BanxGc4Ks.jpg" alt="">
						<span class="orange"></span>
						<div class="home__swiper">
							<h1>Kimetsu No Yaiba</h1>
							<div class="col-sm-10">
								<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam numquam doloribus debitis? Ullam dolorem aut id culpa fugiat, explicabo magni, maiores voluptate numquam deleniti rem nam sint atque non iure.</p>
							</div>
							<button>Mirar Ahora</button>
						</div>
					</a>
				</div>
				<span></span>
				<div class="swiper-pagination"></div>
			</div>
        </div>
        </div>
            {{-- categories --}}
            <section class="section section--head">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="section__title section__border">Últimos Episodios</h2>
					<p class="section__text">Mira Los Episodios Recientes De Tus Animes Favoritos</p>
				</div>
			</div>

			<div class="row row--grid">
                @foreach ($capitulos as $animeItem)    
				@foreach ($animeItem->capitulos as $capituloItem)	
				<div class="col-6 col-sm-6 col-lg-4 col-xl-3">
					<a href="{{ route('serie', $capituloItem->slug) }}" class="category">
                        <div class="category__cover">
                            <img src="{{ asset($animeItem->miniature) }}" alt="">
						</div>
						<h3 class="category__title">{{ $animeItem->titulo }}</h3>
						<span class="category__value">Cap {{ $capituloItem->capituloN }}</span>
					</a>
				</div>
				@endforeach
                @endforeach
			</div>
		</div>
	</section>
	{{-- endcategories --}}
	<div class="container">
		<h2 class="section__title"><i class="fa fa-fire" aria-hidden="true"></i> En Tendencia</h2>
	</div>
					<div class="trend__cover">
						<div class="container">
							<img src="https://i.ibb.co/DCrJMcf/attascsiofsdfsdfs.png" alt="">
						</div>
					</div>
    {{-- catalog --}}
    <div class="catalog">
		<div class="container">
			<div class="row">
				<div class="col-12">
                    <h2 class="section__title section__border">Últimos Animes</h2>
					<div class="row row--grid">
                        @foreach ($anime as $animeItem)
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <a href="{{ route('serie', $animeItem->url.'-1') }}" class="card__cover">
                                    <img src="{{ asset($animeItem->image) }}" alt="">
									<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11 1C16.5228 1 21 5.47716 21 11C21 16.5228 16.5228 21 11 21C5.47716 21 1 16.5228 1 11C1 5.47716 5.47716 1 11 1Z" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M14.0501 11.4669C13.3211 12.2529 11.3371 13.5829 10.3221 14.0099C10.1601 14.0779 9.74711 14.2219 9.65811 14.2239C9.46911 14.2299 9.28711 14.1239 9.19911 13.9539C9.16511 13.8879 9.06511 13.4569 9.03311 13.2649C8.93811 12.6809 8.88911 11.7739 8.89011 10.8619C8.88911 9.90489 8.94211 8.95489 9.04811 8.37689C9.07611 8.22089 9.15811 7.86189 9.18211 7.80389C9.22711 7.69589 9.30911 7.61089 9.40811 7.55789C9.48411 7.51689 9.57111 7.49489 9.65811 7.49789C9.74711 7.49989 10.1091 7.62689 10.2331 7.67589C11.2111 8.05589 13.2801 9.43389 14.0401 10.2439C14.1081 10.3169 14.2951 10.5129 14.3261 10.5529C14.3971 10.6429 14.4321 10.7519 14.4321 10.8619C14.4321 10.9639 14.4011 11.0679 14.3371 11.1549C14.3041 11.1999 14.1131 11.3999 14.0501 11.4669Z" stroke-linecap="round" stroke-linejoin="round"/></svg>
								</a>
								<button class="card__add" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16,2H8A3,3,0,0,0,5,5V21a1,1,0,0,0,.5.87,1,1,0,0,0,1,0L12,18.69l5.5,3.18A1,1,0,0,0,18,22a1,1,0,0,0,.5-.13A1,1,0,0,0,19,21V5A3,3,0,0,0,16,2Zm1,17.27-4.5-2.6a1,1,0,0,0-1,0L7,19.27V5A1,1,0,0,1,8,4h8a1,1,0,0,1,1,1Z"/></svg></button>
								<span class="card__rating"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg>{{ $animeItem->rating }}</span>
								<h3 class="card__title"><a href="{{ route('serie', $animeItem->url.'-1') }}">{{ $animeItem->titulo }}</a></h3>
								<ul class="card__list">
                                    <li>{{ ($animeItem->tipo == 'MOVIE') ? 'Pelicula':$animeItem->tipo }}</li>
									<li>Action</li>
									<li>{{ $animeItem->year }}</li>
								</ul>
							</div>
						</div>
                        @endforeach
				</div>
			</div>		
		</div>
	</div>
	</div>
	{{-- end catalog --}}

    {{-- ultimos animes--}}
    <div class="container">
        <div class="row">
				<h2 class="recommend__title">Recomendado</h2>
				<div class="section__img">
					<div class="rossw">
						<div class="row">
							<div class="col-4">
								<h2>Mi Vecino Totoro</h2>
							</div>
							<div class="col-8">
								<p class="section__text mt-0">Estas extrañas criaturas aún existen en Japón. Probablemente...</p>
							</div>
						</div>
						<div class="col-12">
							<div class="section__text mt-0">Dos chicas jóvenes, Mei y Satsuki, se mudan a una nueva casa cerca del hospital en el que se encuentra su madre. En el patio junto a la casa ,existe un gran árbol que es el hogar de tres Totoros, dioses de la selva.</div>
						</div>
					</div>
					
						<img src="{{ asset('img/to.jpg') }}" alt="">
				</div>
				</div>
    </div>
    {{-- end ultimos animes--}}
        @endsection
@section('scripts')
<script src="https://cdn.plyr.io/3.6.12/plyr.js"></script>

 {{-- Swiper JS --}}
 <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

 {{-- Initialize Swiper --}}
 <script>
var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: true,
		autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        centeredSlides: true,
        breakpoints: {
          640: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 2,
            spaceBetween: 40,
          },
          1024: {
            slidesPerView: 1,
            spaceBetween: 30,
          },
        },
      });
 </script>
@endsection