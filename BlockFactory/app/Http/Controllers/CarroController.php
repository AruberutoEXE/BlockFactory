<?php

namespace App\Http\Controllers;
use App\Models\Carro;
use App\Models\LineaCarro;
use App\Models\Compra;
use App\Models\LineaCompra;
use App\Models\Usuario;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class CarroController extends Controller
{
     /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $carro = Carro::where('idCliente', Auth::id())->first();
        $id=$carro->id;
        $lineas=LineaCarro::where('carro_id', $id)->get();
        $productos=[];
        $total=0;
        for ($i=0 ; $i<count($lineas);$i++) {
            $productos[$i]=$lineas[$i]->producto;
            $total=$total+$productos[$i]->precio;
        }
        return view('carro.index', compact(['carro','productos','total']));
    }
/**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Producto  $producto
    * @return \Illuminate\Http\Response
    */
    public function add(Producto $producto){
        $carro = Carro::where('idCliente', Auth::id())->first();
        if(!$carro){
            $carro = Carro::create(['idCliente'=>Auth::id()]);
        }
        LineaCarro::create(['idProducto'=>$producto->id,'idCarro'=>$carro->id]);
        
        return redirect('productos');
    }

     /**
    * Remove the specified resource from storage.
    *@param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Carro  $Carro
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request,Carro $Carro)
    {
        
        $carro = Carro::where('idCliente', Auth::id())->firstOrFail();
        $lineascarro=$carro->lineasCarro();
        $compra=Compra::create(['idCliente'=>Auth::id()]);
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
    * @param  \App\Models\Carro  $Carro
    * @return \Illuminate\Http\Response
    */
    public function removeitem(Request $request, LineaCarro $linea)
    {
        $linea->delete();
        return redirect()->route('carro.index');
    }
    

}