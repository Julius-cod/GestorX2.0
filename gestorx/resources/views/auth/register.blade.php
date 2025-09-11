<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>GestorX - Criar Conta</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="auth-container">
        <!-- Logo / Nome do Sistema -->
        <div class="auth-header">
            <h1 class="logo">GestorX</h1>
            <p class="subtitle">Crie sua conta</p>
        </div>

        <!-- Mensagens de erro -->
        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulário de Registro -->
        <form method="POST" action="{{ route('register') }}" class="auth-form">
            @csrf
            <div class="form-group">
                <input type="text" name="name" placeholder="Nome completo" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Senha" required>
            </div>
            <div class="form-group">
                <input type="password" name="password_confirmation" placeholder="Confirmar senha" required>
            </div>
            <button type="submit" class="btn-primary">Registrar</button>
        </form>

        <!-- Link para login -->
        <div class="auth-footer">
            <p>Já tem conta? <a href="{{ route('login') }}">Entrar</a></p>
        </div>
    </div>
</body>
</html>

