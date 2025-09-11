@extends('layouts.app')

@section('title', 'GestorX - Editar Categoria')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/categorias.css') }}">
@endpush

@section('content')
<div class="page-header">
    <h1>Editar Categoria</h1>
    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Voltar</a>
</div>

<div class="form-card">
    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome da categoria</label>
            <input 
                type="text" 
                name="nome" 
                id="nome" 
                class="form-control" 
                value="{{ old('nome', $categoria->nome) }}" 
                required
            >

            @error('nome')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
