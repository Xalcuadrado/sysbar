<!DOCTYPE html>
<html>
<head>
	<title>No Autorizado</title>
	<meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{asset('css/material-kit.css')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('demo/demo.css')}}" rel="stylesheet" />
  <link href="{{asset('css/style.css')}}" rel="stylesheet" />
</head>
<body style="background-image: url('{{ asset('img/bg_4.jpg') }}');background-repeat: no-repeat;
background-attachment: fixed; background-size: 100% 100%">
	<div class="container" style="background-color: #eee; border-radius: 20px; margin-top: 100px; ">
		<div class="row">
			<div class="col-sm" style="">
				 <img style="width:  500px; height: 500px; margin-top: 10px; margin-bottom: 15px;" src="{{asset('img/senal-alto.jpg')}}" class="img-raised img-thumbnail img-fluid">
			</div>
			<div class="col-4">
				<h3>
					<strong style="color: red;">
						Hola, usted no tiene autorización para ingresar a este enlace, se le recomienda regresar al inicio. 
					</strong>
					<p style="color: black;">
						Cualquier duda comuniquese con <a href="">nosotros.</a>
					</p>
				</h3>
				<a href="{{ url('/') }}" class="btn btn-info btn-xl btn-round">Volver al inicio</a>
			</div>
		</div>
	</div>
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
</body>
</html>