@extends('layouts.app')

@section('template_title')
    Create producto
@endsection

@section('content')
    <section class="content container-fluid ">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h2 class="text-center p-3">CREAR PRODUCTO</h2>
                    </div>

                    <div class="float-right m-3">
                            <a class="btn btn-primary" href="{{ route('productos.index') }}"> Atrás</a>
                        </div>

                    <div class="card-body bg-light">
                        <form method="POST" action="{{ route('productos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('producto.form')

                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
@endsection
