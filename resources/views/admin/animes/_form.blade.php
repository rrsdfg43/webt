<div class="form-group">
    <input type="text" class="form-control {{ $errors->has('titulo') ? 'is-invalid' : '' }}" id="name" name="titulo"
        value="{{ old('titulo', $anime->titulo) }}" placeholder="Nombre del Anime">
</div>
<div class="form-group">
    <textarea type="text" class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" id="sinopsis"
        name="descripcion" placeholder="Sinopsis">{{ old('descripcion',$anime->descripcion) }}</textarea>
    </div>
<h3>Imagen De Portada</h3>
<div class="form-group">
    <input class="form-control {{ $errors->has('portada') ? 'is-invalid' : '' }}" type="file" name="image"
        placeholder="Url Imagen" accept="image/*">
</div>

<h3>Imagen De Capitulo</h3>
<div class="form-group">
    <input class="form-control {{ $errors->has('miature') ? 'is-invalid' : '' }}" type="file" name="miniature"
        placeholder="Url Imagen" accept="image/*">
</div>

<div class="form-group">
    <input type="text" class="form-control {{ $errors->has('keywords') ? 'is-invalid' : '' }}" name="keywords" value="{{ old('keywords',$anime->keywords) }}" placeholder="keywords">
</div>
<h3>CATEGORIAS</h3>
{{--categorias base datos--}}
<div class='space'>
    @if ($errors->has('id_categoria'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Sin Categoria!!</strong> Escoga Una Categoria.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <select class='space form-control select2' name="id_categoria[]" id='selefor' multiple>
        @foreach ($categoria as $categoriaItem)
        <option value="{{ $categoriaItem->id }}" 
            @if( request()->routeIs('admin.animes.edit'))
            @foreach ($id_categoria as $idItem) 
            {{ (old('id_categoria', $idItem->id) == $categoriaItem->id) ? 'selected' : '' }}
            @endforeach 
            @endif

            @if( request()->routeIs('admin.animes.create')) 
            {{ (collect(old('id_categoria'))->contains($categoriaItem->id)) ? 'selected':'' }} 
            @endif
            >{{ $categoriaItem->nombre_categoria }}
        </option>
        @endforeach
    </select>
</div>
<br>
<h3>ESTADO</h3>
<div class="form-group">
    <select type="text" class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" id="estado" name="estado"
        placeholder="estado">
        <option selected="true" disabled="disabled">Selecione Estado</option>
        <option {{ old('estado', $anime->estado) == 'FINALIZADO' ? 'selected' : '' }} value="FINALIZADO">FINALIZADO</option>
        <option {{ old('estado', $anime->estado) == 'EMISION' ? 'selected' : '' }} value="EMISION">EN EMISION</option>
    </select>
</div>
<h3>TIPO</h3>
<div class="form-group">
    <select type="text" class="form-control {{ $errors->has('tipo') ? 'is-invalid' : '' }}" id="tipo" name="tipo" placeholder="tipo">
        <option selected="true" disabled="disabled">Selecionar Tipo</option>
        <option value="TV" {{ old('tipo', $anime->tipo) == 'TV' ? 'selected' : '' }}>TV</option>
        <option value="MOVIE" {{ old('tipo', $anime->tipo) == 'MOVIE' ? 'selected' : '' }}>PELICULA</option>
        <option value="OVA" {{ old('tipo', $anime->tipo) == 'OVA' ? 'selected' : '' }}>OVA</option>
        <option value="SPECIAL" {{ old('tipo', $anime->tipo) == 'SPECIAL' ? 'selected' : '' }}>ESPECIAL</option>
    </select>
</div>
</div>
</div>
</div>
<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">NUMERO DE CAPITULOS</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <input type="text" class="form-control {{ $errors->has('capitulosM') ? 'is-invalid' : '' }}"
                    id="numero" name="capitulosM" value="{{ old('capitulosM', $anime->capitulosM) }}" placeholder="Numero de capitulos">
            </div>
            <div class="divisor"></div>
            <h3>AÑO</h3>
            <div class="form-group">
                <input type="text" class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" id="anio"
                    name="year" value="{{ old('year', $anime->year) }}" placeholder="Año">
            </div>
            <h3>Califacion</h3>
            <div class="form-group">
                <input type="text" class="form-control {{ $errors->has('rating') ? 'is-invalid' : '' }}" id="rating"
                    name="rating" value="{{ old('rating', $anime->rating) }}" placeholder="Rating">
            </div>
            <h3>Duracion</h3>
            <div class="form-group">
                <input type="text" class="form-control {{ $errors->has('duration') ? 'is-invalid' : '' }}" id="duration"
                    name="duration" value="{{ old('rating', $anime->duration) }}" placeholder="Duracion">
            </div>
            <h3>SUBTITULO,DOBLAJE</h3>
            <div class="form-group">
                <select type="text" class="form-control {{ $errors->has('sub') ? 'is-invalid' : '' }}" id="subtitulo" name="sub" placeholder="subtitulo">
                    <option selected="true" disabled="disabled">Selecionar Sub Dub</option>
                    <option {{ old('sub', $anime->sub) == 'SUB' ? 'selected' : '' }}>SUB</option>
                    <option {{ old('sub', $anime->sub) == 'DUB' ? 'selected' : '' }}>DUB</option>
                </select>
            </div>
            <br>
        </div>
        <div class="card-footer">
            <input type="submit" class="btn btn-success" value="Subir">
        </div>
    </div>
</div>
