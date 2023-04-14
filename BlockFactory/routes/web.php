<?php


use Illuminate\Support\Facades\Route;
/*use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CarroController;*/
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('auth.dashboard');
    })->middleware('auth');

//Auth::routes();

Route::get('/carro.add/{$nombre}', [App\Http\Controllers\CarroController::class, 'add'])->name('carro.add');
Route::get('/carro.add/{$nombre}', [App\Http\Controllers\CarroController::class, 'removeitem'])->name('carro.removeitem');

Route::resource('productos',ProductoController::class);
Route::resource('categorias',CategoriaController::class);
Route::resource('carro',CarroController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


