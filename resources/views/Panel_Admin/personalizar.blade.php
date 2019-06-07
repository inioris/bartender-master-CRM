@extends('plantilla.dashboart')
@section('content')
@php
    $localizacion = "Personaliza tu Admin"; 
  $user = App\User::findOrFail(Auth::user()->id);
   $a = $user->Apariencia;
    
@endphp
@foreach ($a as $e)
   @endforeach
<div class="row">
    <div class="col s12 m12 left">
      <a href="#modal1" class="btn-floating pulse modal-trigger btn-large waves-effect waves-light green" style="margin-left: 20px;"><i class="material-icons">add</i></a>
    </div>
    <div div class="col s12 m6 right">
      
    </div>
</div>
 <div class="row">
    <div class="container">
    <div class="col s12 m12 left">

<form method="POST" action="/apariencia/{{ Auth::user()->id }}" class="col s12" enctype="multipart/form-data">
    {{ csrf_field() }}
        {{ method_field('PATCH') }}
      <div class="row">

            <div class="input-field col s12 m6">
            <select name="headers">
              <option>@if(isset($e->headers)){{ $e->headers }}@else Agrega color Headers @endif</option>
              @foreach($personalizar as $personaliza)
              <option>{{ $personaliza->headers }}</option>
              @endforeach
            </select>
            <label>Superior Headers</label>
          </div>
        
            <div class="input-field col s12 m6">
                <select name="nav_lateral">
                  <option>@if(isset($e->nav_lateral)){{ $e->nav_lateral }} @else Agrega color a la Barra de Localidad @endif</option>
                  @foreach($personalizar as $personaliza)
                    <option>{{ $personaliza->nav_lateral }}</option>
                @endforeach
                </select>
                <label>Menu de Opciones Lateral</label>
              </div>

            <div class="input-field col s12 m6">
                <select name="barra_localidad">
                  <option>@if(isset($e->barra_localidad)){{ $e->barra_localidad }} @else Agrega color a la Barra de Localidad @endif</option>
                  @foreach($personalizar as $personaliza)
                    <option>{{ $personaliza->barra_localidad }}</option>
                @endforeach
                </select>
                <label>Barras de Localidad</label>
              </div>

              <div class="input-field col s12 m6">
                <select name="bg_color">
                  <option>@if(isset($e->bg_color)){{ $e->bg_color }} @else Agrega un color para fondo @endif</option>
                  @foreach($personalizar as $personaliza)
                    <option>{{ $personaliza->bg_color }}</option>
                @endforeach
                </select>
                <label>Fondo de Pantalla</label>
              </div>

              <div class="input-field col s12 m6">
                <i class="material-icons prefix">airplay</i>
                <input id="icon_prefix" type="file" class="validate" name="bg_pantalla">
                <label for="icon_prefix"> <br>Selecciona un fondo de Pantalla</label>
              </div>

       </div>
       <div class="container s12 m12">
       <button class="btn waves-effect waves right" type="submit" id="Guardar">Guardar
          <i class="material-icons right">send</i>
      </button>
        </div>
         
     </div>

    </form>
</div>
</div>
</div>

<hr>
<!-- Form para Datos de Contrase;a -->
<div class="row">
    <div class="container">
        <nav class="section">
                <div class="nav-wrapper">
                  <div class="col s12 m12">
                    <h5 class="center">Cambiar Datos Personales</h5>
                  </div>
                </div>
              </nav> 
    </div>
</div>

 <div class="row">
    <div class="col s12 m12">
        <div class="container">
<ul class="collapsible">
  <li>
    <div class="collapsible-header">
      <i class="material-icons">face</i>
      Datos Personales
      </div>
    <div class="collapsible-body">
         <form method="POST" action="/personalizar/{{ Auth::user()->id }}" class="col s12" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
      <div class="row">
    <div class="input-field col s6">
          <input value="{{ Auth::user()->name }}" name="name" maxlength="100" type="text" class="validate" required>
          <label>Nombre</label>
        </div>
        <div class="input-field col s6">
          <input type="text" value="{{ Auth::user()->email }}" name="email" maxlength="100" class="validate" required>
          <label>Email</label>
        </div>
    </div>
    <div class="row">
    <div class="input-field col s12 m12">
             <i class="material-icons prefix">account_circle</i>
        <input id="icon_prefix" type="file" class="validate" name="perfil_imagen">
         <label for="icon_prefix"> <br>Imagen de Perfil</label>
    </div>
    </div>
        
    <div>
       <button class="btn waves-effect waves right" type="submit" id="Guardar">Guardar
          <i class="material-icons right">send</i>
      </button>
            
        <a class="modal-close btn waves-effect waves left">Cancelar</a>
        </div>
         
     </div>
</form>
    </div>
  </li>
</ul>
</div>
</div>
</div>
<!-- END Form para Datos de Contrase;a -->
 
 <!-- Modal Structure -->
  <div id="modal1" class="modal z-depth-4">
    <div class="modal-content">
        <div class="section">
            <p class="section z-depth-4 deep-purple lighten-4" style="margin-left: 20px; margin-right: 20px;">
                Para Añadir los colores has click aqui-> <a href="https://materializecss.com/color.html"><b>Materialize Desing</b></a> agrega de esta manera  "teal lighten-1" o tan solo agregando "#26a69a".
            </p>
        </div> 
      <div class="row">
    <form class="col s12" method="POST" action="/personalizar" enctype="multipart/form-data">
        {{ csrf_field() }}

      <div class="row">
        <div class="input-field col s6">
          <input placeholder="deep-purple lighten-4" name="headers" maxlength="50" type="text" class="validate" required>
          <label>Barra superior Headers</label>
        </div>
        <div class="input-field col s6">
          <input type="text" placeholder="#26a69a" name="nav_lateral" maxlength="50" class="validate" required>
          <label>Nav Lateral</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="deep-purple lighten-4" name="barra_localidad" maxlength="50" type="text" class="validate" required>
          <label>Barra de Localidad</label>
        </div>
        <div class="input-field col s6">
          <input placeholder="#26a69a" type="text" name="bg_color" maxlength="50" class="validate" required>
          <label>Background Color</label>
        </div>
      </div>
      <div class="row">
          
     <div class="footer s12 m12">
        <div class="s6">
       <button class="btn waves-effect waves-light left" type="submit">Guardar
          <i class="material-icons right">send</i>
      </button>
            
        </div>
        <div class="s6">
            
        <a class="modal-close btn waves-effect waves-light right">Cancelar</a>
        </div>
         
     </div>
      </div>
    </form>
  </div>
    </div>
  </div>

 @endsection