<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Relatório de Movimentações</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; }
        th { background: #f0f0f0; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Relatório de Movimentações</h2>
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
            @foreach ($movimentacoes as $m)
                <tr>
                    <td>{{ $m->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $m->produto->nome ?? 'Sem produto' }}</td>
                    <td>{{ ucfirst($m->tipo) }}</td>
                    <td>{{ $m->quantidade }}</td>
                    <td>{{ $m->usuario->name ?? 'Usuário desconhecido' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
