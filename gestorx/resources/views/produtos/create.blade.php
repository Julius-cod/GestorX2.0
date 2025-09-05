<!-- resources/views/produtos/create.blade.php -->
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/produtos.css">
<div class="form-container">
    <header class="form-header">
        <h1>Cadastrar Produto</h1>
        <button class="logout">Logout</button>
    </header>

    <form class="form-produto" action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group image-upload">
            <label for="imagem">Imagem do Produto</label>
            <input type="file" id="imagem" name="imagem">
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" placeholder="Ex: Coca Cola">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" id="descricao" name="descricao" placeholder="Ex: Refrigerante de 350ml">
            </div>

            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select id="categoria" name="categoria">
                    <option value="bebidas">Bebidas</option>
                    <option value="alimentos">Alimentos</option>
                    <option value="limpeza">Limpeza</option>
                </select>
            </div>

            <div class="form-group">
                <label for="fornecedor">Fornecedor</label>
                <input type="text" id="fornecedor" name="fornecedor" placeholder="Ex: Distribuidora X">
            </div>

            <div class="form-group">
                <label for="quantidade">Quantidade Inicial</label>
                <input type="number" id="quantidade" name="quantidade" placeholder="500">
            </div>

            <div class="form-group">
                <label for="preco">Preço Unitário</label>
                <input type="text" id="preco" name="preco" placeholder="R$ 3,00">
            </div>
        </div>

        <button type="submit" class="btn-submit">Cadastrar</button>
    </form>
</div>
@endsection
