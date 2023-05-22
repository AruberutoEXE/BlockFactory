<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\favorito;
use App\Models\Administrador;

use App\Models\Producto;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FavoritoController extends Controller
{

    public function index()
    {
        if (!empty(Auth::id())) {
            $favoritos = favorito::paginate();
            $auth = false;
            if (!empty(Auth::id())) {
                $admin = Administrador::where('user_id', Auth::id());
                if (!empty($admin)) {
                    $auth = true;
                }
            }
            return view('favorito.index', compact('favoritos', 'auth'))
                ->with('i', (request()->input('page', 1) - 1) * $favoritos->perPage());
        } else {
            return view('Auth.login');
        }

    }

    public function add(Request $request)
    {

        if (!empty(Auth::id())) {
            favorito::create(['producto_id' => $request->id, 'user_id' => Auth::id()]);
            return Redirect::back();
        } else {
            return view('Auth.login');
        }
    }
    public function remove(Request $request)
    {

        if (!empty(Auth::id())) {
            $linea = favorito::where('producto_id', $request->id)->first();
            $linea->delete();
        
            return Redirect::back();
        } else {
            return view('Auth.login');
        }
    }
}