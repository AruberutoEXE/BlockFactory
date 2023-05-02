<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< Updated upstream:BlockFactory/app/Http/Controllers/FavoritosController.php
use App\Models\favorito;
=======
use App\Models\Favorito;
use App\Models\Producto;
>>>>>>> Stashed changes:BlockFactory/app/Http/Controllers/FavoritoController.php

use Illuminate\Support\Facades\Auth;
class FavoritoController extends Controller
{

    public function index()
    {
        $favoritos = Favorito::paginate();
        return view('favorito.index', compact('favoritos'))
            ->with('i', (request()->input('page', 1) - 1) * $favoritos->perPage());
        
    }
    
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
