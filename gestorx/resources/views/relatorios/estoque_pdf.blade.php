<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            text-align: center;
            padding: 10px 0;
            border-bottom: 2px solid #0ea5e9;
            margin-bottom: 20px;
        }

        header h1 {
            margin: 0;
            font-size: 20px;
            color: #0ea5e9;
        }

        header p {
            margin: 2px 0;
            font-size: 12px;
            color: #666;
        }

        h2 {
            margin: 0 0 10px 0;
            font-size: 16px;
            color: #1e293b;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 11px;
        }

        th, td {
            border: 1px solid #bbb;
            padding: 6px;
            text-align: left;
        }

        th {
            background: #0ea5e9;
            color: #fff;
            font-weight: bold;
            text-align: center;
        }

        tr:nth-child(even) td {
            background: #f9fafb;
        }

        .total {
            margin-top: 20px;
            font-weight: bold;
            font-size: 13px;
            text-align: right;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px;
            color: #777;
            border-top: 1px solid #ccc;
            padding: 5px 0;
        }
    </style>
</head>
<body>
    <!-- Cabeçalho -->
    <header>
        <h1>GestorX - Relatório de Estoque</h1>
        <p>Data de emissão: {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}</p>
    </header>

    <!-- Tabela de Estoque -->
    <h2>Produtos em Estoque</h2>
    <table>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Quantidade</th>
                <th>Preço Unitário</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $p)
                <tr>
                    <td>{{ $p->nome }}</td>
                    <td>{{ $p->categoria->nome ?? 'Sem categoria' }}</td>
                    <td style="text-align: center;">{{ $p->quantidade }}</td>
                    <td style="text-align: right;">R$ {{ number_format($p->preco, 2, ',', '.') }}</td>
                    <td style="text-align: right;">R$ {{ number_format($p->quantidade * $p->preco, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Total Geral -->
    <p class="total">
        Valor total em estoque: R$ {{ number_format($valorTotal, 2, ',', '.') }}
    </p>

    <!-- Rodapé -->
    <footer>
        © {{ date('Y') }} GestorX - Sistema de Gestão de Estoque
    </footer>
</body>
</html>
