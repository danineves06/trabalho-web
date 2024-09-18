<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CorController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\CarroController;


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

Route::resource('/cor', CorController::class);
Route::resource('/marca', MarcaController::class);
Route::resource('/modelo', ModeloController::class);
Route::resource('/carro', CarroController::class);
Route::get('/report/carro/{carro_id}', 'App\Http\Controllers\CarroController@report')->name('carro.report');

