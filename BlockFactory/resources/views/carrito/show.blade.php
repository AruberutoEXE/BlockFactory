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
                            <span class="card-title">Mostrar carrito</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('Carrito.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>categoria Id:</strong>
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
