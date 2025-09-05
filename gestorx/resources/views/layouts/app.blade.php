<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GestorX</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @yield('styles') <!-- espaço extra para CSS específico -->
</head>
<body>
    <div class="container">
        <!-- SIDEBAR FIXA -->
        <aside class="sidebar">
            <div class="logo">
                <img src="{{ asset('images/logo_gestorx.png') }}" alt="GestorX Logo">
            </div>
            <nav>
                <ul>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('produtos.create') }}">Produtos</a></li>
                    <li><a href="#">Movimentações</a></li>
                    <li><a href="#">Relatórios</a></li>
                    <li><a href="#">Configurações</a></li>
                </ul>
            </nav>
        </aside>

        <!-- CONTEÚDO DINÂMICO -->
        <main class="content">
            @yield('content')
        </main>
    </div>
</body>
</html>