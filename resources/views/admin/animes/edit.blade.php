@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@stop

@section('js')
<script>
	$(document).ready(function() {
		$('.select2').select2({
			placeholder: 'Selecione Genero',
			allowClear: true
		});
	});
	</script>
@stop

@section('content')
    <h1>Editar Anime</h1>

		<div class="row">
			<div class="col-md-6">
				<div class="card card-primary">
					<h3 class="breadcrumb">Editar Anime</h3>
					<div class="card-body">
						<form method="post" action="{{ route('admin.animes.update', $anime) }}" class="subida" enctype="multipart/form-data">
							@csrf @method('PATCH')
							@include('admin.animes._form')
						</form>

					</div>
				</div>
			</div>
		</div>
@endsection