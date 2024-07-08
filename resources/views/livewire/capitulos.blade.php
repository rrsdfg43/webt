<div>
    {{-- all capitulos--}}  
<div class="consatainer">
    <br>
<div class="row">
<div class="col-12 col-md-12">
{{-- Contenido --}}    
<div class="panel panel-default">
<div class="row justify-content-between">
{{-- Default panel contents --}}
<div class="panel-heading">
<div class="col-12">Lista de Capitulos</div>
</div>
<div class="input-group mb-3">
<div class="col-sm">
<input wire:model="search" id="search" type="text" class="form-control" placeholder="Buscar episodio" aria-label="Alumno" aria-describedby="basic-addon1">
</div>
</div>
</div>
{{-- Table --}}
<table class="table">
  <thead>
    
  </thead>
  
  <tbody class="BusquedaRapida">
      @forelse ($capitulos as $capituloItem)
      <tr onclick="window.location='{{ route('serie', $capituloItem) }}'">
        <td>{{ $animes->titulo }}</td>
<td><a href="{{ route('serie', $capituloItem) }}">{{ "👁‍🗨"." "."Capitulo". "$capituloItem->capituloN" }}</a></td>
@empty
<td>No hay capitulos</td>
</tr>
@endforelse
    
</tbody>
</table>		
{{-- Fin Contenido --}} 
</div>



</div>{{-- Fin row --}}


</div>{{-- Fin container --}}
</div>
</div>