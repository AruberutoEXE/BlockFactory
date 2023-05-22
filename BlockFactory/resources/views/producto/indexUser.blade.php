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
            
            <h2 class="text-center p-3">@lang('messages.LISTADO')</h2>
          
            @isset($auth)
              @if($auth)
                <div class="float-right">
                  <a href="{{ route('productos.create') }}" class="btn btn-primary btn-sm "  data-placement="left">
                    @lang('messages.new')
                  </a>
                </div>
              @endif
            @endisset

        </div>
<hr>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
        @endif

        <div class="album py-5 bg-light">

          <div class="container">
            <div class="row">
              
              @foreach ($productos as $producto)
              <div class="col-md-6 col-lg-3">
                <div class="card mb-4 box-shadow border-dark mb-4">
                  <img class="card-img-top" style="max-height:195px;" src="img/{{$producto->id}}.png" alt="Card image cap">
                  <div class="card-body bg-light">
                    <h5>Nombre</h5>
                    <p class="card-text">{{ $producto->nombre }}</p>
                    <h5 class="text-muted">{{ $producto->precio }} €</h5>
                    <br>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a class="btn btn-sm btn-primary " href="{{ route('productos.show',$producto->id) }}"><i class="fa fa-fw fa-eye"></i>@lang('messages.mas')</a>
                      </div>

                      <div class="btn-group">
                        <a class="btn btn-sm btn-success" href="{{ route('carro.add',$producto->id) }}"><i class="fa fa-fw fa-eye"></i> @lang('messages.add')</a>
                      </div>

                      

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