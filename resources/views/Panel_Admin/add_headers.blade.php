@extends('plantilla.dashboart')
@section('content')
@php
    $localizacion = "Añadir Headers";    
@endphp
 <div class="row">
    <div class="col s12 m12 left">
<a href="#modal1" class="btn-floating pulse modal-trigger btn-large waves-effect waves-light red" style="margin-left: 20px;"><i class="material-icons">add</i></a>

<div class="container-fluid">
    
<table class="responsive-table highlight">
    <thead> <tr>
    <th>Title</th>
    <th>Imagen</th>
    <th>Fecha de Creacion</th>
    <th>Editar</th>
    <th>Elinimar</th> 
    </thead><tr> 
<tbody>
    @foreach($datos as $dato)
        <tr>
            <td>{!! $dato->title !!}</td>
            <td><img width="150px" src="{!! url($dato->imagen) !!}"></td>
            <td>{!! $dato->created_at !!}</td>
            <td><a class="btn modal-trigger btn-min waves-effect waves-light blue" href="/headers/{{ $dato->id }}/edit">Editar</a></td>
            <td><a href="#delete" class="btn modal-trigger btn-min waves-effect waves-light red">Eliminar</a></td></td>
        </tr>
    @endforeach
</tbody>
</table>
</div>

<!-- Modal Structure -->
  <div id="modal1" class="modal z-depth-4">
    <div class="modal-content">
      <div class="row">
    <form method="POST" action="/headers" class="col s12" enctype="multipart/form-data">
        {{ csrf_field() }}
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Placeholder" maxlength="100" name="title" type="text" class="validate" required>
          <label>Title</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea name="description" rows="4" class="validate" required>Descrition</textarea>
        </div>
      </div>
       <div class="row">
            <div class="file-field input-field">
              <div class="btn">
                <span>File</span>
                <input type="file" name="imagen" accept="image/*" required>
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
              <small>Esta Imagen debe Llevar un Tamaño de height: 650px; </small>
            </div>
       </div>
        <div class="modal-footer">
            <button type="submit" class="btn-large left"> Guardar </button>
      <button class="modal-close waves-effect waves-green btn right">Cancelar</button>
    </div>
    </form>
  </div>
    </div>
    
  </div>

  <div id="delete" class="modal z-depth-4">
    <div class="modal-content">
        <div class="row">
            @if (isset($dato->id))
            <nav>
            <div class="col s12 m12 modal-header">
                <div class="nav-wrapper">
                  <div class="col s12">
                    <a class="breadcrumb">Eliminaras: {{$dato->title}}</a>
                  </div>
                </div>
            </div>
                
            </nav>
        </div>
        <div class="row">
            
            <h1 class="flow-text">Estas Seguro de Elimanar {{$dato->title}}</h1>
            <div class="modal-content col s12 m12 center">
                 <div class="preloader-wrapper big active">
                 <div class="spinner-layer spinner-blue-only">
              <div class="circle-clipper left">
                <div class="circle"></div>
              </div><div class="gap-patch">
                <div class="circle"></div>
              </div><div class="circle-clipper right">
                <div class="circle"></div>
              </div>
            </div>
          </div>
        </div>
    </div>
      <div class="row">
        <div class="input-field col s12 m12 center">
        
          <form action="/headers/{{$dato->id}}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
            <div class="modal-footer">
            <button type="submit" class="btn modal-trigger btn-min waves-effect waves-light blue left">Aceptar</button>
            <a type="submit" href="/recetas" class="modal-close btn modal-trigger btn-min waves-effect waves-light blue right">Cancelar</a>      
            </div>
        </form>
        @endif

        </div>
       </div>
    </div>
  </div>

@endsection
