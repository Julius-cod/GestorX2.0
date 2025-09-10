<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\MovimentacaoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RelatorioController;

// todas as rotas : 

// ROTAS DE CADASTRO  , LOGIN, LOGOUT (rotas livres)

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// ROTAS PROTEGIDAS
Route::middleware(['auth'])->group(function () {

    // Dashboard → todos os roles têm acesso
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // PRODUTOS (apenas admin e gestor)
    Route::middleware(['role:admin,gestor'])->group(function () {
        Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
        Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
        Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
        Route::get('/produtos/{id}', [ProdutoController::class, 'show'])->name('produtos.show');
        Route::get('/produtos/{id}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');
        Route::put('/produtos/{id}', [ProdutoController::class, 'update'])->name('produtos.update');
        Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');
    });

    // CATEGORIAS (apenas admin e gestor)
    Route::middleware(['role:admin,gestor'])->group(function () {
        Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
        Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
        Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
        Route::get('/categorias/{id}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
        Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
        Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
    });

    // MOVIMENTAÇÕES (admin, gestor e operador)
    Route::middleware(['role:admin,gestor,operador'])->group(function () {
        Route::get('/movimentacoes', [MovimentacaoController::class, 'index'])->name('movimentacoes.index');
        Route::get('/movimentacoes/create', [MovimentacaoController::class, 'create'])->name('movimentacoes.create');
        Route::post('/movimentacoes', [MovimentacaoController::class, 'store'])->name('movimentacoes.store');
        Route::get('/produtos/{id}/historico', [ProdutoController::class, 'historico'])->name('produtos.historico')->middleware('auth');
    });

    // RELATÓRIOS (apenas admin e gestor)
    Route::middleware(['role:admin,gestor'])->group(function () {
        Route::get('/relatorios', [RelatorioController::class, 'index'])->name('relatorios.index');
    });

});