<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lo Que Deberia Saber | Todo Bartender</title>
    <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     
</head>
<body>
    <nav class="nav-wrapper grey darken-4">
        <div class="container">
            <a href="/" class="brand-logo">Bartender Master</a>
            <a data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="/"> Home </a></li>
                <li>
                    <a class="btn dropdown-trigger" data-target="dropdown2">Categorias</a>
                    <ul id="dropdown2" class="dropdown-content">
                        @foreach($category as $categorys)
                            <li ><a href="/ver_category/{{ $categorys->category }}"> {{ $categorys->category }} <img class="activator responsive-img" width="20px" height="20px" src="{{ url($categorys->imagen) }}"> </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="#"> About </a></li>
                <li><a href="#"> Contant </a></li>
            </ul>
        </div>
        <ul class="sidenav" id="mobile-demo">
            <li><a href="/"> Home </a></li>
            <li><a class="btn dropdown-trigger" data-target="dropdown5">Categorias</a>
                <ul id="dropdown5" class="dropdown-content">
                        @foreach($category as $categorys)
                            <li style="width: 100%;"><a href="/ver_category/{{ $categorys->category }}"> {{ $categorys->category }} </a></li>
                        @endforeach
                    </ul>
            </li>
            <li><a href="#"> About </a></li>
            <li><a href="#"> Contant </a></li>
          </ul>
    </nav>

        <!-- Open Slider -->
        <div class="container-fluid">
             <div class="slider">
                <ul class="slides section">
                    @foreach($headers as $header)
                    <li>
                    <img class="activator responsive-img" src="{{ url($header->imagen) }}"> <!-- random image -->
                    <div class="caption center-align">
                      <h3 class="white-text">{{ $header->title }}</h3>
                      <h5 class="white-text text-lighten-3">{{ $header->description }}</h5>
                    </div>
                  </li>
                  @endforeach
                </ul>
         </div>
        </div>      
        <!-- End Slider -->

        <!-- Open Acordeon -->
            
            <div class="container-fluid">
                <div class="row">
                        
                    <ul class="collapsible popout">
                        
                        @foreach($history as $historias)
                        <li class="grey lighten-3">
                          <div class="collapsible-header"><i class="material-icons">History</i>{{ $historias->title }}</div>
                          <div class="collapsible-body">
                            <div class="row">
                                <div class="col s6 m4">
                                    <img class="responsive-img z-depth-4" src="{{ url($historias->imagen) }}" style="border-radius: 5px; width: 400px; height: 200px;"> 
                                </div>
                                <div class="col s6 m8">
                                    <p>
                                        {{ $historias->description }}
                                    </p>
                                </div>
                            </div>
                          </div>
                        </li>
                        @endforeach
                      </ul>
                </div>
            </div>

        <!-- End Acordeon -->

        <!-- Open Contenedor -->
        <div class="container-fluid">
            
            <div class="row">
                <!-- Open Contenido -->

                <div class="col s12 m8 center">
                    <nav class="blue-grey darken-4 z-depth-5" style="border-radius: 5px;">
                        <div class="nav-wrapper">
                          <div class="col s12">
                            <p class="center"><h4> Productos Populares</h4> </p>
                          </div>
                        </div>
                      </nav>
                    <div class="row">
                        @foreach($recetas as $receta)
                            <div class="col s12 m6">
                                <div class="card z-depth-4" style="border-radius: 5px;">
                                <div class="card-image waves-effect waves-block waves-light">
                                  
                                  <img class="responsive-img z-depth-4" src="{{ url($receta->imagen) }}" style="height: 300px;">
                                </div>
                                <div class="card-content">
                                  <span class="card-title activator grey-text text-darken-4">{{ $receta->title }}<i class="material-icons right">more_vert</i></span>
                                  <p><a href="/ver_recetas/{{ $receta->id }}" class="btn waves-effect waves-light">Ver Mas</a></p>
                                </div>
                                <div class="card-reveal">
                                  <span class="card-title grey-text text-darken-4">{{ $receta->title }}<i class="material-icons right">close</i></span>
                                  <p>{{ $receta->subtitle }}</p>
                                </div>
                              </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- -->
                <!-- -->
                <div class="col s12 m4 right">
                    <nav class="blue-grey darken-4 z-depth-5" style="border-radius: 5px;">
                        <div class="nav-wrapper">
                          <div class="col s12 center">
                            <p><h4> Post Populares </h4> </p>
                          </div>
                        </div>
                      </nav>
                      @foreach($post as $posts)
                             <div class="col s8 m8 center" style="margin-left: 15%;">
                                <div class="card z-depth-4" style="border-radius: 5px;">
                                <div class="card-image waves-effect waves-block waves-light">
                                  <img class="activator responsive-img" src="{{ url($posts->imagen) }}">
                                </div>
                                <div class="card-content">
                                  <span class="card-title activator grey-text text-darken-4">{{ $posts->title }}<i class="material-icons right">more_vert</i></span>
                                  <p><a href="#" class="btn waves-effect waves-light">Ver Mas</a></p>
                                </div>
                                <div class="card-reveal">
                                  <span class="card-title grey-text text-darken-4">{{ $posts->title }}<i class="material-icons right">close</i></span>
                                  <p>{{ $posts->subtitle }}</p>
                                </div>  
                                </div>
                            </div>
                      @endforeach
                </div>
                <!-- -->
            </div>

        </div>
        <!-- End Contenedor -->
        <div class="container">
            <hr class="indigo indigo lighten-5">
        </div>
        
        <!-- Footer -->
        <footer class="page-footer grey darken-4">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Bartender Masters</h5>
                <p class="grey-text text-lighten-4">Bartender Masters está consciente de la importancia que representa para usted.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Visita</h5>
                <ul>             
                    <li><a href="#"> Politicas de Privacidad </a></li>
                    <li><a href="#"> Terminos y Condiciones </a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2019 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">Bartender Masters</a>
            </div>
          </div>
        </footer>
        <!-- /END Footer -->


    


    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    <script>
         M.AutoInit();
         document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.slider');
            var instances = M.Slider.init(elems,{
                interval: 3000,
                duration: 2000,
                height: 600
            });

          });
         
         
    </script>

</body>
</html>