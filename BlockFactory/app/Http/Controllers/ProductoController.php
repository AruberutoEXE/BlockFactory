<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\favorito;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class ProductoController extends Controller
{

    public function index()
    {           
        $auth=false;
        $productos = Producto::paginate();
        if(!empty(Auth::id())){
           $admin= Administrador::where('user_id',Auth::id())->get();
           
            if(!empty($admin)){
                if(sizeof( $admin)!=0){
                    $auth=true;
                }
            }
        }
       
        for($i =0;$i< sizeof($productos);$i++){
            $productos[$i]->fav=false;
            if(!empty(Auth::id())){
                $favorito=favorito::where('producto_id',$productos[$i]->id);
                if(!empty($favorito)){
                    $favorito=$favorito->where('user_id', Auth::id())->first();
                    if(!empty($favorito)){
                        $productos[$i]->fav=true;
                    }
                }
            }
        }
       

        return view('producto.index', compact('productos','auth'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    public function create()
    {
        $producto = new Producto();
        $categorias = Categoria::pluck('tipo','id'); //inner join
        $auth=false;
       
        if(!empty(Auth::id())){
            $admin= Administrador::where('user_id',Auth::id())->get();
            
             if(!empty($admin)){
                 if(sizeof( $admin)!=0){
                     $auth=true;
                 }
             }
         }
        return view('producto.create', compact('producto' , 'categorias','auth'));
    }

    public function store(Request $request)
    {
        request()->validate(Producto::$rules);

        $producto = Producto::create($request->all());
        return redirect()->route('productos.index')
            ->with('success', 'Producto creado correctamente.');
    }

    public function show($id)
    {
        $producto = Producto::find($id);
        $fav=false;
        if(!empty(Auth::id())){
            $admin= Administrador::where('user_id',Auth::id())->get();
            
             if(!empty($admin)){
                 if(sizeof( $admin)!=0){
                     $auth=true;
                 }
             }
         }

         $auth=false;
       
         if(!empty(Auth::id())){
            $admin= Administrador::where('user_id',Auth::id());
             if(!empty($admin)){
                 $auth=true;
             }
         }
        return view('producto.show', compact(['producto','fav','auth']));
    }

    public function edit($id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::pluck('id','tipo'); //inner join
        $auth=false;
       
        if(!empty(Auth::id())){
            $admin= Administrador::where('user_id',Auth::id())->get();
            
             if(!empty($admin)){
                 if(sizeof( $admin)!=0){
                     $auth=true;
                 }
             }
         }
        return view('producto.edit', compact('producto' , 'categorias','auth'));
    }

    public function update(Request $request, Producto $producto)
    {
        request()->validate(Producto::$rules);

        $producto->update($request->all());
        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizadO correctamente');
    }

    public function destroy($id)
    {
        $producto = Producto::find($id)->delete();
        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado correctamente');
    }
}
