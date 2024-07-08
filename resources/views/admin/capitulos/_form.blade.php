<div class="form-group">

    @if (session('status-save'))
    <div class="alert alert-danger" role="alert">
            {{ session('status-save') }}
        </div>
        @endif
    @if ($request->id)
    <input type="text" class="form-control {{ $errors->has('titulo') ? 'is-invalid' : '' }}" id="name" name="titulo" value="{{ old('titulo', $animes->titulo.'-'.$ncapitulos->capituloN+1) }}"
    placeholder="Nombre del capitulo">

    @else
        
    <input type="text" class="form-control {{ $errors->has('titulo') ? 'is-invalid' : '' }}" id="name" name="titulo" value="{{ old('titulo', $capitulo->titulo) }}"
    placeholder="Nombre del capitulo">

    @endif
</div>
<div class="form-group">
    <textarea type="text" class="form-control {{ $errors->has('opcion1') ? 'is-invalid' : '' }}" id="url" name="opcion1"
        placeholder="Escriba url del Video">{{ old('opcion1', $capitulo->opcion1) }}</textarea>
</div>

</div>
</div>
<div class="card card-primary">
<div class="card-header">
    <h3 class="card-title"> Tiempo </h3>
</div>
<div class="card-body">

    <div class="form-group">
        <h4> Tiempo ending </h4>
        <div class="row">
            <div class="col-sm-4">
                <input class="form-control {{ $errors->has('tiempoN') ? 'is-invalid' : '' }}" type="text" name="tiempoN" value="{{ old('tiempoN', $tiempoO['tiempoNS']) }}" placeholder="Tiempo Minutos">
            </div>
            <div class="col-sm-4">
                <input class="form-control {{ $errors->has('tiempoNS') ? 'is-invalid' : '' }}" type="text" name="tiempoNS" value="{{ old('tiempoNS', $capitulo->tiempoNS) }}" placeholder="Tiempo Segundos">
            </div>
        </div>
    </div>
    <div class="form-group">
        <h4> Tiempo final opening </h4>
        <div class="row">
            <div class="col-sm-4">
            <input class="form-control {{ $errors->has('tiempoO') ? 'is-invalid' : '' }}" type="text" name="tiempoO" value="{{ old('tiempoO', $tiempoO['tiempoOS']) }}" placeholder="Tiempo Minutos">
        </div>
        <div class="col-sm-4">
            <input class="form-control {{ $errors->has('tiempoOS') ? 'is-invalid' : '' }}" type="text" name="tiempoOS" value="{{ old('tiempoOS', $capitulo->tiempoOS) }}" placeholder="Tiempo Segundos">
        </div>
    </div>
</div>
<div class="form-group">
    <h4> Tiempo inicio opening </h4>
    <div class="row">
        <div class="col-sm-4">
            <input class="form-control {{ $errors->has('tiempoL') ? 'is-invalid' : '' }}" type="text" name="tiempoL" value="{{ old('tiempoL', $tiempoO['tiempoLS']) }}" placeholder="Tiempo Minutos">
        </div>
        <div class="col-sm-4">
            <input class="form-control {{ $errors->has('tiempoLS') ? 'is-invalid' : '' }}" type="text" name="tiempoLS" value="{{ old('tiempoLS', $capitulo->tiempoLS) }}" placeholder="Tiempo Segundos">
        </div>
    </div>
</div>
{{--idrel--}}

<select class='space form-control {{ $errors->has('tiempoO') ? 'is-invalid' : '' }}' name='anime_id' id='selefor'>
    @foreach ($anime as $animeItem)
    @if ($request->id)
    <option value="{{ $animeItem->id }}"
        {{ old('anime_id', $request->id) == $animeItem->id ? 'selected' : '' }}>{{ $animeItem->titulo }}
    </option>
    @else
    <option value="{{ $animeItem->id }}"
        {{ old('anime_id', $capitulos->id) == $animeItem->id ? 'selected' : '' }}>{{ $animeItem->titulo }}
    </option>
    @endif
    @endforeach
</select>


</div>
<div class="card-footer">
    <input type="submit" class="btn btn-success" value="Subir">
</div>
</div>