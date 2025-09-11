<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
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
            text-align: center;
        }

        th {
            background: #0ea5e9;
            color: #fff;
            font-weight: bold;
        }

        tr:nth-child(even) td {
            background: #f9fafb;
        }

        .entrada {
            color: green;
            font-weight: bold;
        }

        .saida {
            color: red;
            font-weight: bold;
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
        <h1>GestorX - Relatório de Movimentações</h1>
        <p>Data de emissão: {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}</p>
    </header>

    <!-- Conteúdo -->
    <h2>Movimentações Registradas</h2>
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
            @forelse ($movimentacoes as $m)
                <tr>
                    <td>{{ $m->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $m->produto->nome ?? 'Sem produto' }}</td>
                    <td>
                        @if($m->tipo === 'entrada')
                            <span class="entrada">Entrada</span>
                        @else
                            <span class="saida">Saída</span>
                        @endif
                    </td>
                    <td>{{ $m->quantidade }}</td>
                    <td>{{ $m->usuario->name ?? 'Usuário desconhecido' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhuma movimentação registrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Rodapé -->
    <footer>
        © {{ date('Y') }} GestorX - Sistema de Gestão de Estoque
    </footer>
</body>
</html>
