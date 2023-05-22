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

                      @if($producto->fav) 
                            <div>
                                <a class="btn btn-primary" style="margin-left:1%" href="{{ route('favorito.remove',$producto->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg> 
                                </a>
                            </div>          
                            
                        @else
                            <div>
                                <a class="btn btn-primary" style="margin-left:1%" href="{{ route('favorito.add',$producto->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                    </svg>
                                </a>
                            </div>    
                        @endif

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