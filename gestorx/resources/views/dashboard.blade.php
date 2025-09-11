@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<header class="header">
    <h1>Bem-vindo, {{ Auth::user()->name }}</h1>
</header>

<!-- RESUMO -->
<section class="summary">
    <div class="card"><span>Produtos</span><strong>{{ $totalProdutos }}</strong></div>
    <div class="card"><span>Estoque</span><strong>{{ number_format($estoqueTotal, 0, ',', '.') }}</strong></div>
    <div class="card"><span>Entradas</span><strong>{{ $entradas }}</strong></div>
    <div class="card"><span>Saídas</span><strong>{{ $saidas }}</strong></div>
</section>

<!-- GRÁFICOS -->
<section class="charts">
    <div class="chart-card">
        <h2>Estoque por Produto</h2>
        <canvas id="estoqueChart"></canvas>
    </div>
    <div class="chart-card">
        <h2>Entradas vs Saídas</h2>
        <canvas id="pieChart"></canvas>
    </div>
</section>
@endsection

@section('scripts')
<script>
    // GRÁFICO DE BARRAS
    new Chart(document.getElementById('estoqueChart'), {
        type: 'bar',
        data: {
            labels: @json($categorias),
            datasets: [{
                label: 'Quantidade',
                data: @json($quantidades),
                backgroundColor: '#3b82f6',
                borderRadius: 6
            }]
        },
        options: { responsive: true, plugins: { legend: { display: false } } }
    });

    // GRÁFICO DE PIZZA
    new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: ['Entradas', 'Saídas'],
            datasets: [{
                data: [{{ $entradas }}, {{ $saidas }}],
                backgroundColor: ['#3b82f6', '#ef4444']
            }]
        },
        options: { responsive: true }
    });
</script>
@endsection
