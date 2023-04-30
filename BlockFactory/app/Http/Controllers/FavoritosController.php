<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\favorito;

use Illuminate\Support\Facades\Auth;
class FavoritosController extends Controller
{
    
    public function add(Request $request){

        if(!empty(Auth::id())){
            favorito::create(['producto_id'=>$request->id,'user_id'=>Auth::id()->first()]);
            
            $producto = Producto::find($request->id);
            return view('producto.show', compact('producto'));
        }else{
            return view('Auth.login');
        }
    }
    public function remove(Request $request)
    {
        
        if(!empty(Auth::id())){
            $linea=favorito::where('producto_id',$request->id)->first();
            $linea->delete();
            $producto = Producto::find($request->id);
            return view('producto.show', compact('producto'));
        }else{
            return view('Auth.login');
        }
    }
}
