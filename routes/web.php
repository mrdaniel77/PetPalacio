<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColaboradoresController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\PetsController;
use App\Http\Controllers\ServicosController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;

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

/* ROTA PARA UMA DASHBOARD
Route::get('/', [DashboardController::class, 'index']); */


Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/logar', [LoginController::class, 'logar'])->name('logar');
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'home']);

    Route::get('/colaborador', [ColaboradoresController::class, 'index'])->name('colaborador');
    Route::get('/colaborador/novo', [ColaboradoresController::class, 'novo'])->name('colaborador.novo');
    Route::get('/colaborador/editar/{id}', [ColaboradoresController::class, 'editar'])->name('colaborador.editar');
    Route::post('/colaborador/salvar', [ColaboradoresController::class, 'salvar'])->name('colaborador.salvar');
    Route::get('/colaborador/deletar/{id}', [ColaboradoresController::class, 'deletar'])->name('colaborador.deletar');

    Route::get('/cliente', [ClientesController::class, 'index'])->name('cliente');
    Route::get('/cliente/novo', [ClientesController::class, 'novo'])->name('cliente.novo');
    Route::get('/cliente/editar/{id}', [ClientesController::class, 'editar'])->name('cliente.editar');
    Route::post('/cliente/salvar', [ClientesController::class, 'salvar'])->name('cliente.salvar');
    Route::get('/cliente/deletar/{id}', [ClientesController::class, 'deletar'])->name('cliente.deletar');
    Route::get('/cliente/exportar-pdf', [ClientesController::class, 'exportarPDF'])->name('cliente.exportarPDF');


    Route::get('/pet', [PetsController::class, 'index'])->name('Pet');
    Route::get('/pet/novo', [PetsController::class, 'novo'])->name('Pet.novo');
    Route::get('/pet/editar/{id}', [PetsController::class, 'editar'])->name('Pet.editar');
    Route::post('/pet/salvar', [PetsController::class, 'salvar']);
    Route::get('/pet/deletar/{id}', [PetsController::class, 'deletar'])->name('Pet.deletar');

    Route::get('/servico', [ServicosController::class, 'index'])->name('servico');
    Route::get('/servico/novo', [ServicosController::class, 'novo'])->name('servico.novo');
    Route::get('/servico/editar/{id}', [ServicosController::class, 'editar'])->name('servico.editar');
    Route::post('/servico/salvar', [ServicosController::class, 'salvar'])->name('servico.salvar');
    Route::get('/servico/deletar/{id}', [ServicosController::class, 'deletar'])->name('servico.deletar');

    Route::get('/usuario/novo', [UsuarioController::class, 'novo'])->name('usuario.novo');
    Route::get('/usuario', [UsuarioController::class, 'index'])->name('usuario');
    Route::get('/usuario/editar/{id}', [UsuarioController::class, 'editar'])->name('usuario.editar');
    Route::post('/usuario/salvar', [UsuarioController::class, 'salvar'])->name('usuario.salvar');
    Route::get('/usuario/deletar/{id}', [UsuarioController::class, 'deletar'])->name('usuario.deletar');
    
}); 
