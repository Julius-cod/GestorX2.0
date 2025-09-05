<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Produto — {{ $produto->nome }}</title>
    <link rel="stylesheet" href="{{ asset('css/produtos.css') }}">
</head>
<body>
    <header class="topbar">
        <h1>{{ $produto->nome }}</h1>
        <a class="btn" href="{{ route('produtos.index') }}">Voltar</a>
    </header>

    <main class="detalhe">
        @if($produto->imagem)
            <img src="{{ asset('storage/'.$produto->imagem) }}" alt="{{ $produto->nome }}" class="thumb-large">
        @endif

        <p><strong>Categoria:</strong> {{ $produto->categoria?->nome ?? '-' }}</p>
        <p><strong>Quantidade:</strong> {{ $produto->quantidade }}</p>
        <p><strong>Preço:</strong> R$ {{ number_format($produto->preco,2,',','.') }}</p>
        <p><strong>Descrição:</strong></p>
        <p>{{ $produto->descricao }}</p>
    </main>
</body>
</html>
