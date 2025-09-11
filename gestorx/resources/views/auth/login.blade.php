<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>GestorX - Login</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body class="dark-bg">
    <div class="login-container">
        <div class="logo-area">
            <img src="{{ asset('images/logo.png') }}" alt="GestorX Logo" class="logo-icon">
            <h1 class="logo-text">GestorX</h1>
        </div>

        <h2 class="login-title">Login</h2>

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>

        <div class="register-link">
            <span>Não possui conta?</span>
            <a href="{{ route('register') }}">Registrar</a>
        </div>
    </div>
</body>
</html>
