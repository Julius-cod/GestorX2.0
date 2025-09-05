<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Produtos — Lista</title>
    <link rel="stylesheet" href="{{ asset('css/produtos.css') }}">
</head>
<body>
    <header class="topbar">
        <h1>Produtos</h1>
        <a class="btn" href="{{ route('produtos.create') }}">Novo Produto</a>
    </header>

    <section class="cards">
        <div class="card">
            <span>PRODUTOS</span>
            <strong>{{ $totalProdutos }}</strong>
        </div>
        <div class="card">
            <span>ESTOQUE TOTAL</span>
            <strong>{{ $estoqueTotal }}</strong>
        </div>
    </section>

    <section class="lista">
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Qtd</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produtos as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>
                            @if($p->imagem)
                                <img src="{{ asset('storage/'.$p->imagem) }}" alt="{{ $p->nome }}" class="thumb">
                            @else
                                <span class="no-thumb">—</span>
                            @endif
                        </td>
                        <td>{{ $p->nome }}</td>
                        <td>{{ optional($p->categoria)->nome ?? 'Sem categoria' }}</td>
                        <td>{{ $p->quantidade }}</td>
                        <td>R$ {{ number_format($p->preco, 2, ',', '.') }}</td>
                        <td class="acoes">
                            <a href="{{ route('produtos.show', $p->id) }}">Ver</a>
                            <a href="{{ route('produtos.edit', $p->id) }}">Editar</a>

                            <form action="{{ route('produtos.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Excluir?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="link-like" type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7">Nenhum produto cadastrado.</td></tr>
                @endforelse
            </tbody>
        </table>
    </section>
</body>
</html>
