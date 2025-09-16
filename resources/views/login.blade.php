<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #00b8d4 0%, #0097a7 100%);
            padding: 20px;
        }

        .container {
            display: flex;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
            max-width: 900px;
            width: 100%;
            min-height: 500px;
        }

        .left-section {
            flex: 1;
            background: linear-gradient(135deg, #00b8d4 0%, #0097a7 100%);
            color: white;
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        .left-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="40" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="40" cy="80" r="1.5" fill="rgba(255,255,255,0.1)"/></svg>');
            opacity: 0.3;
        }

        .welcome-text {
            position: relative;
            z-index: 1;
        }

        .welcome-text h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            letter-spacing: -1px;
        }

        .welcome-text h2 {
            font-size: 20px;
            font-weight: 400;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .welcome-text p {
            font-size: 16px;
            line-height: 1.6;
            opacity: 0.8;
            max-width: 300px;
        }

        .right-section {
            flex: 1;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: white;
        }

        .signin-form {
            width: 100%;
            max-width: 350px;
        }

        .signin-form h3 {
            font-size: 28px;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 8px;
        }

        .signin-form .subtitle {
            color: #718096;
            font-size: 14px;
            margin-bottom: 40px;
        }

        .alert {
            padding: 12px 16px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-size: 14px;
        }

        .alert-error {
            background-color: #fed7d7;
            color: #9b2c2c;
            border: 1px solid #feb2b2;
        }

        .alert-success {
            background-color: #c6f6d5;
            color: #22543d;
            border: 1px solid #9ae6b4;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #4a5568;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 16px;
            font-size: 16px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            transition: all 0.3s ease;
            background: #f7fafc;
        }

        .form-group input:focus {
            outline: none;
            border-color: #00b8d4;
            background: white;
            box-shadow: 0 0 0 3px rgba(0, 184, 212, 0.1);
        }

        .form-group input.error {
            border-color: #e53e3e;
            background-color: #fed7d7;
        }

        .password-group {
            position: relative;
        }

        .show-password {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #00b8d4;
            font-size: 14px;
            cursor: pointer;
            font-weight: 500;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .remember-me input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #00b8d4;
        }

        .remember-me label {
            font-size: 14px;
            color: #4a5568;
            margin: 0;
        }

        .forgot-password {
            color: #00b8d4;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .signin-button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #00b8d4 0%, #0097a7 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 30px;
        }

        .signin-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(0, 184, 212, 0.3);
        }

        .signin-button:active {
            transform: translateY(0);
        }

        .signin-button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .signup-link {
            text-align: center;
            font-size: 14px;
            color: #718096;
        }

        .signup-link a {
            color: #00b8d4;
            text-decoration: none;
            font-weight: 500;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }

        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid #ffffff;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                border-radius: 0;
                height: 100vh;
            }

            .left-section {
                padding: 40px 30px;
                min-height: 200px;
            }

            .welcome-text h1 {
                font-size: 36px;
            }

            .right-section {
                padding: 40px 30px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-section">
            <div class="welcome-text">
                <h1>WELCOME</h1>
                <h2>YOUR HEADLINE NAME</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
            </div>
        </div>

        <div class="right-section">
            <!-- Alert Messages -->
            <div id="alert-container"></div>

            <!-- Ganti bagian form action di HTML -->
<form class="signin-form" method="POST" action="/login">
    <!-- CSRF Token untuk Laravel -->
    @csrf

    <h3>Sign In</h3>
    <p class="subtitle">Masukkan email dan password untuk mengakses sistem</p>

    <!-- Alert container untuk pesan error/success -->
    @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form fields tetap sama -->
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @error('email')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <div class="password-group">
            <input type="password" id="password" name="password" required>
            <button type="button" class="show-password" onclick="togglePassword()">SHOW</button>
        </div>
        @error('password')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-options">
        <div class="remember-me">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Remember me</label>
        </div>
        <a href="#" class="forgot-password">Forgot Password?</a>
    </div>

    <button type="submit" class="signin-button">
        Sign In
    </button>

    <p class="signup-link">Don't have an account? <a href="#">Sign up</a></p>
</form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const showButton = document.querySelector('.show-password');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showButton.textContent = 'HIDE';
            } else {
                passwordInput.type = 'password';
                showButton.textContent = 'SHOW';
            }
        }

        function showAlert(message, type) {
            const alertContainer = document.getElementById('alert-container');
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type}`;
            alertDiv.textContent = message;

            // Clear previous alerts
            alertContainer.innerHTML = '';
            alertContainer.appendChild(alertDiv);

            // Auto hide after 5 seconds
            setTimeout(() => {
                alertDiv.style.transition = 'opacity 0.5s ease';
                alertDiv.style.opacity = '0';
                setTimeout(() => {
                    alertDiv.remove();
                }, 500);
            }, 5000);
        }


    </script>
</body>
</html>
