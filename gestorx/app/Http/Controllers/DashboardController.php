<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Movimentacao;


class DashboardController extends Controller
{
    public function index()
    {
        $totalProdutos = Produto::count();
        $estoqueTotal  = Produto::sum('quantidade');
        $entradas      = Movimentacao::where('tipo', 'entrada')->sum('quantidade');
        $saidas        = Movimentacao::where('tipo', 'saida')->sum('quantidade');
        $categorias = Categoria::pluck('nome'); // novo
        $recentes = Movimentacao::with('produto')->latest()->take(5)->get();
        $quantidades = Categoria::withCount(['produtos as total_estoque' => function ($q) {$q->select(\DB::raw("SUM(quantidade)")); }])->pluck('total_estoque');
        
        return view('dashboard', compact('totalProdutos', 'estoqueTotal', 'entradas', 'saidas', 'recentes', 'categorias', 'quantidades'));
    }
}
