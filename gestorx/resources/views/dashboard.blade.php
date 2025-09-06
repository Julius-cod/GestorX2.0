<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - GestorX</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="logo">
                <img src="{{ asset('images/logo_gestorx.png') }}" alt="GestorX Logo">
            </div>
            <nav>
                <ul>
                    <li class="active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('produtos.index') }}">Produtos</a></li>
                    <li><a href="{{ route('movimentacoes.index')}}">Movimentações</a></li>
                    <li><a href="{{ route('relatorios.index')}}">Relatórios</a></li>
                    <li>

                    <div class="user-info">
                        <p>👤 {{ Auth::user()->name }}</p>
                        <small>{{ Auth::user()->email }}</small>
                    </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">LOGOUT</button>
                        </form>
                    </li>
                </ul>
            </nav>



        </aside>

        <main class="content">
            <header>
                <h1>Dashboard</h1>
            </header>

            <section class="cards">
                <div class="card"><span>PRODUTOS</span><strong>{{ $totalProdutos }}</strong></div>
                <div class="card"><span>ESTOQUE TOTAL</span><strong>{{ $estoqueTotal }}</strong></div>
                <div class="card"><span>ENTRADAS</span><strong>{{ $entradas }}</strong></div>
                <div class="card"><span>SAÍDAS</span><strong>{{ $saidas }}</strong></div>
            </section>

            <section class="movimentacoes">
                <h2>Movimentações Recentes</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Tipo</th>
                            <th>Quantidade</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentes as $m)
                            <tr>
                                <td>{{ $m->produto->nome ?? '---' }}</td>
                                <td class="{{ $m->tipo }}">{{ ucfirst($m->tipo) }}</td>
                                <td>{{ $m->quantidade }}</td>
                                <td>{{ $m->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>
