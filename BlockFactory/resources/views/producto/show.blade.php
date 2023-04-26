@extends('layouts.app')

@section('template_title')
    {{ $producto->name ?? 'Show producto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar producto</span>
                        </div>
                        
                        <img class="card-img-top" src="img/{{$producto->nombre}}.png" alt="Card image cap">

                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('productos.index') }}"> Back</a>
                        </div>

                        <div class="btn-group">
                       
                        <a class="btn btn-sm btn-primary " href="{{ route('carro.add',$producto->id) }}"><i class="fa fa-fw fa-eye"></i> Añadir al carrito</a>
                      </div>
                    </div>

                    

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Categoria:</strong>
                            {{ $producto->categoria_id }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $producto->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
