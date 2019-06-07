@extends('plantilla.dashboart')
@section('content')
@php
    $localizacion = "EDITAR RECETAS";    
@endphp
      <div class="row">
    <form action="/recetas/{{ $editar->id }}" enctype="multipart/form-data" method="POST" class="col s12">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Placeholder" name="title" maxlength="150" value="{{ $editar->title }}" type="text" class="validate" required>
          <label>Title</label>
        </div>
        <div class="input-field col s6">
          <input type="text" name="subtitle" max="150" value="{{ $editar->subtitle }}" class="validate" required>
          <label>Sub Title</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <select name="category">
              <option>{{ $editar->category }}</option>
              <option>Vinos</option>
              <option>Sangrias</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea rows="4" class="validate" name="description" required>{{ $editar->description }}</textarea>
        </div>
      </div>

       <div class="row">
                <img width="200px" src="{{ url($editar->imagen) }}">
              <input name="imagen" value="{{ url($editar->imagen) }}" type="file">
       </div>
       <button class="btn waves-effect waves-light" type="submit">Guardar
          <i class="material-icons right">send</i>
      </button>
        <a href="/recetas" class="modal-close btn waves-effect waves-light right">Cancelar</a>
    </form>
  </div>

@endsection