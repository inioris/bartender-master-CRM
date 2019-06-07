@extends('plantilla.dashboart')
@section('content')
@php
    $localizacion = "Editar Category";    
@endphp
      
        <div class="container section">
            <div class="row">
    <form action="/category/{{ $editar->id }}" enctype="multipart/form-data" method="POST" class="col s12 z-depth-1 center grey lighten-5">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Placeholder" maxlength="100" name="category" value="{{ $editar->category }}" type="text" class="validate" required>
          <label>Category</label>
        </div>
        </div>

       <div class="row">
                <img width="200px" src="{{ url($editar->imagen) }}"><br>
              <input name="imagen" value="{{ url($editar->imagen) }}" type="file">
       </div>
       <div class="modal-footer ">
        <button class="btn waves-effect waves-light left" type="submit">Guardar
          <i class="material-icons right">send</i>
      </button>
        <a href="/category" class="modal-close btn waves-effect waves-light right">Cancelar</a>
    </div>

    </form>
    </div>
  </div>

@endsection