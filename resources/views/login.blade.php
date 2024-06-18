<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="login-button">Login</button>
            </div>
        </form>
        <div class="forgot-password">
            <a href="{{ route('password.request') }}">Forgot Password?</a>
        </div>
        <div class="register-link">
            <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
        </div>
    </div>
    
    @include('loader')

    <script>
        window.addEventListener('load', function() {
            document.getElementById('loader').style.display = 'none';
        });
    </script>
</body>
</html>


