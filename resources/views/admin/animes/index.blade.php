

@section('title', 'PanelAdministracion')

@section('content')

<h1>Panel</h1>

<li><a href="{{route('admin.animes.create')}}">Agregar Anime</a></li>
<li><a href="{{route('admin.animes.create')}}">Agregar Capitulo</a></li>

<div class="card-body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anime as $animeItem)
                <tr>
                    <td>{{$animeItem->id}}</td>
                    <td>{{$animeItem->titulo}}</td>
                    <td with="10px">
                        <a class="btn btn-primary btn-sm" href="{{route('admin.animes.edit',$animeItem)}}">Editar</a>
                    </td>
                    <td width="10px">
                        <form action="{{route('admin.animes.destroy',$animeItem)}}" method="post">
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