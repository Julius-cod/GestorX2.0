<!-- gestorx-dashboard.html -->
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GestorX - Dashboard</title>
    <link rel="stylesheet" href="gestorx.css" />
</head>

<body>
    <div class="container">
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <div class="logo">
                <img src="logo_gestorx.png" alt="GestorX Logo" />
            </div>
            <nav>
                <ul>
                    <li class="active">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path d="M3 9.5L12 3l9 6.5V21a1 1 0 0 1-1 1h-5v-6H10v6H5a1 1 0 0 1-1-1V9.5z" />
                        </svg>
                        Dashboard
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M3 7V6a1 1 0 0 1 1-1h4V3h8v2h4a1 1 0 0 1 1 1v1H3zm0 2h18v11a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9z" />
                        </svg>
                        Produtos
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path d="M4 6h16v2H4V6zm0 5h16v2H4v-2zm0 5h16v2H4v-2z" />
                        </svg>
                        Movimentações
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path d="M3 3h18v2H3V3zm2 4h14v2H5V7zm-2 4h18v2H3v-2zm2 4h14v2H5v-2zm-2 4h18v2H3v-2z" />
                        </svg>
                        Relatórios
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M19.14 12.94a7.5 7.5 0 0 0 0-1.88l2.03-1.58a.5.5 0 0 0 .12-.65l-1.92-3.32a.5.5 0 0 0-.61-.22l-2.39.96a7.49 7.49 0 0 0-1.63-.95l-.36-2.54A.5.5 0 0 0 14.9 2h-3.8a.5.5 0 0 0-.5.42l-.36 2.54a7.49 7.49 0 0 0-1.63.95l-2.39-.96a.5.5 0 0 0-.61.22L2.7 8.83a.5.5 0 0 0 .12.65l2.03 1.58a7.5 7.5 0 0 0 0 1.88L2.82 14.5a.5.5 0 0 0-.12.65l1.92 3.32c.14.24.43.34.7.22l2.39-.96c.48.38 1.04.7 1.63.95l.36 2.54c.04.25.25.42.5.42h3.8c.25 0 .46-.17.5-.42l.36-2.54c.59-.25 1.15-.57 1.63-.95l2.39.96c.27.12.56.02.7-.22l1.92-3.32a.5.5 0 0 0-.12-.65l-2.03-1.56zM12 15.5A3.5 3.5 0 1 1 12 8a3.5 3.5 0 0 1 0 7.5z" />
                        </svg>
                        Configurações
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- CONTEÚDO -->
        <main class="content">
            <header>
                <h1>Dashboard</h1>
                <button class="logout">Sair</button>
            </header>

            <section class="cards">
                <div class="card"><span>PRODUTOS</span><strong>150</strong></div>
                <div class="card"><span>ESTOQUE TOTAL</span><strong>5.320</strong></div>
                <div class="card"><span>ENTRADAS</span><strong>1.200</strong></div>
                <div class="card"><span>SAÍDAS</span><strong>950</strong></div>
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
                        <tr>
                            <td>Coca-Cola</td>
                            <td class="entrada">Entrada</td>
                            <td>100</td>
                            <td>24/04/2024</td>
                        </tr>
                        <tr>
                            <td>Arroz</td>
                            <td class="saida">Saída</td>
                            <td>50</td>
                            <td>23/04/2024</td>
                        </tr>
                        <tr>
                            <td>Leite</td>
                            <td class="entrada">Entrada</td>
                            <td>200</td>
                            <td>22/04/2024</td>
                        </tr>
                        <tr>
                            <td>Cerveja</td>
                            <td class="entrada">Entrada</td>
                            <td>150</td>
                            <td>21/04/2024</td>
                        </tr>
                        <tr>
                            <td>Detergente</td>
                            <td class="saida">Saída</td>
                            <td>30</td>
                            <td>20/04/2024</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>

</html>