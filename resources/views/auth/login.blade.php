<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - Emir Şahin</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.all.min.css') }}">
    
    <style>
        :root {
            --rdn-primary-color: #6b7f38;
            --rdn-black-color: #050505;
            --rdn-heading-color: #ffffff;
            --rdn-body-color: rgba(255, 255, 255, 0.7);
            --rdn-glass-bg: rgba(25, 25, 25, 0.6);
            --rdn-glass-border: rgba(255, 255, 255, 0.08);
        }
        
        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--rdn-black-color);
            color: var(--rdn-body-color);
            min-height: 100vh;
            display: flex;
            margin: 0;
            overflow-x: hidden;
        }

        .login-split {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        /* Left Side: Large Image */
        .login-left {
            flex: 1;
            background: linear-gradient(to top, rgba(5,5,5,1) 0%, rgba(5,5,5,0.2) 50%, rgba(5,5,5,0.8) 100%), url("{{ asset('assets/img/general/emir3.png') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            display: none;
        }
        
        @media (min-width: 992px) {
            .login-left {
                display: flex;
                align-items: flex-end; /* Align text to bottom */
                padding: 5rem;
            }
        }

        .login-left h1 {
            color: var(--rdn-heading-color);
            font-size: 4rem;
            font-weight: 700;
            line-height: 1.1;
            margin-bottom: 0;
            text-shadow: 0 10px 30px rgba(0,0,0,0.8);
        }

        /* Right Side: Login Form */
        .login-right {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background: var(--rdn-black-color);
            background-image: radial-gradient(circle at top right, rgba(107, 127, 56, 0.08), transparent 60%);
            position: relative;
        }

        @media (min-width: 992px) {
            .login-right {
                flex: 0 0 550px;
                padding: 4rem;
                box-shadow: -20px 0 50px rgba(0,0,0,0.5);
                z-index: 10;
            }
        }
        @media (min-width: 1400px) {
            .login-right {
                flex: 0 0 700px;
                padding: 6rem;
            }
        }

        .login-form-wrapper {
            width: 100%;
            max-width: 440px;
        }

        .login-title {
            color: var(--rdn-heading-color);
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            letter-spacing: -0.5px;
        }

        .login-subtitle {
            font-size: 1.1rem;
            color: var(--rdn-body-color);
            margin-bottom: 3.5rem;
        }

        /* Modern Inputs */
        .form-group {
            margin-bottom: 1.8rem;
            position: relative;
        }

        .form-label {
            color: rgba(255,255,255,0.6);
            font-weight: 500;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 0.8rem;
            display: block;
        }

        .input-icon-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon-wrapper > i {
            position: absolute;
            left: 20px;
            color: rgba(255, 255, 255, 0.4);
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        .form-control {
            background: var(--rdn-glass-bg);
            border: 1px solid var(--rdn-glass-border);
            color: var(--rdn-heading-color);
            border-radius: 16px;
            padding: 1rem 1.5rem 1rem 3.5rem; /* Left padding for icon */
            font-size: 1.05rem;
            width: 100%;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(255,255,255,0.05);
            border-color: var(--rdn-primary-color);
            color: var(--rdn-heading-color);
            box-shadow: 0 0 0 4px rgba(107, 127, 56, 0.15);
            outline: none;
        }

        .form-control:focus + i {
            color: var(--rdn-primary-color);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.2);
        }

        /* Cool Button */
        .btn-primary {
            background-color: var(--rdn-primary-color);
            border: none;
            color: #fff;
            border-radius: 16px;
            padding: 1.1rem 2rem;
            font-weight: 600;
            font-size: 1.1rem;
            width: 100%;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            margin-top: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #839b46;
            transform: translateY(-4px);
            box-shadow: 0 20px 40px -10px rgba(107, 127, 56, 0.6);
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }

        /* Checkbox */
        .form-check {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 1.5rem;
        }

        .form-check-input {
            appearance: none;
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            width: 20px;
            height: 20px;
            border-radius: 6px;
            cursor: pointer;
            position: relative;
            transition: all 0.3s;
        }
        
        .form-check-input:checked {
            background-color: var(--rdn-primary-color);
            border-color: var(--rdn-primary-color);
        }

        .form-check-label {
            color: rgba(255,255,255,0.7);
            font-size: 0.95rem;
            cursor: pointer;
        }

        .welcome-back {
            position: absolute;
            bottom: 2rem;
            right: 2.5rem;
            color: rgba(255, 255, 255, 0.1);
            font-size: 4rem;
            font-weight: 700;
            line-height: 1;
            margin: 0;
            pointer-events: none;
            letter-spacing: -2px;
            text-align: right;
            z-index: 1;
        }
        @media (max-width: 768px) {
            .welcome-back {
                font-size: 2.5rem;
                bottom: 1.5rem;
                right: 1.5rem;
            }
        }

        .invalid-feedback {
            color: #ff6b6b;
            font-size: 0.9rem;
            display: block;
            margin-top: 0.8rem;
            background: rgba(255, 107, 107, 0.1);
            padding: 10px 15px;
            border-radius: 8px;
            border-left: 3px solid #ff6b6b;
        }
    </style>
</head>
<body>

    <div class="login-split">
        <!-- Sol Taraf: Büyük Görsel -->
        <div class="login-left">
            <!-- Görsel CSS background olarak ayarlandı, içerik kaldırıldı -->
        </div>

        <!-- Sağ Taraf: Giriş Formu -->
        <div class="login-right">
            <h1 class="welcome-back">Welcome<br>Back.</h1>
            
            <div class="login-form-wrapper" style="position: relative; z-index: 10;">
                
                <h2 class="login-title mb-5">Yönetim Paneli</h2>

                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf

                    @error('username')
                        <div class="invalid-feedback mb-4">
                            <i class="fa-solid fa-triangle-exclamation me-2"></i> {{ $message }}
                        </div>
                    @enderror

                    <div class="form-group">
                        <label for="username" class="form-label">Kullanıcı Adı</label>
                        <div class="input-icon-wrapper">
                            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" placeholder="Kullanıcı adınızı girin" required autofocus autocomplete="off">
                            <i class="fa-solid fa-user"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Güvenli Şifre</label>
                        <div class="input-icon-wrapper" style="position: relative;">
                            <input type="password" class="form-control" id="password" name="password" placeholder="••••••••••••" required style="padding-right: 40px;">
                            <i class="fa-solid fa-lock"></i>
                            <button type="button" onclick="togglePassword('password', this)" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); background: none; border: none; color: rgba(255,255,255,0.4); cursor: pointer; padding: 0;">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Oturumu açık tut</label>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Sisteme Giriş Yap <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(inputId, btn) {
            const input = document.getElementById(inputId);
            const icon = btn.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
