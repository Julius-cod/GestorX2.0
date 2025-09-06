<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GestorX - Relatórios</title>
    <link rel="stylesheet" href="{{ asset('css/gestorx.css') }}">
    <style>
        /* Estilização dos cards */
        .cards-resumo {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }

        .cards-resumo .card {
            background: #1e293b;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
        }

        .cards-resumo h3 {
            font-size: 16px;
            color: #94a3b8;
            margin-bottom: 10px;
        }

        .cards-resumo p {
            font-size: 20px;
            font-weight: bold;
            color: #38bdf8;
        }

        /* Estilização dos gráficos */
        .chart-container {
            width: 100%;
            max-width: 600px;
            height: 350px;
            margin: 0 auto;
            background: #1e293b;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
        }

        .chart-container h2 {
            text-align: center;
            margin-bottom: 15px;
            color: #94a3b8;
        }

        .charts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <div class="logo">
                <img src="{{ asset('images/logo_gestorx.png') }}" alt="GestorX Logo">
            </div>
            <nav>
                <ul>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('produtos.index') }}">Produtos</a></li>
                    <li><a href="{{ route('movimentacoes.index') }}">Movimentações</a></li>
                    <li class="active"><a href="{{ route('relatorios.index') }}">Relatórios</a></li>
                    <li><a href="#">Configurações</a></li>
                </ul>
            </nav>
        </aside>

        <!-- CONTEÚDO -->
        <main class="content">
            <header>
                <h1>Relatórios</h1>
                <button class="logout">Sair</button>
            </header>

            <!-- CARDS DE RESUMO -->
            <section class="cards-resumo">
                <div class="card">
                    <h3>Total Produtos</h3>
                    <p>{{ $totalProdutos }}</p>
                </div>
                <div class="card">
                    <h3>Total Entradas</h3>
                    <p>{{ $entradas }}</p>
                </div>
                <div class="card">
                    <h3>Total Saídas</h3>
                    <p>{{ $saidas }}</p>
                </div>
                <div class="card">
                    <h3>Valor em Estoque</h3>
                    <p>R$ {{ number_format($valorEstoque, 2, ',', '.') }}</p>
                </div>
            </section>

            <!-- GRÁFICOS -->
            <div class="charts-grid">
                <section class="chart-container">
                    <h2>Estoque por Produto</h2>
                    <canvas id="estoqueChart"></canvas>
                </section>

                <section class="chart-container">
                    <h2>Entradas vs Saídas</h2>
                    <canvas id="movimentacoesChart"></canvas>
                </section>
            </div>
        </main>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Dados enviados pelo Controller
        const produtos = @json($produtos->pluck('nome'));
        const quantidades = @json($produtos->pluck('quantidade'));
        const entradas = {{ $entradas }};
        const saidas = {{ $saidas }};

        // Gráfico de barras - Estoque por produto
        const ctx1 = document.getElementById('estoqueChart').getContext('2d');
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: produtos,
                datasets: [{
                    label: 'Quantidade em estoque',
                    data: quantidades,
                    backgroundColor: '#38bdf8'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true } }
            }
        });

        // Gráfico de pizza - Entradas vs Saídas
        const ctx2 = document.getElementById('movimentacoesChart').getContext('2d');
        new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['Entradas', 'Saídas'],
                datasets: [{
                    data: [entradas, saidas],
                    backgroundColor: ['#38bdf8', '#f87171']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
</body>
</html>
