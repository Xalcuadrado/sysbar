<div class="collapse multi-collapse" id="multiCollapse{{ $producto->idproducto }}">
  <div class="card card-body">
    @foreach($detalles as $dt)
      @if($dt->idproducto==$producto->idproducto)
        <p>→ {{ $dt->cantidad }} de {{ $dt->ingrediente }} </p>
      @endif
    @endforeach
  </div>
  <br>
</div>