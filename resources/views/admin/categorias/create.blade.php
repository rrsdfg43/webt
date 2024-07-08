@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@stop

@section('content')
    <h1>Subir Categoria</h1>
    <div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="content">
					<h3 class="breadcrumb">Subir Una Categoria</h3>
					<div class="form-group">
						<form method="post" action="{{ route('admin.categorias.store') }}" class="subida">
                            @csrf
							<div class="form-group">
								<input type="text" class="form-control" id="name" name="nombre_categoria" placeholder="Nombre de la categoria">
							</div>
							<input type="hidden" name="slug" value="adsadas">
							<input type="submit" class="btn btn-success" value="Subir">
						</form>
						<table class="table">
							<thead>
										<tr>
											<th>id</th>
											<th>Name</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($categoria as $categoriaItem)
										<tr>
											<td>{{ $categoriaItem->id }}</td>
											<td>{{ $categoriaItem->nombre_categoria }}</td>
											<td><form action="{{route('admin.categorias.destroy',$categoriaItem)}}" method="post">
												@csrf
												@method('delete')
												<button class="btn btn-danger btn-sm">Eliminar</button>
											</form></td>
										</tr>
										@endforeach
									</tbody>
								</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection