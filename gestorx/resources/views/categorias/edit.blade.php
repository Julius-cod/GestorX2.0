<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Categoria</title>
    <link rel="stylesheet" href="{{ asset('css/categorias.css') }}">
</head>
<body>
    <div class="container">
        <h1>Editar Categoria</h1>

        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{ $categoria->nome }}" required>

            <button type="submit" class="btn">Atualizar</button>
        </form>

        <a href="{{ route('categorias.index') }}" class="btn back">Voltar</a>
    </div>
</body>
</html>
