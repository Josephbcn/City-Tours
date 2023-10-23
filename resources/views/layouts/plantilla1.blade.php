<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- iconos --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>City-Tours</title>
    @include('partials.navbarst')
    @yield('estilos')
</head>
<body>
    {{-- navbar --}}
    <div id="menuHolder">
        <div role="navigation" class="sticky-top border-bottom border-top" id="mainNavigation">
          <div class="flexMain">
            <div class="flex2">
              <button class="whiteLink siteLink" style="border-right:1px solid #eaeaea" onclick="menuToggle()"><i class="fas fa-bars me-2"></i> MENU</button>
            </div>
            <div class="flex3 text-center" id="siteBrand">
              CITY TOURS
            </div>
      
            <div class="flex2 text-end d-block d-md-none">
              <button class="whiteLink siteLink"><i class="fas fa-search"></i></button>
            </div>
      
            <div class="flex2 text-end d-none d-md-block">
            </div>
          </div>
        </div>
      
        <div id="menuDrawer">
          <div>
            <a href="{{route('inicio')}}" class="nav-menu-item"><i class="fas fa-home me-3"></i>Inicio</a>
            <a href="{{route('administrar.index')}}" class="nav-menu-item"><i class="fab fa-product-hunt me-3"></i>Administrar</a>
          </div>
        </div>
    </div>
    {{-- navbar --}}

    {{-- contenido --}}

    @yield('contenido')

    {{-- contenido --}}

    {{-- footer --}}
    @include('partials.footer')
    {{-- footer --}}


    <script>
    var menuHolder = document.getElementById('menuHolder')
    var siteBrand = document.getElementById('siteBrand')
    function menuToggle(){
      if(menuHolder.className === "drawMenu") menuHolder.className = ""
      else menuHolder.className = "drawMenu"
    }
    if(window.innerWidth < 426) siteBrand.innerHTML = "MAS"
    window.onresize = function(){
      if(window.innerWidth < 420) siteBrand.innerHTML = "MAS"
      else siteBrand.innerHTML = "CITY TOURS"
    }
    </script>
</body>
</html>