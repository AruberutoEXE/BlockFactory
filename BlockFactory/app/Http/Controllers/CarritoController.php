<?php
namespace App\Http\Controllers;
use App\Models\Carrito;
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
        $lineascarro = Carrito::where('slug', $user->id)->firstOrFail();
        return view('Carrito.index', compact('lineascarro'));
    }
   
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        
        return view('Carrito.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
       $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'edad' => 'required'
        ]);
        
        Carrito::create($request->post());

        return redirect()->route('Carrito.index')->with('success','Carrito se ha creado con exito.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Carrito  $Carrito
    * @return \Illuminate\Http\Response
    */
    public function show(Carrito $Carrito)
    {
        return view('Carrito.show',compact('Carrito'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Carrito  $Carrito
    * @return \Illuminate\Http\Response
    */
    public function edit(Carrito $Carrito)
    {
        return view('Carrito.edit',compact('Carrito'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Carrito  $Carrito
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Carrito $Carrito)
    {
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'edad' => 'required'
        ]);
        
        $Carrito->fill($request->post())->save();

        return redirect()->route('Carrito.index')->with('success','Carrito Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Carrito  $Carrito
    * @return \Illuminate\Http\Response
    */
    public function destroy(Carrito $Carrito)
    {
        $Carrito->delete();
        return redirect()->route('Carrito.index')->with('success','Carrito has been deleted successfully');
    }
}
