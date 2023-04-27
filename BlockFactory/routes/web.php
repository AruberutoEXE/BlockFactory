<?php


use App\Http\Controllers\CarroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserSettingsController;
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
    return redirect('productos');
});

Route::get('/home', function () {
    return view('auth.dashboard');
    })->middleware('auth');

//Auth::routes();
Route::get('carro-add/{id}',[CarroController::class,'add'])->name('carro.add');
Route::get('carro-index',[CarroController::class,'index'])->name('carro.index');
Route::post('carro-removeItem/{id}',[CarroController::class,'removeitem'])->name('carro.removeitem');
Route::post('carro-store',[CarroController::class,'store'])->name('carro.store');
Route::resource('productos',ProductoController::class);
Route::resource('categorias',CategoriaController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Auth::routes();
Route::get('/set_language/{lang}', [App\Http\Controllers\Controller::class, 'set_language'])->name('set_language');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/NewPassword',  [UserSettingsController::class,'NewPassword'])->name('NewPassword')->middleware('auth');
Route::post('/change/password',  [UserSettingsController::class,'changePassword'])->name('changePassword');
