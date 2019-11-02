@extends('layouts.app')
@section('title','Sbar, no esperes más!')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg') }}')">
</div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Productos</h2>
      <p></p>
        <div class="team">
          <div class="row">
            @foreach($productos as $producto)
            <div class="col-md-4">
              <div class="team-player">
                <div class="card card-plain">
                  <a href="{{ route('products.show', $producto->idproducto )}}">
                    <div class="col-md-6 ml-auto mr-auto">
                      <img width="100px" height="100px" src="{{asset('imagenes/productos/'.$producto->imagen)}}" alt="Thumbnail Image" class="img-raised img-thumbnail img-fluid">
                    </div>
                    <h4 class="card-title">{{ $producto->producto }}
                    </h4>
                    </a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          {{ $productos->links("pagination::bootstrap-4") }}
        </div>
      </div>
    </div>
  </div>
  <footer class="footer footer-default">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <a href="">
              Desarrolladores
            </a>
          </li>
          <li>
            <a href="">
              CEDIV Co.
            </a>
          </li>
          <li>
            <a href="">
              Redes Sociales
            </a>
          </li>
          <li>
            <a href="">
              Terminos y condiciones
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, creado con <i class="material-icons">favorite</i> de
        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> - editado por Xalcuadrado.
      </div>
    </div>
  </footer>
@endsection
