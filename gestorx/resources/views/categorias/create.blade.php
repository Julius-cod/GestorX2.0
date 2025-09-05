<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Nova Categoria</title>
    <link rel="stylesheet" href="{{ asset('css/categorias.css') }}">
</head>
<body>
    <div class="container">
        <h1>Criar Categoria</h1>

        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>

            <button type="submit" class="btn">Salvar</button>
        </form>

        <a href="{{ route('categorias.index') }}" class="btn back">Voltar</a>
    </div>
</body>
</html>
