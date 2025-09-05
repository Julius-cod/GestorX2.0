<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Movimentacao;
use Illuminate\Http\Request;

class MovimentacaoController extends Controller
{
    public function index()
    {
        $movimentacoes = Movimentacao::with('produto')->latest()->get();
        return view('movimentacoes.index', compact('movimentacoes'));
    }

    public function create()
    {
        $produtos = Produto::all(); // agora pega os produtos do banco
        return view('movimentacoes.create', compact('produtos'));
    }

 public function store(Request $request)
{
    $data = $request->validate([
        'produto_id' => 'required|exists:produtos,id',
        'tipo' => 'required|in:entrada,saida',
        'quantidade' => 'required|integer|min:1',
    ]);

    $produto = Produto::findOrFail($data['produto_id']);

    if ($data['tipo'] === 'saida') {
        // Verifica estoque antes de retirar
        if ($produto->quantidade < $data['quantidade']) {
            return redirect()->back()->withErrors([
                'quantidade' => 'Não há estoque suficiente para esta saída. Estoque atual: ' . $produto->quantidade
            ]);
        }
        $produto->quantidade -= $data['quantidade'];
    } else {
        // Entrada → soma
        $produto->quantidade += $data['quantidade'];
    }

    $produto->save();

    Movimentacao::create($data);

    return redirect()->route('movimentacoes.index')->with('success', 'Movimentação registrada com sucesso!');
}
}
