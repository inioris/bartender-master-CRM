@extends('plantilla.dashboart')
@section('content')
@php
    $localizacion = "Editar Headers";    
@endphp
      
        <div class="container section">
            <div class="row">
    <form action="/headers/{{ $editar->id }}" enctype="multipart/form-data" method="POST" class="col s12 z-depth-1 center grey lighten-5">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Placeholder" maxlength="100" name="title" value="{{ $editar->title }}" type="text" class="validate" required>
          <label>Title</label>
        </div>
        </div>

      <div class="row">
        <div class="input-field col s12">

          <textarea rows="4" id="Description" class="materialize-textarea" name="description" required>{{ $editar->description }}</textarea>
          <label for="Description">Description</label>
        </div>
      </div>

       <div class="row">
                <img width="200px" src="{{ url($editar->imagen) }}"><br>
              <input name="imagen" value="{{ url($editar->imagen) }}" type="file">
       </div>
       <div class="modal-footer">
       <button class="btn waves-effect waves-light" type="submit">Guardar
          <i class="material-icons left">send</i>
      </button>
        <a href="/recetas" class="modal-close btn waves-effect waves-light">Cancelar</a>
        </div>
    </form>
    </div>
  </div>

@endsection