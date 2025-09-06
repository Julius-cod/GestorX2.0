<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Movimentacao;

class RelatorioController extends Controller
{
 public function index()
    {
        // Total de produtos cadastrados
        $totalProdutos = Produto::count();

        // Quantidade total de entradas e saídas
        $entradas = Movimentacao::where('tipo', 'entrada')->sum('quantidade');
        $saidas = Movimentacao::where('tipo', 'saida')->sum('quantidade');

        // Valor total em estoque (quantidade * preço de cada produto)
        $valorEstoque = Produto::all()->sum(function ($produto) {
            return $produto->quantidade * $produto->preco;
        });

        // Produtos para o gráfico de estoque
        $produtos = Produto::all();

        return view('relatorios.index', compact(
            'totalProdutos',
            'entradas',
            'saidas',
            'valorEstoque',
            'produtos'
        ));
    }

}
