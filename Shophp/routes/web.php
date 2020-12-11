<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProdutoController;

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

//Rotas Cliente
Route::get('/', function () {
    return view('index', ['pagename' => 'Home']);
});

Route::get('/clientes', [UserController::class, 'index']);

Route::get('/cliente/inserir', [UserController::class, 'loadform']);
Route::post('/cliente/inserir/action', [UserController::class, 'store']);

Route::get('/cliente/editar/{id}', [UserController::class, 'loadformupdate']);
Route::post('/cliente/editar/action/{id}', [UserController::class, 'update']);

Route::get('/cliente/excluir/{id}', function($id) {
    $userController = new UserController();
    if($userController->destroy($id) == "sim")
        return redirect("/clientes");
    else
        return "Erro: não foi possível deletar o registro";
});

//Rotas Compra
Route::get('/compras', [CompraController::class, 'index']);

Route::get('/compra/inserir', [CompraController::class, 'loadform']);
Route::post('/compra/inserir/action', [CompraController::class, 'store']);

Route::get('/compra/editar/{id}', [CompraController::class, 'loadformupdate']);
Route::post('/compra/editar/action/{id}', [CompraController::class, 'update']);

Route::get('/compra/excluir/{id}', function($id) {
    $compraController = new CompraController();
    if($compraController->destroy($id) == "sim")
        return redirect("/compras");
    else
        return "Erro: não foi possível deletar o registro";
});

//Rotas Produto
Route::get('/produtos', [ProdutoController::class, 'index']);

Route::get('/produto/inserir', [ProdutoController::class, 'loadform']);
Route::post('/produto/inserir/action', [ProdutoController::class, 'store']);

Route::get('/produto/editar/{id}', [ProdutoController::class, 'loadformupdate']);
Route::post('/produto/editar/action/{id}', [ProdutoController::class, 'update']);

Route::get('/produto/excluir/{id}', function($id) {
    $produtoController = new ProdutoController();
    if($produtoController->destroy($id) == "sim")
        return redirect("/produtos");
    else
        return "Erro: não foi possível deletar o registro";
});