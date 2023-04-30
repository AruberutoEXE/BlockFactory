@extends('layouts.app')

@section('template_title')
    {{ $categoria->name ?? 'Show categoria' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h2 class="text-center p-3">MOSTRAR CATEGORÍA</h2>
                    <hr>

                    <div class="card-body bg-light">
                        
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $categoria->tipo }}
                        </div>

                    </div>

                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categorias.index') }}"> Atrás</a>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </section>
@endsection
