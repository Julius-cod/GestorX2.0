<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Movimentacao;


class DashboardController extends Controller
{
    public function index()
    {
        $totalProdutos = Produto::count();
        $estoqueTotal  = Produto::sum('quantidade');
        $entradas      = Movimentacao::where('tipo', 'entrada')->sum('quantidade');
        $saidas        = Movimentacao::where('tipo', 'saida')->sum('quantidade');

        $recentes = Movimentacao::with('produto')->latest()->take(5)->get();

        return view('dashboard', compact('totalProdutos', 'estoqueTotal', 'entradas', 'saidas', 'recentes'));
    }
}
