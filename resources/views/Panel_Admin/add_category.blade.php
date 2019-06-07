@extends('plantilla.dashboart')
@section('content')
@php
    $localizacion = "Añadir Category";    
@endphp
 <div class="row">
    <div class="col s12 m12 left">
<a href="#modal1" class="btn-floating pulse modal-trigger btn-large waves-effect waves-light red" style="margin-left: 20px;"><i class="material-icons">add</i></a>

<div class="container-fluid">
    
<table class="responsive-table highlight">
    <thead> <tr>
    <th>Categoria</th>
    <th>Imagen</th>
    <th>Fecha de Creacion</th>
    <th>Editar</th>
    <th>Elinimar</th> 
    </thead><tr> 
<tbody>
    @foreach($datos as $dato)
        <tr>
            <td>{{ $dato->category }}</td>
            <td><img src="{{ url($dato->imagen) }}" width="150px"></td>
            <td>{{ $dato->created_at  }}</td>
            <td><a class="btn modal-trigger btn-min waves-effect waves-light blue" href="/category/{{$dato->id}}/edit">Editar</a></td>
            <td><a class="btn modal-trigger btn-min waves-effect waves-light red" href="#delete">Eliminar</a></td>
        </tr>
    @endforeach
</tbody>
</table>
</div>

<!-- Modal Structure -->
  <div id="modal1" class="modal z-depth-4">
    <div class="modal-content">
      <div class="row">
    <form method="POST" action="/category" class="col s12" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="input-field col s12">
          <input placeholder="Placeholder" name="category" type="text" class="validate" required>
          <label>Category</label>
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
              <small>Esta Imagen debe Llevar un Tamaño de height: 360px; </small>
            </div>
       </div>
       <div class="modal-footer">
        <button class="btn waves-effect waves-light left" type="submit">Guardar
          <i class="material-icons right">send</i>
      </button>
        <a class="modal-close btn waves-effect waves-light right">Cancelar</a>
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
                    <a class="breadcrumb">Eliminaras: {{ $dato->category }}</a>
                  </div>
                </div>
            </div>
                
            </nav>
        </div>
        <div class="row">
            
            <h1 class="flow-text">Estas Seguro de Elimanar {{ $dato->category }}</h1>
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
        
          <form action="/category/{{$dato->id}}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
            <div class="modal-footer">
            <button type="submit" class="btn modal-trigger btn-min waves-effect waves-light blue left">Aceptar</button>
            <a type="submit" class="modal-close btn modal-trigger btn-min waves-effect waves-light blue right">Cancelar</a>      
            </div>
        </form>
        @endif

        </div>
       </div>
    </div>
  </div>

  @endsection
