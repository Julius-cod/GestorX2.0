<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GestorX')</title>

    <!-- CSS global -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <!-- CSS específico das views -->
    @stack('styles')

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="dark-mode">
    <div class="dashboard-container">
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <div class="logo">
                <h1>GESTORX</h1>
            </div>
            <nav class="menu">
                <ul>
                    <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i data-lucide="layout-dashboard"></i>
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="{{ request()->routeIs('produtos.*') ? 'active' : '' }}">
                        <i data-lucide="package"></i>
                        <a href="{{ route('produtos.index') }}">Produtos</a>
                    </li>
                    <li class="{{ request()->routeIs('movimentacoes.*') ? 'active' : '' }}">
                        <i data-lucide="bar-chart-3"></i>
                        <a href="{{ route('movimentacoes.index') }}">Movimentações</a>
                    </li>
                    <li class="{{ request()->routeIs('relatorios.*') ? 'active' : '' }}">
                        <i data-lucide="file-text"></i>
                        <a href="{{ route('relatorios.index') }}">Relatórios</a>

                    </li>
                     <li class="{{ request()->routeIs('categorias.*') ? 'active' : '' }}">
                        <i data-lucide="file-text"></i>
                        <a href="{{ route('categorias.index') }}">Categorias</a>
                    </li>
                </ul>
            </nav>

            <div class="sidebar-footer">
                <div class="user-info">
                    <span class="user-icon" data-lucide="user"></span>
                    <p>{{ Auth::user()->name }}</p>
                </div>

                <!-- Botão de Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">Sair</button>
                </form>

                <!-- Botão Dark/Light -->
                <button class="toggle-theme" onclick="toggleTheme()">🌓</button>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="content">
            @yield('content')
        </main>
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
   <script>
    lucide.createIcons();

    // 🔄 Aplica o tema salvo ao carregar a página
    document.addEventListener("DOMContentLoaded", function () {
        const savedTheme = localStorage.getItem("theme");
        if (savedTheme) {
            document.body.classList.remove("dark-mode", "light-mode");
            document.body.classList.add(savedTheme);
        }
    });

    function toggleTheme() {
        document.body.classList.toggle("dark-mode");
        document.body.classList.toggle("light-mode");

        // Salva o tema escolhido
        if (document.body.classList.contains("dark-mode")) {
            localStorage.setItem("theme", "dark-mode");
        } else {
            localStorage.setItem("theme", "light-mode");
        }
    }
</script>

    @yield('scripts')
</body>
</html>
