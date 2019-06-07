@php
  $user = App\User::findOrFail(Auth::user()->id);
   $a = $user->Apariencia;
   
   
@endphp
 <!DOCTYPE html>
<html lang="en,es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Panel Administrativo</title>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  </head>
   @foreach ($a as $e)
   @endforeach
  <body class="@if(isset($e->bg_color)) {{ $e->bg_color }} @else grey lighten-2 @endif">
    <style>
      header, main, footer {
          padding-left: 300px;
        }

        @media only screen and (max-width : 992px) {
          header, main, footer {
            padding-left: 0;
          }
        }
          
    </style>
    
  <div class="container-fluid">
      <!-- NAVBAR --> 
        <header>
          <nav class="@if(isset($e->headers)){{$e->headers}} @else grey darken-3 @endif z-depth-2">
            <div class="nav-wrapper">
              <div class="row">
                <div class="col s12">
                    <ul>
                        <li class="left">
                          <a data-target="sidenav-1" class="left sidenav-trigger hide-on-medium-and-up"><i class="material-icons">menu</i></a>
                          <a href="{{ url('/admin') }}" class="waves-effect brand-logo">B-M</a>
                        </li>
                        <li class="right">
                            <a class='dropdown-trigger btn indigo darken-2' href='#' data-target='dropdown1'>{{ Auth::user()->name }}</a>
                            <ul id='dropdown1' class='dropdown-content btn-large center'>
                                <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                        </form>
                                </li>
                            </ul>

                        </li>
                    </ul>
                </div>
              </div>
            </div>
          </nav>
        </header>
        <!-- LEFT SIDEBAR  -->
        <ul id="sidenav-1" class="sidenav sidenav-fixed @if(isset($e->nav_lateral)){{$e->nav_lateral}}@else grey darken-4 @endif">
          <li>
            <div class="user-view">
              <div class="background">
                <img class="materialboxed responsive-img" height="100%" width="100%" @if(isset($e->bg_pantalla)) src="{{url($e->bg_pantalla) }}" @else src="https://img.vixdata.io/pd/webp-large/es/sites/default/files/imj/nuestrorumbo/C/Conociendo-Santorini-y-sus-espectaculares-paisajes-5.jpg" @endif>
              </div>
              <a href="#user"><img class="circle z-depth-5" @if(isset(Auth::user()->perfil_imagen)) src="{{url(Auth::user()->perfil_imagen) }}" @else src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" @endif ></a>
              <a href="#name"><span class="white-text name">{{ Auth::user()->name }}</span></a>
              <a href="#email"><span class="white-text email">{{ Auth::user()->email }}</span></a>
            </div>
          </li>
          <hr>
          <style>
            .abajo{
              margin-bottom: 20px;
              margin-right: 15px;
              margin-left: 15px;
              background-color: #CACBCC;
            }
          </style>
          <li><a class="subheader white-text">Always out except on mobile</a></li>
          <li class="z-depth-2 abajo"><a href="{{ url('/recetas') }}" class="waves-effect center" > Recetas </a></li>
          <li class="z-depth-2 abajo"><a href="{{ url('/headers') }}" class="waves-effect center" > Headers </a></li>
          <li class="z-depth-2 abajo"><a href="{{ url('/category') }}" class="waves-effect center" > Categoria </a></li>
          <li class="z-depth-2 abajo"><a href="{{ url('/history') }}" class="waves-effect center" > Historia </a></li>
          <li class="z-depth-2 abajo"><a href="{{ url('/mensajes') }}" class="waves-effect center" >Ver Mensajes</a></li>
          <li class="z-depth-2 abajo"><a href="{{ url('/personalizar') }}" class="waves-effect center" >Personalizar</a></li>
        </ul>

        <main>
            
            <div class="row" id="containers">
               <nav>
                <div class="nav-wrapper @if(isset($e->barra_localidad)){{ $e->barra_localidad }} @else red @endif">
                  <div class="col s12 m10">
                    <a class="breadcrumb">{{ $localizacion }}</a>
                  </div>
                </div>
              </nav> 
              @yield('content')

            </div>

        </main>
        

    
  </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <script>
     M.AutoInit(); 

  </script>

  <!-- <script src="api.js"></script> -->
  </body>
</html>
<!-- <script>
function sendRequest(){
                    var theObject = new XMLHttpRequest();
                    theObject.open('POST','api/backend.php',true);
                    theObject.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    theObject.onreadystatechange = function(){
                        document.getElementById('titulo').innerHTML = theObject.responseText;
                    };
                    theObject.send("name=Alejandro");
                  }
     

              </script> -->
