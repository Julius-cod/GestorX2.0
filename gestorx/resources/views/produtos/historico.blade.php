<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Histórico do Produto</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f9f9f9; }
        .card { background: #fff; padding: 15px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,.1); }
        .flex { display: flex; align-items: center; }
        .img { width: 100px; height: 100px; object-fit: cover; border-radius: 8px; margin-right: 15px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background: #333; color: #fff; }
        .badge { padding: 5px 10px; border-radius: 5px; color: #fff; font-size: 0.9em; }
        .entrada { background: green; }
        .saida { background: red; }
        .btn { display: inline-block; padding: 8px 15px; text-decoration: none; border-radius: 5px; background: #555; color: #fff; }
        .btn:hover { background: #333; }
    </style>
</head>
<body>

    <h2>Histórico do Produto</h2>

    <!-- Info do produto -->
    <div class="card flex">
        @if($produto->imagem)
            <img src="{{ asset('storage/'.$produto->imagem) }}" alt="{{ $produto->nome }}" class="img">
        @endif
        <div>
            <h3>{{ $produto->nome }}</h3>
            <p>Categoria: {{ $produto->categoria->nome ?? 'Sem categoria' }}</p>
            <p>Estoque atual: <strong>{{ $produto->quantidade }}</strong></p>
        </div>
    </div>

    <!-- Tabela de movimentações -->
    <div class="card">
        <h4>Histórico de Movimentações</h4>
        <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Tipo</th>
                    <th>Quantidade</th>
                    <th>Registrado por</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produto->movimentacoes as $mov)
                    <tr>
                        <td>{{ $mov->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            @if ($mov->tipo === 'entrada')
                                <span class="badge entrada">Entrada</span>
                            @else
                                <span class="badge saida">Saída</span>
                            @endif
                        </td>
                        <td><strong>{{ $mov->quantidade }}</strong></td>
                        <td>{{ $mov->usuario->name ?? 'Usuário desconhecido' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Nenhuma movimentação registrada para este produto.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Botão voltar -->
    <a href="{{ route('produtos.index') }}" class="btn">← Voltar para produtos</a>

</body>
</html>
