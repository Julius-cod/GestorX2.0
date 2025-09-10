<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Movimentacao;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Symfony\Component\HttpFoundation\StreamedResponse;

class RelatorioController extends Controller
{
    public function index()
    {
        // Total de produtos
        $totalProdutos = Produto::count();

        // Estoque total
        $estoqueTotal = Produto::sum('quantidade');

        // Produtos com baixo estoque (menos de 5, pode ajustar)
        $baixoEstoque = Produto::where('quantidade', '<', 5)->get();

        // Movimentações do mês atual
        $mesAtual = Carbon::now()->month;
        $anoAtual = Carbon::now()->year;

        $movimentacoesMes = Movimentacao::with('produto', 'usuario')
            ->whereYear('created_at', $anoAtual)
            ->whereMonth('created_at', $mesAtual)
            ->orderBy('created_at', 'desc')
            ->get();

        // Entradas e saídas no mês
        $entradasMes = Movimentacao::where('tipo', 'entrada')
            ->whereYear('created_at', $anoAtual)
            ->whereMonth('created_at', $mesAtual)
            ->count();

        $saidasMes = Movimentacao::where('tipo', 'saida')
            ->whereYear('created_at', $anoAtual)
            ->whereMonth('created_at', $mesAtual)
            ->count();

        return view('relatorios.index', compact(
            'totalProdutos',
            'estoqueTotal',
            'baixoEstoque',
            'movimentacoesMes',
            'entradasMes',
            'saidasMes'
        ));
    }

    // exportacao do  relatorio em pdf

    public function estoquePdf()
    {
    $produtos = Produto::with('categoria')->get();
    $valorTotal = $produtos->sum(function ($p) {
        return $p->quantidade * $p->preco;
    });

    $pdf = Pdf::loadView('relatorios.estoque_pdf', compact('produtos', 'valorTotal'));
    return $pdf->download('relatorio_estoque.pdf');
    }


    // exporacao das movimentacoes em pdf
    public function movimentacoesPdf()
    {
    $movimentacoes = Movimentacao::with(['produto', 'usuario'])->get();

    $pdf = Pdf::loadView('relatorios.movimentacoes_pdf', compact('movimentacoes'))
        ->setPaper('a4', 'portrait');

    return $pdf->download('movimentacoes.pdf');
    }

    // exportacoes com cv
    public function movimentacoesCsv()
    {
    $fileName = 'movimentacoes.csv';

    $response = new StreamedResponse(function () {
        $handle = fopen('php://output', 'w');

        // Cabeçalho do CSV
        fputcsv($handle, ['Data', 'Produto', 'Tipo', 'Quantidade', 'Usuário']);

        $movimentacoes = Movimentacao::with(['produto', 'usuario'])->get();

        foreach ($movimentacoes as $m) {
            fputcsv($handle, [
                $m->created_at->format('d/m/Y H:i'),
                $m->produto->nome ?? 'Sem produto',
                ucfirst($m->tipo),
                $m->quantidade,
                $m->usuario->name ?? 'Usuário desconhecido',
            ]);
        }

        fclose($handle);
    });

    $response->headers->set('Content-Type', 'text/csv');
    $response->headers->set('Content-Disposition', 'attachment; filename="'.$fileName.'"');

    return $response;
}
}
