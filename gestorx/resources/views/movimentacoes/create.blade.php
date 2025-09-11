@extends('layouts.app')

@section('title', 'GestorX - Nova Movimentação')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/movimentacoes.css') }}">
@endpush

@section('content')
<div class="form-container">
    <h1 class="form-title">Nova Movimentação</h1>

    {{-- Exibição de erros --}}
    @if ($errors->any())
        <div class="error-box">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('movimentacoes.store') }}" method="POST" class="form-mov">
        @csrf

        <label for="produto_id">Produto</label>
        <select name="produto_id" id="produto_id" required>
            <option value="">Selecione um produto</option>
            @foreach($produtos as $produto)
                <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
            @endforeach
        </select>

        <label for="tipo">Tipo</label>
        <select name="tipo" id="tipo" required>
            <option value="entrada">Entrada</option>
            <option value="saida">Saída</option>
        </select>

        <label for="quantidade">Quantidade</label>
        <input type="number" name="quantidade" id="quantidade" min="1" required>

        <div class="form-actions">
            <a href="{{ route('movimentacoes.index') }}" class="btn btn-secondary">Voltar</a>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
    </form>
</div>
@endsection
