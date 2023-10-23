<?php

use App\Http\Controllers\InicioController;
use App\Http\Controllers\LugaresController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->name('inicio');

Route::get('/', [InicioController::class, 'index'])->name('inicio');

Route::resource("administrar", LugaresController::class);

Route::get("imagenes/{carpeta1}/{carpeta2}/{archivo}",function($carpeta1,$carpeta2,$archivo){
    $ruta=storage_path("app/".$carpeta1."/".$carpeta2."/".$archivo);
    return response()->file($ruta);
    //return $ruta;
});