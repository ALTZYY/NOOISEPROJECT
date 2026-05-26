<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nooise - Register</title>
    <link rel="stylesheet" href="{{asset('cssnooise/styleregister.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <div class="container">
        <header>
            <h1 class="logo">nooise</h1>
        </header>

        <div class="gambarutama">
            <img src="all foto/b8a3b344b345c74b433e5160aa0fcf29 1.png" alt="background">
        </div>

        <div class="gambarbayang">
            <img src="all foto/Rectangle 9.png" alt="background bayang">
        </div>

        <main class="register-card">
            <h2>Register</h2>
            <p class="login-link">Already have an account? <a href="{{ route('halaman.login') }}">Login here</a></p>

            <form method="POST" action="{{ route('register.post') }}">
                @csrf

                <div class="input-group">
                    <input type="text" name="name" placeholder="Full Name" required value="{{ old('name') }}">
                </div>

                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                </div>

                <div class="input-row">
                    <div class="country-code">
                        <select>
                            <option value="+62">+62</option>
                            <option value="+1">+1</option>
                        </select>
                    </div>
                    <div class="phone-number">
                        <input type="tel" placeholder="Phone Number" required>
                    </div>
                </div>

                <div class="input-group password-group">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class="fa-regular fa-eye-slash"></i>
                </div>

                <div class="input-group password-group">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                    <i class="fa-regular fa-eye-slash"></i>
                </div>

                <p class="terms">
                    By registering, I agree to Nooise <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a>
                </p>

                <button type="submit" class="btn-register">Register</button>
            </form>
        </main>
    </div>

</body>
</html>

