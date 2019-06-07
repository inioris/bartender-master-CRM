@extends('plantilla.dashboart')
@section('content')
@php
    $localizacion = "Añadir Recetas";    
@endphp
  <div class="row">
    <div class="col s12 m12 left">
      <a href="#modal1" class="btn-floating pulse modal-trigger btn-large waves-effect waves-light green" style="margin-left: 20px;"><i class="material-icons">add</i></a>
    </div>
    <div div class="col s12 m6 right">
      
    </div>
</div>

<div class="container-fluid">
    
<table class="responsive-table highlight">
<thead>	<tr>
<th>Title</th>
<th>Category</th>
<th>Imagen</th>
<th>Editar</th>
<th>Elinimar</th> 
</thead><tr> 
<tbody>
@foreach($datos as $data)
    <tr>
        <td>{!! $data->title !!}</td>
        <td>{!! $data->category !!}</td>
        <td><img width="150px" height="100px" src="{{ url($data->imagen) }}"></td>
        <td><a href="/recetas/{{$data->id}}/edit" onclick="#editar" class="btn modal-trigger btn-min waves-effect waves-light blue">Editar</a></td>
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
    <form class="col s12" method="POST" action="/recetas" enctype="multipart/form-data" id="recetas-form">
        {{ csrf_field() }}
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Placeholder"name="title" maxlength="100" type="text" class="validate" required>
          <label>Title</label>
        </div>
        <div class="input-field col s6">
          <input type="text" name="subtitle" maxlength="100" class="validate" required>
          <label>Sub Title</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <select name="category">
            @foreach($categorys as $category)
              <option>{{ $category->category }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row">

        <div class="input-field col s12">
          <textarea name="description" rows="4" class="validate" required></textarea>
        </div>
      </div>
       <div class="row">
        <label>Las Imagenes no Pueden Pesar mas de 2mb</label>
              <input type="file" name="imagen" accept="image/*" required>
       </div>
       <button class="btn waves-effect waves-light" type="submit" id="Guardar">Guardar
          <i class="material-icons right">send</i>
      </button>
        <a href="/add_recetas" class="modal-close btn waves-effect waves-light right">Cancelar</a>
    </form>
  </div>
    </div>
  </div>

    <!-- Modal Structure -->
  <div id="delete" class="modal z-depth-4">
    <div class="modal-content">
        <div class="row">
            <nav>
            <div class="col s12 m12 modal-header">
                <div class="nav-wrapper">
                  <div class="col s12">
                    <a class="breadcrumb">Eliminaras: @if (isset($data->id)){{$data->title}} @endif</a>
                  </div>
                </div>
            </div>
                
            </nav>
        </div>
        <div class="row">
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
        @if (isset($data->id))
          <form action="/recetas/{{$data->id}}" method="POST">
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