@extends('layouts.app')

@section('template_title')
    {{ $producto->name ?? 'Show producto' }}
@endsection

@section('content')
    <section class="content container-fluid">

    <div class="container">   
        <div class="card-group ">

            

            <div class="card  border-dark bg-light">
                <div class="float-left m-1 ">
                    <span class="card-title ">MOSTRAR PRODUCTO</span>
                </div>
                        
                <img class="card-img-top m-1" src="img/{{$producto->nombre}}.png" alt="Card image cap">     
            </div>

            <div class="card  border-dark bg-light">
                        
                        <div class="form-group m-1">
                            <strong>Nombre:</strong>
                            {{ $producto->nombre }}
                        </div>
                        <div class="form-group m-1">
                            <strong>Categoria:</strong>
                            {{ $producto->categoria_id }}
                        </div>
                        <div class="form-group m-1">
                            <strong>Descripción:</strong>
                            {{ $producto->descripcion }}
                        </div>
                    
                        <div class="float-right m-1">
                            <a class="btn btn-primary" href="{{ route('productos.index') }}"> Atrás</a>
                        </div>
                        
                        <div class="float-right m-1">
                       
                            <a class="btn btn-primary" href="{{ route('carro.add',$producto->id) }}"><i class="fa fa-fw fa-eye"></i> Añadir al carrito</a>
                        </div>

            </div>
        </div>
    </div> 
    </section>
@endsection
