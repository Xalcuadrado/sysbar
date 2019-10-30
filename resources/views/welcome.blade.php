@extends('layouts.app')
@section('title','Bienvenido a SBAR')
@section('body-class','landing-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg') }}')">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">Tu plataforma de pedidos en linea.</h1>
          <h4>Empresas y usuario listos para interactuar optimizando el tiempo de ambos, realizar pedidos, controlar el stock y descripciones detalladas es lo que se necesita para garantizar la mejor experiencia de todos.</h4>
          <br>
          <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-danger btn-raised btn-lg">
            <i class="fa fa-play"></i> ¿Cómo funciona?
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Empresas aliadas</h2>
        <h5 class="description">Bares y restobares que decidieron poner su confianza en nosotros, pensando en sus clientes y colaboradores con el afan de optimizar el tiempo de todos y garantizar el mejor servicio .</h5>
        <div class="team">
          <div class="row">
            @foreach($empresas as $empresa)
            <div class="col-md-4">
              <div class="team-player">
                <div class="card card-plain">
                  <a href="">
                    <div class="col-md-6 ml-auto mr-auto">
                      <img width="100px" height="100px" src="{{asset('imagenes/empresas/'.$empresa->logo)}}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                    </div>
                    <h4 class="card-title">{{ $empresa->nombre }}
                    </h4>
                      
                    </a>
                    
                  <div class="card-footer justify-content-center">
                    <a href="#" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="section section-contacts">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="text-center title">Comunicate con nosotros</h2>
            <h4 class="text-center description">Si tienes alguna duda o consultas sobre nuestros servicios y/o tienes algun problema escribenos un mensaje y nosotros te contestaremos lo más breve posible.</h4>
            <form class="contact-form">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Tu nombre</label>
                    <input type="email" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Tu correo electrónico</label>
                    <input type="email" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleMessage" class="bmd-label-floating">Escribenos</label>
                <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
              </div>
              <div class="row">
                <div class="col-md-4 ml-auto mr-auto text-center">
                  <button class="btn btn-primary btn-raised">
                    Enviar mensaje
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer footer-default">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <a href="https://www.creative-tim.com">
              Creative Tim
            </a>
          </li>
          <li>
            <a href="https://creative-tim.com/presentation">
              About Us
            </a>
          </li>
          <li>
            <a href="http://blog.creative-tim.com">
              Blog
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/license">
              Licenses
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, made with <i class="material-icons">favorite</i> by
        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
      </div>
    </div>
  </footer>
@endsection
