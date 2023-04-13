@extends('layouts.app')

@section('template_title')
carrito
@endsection

@section('content')
<div class="container">
            <header class="blog-header py-3">
                
            </header>


        <main class="container">
            

            <div class="row g-6 rounded ">
                <div class="col-md-8">


                    <article class="blog-post  p-3 rounded ">
                        
                    <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
										<th>Nombre</th>
                                        <th>Precio</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carro->lineasCarrito as $lineacarro)
                                        <tr>
											<td>{{ $lineacarro->producto->nombre }}</td>
                                            <td>{{ $lineacarro->producto->precio }}€</td>
                                            <td>
                                                <form action="{{ route('carrito.destroy',$carro->id) }}" method="POST">
                                                    @csrf
                                                    <hidden name="idLinea" value="{{ $lineacarro->id }}" class="form-control" />
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                    </article>


                </div>

                <div class="col-md-4">
                    <div class="position-sticky" style="top: 2rem;">
                        <div class="p-4 mb-3 bg-light rounded ">
                            <p class="mb-0">TOTAL</p>
                        </div>

                        <div class="p-4 bg-secondary">
                        <form method="POST" action="{{route('productos.store') }}"  role="form" enctype="multipart/form-data">
                           

                        </form>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>

        </main>

     
@endsection
