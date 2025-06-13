<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - UMDP Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #c3cfe2 0%, #f5f7fa 100%);
            min-height: 100vh;
        }
        .card {
            background: rgba(255,255,255,0.92);
            border: none;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
            max-width: 500px; /* Perbesar card */
        }
        .form-label, .form-check-label, .card-body, .btn, .text-secondary, .text-sm {
            font-size: 1.15rem !important; /* Perbesar tulisan */
        }
        .card-body {
            padding: 2.5rem !important; /* Perbesar padding card */
        }
        .form-control {
            font-size: 1.1rem;
            padding: 0.75rem 1rem;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6"> <!-- Perbesar col -->
                <div class="card rounded-4 shadow-lg mx-auto">
                    <div class="card-body p-4 text-center">
                        <div class="text-center mb-4">
                            <img src="{{ asset('foto/logobimbel.webp') }}" alt="Logo Bimbel" class="mb-2 rounded-3" style="max-width: 150px;">
                        </div>
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-3 text-start">
                                <x-input-label for="email" :value="__('Email')" class="form-label fw-semibold" />
                                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mb-3 text-start">
                                <x-input-label for="password" :value="__('Password')" class="form-label fw-semibold" />
                                <x-text-input id="password" class="form-control"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Remember Me -->
                            <div class="mb-3 form-check text-start">
                                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                <label for="remember_me" class="form-check-label text-sm text-gray-600">{{ __('Remember me') }}</label>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                @if (Route::has('password.request'))
                                    <a class="text-decoration-underline text-sm text-secondary" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif

                                <x-primary-button class="btn btn-primary ms-2 px-4 py-2 fs-5">
                                    {{ __('Log in') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
