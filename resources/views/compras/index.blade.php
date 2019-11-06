@extends('layouts.app')
@section('title','Lista de compras')
@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/bg_4.jpg') }}')">
</div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Listado de compras</h2>
        @can('compras.create')
			<a href="{{ url('/compras/create') }}" class="btn btn-primary btn-round">Nueva compra</a>
			@endcan
      <p></p>
      <div class="row">
          <div class="col-sm">
            @include('compras.search')
          </div>
        </div>
        <div class="team">
          <div class="row">
            <table class="table">
    			    <thead>
    			        <tr>
    			            <th class="text-center">#</th>
                      <th >Comprobante</th>
                      <th >Proveedor</th>
                      <th >Impuesto</th>
                      <th >Total</th>
                      <th >Estado</th>
    			            <th class="text-right">Acciones</th>
    			        </tr>
    			    </thead>
    			    <tbody>
                @foreach($empresas as $e)
                  @foreach($empresa_users as $eu)
                    @foreach($compras as $compra)  
                      @if(auth()->id()==$eu->idusers && $compra->usuario==$eu->idusers && $e->idempresa==$compra->empresa)
                      <tr>
                        <td>{{ $compra->idcompra }}</td>
                        <td>{{ $compra->t_comprobante }} : {{ $compra->n_comprobante }}</td>
                        <td>{{ $compra->nombre }}</td>
                        <td>{{ $compra->impuesto * 100 }}%</td>
                        <td>$ {{ $compra->total }}</td>
                        <td>{{ $compra->estado }}</td>
      			    			  <td class="td-actions text-right">
      			              @can('compras.show')
      			    			      <a href="{{ route('compras.show', $compra->idcompra )}}" rel="tooltip" title="Ver en detalle" class="btn btn-info btn-sm">
      			    			        <i class="fa fa-info"></i>
      			    			      </a>
      			              @endcan
      			              @can('compras.destroy')
                            @if($compra->estado=='Realizado')
                            <a href="" data-target="#modal-delete-{{$compra->idcompra}}" data-toggle="modal" rel="tooltip" title="Anular" class="btn btn-danger btn-sm">
                              <i class="fa fa-times-circle"></i>
                            </a>
                            @else
                            <label> &nbsp; - se anuló</label>
                            @endif
      			              @endcan
      			    			  </td>
      			    			</tr>
                      @endif
                    @endforeach   
                  @endforeach
                @endforeach
    			    </tbody>
			      </table>
            {{ $compras->links("pagination::bootstrap-4") }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer footer-default">
    @foreach($compras as $compra)
    @include('compras.modal')
    @endforeach
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
