<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="{{ asset('css/produtos.css') }}">
</head>
<body>
    <header class="topbar">
        <h1>Cadastrar Produto</h1>
        <a class="btn" href="{{ route('produtos.index') }}">Voltar</a>
    </header>

    <main class="form-wrap">
        @if($errors->any())
            <div class="errors">
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data" class="form-produto">
            @csrf
            <label>Imagem
                <input type="file" name="imagem" accept="image/*">
            </label>

            <label>Nome
                <input type="text" name="nome" value="{{ old('nome') }}" required>
            </label>

            <label>Descrição
                <textarea name="descricao">{{ old('descricao') }}</textarea>
            </label>

           <label for="categoria_id">Categoria:</label>
            <select name="categoria_id" id="categoria_id" required>
                <option value="">-- Selecione --</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                 @endforeach
            </select>


            <label>Quantidade
                <input type="number" name="quantidade" value="{{ old('quantidade', 0) }}" min="0" required>
            </label>

            <label>Preço (ex: 10.50)
                <input type="text" name="preco" value="{{ old('preco', '0.00') }}" required>
            </label>

            <button type="submit" class="btn primary">Salvar</button>
        </form>
    </main>
</body>
</html>
