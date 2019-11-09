<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title', 'SBAR')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{asset('css/material-kit.css')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('demo/demo.css')}}" rel="stylesheet" />
  <link href="{{asset('css/style.css')}}" rel="stylesheet" />

    <script>
      function validar()
      {
        document.getElementById("ver").disabled="disabled";
        for(var i=0;i<document.getElementsByTagName("select").length;i++)
        {
          if(document.getElementsByTagName("select")[i].value==0)
            return false;
        }
        document.getElementById("ver").disabled=false;
      }
    </script>

</head>

<body class="@yield('body-class')">
    <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="{{ url('/') }}">
                    SBAR 
                </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="sr-only">Toggle navigation</span>
              <span class="navbar-toggler-icon"></span>
              <span class="navbar-toggler-icon"></span>
              <span class="navbar-toggler-icon"></span>
            </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                @guest
                    <li class=" dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="material-icons">forward</i> Información
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                              <a href="#" class="dropdown-item">
                                <i class="material-icons">description</i> Funcionalidades
                              </a>
                              <a href="#" class="dropdown-item">
                                <i class="material-icons">local_atm</i> Precios
                              </a>
                              <a href="#" class="dropdown-item">
                                <i class="material-icons">group</i> Quienes somos
                              </a>
                              <a href="#" class="dropdown-item">
                                <i class="material-icons">help_outline</i> Preguntas Frecuentes
                              </a>
                            </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registrarse
                        </a>
                    </li>
                @else
                    <li class=" dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="material-icons">forward</i> Información
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                              <a href="#" class="dropdown-item">
                                <i class="material-icons">description</i> Funcionalidades
                              </a>
                              <a href="#" class="dropdown-item">
                                <i class="material-icons">local_atm</i> Precios
                              </a>
                              <a href="#" class="dropdown-item">
                                <i class="material-icons">group</i> Quienes somos
                              </a>
                              <a href="#" class="dropdown-item">
                                <i class="material-icons">help_outline</i> Preguntas Frecuentes
                              </a>
                            </div>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="material-icons">shopping_basket</i> Pedidos
                        </a>
                            <div class="dropdown-menu dropdown-with-icons">
                              <a href="{{ route('orders.index') }}" class="dropdown-item">
                                <i class="material-icons">watch_later</i> Pendientes
                              </a>
                              <a href="" class="dropdown-item">
                                <i class="material-icons">remove_shopping_cart</i> Cancelados
                              </a>
                              <a href="" class="dropdown-item">
                                <i class="material-icons">shopping_cart</i> Realizados
                              </a>
                              <a href="" class="dropdown-item">
                                <i class="material-icons">list_alt</i> Todos los pedidos
                              </a>
                            </div>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="material-icons">assessment</i> Reportes
                        </a>
                            <div class="dropdown-menu dropdown-with-icons">
                              <a href="" class="dropdown-item">
                                <i class="material-icons">attach_money</i> Ventas
                              </a>
                              <a href="" class="dropdown-item">
                                <i class="material-icons">fastfood</i> Productos
                              </a>
                            </div>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="material-icons">apps</i> Gestiones
                        </a>
                            <div class="dropdown-menu dropdown-with-icons">
                              @can('empresas.index')
                              <a href="{{ route('empresas.index') }}" class="dropdown-item">
                                <i class="material-icons">business</i> Empresas
                              </a>
                              @endcan
                              <a href="{{ route('asignar.index') }}" class="dropdown-item">
                                <i class="material-icons">supervisor_account</i> Usuarios de empresas
                              </a>
                              @can('users.index')
                              <a href="{{ route('users.index') }}" class="dropdown-item">
                                <i class="material-icons">face</i> Usuarios
                              </a>
                              @endcan
                              @can('roles.index')
                              <a href="{{ route('roles.index') }}" class="dropdown-item">
                                <i class="material-icons">list_alt</i> Roles
                              </a>
                              @endcan
                              @can('compras.index')
                              <a href="{{ route('compras.index') }}" class="dropdown-item">
                                <i class="material-icons">store</i> Compras
                              </a>
                              @endcan
                              @can('productos.index')
                              <a href="{{ route('productos.index') }}" class="dropdown-item">
                                <i class="material-icons">fastfood</i> Productos
                              </a>
                              @endcan
                              @can('proveedores.index')
                              <a href="{{ route('proveedores.index') }}" class="dropdown-item">
                                <i class="material-icons">business_center</i> Proveedores
                              </a>
                              @endcan
                              @can('categorias.index')
                              <a href="{{ route('categorias.index') }}" class="dropdown-item">
                                <i class="material-icons">bubble_chart</i> Categorias
                              </a>
                              @endcan
                              @can('ingredientes.index')
                              <a href="{{ route('ingredientes.index') }}" class="dropdown-item">
                                <i class="material-icons">eco</i> Ingredientes
                              </a>
                              @endcan
                            </div>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Cerrar sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="" target="_blank" data-original-title="Siguenos en twitter">
                           <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="" target="_blank" data-original-title="Dale me gusta a nuestro Facebook">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="" target="_blank" data-original-title="Siguenos en Instagram">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                    <li class="nav-item" >
                      <a href="{{ url('/carrito') }}" class="nav-link btn btn-success">
                        <i class="material-icons">shopping_cart</i> Carrito
                      </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="wrapper">
    @yield('content')
</div>
 <!--   Core JS Files   -->
<script src="{{asset('js/core/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap-input-spinner.js')}}" type="text/javascript"></script>

<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/moment.min.js')}}"></script>
<!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="{{asset('js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{asset('js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.js?v=2.0.6')}}" type="text/javascript"></script>

<script>
    $("input[type='number']").inputSpinner()
</script>

@stack('scripts')
<script src="{{asset('js/searchtable.js')}}" type="text/javascript"></script>
</body>

</html>