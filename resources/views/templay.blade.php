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
                <li><a href="/about"> About </a></li>
                <li><a href="/contact"> Contant </a></li>
            </ul>
        </div>
        <ul class="sidenav" id="mobile-demo">
            <li class="z-depth-2 abajo"><a class="waves-effect center" href="/"> Home </a></li>
            <li class="z-depth-2 abajo"><a class="btn dropdown-trigger" data-target="dropdown5">Categorias</a>
                <ul id="dropdown5" class="dropdown-content">
                        @foreach($category as $categorys)
                            <li style="width: 100%;"><a href="/ver_category/{{ $categorys->category }}"> {{ $categorys->category }} </a></li>
                        @endforeach
                    </ul>
            </li>
            <li class="z-depth-2 abajo"><a class="waves-effect center" href="/about"> About </a></li>
            <li class="z-depth-2 abajo"><a class="waves-effect center" href="/contact"> Contant </a></li>
          </ul>
    </nav>  
        <!-- End Acordeon -->

        <!-- Open Contenedor -->
        <div class="container-fluid">
            
            <div class="row">
                <!-- Open Contenido -->
                    @yield('content')
                
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