<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ColaboradoresController;
use App\Http\Controllers\EquipesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\VeiculosController;
use App\Http\Controllers\ViagensController;

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

Route::get('/', HomeController::class)->name('home');

//ROTAS COLABORADORES


Route::get('colaboradores/inserir', [ColaboradoresController::class, 'create'])->name('colaboradores.inserir');

Route::get('colaboradores/{id}', [ColaboradoresController::class, 'show'])->name('colaboradores.descricao');

Route::get('colaboradores', [ColaboradoresController::class, 'index'])->name('colaboradores');

Route::post('colaboradores/insert', [ColaboradoresController::class, 'insert'])->name('colaboradores.insert');

Route::get('colaboradores/{colaborador}/edit', [ColaboradoresController::class, 'edit'])->name('colaboradores.edit');
 
Route::put('colaboradores/{colaborador}', [ColaboradoresController::class, 'editar'])->name('colaboradores.editar');

Route::get('colaboradores/{colaborador}/delete', [ColaboradoresController::class, 'modal'])->name('colaboradores.modal');

Route::delete('colaboradores/{colaborador}', [ColaboradoresController::class, 'delete'])->name('colaboradores.delete');



//ROTAS EQUIPES


Route::get('equipes/inserir', [EquipesController::class, 'create'])->name('equipes.inserir');

Route::get('equipes/{id}', [EquipesController::class, 'show'])->name('equipes.descricao');

Route::get('equipes', [EquipesController::class, 'index'])->name('equipes');

Route::post('equipes', [EquipesController::class, 'insert'])->name('equipes.insert');

Route::get('equipes/{equipe}/edit', [EquipesController::class, 'edit'])->name('equipes.edit');
 
Route::put('equipes/{equipe}', [EquipesController::class, 'editar'])->name('equipes.editar');

Route::get('equipes/{equipe}/delete', [EquipesController::class, 'modal'])->name('equipes.modal');

Route::delete('equipes/{equipe}', [EquipesController::class, 'delete'])->name('equipes.delete');



//ROTAS VIAGEM


Route::get('viagens/inserir', [ViagensController::class, 'create'])->name('viagens.inserir');

Route::get('viagens/{id}', [ViagensController::class, 'show'])->name('viagens.descricao');

Route::get('viagens', [ViagensController::class, 'index'])->name('viagens');

Route::post('viagens', [ViagensController::class, 'insert'])->name('viagens.insert');

Route::get('viagens/{viagem}/edit', [ViagensController::class, 'edit'])->name('viagens.edit');
 
Route::put('viagens/{viagem}', [ViagensController::class, 'editar'])->name('viagens.editar');

Route::get('viagens/{viagem}/delete', [ViagensController::class, 'modal'])->name('viagens.modal');

Route::delete('viagens/{viagem}', [ViagensController::class, 'delete'])->name('viagens.delete');




//ROTAS VEÍCULOS


Route::get('veiculos/inserir', [VeiculosController::class, 'create'])->name('veiculos.inserir');

Route::get('veiculos/{id}', [VeiculosController::class, 'show'])->name('veiculos.descricao');

Route::get('veiculos', [VeiculosController::class, 'index'])->name('veiculos');

Route::post('veiculos', [VeiculosController::class, 'insert'])->name('veiculos.insert');

Route::get('veiculos/{veiculo}/edit', [VeiculosController::class, 'edit'])->name('veiculos.edit');
 
Route::put('veiculos/{veiculo}', [VeiculosController::class, 'editar'])->name('veiculos.editar');

Route::get('veiculos/{veiculo}/delete', [VeiculosController::class, 'modal'])->name('veiculos.modal');

Route::delete('veiculos/{veiculo}', [VeiculosController::class, 'delete'])->name('veiculos.delete');


//ROTAS CLIENTES

Route::get('clientes/inserir', [ClientesController::class, 'create'])->name('clientes.inserir');

Route::get('clientes/{id}', [ClientesController::class, 'show'])->name('clientes.descricao');

Route::get('clientes', [ClientesController::class, 'index'])->name('clientes');

Route::post('clientes/insert', [ClientesController::class, 'insert'])->name('clientes.insert');

Route::get('clientes/{cliente}/edit', [ClientesController::class, 'edit'])->name('clientes.edit');
 
Route::put('clientes/{cliente}', [ClientesController::class, 'editar'])->name('clientes.editar');

Route::get('clientes/{cliente}/delete', [ClientesController::class, 'modal'])->name('clientes.modal');

Route::delete('clientes/{cliente}', [ClientesController::class, 'delete'])->name('clientes.delete');


//login


Route::post('painel', [UsuariosController::class, 'login'])->name('usuarios.login');

Route::get('/', [UsuariosController::class, 'logout'])->name('usuarios.logout');
