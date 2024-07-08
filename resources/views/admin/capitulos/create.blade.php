@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@stop

@section('content')

    <h1>Subir Un Capitulo</h1>
	@if (session('status'))
					<div aria-live="polite" aria-atomic="true" style="position: relative;">
						<div class="toast fade show" style="position: absolute; top: 0; right: 0; width: 200px;">
						  <div class="toast-header">
							<i class="fa fa-check-circle bd-placeholder-img rounded mr-2" aria-hidden="true"></i>
							<strong class="mr-auto">Admin</strong>
							<small>11 mins ago</small>
							<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="toast-body bg-success">
							{{ session('status') }}
						  </div>
						</div>
					  </div>
					  
					@endif
    <div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="content">
					<div class="card card-primary">
						<div class="card-title">
							<h3 class="breadcrumb">Subir Un Capitulo  @if ($request->id)
								De-
								<div class="bg-warning text-dark">
									{{ $animes->titulo.' Capitulos '}}

									@if ($ncapitulos)
										{{ $ncapitulos->capituloN.'/'.$animes->capitulosM }}

									@else
										{{ '0/'.$animes->capitulosM }}
									@endif
								</div>

							@endif</h3>
						</div>
						<div class="card-body">
						<form method="post" action="{{ route('admin.capitulos.store') }}" class="subida" enctype="multipart/form-data">
                            @csrf
							
							@include('admin.capitulos._form')

						</form>

					</div>
@endsection