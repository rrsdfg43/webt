@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
@stop

@section('content')

<h1>Panel</h1>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with minimal features & hover style</h3>
              <a type="button" class="btn btn-primary fa-pull-right" href="{{ route('admin.animes.create') }}"><i class="fa fa-plus"></i> Agregar Anime</a>
            </div>
            {{-- /.card-header --}}
            <div class="card-body">
              <table id="table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
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
                        <td>
                            <form action="{{route('admin.animes.destroy',$animeItem)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                            <td with="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.capitulos.show',$animeItem)}}">
                                <button class="btn btn-danger btn-sm">Capitulos</button>
                                </a>
                            </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>
              </table>
            </div>
            {{-- /.card-body --}}
          </div>
          {{-- /.card --}}
        </div>
        {{-- /.col --}}
      </div>
      {{-- /.row --}}
    </div>
    {{-- /.container-fluid --}}
  </section>
  {{-- /.content --}}
@endsection
@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
    $('#table').DataTable();
} );
</script>
@stop