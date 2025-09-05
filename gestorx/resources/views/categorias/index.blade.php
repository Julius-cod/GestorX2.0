<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>GestorX - Categorias</title>
    <link rel="stylesheet" href="{{ asset('css/categorias.css') }}">
</head>
<body>
    <div class="container">
        <h1>Categorias</h1>

        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        <a href="{{ route('categorias.create') }}" class="btn">Nova Categoria</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categorias as $cat)
                    <tr>
                        <td>{{ $cat->id }}</td>
                        <td>{{ $cat->nome }}</td>
                        <td>
                            <a href="{{ route('categorias.edit', $cat->id) }}" class="btn">Editar</a>
                            <form action="{{ route('categorias.destroy', $cat->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Nenhuma categoria cadastrada</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
