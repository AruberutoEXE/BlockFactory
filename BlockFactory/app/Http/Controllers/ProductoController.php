<?php

namespace App\Http\Controllers;

use App\Models\favorito;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class ProductoController extends Controller
{

    public function index()
    {
        $productos = Producto::paginate();
        
        return view('producto.indexUser', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    public function create()
    {
        $producto = new Producto();
        $categorias = Categoria::pluck('id','tipo'); //inner join
        return view('producto.create', compact('producto' , 'categorias'));
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
        $fav=true;
        if(!empty(Auth::id())){
            $favorito=favorito::where('id_producto',$id)->where('id_user', Auth::id());
            if(empty($favorito)){
                $fav=false;
            }
         }else{
            $fav=false;
        }
        return view('producto.show', compact(['producto','fav']));
    }

    public function edit($id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::pluck('id','tipo'); //inner join
        return view('producto.edit', compact('producto' , 'categorias'));
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
