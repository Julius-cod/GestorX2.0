@extends('layouts.app')
@section('title', 'Editar Produto')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endpush

@section('content')
<div class="page-header">
    <h1>Editar Produto</h1>
    <a class="btn back-btn" href="{{ route('produtos.index') }}">← Voltar</a>
</div>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card form-card">
    <form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data" class="form-produto">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Imagem atual</label>
            <div class="image-preview">
                @if($produto->imagem)
                    <img src="{{ asset('storage/'.$produto->imagem) }}" alt="" class="thumb">
                @else
                    <span class="no-image">— sem imagem —</span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label>Trocar imagem</label>
            <input type="file" name="imagem" accept="image/*">
        </div>

        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" value="{{ old('nome', $produto->nome) }}" required>
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <textarea name="descricao" rows="3">{{ old('descricao', $produto->descricao) }}</textarea>
        </div>

        <div class="form-group">
            <label>Categoria</label>
            <select name="categoria_id" required>
                <option value="">-- Selecione --</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" 
                        {{ $produto->categoria_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Quantidade</label>
                <input type="number" name="quantidade" value="{{ old('quantidade', $produto->quantidade) }}" min="0" required>
            </div>
            <div class="form-group">
                <label>Preço (ex: 10.50)</label>
                <input type="text" name="preco" value="{{ old('preco', $produto->preco) }}" required>
            </div>
        </div>

        <button type="submit" class="btn primary">💾 Atualizar</button>
    </form>
</div>
@endsection
