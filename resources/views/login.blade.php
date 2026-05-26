<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Nooise</title>
    <link rel="stylesheet" href="{{asset('cssnooise/stylelogin.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <div class="background-container">
        <div class="logo-top">
            <h1>n<span>∞</span>ise</h1>
        </div>
        <div class="gambarutama">
            <img src="{{ asset('nooisefoto/background.png') }}" alt="background">
        </div>
        <div class="gambarbayangan"></div>

        <div class="login-card">
            <h2>Login</h2>
            <p class="signup-text">Don't have an account? <a href="{{ route('halaman.register') }}">Sign up here</a></p>
            
            
    <form method="POST" action="{{ route('login.post') }}">
        @csrf

                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>


                <div class="options">
                    <label class="remember-me">
                        <input type="checkbox"> <span>Remember me</span>
                    </label>
                    <a href="#" class="forgot-password">Forgot password</a>
                </div>

                <button type="submit" class="btn-login">Login</button>
            </form>

            <p class="social-text">Login instantly using your social media</p>
            <div class="social-icons">
                <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="google"><i class="fab fa-google"></i></a>
                <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>

</body>
</html>