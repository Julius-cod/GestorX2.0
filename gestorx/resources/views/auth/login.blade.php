<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>GestorX - Login</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="auth-container">
        <!-- Logo / Nome do Sistema -->
        <div class="auth-header">
            <h1 class="logo">GestorX</h1>
            <p class="subtitle">Acesse sua conta</p>
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

        <!-- Formulário de Login -->
        <form method="POST" action="{{ route('login') }}" class="auth-form">
            @csrf
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Senha" required>
            </div>
            <button type="submit" class="btn-primary">Entrar</button>
        </form>

        <!-- Link para criar conta -->
        <div class="auth-footer">
            <p>Não tem conta? <a href="{{ route('register') }}">Criar conta</a></p>
        </div>
    </div>
</body>
</html>
