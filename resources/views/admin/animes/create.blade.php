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
<h1>home</h1>
<div class="row">
			<div class="col-md-6">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Subir un Portada</h3>
					</div>
							<div class="card-body">
								<form method="post" action="{{ route('admin.animes.store') }}" class="subida" enctype="multipart/form-data">
									@csrf
									@include('admin.animes._form')
						</form>
					</div>
@endsection