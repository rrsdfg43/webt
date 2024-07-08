@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@stop

@section('content')

    <div class="card-body">
        <a name="" id="" class="btn btn-primary" href="{{ route('admin.capitulos.create', 'id='.$capitulo->id) }}" role="button">Agregar Capitulo</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($capitulos as $capituloItem)
                    <tr>
                        <td>{{$capituloItem->id}}</td>
                        <td>{{$capituloItem->titulo}}</td>
                        <td with="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.capitulos.edit',$capituloItem)}}">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.capitulos.destroy',$capituloItem)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection