<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="{{ asset('css/produtos.css') }}">
</head>
<body>
    <header class="topbar">
        <h1>Editar Produto</h1>
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

        <form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data" class="form-produto">
            @csrf
            @method('PUT')

            <label>Imagem atual
                @if($produto->imagem)
                    <img src="{{ asset('storage/'.$produto->imagem) }}" alt="" class="thumb">
                @else
                    <span>— sem imagem —</span>
                @endif
            </label>

            <label>Trocar imagem
                <input type="file" name="imagem" accept="image/*">
            </label>

            <label>Nome
                <input type="text" name="nome" value="{{ old('nome', $produto->nome) }}" required>
            </label>

            <label>Descrição
                <textarea name="descricao">{{ old('descricao', $produto->descricao) }}</textarea>
            </label>

            <label>Categoria
               <select name="categoria_id" id="categoria_id" required>
                <option value="">-- Selecione --</option>
                @foreach($categorias as $categoria)
             <option value="{{ $categoria->id }}" 
                     {{ $produto->categoria_id == $categoria->id ? 'selected' : '' }}>
                     {{ $categoria->nome }}
                    </option>
                 @endforeach
            </select>

            </label>

            <label>Quantidade
                <input type="number" name="quantidade" value="{{ old('quantidade', $produto->quantidade) }}" min="0" required>
            </label>

            <label>Preço (ex: 10.50)
                <input type="text" name="preco" value="{{ old('preco', $produto->preco) }}" required>
            </label>

            <button type="submit" class="btn primary">Atualizar</button>
        </form>
    </main>
</body>
</html>
