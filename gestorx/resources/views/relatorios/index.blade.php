@extends('layouts.app')

@section('title', 'GestorX - Relatórios')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/relatorios.css') }}">
@endpush

@section('content')
    <div class="page-header">
        <h1>📊 Relatórios de Estoque</h1>
    </div>

    <!-- Cards resumo -->
    <section class="summary">
        <div class="card">
            <h2>{{ $totalProdutos }}</h2>
            <p>Total de Produtos</p>
        </div>
        <div class="card">
            <h2>{{ $estoqueTotal }}</h2>
            <p>Estoque Total</p>
        </div>
        <div class="card">
            <h2>{{ $entradasMes }}</h2>
            <p>Entradas (Mês)</p>
        </div>
        <div class="card">
            <h2>{{ $saidasMes }}</h2>
            <p>Saídas (Mês)</p>
        </div>
    </section>

    <!-- Exportações -->
    <div class="export-buttons">
        <a href="{{ route('relatorios.estoque.pdf') }}" class="btn btn-primary">📄 Exportar Estoque (PDF)</a>
        <a href="{{ route('relatorios.movimentacoes.csv') }}" class="btn btn-secondary">📊 Exportar Movimentações (CSV)</a>
        <a href="{{ route('relatorios.movimentacoes.pdf') }}" class="btn btn-danger">📄 Exportar Movimentações (PDF)</a>
    </div>

    <!-- Produtos com baixo estoque -->
    <div class="table-card">
        <h2>⚠️ Produtos com baixo estoque</h2>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody>
                @forelse($baixoEstoque as $produto)
                    <tr>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->quantidade }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="no-data">Nenhum produto com baixo estoque.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Movimentações do mês -->
    <div class="table-card">
        <h2>📅 Movimentações do mês</h2>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Produto</th>
                    <th>Tipo</th>
                    <th>Quantidade</th>
                    <th>Usuário</th>
                </tr>
            </thead>
            <tbody>
                @forelse($movimentacoesMes as $mov)
                    <tr>
                        <td>{{ $mov->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $mov->produto->nome ?? 'Desconhecido' }}</td>
                        <td>
                            @if ($mov->tipo === 'entrada')
                                <span class="entrada">Entrada</span>
                            @else
                                <span class="saida">Saída</span>
                            @endif
                        </td>
                        <td>{{ $mov->quantidade }}</td>
                        <td>{{ $mov->usuario->name ?? 'Usuário desconhecido' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="no-data">Nenhuma movimentação registrada neste mês.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
