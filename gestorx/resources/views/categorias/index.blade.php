@extends('layouts.app')

@section('title', 'GestorX - Categorias')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/categorias.css') }}">
@endpush

@section('content')
<div class="page-header">
    <h1>Categorias</h1>
    <a href="{{ route('categorias.create') }}" class="btn btn-primary">Nova Categoria</a>
</div>

@if(session('success'))
    <div class="alert success">
        {{ session('success') }}
    </div>
@endif

<div class="table-card">
    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th style="width: 180px; text-align:center;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categorias as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td>{{ $cat->nome }}</td>
                    <td class="actions">
                        <a href="{{ route('categorias.edit', $cat->id) }}" class="btn btn-secondary">Editar</a>
                        <form action="{{ route('categorias.destroy', $cat->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="no-data">Nenhuma categoria cadastrada</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
