<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: sans-serif; font-size: 12px; color: #333; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #444; padding: 6px; text-align: left; }
        th { background: #f2f2f2; }
        .total { margin-top: 20px; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Relatório de Estoque</h1>

    <table>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Qtd</th>
                <th>Preço Unit.</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $p)
            <tr>
                <td>{{ $p->nome }}</td>
                <td>{{ $p->categoria->nome ?? 'Sem categoria' }}</td>
                <td>{{ $p->quantidade }}</td>
                <td>R$ {{ number_format($p->preco, 2, ',', '.') }}</td>
                <td>R$ {{ number_format($p->quantidade * $p->preco, 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p class="total">Valor total em estoque: R$ {{ number_format($valorTotal, 2, ',', '.') }}</p>
</body>
</html>
