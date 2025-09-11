@extends('layouts.app')

@section('title', 'Produtos')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/produtos.css') }}">
@endpush

@section('content')
<header class="topbar">
    <h1>Produtos</h1>
    <a class="btn-primary" href="{{ route('produtos.create') }}">+ Novo Produto</a>
</header>

<!-- CARDS DE RESUMO -->
<section class="summary">
    <div class="card"><span>Produtos</span><strong>{{ $totalProdutos }}</strong></div>
    <div class="card"><span>Estoque Total</span><strong>{{ $estoqueTotal }}</strong></div>
</section>

<!-- FILTROS -->
<section class="filtros">
    <form method="GET" action="{{ route('produtos.index') }}">
        <input type="text" name="nome" placeholder="Buscar por nome" value="{{ request('nome') }}">
        <select name="categoria_id">
            <option value="">Todas categorias</option>
            @foreach($categorias as $cat)
                <option value="{{ $cat->id }}" {{ request('categoria_id') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->nome }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="btn-primary">Filtrar</button>
        <a href="{{ route('produtos.index') }}" class="btn-reset">Limpar</a>
    </form>
</section>

<!-- LISTA DE PRODUTOS -->
<section class="lista">
    @if(session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif

    <table class="tabela-produtos">
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
                        <a href="{{ route('produtos.show', $p->id) }}" class="btn-link">Ver</a>
                        <a href="{{ route('produtos.edit', $p->id) }}" class="btn-link">Editar</a>

                        <form action="{{ route('produtos.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Excluir este produto?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="no-data">Nenhum produto encontrado.</td></tr>
            @endforelse
        </tbody>
    </table>
</section>
@endsection
