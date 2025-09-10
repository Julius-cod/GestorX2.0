<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>GestorX - Movimentações</title>
    <link rel="stylesheet" href="{{ asset('css/movimentacoes.css') }}">
</head>
<body>
    <div class="container">
        <h1>Movimentações</h1>

        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        <a href="{{ route('movimentacoes.create') }}" class="btn">Nova Movimentação</a>

        <!-- 🔍 Barra de pesquisa -->
        <form method="GET" action="{{ route('movimentacoes.index') }}" class="search-form">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar por produto...">
            <button type="submit">Pesquisar</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Tipo</th>
                    <th>Quantidade</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                @forelse($movimentacoes as $mov)
                    <tr>
                        <td>{{ $mov->produto->nome }}</td>
                        <td class="{{ $mov->tipo }}">{{ ucfirst($mov->tipo) }}</td>
                        <td>{{ $mov->quantidade }}</td>
                        <td>{{ $mov->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Nenhuma movimentação encontrada</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
