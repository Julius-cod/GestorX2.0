@extends('layouts.app')

@section('title', 'Novo Produto')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/produtos.css') }}">
@endpush

@section('content')
<header class="topbar">
    <h1>➕ Novo Produto</h1>
    <a href="{{ route('produtos.index') }}" class="btn-secondary">← Voltar</a>
</header>

<section class="form-container">
    @if ($errors->any())
        <div class="alert danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data" class="produto-form">
        @csrf

        <div class="form-grid">
            <div class="form-group">
                <label for="nome">Nome do Produto</label>
                <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required>
            </div>

            <div class="form-group">
                <label for="categoria_id">Categoria</label>
                <select name="categoria_id" id="categoria_id" required>
                    <option value="">Selecione</option>
                    @foreach($categorias as $cat)
                        <option value="{{ $cat->id }}" {{ old('categoria_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input type="number" name="quantidade" id="quantidade" value="{{ old('quantidade') }}" min="0" required>
            </div>

            <div class="form-group">
                <label for="preco">Preço (R$)</label>
                <input type="number" step="0.01" name="preco" id="preco" value="{{ old('preco') }}" required>
            </div>

            <div class="form-group full-width">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" rows="4">{{ old('descricao') }}</textarea>
            </div>

            <div class="form-group full-width">
                <label for="imagem">Imagem do Produto</label>
                <input type="file" name="imagem" id="imagem" accept="image/*">
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">💾 Salvar</button>
            <a href="{{ route('produtos.index') }}" class="btn-secondary">Cancelar</a>
        </div>
    </form>
</section>
@endsection
