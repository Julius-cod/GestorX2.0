@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
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
@endsection
