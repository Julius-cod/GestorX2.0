@extends('layouts.app')

@section('title', 'Produto — ' . $produto->nome)

@push('styles')
<link rel="stylesheet" href="{{ asset('css/produtos.css') }}">
@endpush

@section('content')
<div class="page-header">
    <h1>{{ $produto->nome }}</h1>
    <a class="btn back-btn" href="{{ route('produtos.index') }}">← Voltar</a>
</div>

<div class="card produto-detalhe">
    @if($produto->imagem)
        <div class="image-container">
            <img src="{{ asset('storage/'.$produto->imagem) }}" alt="{{ $produto->nome }}" class="thumb-large">
        </div>
    @endif

    <div class="info">
        <p><strong>Categoria:</strong> {{ $produto->categoria?->nome ?? '-' }}</p>
        <p><strong>Quantidade:</strong> {{ $produto->quantidade }}</p>
        <p><strong>Preço:</strong> R$ {{ number_format($produto->preco,2,',','.') }}</p>
        @if($produto->descricao)
            <p><strong>Descrição:</strong></p>
            <p class="descricao">{{ $produto->descricao }}</p>
        @endif
    </div>
</div>
@endsection

