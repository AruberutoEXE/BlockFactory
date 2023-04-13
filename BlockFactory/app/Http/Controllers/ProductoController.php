<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index()
    {
        $productos = Producto::paginate();
        
        return view('producto.index', compact('productos'))
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
            ->with('success', 'producto created successfully.');
    }

    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
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
            ->with('success', 'producto updated successfully');
    }

    public function destroy($id)
    {
        $producto = Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('success', 'producto deleted successfully');
    }
}
