@extends('layouts.app')

@section('template_title')
producto
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div style="display: flex; justify-content: space-between; align-items: center;">

            <span id="card_title">
              {{ __('LISTADO DE PRODUCTOS EN NUESTRA TIENDA ') }}
            </span>
          </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
        @endif

        <div class="album py-5 bg-light">

          <div class="container">
            <div class="row">
              @foreach ($productos as $producto)
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" src="img/{{$producto->nombre}}.png" alt="Card image cap">
                  <div class="card-body">
                    <p class="card-text">{{ $producto->descripcion }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a class="btn btn-sm btn-primary " href="{{ route('productos.show',$producto->id) }}"><i class="fa fa-fw fa-eye"></i> Ver más</a>
                      </div>

                      <div class="btn-group">
                        <a class="btn btn-sm btn-primary " href="{{ route('carro.add',$producto->id) }}"><i class="fa fa-fw fa-eye"></i> Añadir al carrito</a>
                      </div>

                      <span class="">{{ $producto->nombre }}</span>
                      <span class="text-muted">{{ $producto->precio }} €</span>

                    </div>
                  </div>
                </div>
              </div>
              @endforeach

            </div>
          </div>
          {!! $productos->links() !!}
        </div>
      </div>
    </div>
    @endsection