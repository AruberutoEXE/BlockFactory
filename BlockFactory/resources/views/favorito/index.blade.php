@extends('layouts.app')

@section('template_title')
favorito
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                        <h2 class="text-center p-3">LISTA FAVORITOS</h2>
  
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
                    @foreach ($favoritos as $favorito)
                        <div class="col-md-6 col-lg-3">
                        <div class="card mb-4 box-shadow border-dark mb-4">
                            <img class="card-img-top" style="max-height:195px;" src="img/{{$favorito->producto->id}}.png" alt="Card image cap">
                            <div class="card-body bg-light">
                            <h5>Nombre</h5>
                            <p class="card-text">{{ $favorito->producto->nombre }}</p>
                            <h5 class="text-muted">{{ $favorito->producto->precio }} €</h5>
                            <br>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                <a class="btn btn-sm btn-primary " href="{{ route('productos.show',$favorito->producto->id) }}"><i class="fa fa-fw fa-eye"></i>@lang('messages.mas')</a>
                                </div>

                                <div class="btn-group">
                                <a class="btn btn-sm btn-success" href="{{ route('carro.add',$favorito->producto->id) }}"><i class="fa fa-fw fa-eye"></i> @lang('messages.add')</a>
                                </div>

                                    <div>
                                        <a class="btn btn-primary" style="margin-left:1%" href="{{ route('favorito.remove',$favorito->producto->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg> 
                                        </a>
                                    </div>          
                                    
                               

                            </div>
                            </div>
                        </div>
                        </div>
                        @endforeach

                    </div>
                    </div>
                    </div>
                </div>
                {!! $favoritos->links() !!}
            </div>
        </div>
    </div>
@endsection