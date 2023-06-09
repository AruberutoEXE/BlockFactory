<?php

namespace App\Http\Controllers;
use App\Models\Carro;
use App\Models\LineaCarro;
use App\Models\Compra;
use App\Models\LineaCompra;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;



class CarroController extends Controller
{
     /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        if(!empty(Auth::id())){
            $carro = Carro::where('idCliente', Auth::id())->first();
            if(empty($carro)){
                $carro =Carro::create(['idCliente'=>Auth::id()]);
                $user=Auth::user();
                $user->idCarro=$carro->id;
            }


            $id=$carro->id;
            $lineas=LineaCarro::where('carro_id', $id)->orderBy('producto_id', 'desc')->get();
            $productos=[];
            
            $total=0;
            for ($i=0 ; $i<count($lineas);$i++) {
                if($i==0){
                    $productos[0]=array($lineas[$i]->producto,0);
                }

                if($productos[sizeof($productos)-1][0]->id==$lineas[$i]->producto_id){
                    $productos[sizeof($productos)-1][1]++;   
                }else{
                    $productos[sizeof($productos)-1]=array($lineas[$i]->producto,1);
                }

                $total=$total+$productos[sizeof($productos)-1][0]->precio;
            }
            return view('carro.index', compact(['carro','productos','total']));
        }else{
            return view('Auth.login');
        }
    }
/**
    * Remove the specified resource from storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function add(Request $request){
        if(!empty(Auth::id())){
        $carro = Carro::where('idCliente', Auth::id())->first();
        if(empty($carro)){
            $carro =Carro::create(['idCliente'=>Auth::id()]);
            $user=Auth::user();
            $user->idCarro=$carro->id;
        }
        LineaCarro::create(['producto_id'=>$request->id,'carro_id'=>$carro->id]);
        $producto = Producto::find($request->id);
        $stock = $producto->cantidad -= 1;
        if ($stock < 0) {
            $stock = 0;
        }
        $producto->cantidad = $stock;
        $producto->save();
        
        return Redirect::back();//return redirect()->route('productos.index')->with('success','Producto añadido al carrito correctamente');}
    }else{
           
                return view('Auth.login');
        }
        
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
        
        return Redirect::back();//return view('producto.indexUser', compact('productos'))->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
        
            
    }
    


 /**
    * Remove the specified resource from storage.
    *@param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Carro  $Carro
    * @return \Illuminate\Http\Response
    */
    public function removeitem(Request $request)
    {
        $linea=LineaCarro::where('producto_id',$request->id)->first();
        $linea->delete();
        $producto = Producto::find($request->id);
        $stock = $producto->cantidad += 1;
        $producto->cantidad = $stock;
        $producto->save();
        return Redirect::back();//->route('productos.index')->with('success', 'Producto eliminado correctamente del carrito');
    
    }
    

}