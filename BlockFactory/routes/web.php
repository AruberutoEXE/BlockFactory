<?php
use App\Http\Controllers\Auth\VerificationController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\FavoritoController;
//use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserSettingsController;
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
Route::post('productos-remove/{id}',[App\Http\Controllers\ProductoController::class,'destroy'])->name('producto.remove');
Route::post('productos-edit/{id}',[App\Http\Controllers\ProductoController::class,'edit'])->name('producto.edit');
Route::resource('categorias',CategoriaController::class);

Route::post('fav-add/{id}',[CarroController::class,'add'])->name('favorito.add');
Route::post('fav-remove/{id}',[CarroController::class,'remove'])->name('favorito.remove');

Route::get('fav-index',[FavoritoController::class,'index'])->name('favorito.index');
Route::get('fav-add/{id}',[FavoritoController::class,'add'])->name('favorito.add');
Route::get('fav-remove/{id}',[FavoritoController::class,'remove'])->name('favorito.remove');




Auth::Routes();
//Auth::routes(['verify' => true]);
Route::get('/set_language/{lang}', [App\Http\Controllers\Controller::class, 'set_language'])->name('set_language');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/NewPassword',  [UserSettingsController::class,'NewPassword'])->name('NewPassword')->middleware('auth');
Route::post('/change/password',  [UserSettingsController::class,'changePassword'])->name('changePassword');

/*Route::middleware(['auth', 'verified'])->group(function () {
    // Rutas protegidas que requieren verificación de correo electrónico
    Route::get('/home', function () {
        return view('auth.dashboard');
    });
});*/

//Auth::routes(['verify' => true]);
/*Route::middleware(['auth'])->group(function () {


Route::get('/email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'notice'])->name('verification.notice');

});
*/