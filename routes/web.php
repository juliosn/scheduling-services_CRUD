<?php

use Illuminate\Support\Facades\Route;
use App\Models\Servicos;
use Illuminate\Http\Request;
use App\Http\Controllers\ServicosController;

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

Route::get('/', function () {
    return view('index');
});

Route::get('listar-servicos', [ServicosController::class, 'listar']);
Route::get('cadastrar-servicos', [ServicosController::class, 'index']);
Route::post('salvar-servicos', [ServicosController::class, 'salvar']);
Route::get('editar-servicos/{id}', [ServicosController::class, 'editar']);
Route::post('atualizar-servicos', [ServicosController::class, 'atualizar']);
Route::get('excluir-servicos/{id}', [ServicosController::class, 'excluir']);
