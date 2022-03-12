<?php

use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\MonografiaController;
use App\Models\Articulo;
use App\Models\Departamento;
use Illuminate\Support\Facades\Route;

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


Route::get('/dashboard', function () {
    return view('dashboard');
    /* return redirect('/monografias'); */
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



Route::get('/monografias/index', [MonografiaController::class, 'index']);
Route::resource('monografias', MonografiaController::class)->middleware(['auth', 'can:dashboard-admin']);


/*------Con esto simplifica toda la ruta anterior-------
$articulos = Articulo::withCount(['autores', 'monografias'])->get();
return view('articulos', [
    'articulos' => $articulos,
]);
*/

/* Número de autores que tienen cada artículo */
Route::get('/articulos',function(){
    $autores = Articulo::with('autores')->withcount('autores')->get();
//autores_count
/* Número de monografías que tienen los artículos */
    $monografias = Articulo::with('monografias')->withcount('monografias')->get();
//monografias_count
    return view('articulos.articulos',[
        'autores' => $autores,
        'monografias' => $monografias,
        'articulos'=> Articulo::all(),
    ]);
})->name('articulos');
/*  */


Route::get('/monografias/{monografia}/autores',[MonografiaController::class, 'autores']);
