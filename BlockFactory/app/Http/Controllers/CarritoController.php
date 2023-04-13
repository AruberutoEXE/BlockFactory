<?php
namespace App\Http\Controllers;
use App\Models\Carrito;
use App\Models\LineaCarro;
use App\Models\Compra;
use App\Models\LineaCompra;
use Illuminate\Http\Request;
use Session;

class CarritoController extends Controller
{
     /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $user = Session::get('usuario');
        $carro = Carrito::where('idCliente', $user->id)->firstOrFail();
        
        return view('Carrito.index', compact('carro'));
    }
   
   
    /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Models\Carrito  $Carrito
    * @return \Illuminate\Http\Response
    */
    public function store(Carrito $Carrito)
    {
      
        
        $compra=Compra::create($Carrito);
        $user = Session::get('usuario');
        $carro = Carrito::where('idCliente', $user->id)->firstOrFail();
        $lineascarro=$carro->lineasCarrito();
        
        foreach ($lineascarro as $lineacarro) {
            LineaCompra::create(['idProducto'=>$lineacarro->idProducto,'idCompra'=>$compra->id]);
            $lineacarro->delete();
        }
        $carro->delete();
        return redirect()->route('producto.index');
    }



    /**
    * Remove the specified resource from storage.
    *@param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Carrito  $Carrito
    * @return \Illuminate\Http\Response
    */
    public function destroy(Request $request, Carrito $Carrito)
    {
        $idP=$request->post()->idLinea;
        LineaCarro::where('id',$idP)->first()->delete();
        return redirect()->route('Carrito.index');
    }
}
