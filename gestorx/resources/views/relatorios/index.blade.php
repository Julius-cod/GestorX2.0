<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Relatórios - GestorX</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8fafc;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #1e293b;
        }
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        .card {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .card h2 {
            margin: 0;
            font-size: 28px;
            color: #0ea5e9;
        }
        .card p {
            margin: 5px 0 0;
            color: #475569;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
        }
        th {
            background: #0ea5e9;
            color: #fff;
        }
        tr:hover {
            background: #f1f5f9;
        }
        .entrada {
            color: green;
            font-weight: bold;
        }
        .saida {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Relatórios de Estoque</h1>

    <!-- Cards resumo -->
    <div class="cards">
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
        <a href="{{ route('relatorios.estoque.pdf') }}" class="btn">Exportar Estoque (PDF)</a>
        <a href="{{ route('relatorios.movimentacoes.csv') }}" class="btn">Exportar Movimentações (CSV)</a>
        <a href="{{ route('relatorios.movimentacoes.pdf') }}" class="btn">Exportar Movimentações (PDF)</a>

    </div>

    <!-- Produtos com baixo estoque -->
    <h2>Produtos com baixo estoque</h2>
    <table>
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
                    <td colspan="2">Nenhum produto com baixo estoque.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Movimentações do mês -->
    <h2>Movimentações do mês</h2>
    <table>
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
                    <td colspan="5">Nenhuma movimentação registrada neste mês.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
