<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>GestorX - Nova Movimentação</title>
    <link rel="stylesheet" href="{{ asset('css/movimentacoes.css') }}">
</head>
<body>
    <div class="container">
        <h1>Nova Movimentação</h1>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('movimentacoes.store') }}" method="POST">
            @csrf

            <label for="produto_id">Produto:</label>
            <select name="produto_id" id="produto_id" required>
                <option value="">Selecione um produto</option>
                @foreach($produtos as $produto)
                    <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                @endforeach
            </select>

            <label for="tipo">Tipo:</label>
            <select name="tipo" id="tipo" required>
                <option value="entrada">Entrada</option>
                <option value="saida">Saída</option>
            </select>

            <label for="quantidade">Quantidade:</label>
            <input type="number" name="quantidade" id="quantidade" min="1" required>

            <button type="submit" class="btn">Registrar</button>
        </form>

        <a href="{{ route('movimentacoes.index') }}" class="btn back">Voltar</a>
    </div>
</body>
</html>
