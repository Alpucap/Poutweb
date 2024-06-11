<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="css/signin-app.css">
</head>
<body>
    @if ($errors->any())
        <div class="error-container">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-container">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <div class="button-group">
                <button type="submit" class="register-button">Register</button>
                <button type="button" class="login-button" onclick="window.location.href='{{ route('login') }}'">Log in</button>
            </div>
            <div class="google-login">
                <p>or log in with</p>
                <button type="button" class="google-button" onclick="window.location.href='{{ route('login.google') }}'">
                    <img src="google-logo.png" alt="Google Logo"> Google
                </button>
            </div>
        </form>
    </div>
</body>
</html>
