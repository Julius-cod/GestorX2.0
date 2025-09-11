<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>GestorX - Registrar</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body class="dark-bg">
    <div class="login-container">
    <div class="logo-area">
    <img src="{{ asset('images/logo.png') }}" alt="GestorX Logo" class="logo-icon">
    <h1 class="logo-text">GestorX</h1>
 
</div>

        <h2 class="login-title">Registrar</h2>

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="login-form">
            @csrf
            <input type="text" name="name" placeholder="Nome completo" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Senha" required>
            <input type="password" name="password_confirmation" placeholder="Confirmar senha" required>
            <button type="submit">Registrar</button>
        </form>

        <div class="register-link">
            <span>Já tem conta?</span>
            <a href="{{ route('login') }}">Entrar</a>
        </div>
    </div>
</body>
</html>
