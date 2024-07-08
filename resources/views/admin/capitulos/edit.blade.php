@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@stop

@section('content')

    <h1>Editar Capitulo</h1>
		<div class="row">
			<div class="col-md-8">
				<div class="content">
					<div class="card card-primary">
						<h3 class="breadcrumb">Editar Capitulo</h3>
						<div class="card-body">
						<form method="post" action="{{ route('admin.capitulos.update', $capitulo) }}" class="subida" enctype="multipart/form-data">
                            @csrf @method('PATCH')
							
							@include('admin.capitulos._form')

						</form>
					</div>
@endsection