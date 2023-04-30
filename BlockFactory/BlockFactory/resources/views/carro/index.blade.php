@extends('layouts.app')

@section('template_title')
carrito
@endsection

@section('content')

    <div class="container">   
        <div class="card-group ">
            <div class="card  border-dark bg-light">
                <div class="float-left m-1 ">
                <h2 class="text-center p-3">CARRO COMPRA </h2>
                </div>
                
                

                <div class="card   bg-light">
                    <table class="table table-striped table-hover text-center">
                        <thead class="thead">
                            <tr>
										<th>Nombre</th>
                                        <th>Precio</th>
                                        <th></th>
                            </tr>
                        </thead>
                            <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
											<td>{{ $producto->nombre }}</td>
                                            <td>{{ $producto->precio }}€</td>
                                            <td>
                                                <form action="{{ route('carro.removeitem',$producto) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                </div>
                <div class="card  bg-light">
                        <div class="position-sticky" style="top: 2rem;">
                            <div class="p-1 mb-3 bg-light rounded ">
                            <h2 class="text-center p-3">Total:  <hr></h2>
                                <h1 class="text-center mb-0">{{ $total }} €</h1>
                                <div class="col text-center pb-2">
                                    <form method="POST" action="{{route('carro.store') }}"  role="form" enctype="multipart/form-data">
                                        @csrf
                                        <button class=" btn btn-primary" type="submit" >Comprar</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                
            </div>
        </div>
    </div>

     </main>

     
@endsection
