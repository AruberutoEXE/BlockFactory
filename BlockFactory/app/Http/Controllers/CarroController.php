<?php

namespace App\Http\Controllers;
use App\Models\Carro;
use App\Models\LineaCarro;
use App\Models\Compra;
use App\Models\LineaCompra;
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
        if(empty($carro)){
            $carro =Carro::create(['idCliente'=>Auth::id()]);
            $user=Auth::user();
            $user->idCarro=$carro->id;
        }


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
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function add(Request $request){

        $carro = Carro::where('idCliente', Auth::id())->first();
        if(empty($carro)){
            $carro =Carro::create(['idCliente'=>Auth::id()]);
            $user=Auth::user();
            $user->idCarro=$carro->id;
        }
        LineaCarro::create(['producto_id'=>$request->id,'carro_id'=>$carro->id]);
        
        return redirect('productos');
        
    }

     /**
    * Remove the specified resource from storage.
    *
    * 
    * @return \Illuminate\Http\Response
    */
    public function store()
    {
        
        $carro = Carro::where('idCliente', Auth::id())->firstOrFail();
        $lineascarro=LineaCarro::where('carro_id',$carro->id)->get();
        $compra=Compra::create(['idCliente'=>Auth::id()]);
        foreach ($lineascarro as $lineacarro) {
            LineaCompra::create(['producto_id'=>$lineacarro->producto_id,'compra_id'=>$compra->id]);
            $lineacarro->delete();
        }
        $productos = Producto::paginate();
        
        return view('producto.indexUser', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
        
            
    }
    


 /**
    * Remove the specified resource from storage.
    *@param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Carro  $Carro
    * @return \Illuminate\Http\Response
    */
    public function removeitem(Request $request)
    {
        $linea=LineaCarro::find($request->id);
        $linea->delete();
        return redirect()->route('carro.index');
    }
    

}