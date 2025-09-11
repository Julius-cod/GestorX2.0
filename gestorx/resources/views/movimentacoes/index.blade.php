@extends('layouts.app')

@section('title', 'Movimentações')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/movimentacoes.css') }}">
@endpush

@section('content')
<div class="page-header">
    <h1>📦 Movimentações</h1>
    <a href="{{ route('movimentacoes.create') }}" class="btn btn-primary">+ Nova Movimentação</a>
</div>

@if(session('success'))
    <div class="alert success">{{ session('success') }}</div>
@endif

<!-- 🔍 Barra de pesquisa -->
<form method="GET" action="{{ route('movimentacoes.index') }}" class="search-form">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar por produto...">
    <button type="submit" class="btn btn-secondary">Pesquisar</button>
</form>

<!-- 📋 Tabela de movimentações -->
<div class="table-card">
    <table class="styled-table">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Tipo</th>
                <th>Quantidade</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @forelse($movimentacoes as $mov)
                <tr>
                    <td>{{ $mov->produto->nome }}</td>
                    <td class="tipo {{ $mov->tipo }}">
                        {{ ucfirst($mov->tipo) }}
                    </td>
                    <td>{{ $mov->quantidade }}</td>
                    <td>{{ $mov->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="no-data">Nenhuma movimentação encontrada</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
