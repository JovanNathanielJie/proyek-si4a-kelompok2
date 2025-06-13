<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - UMDP Portal</title>
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
            max-width: 500px;
        }
        .form-label, .form-check-label, .card-body, .btn, .text-secondary, .text-sm {
            font-size: 1.15rem !important;
        }
        .card-body {
            padding: 2.5rem !important;
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
            <div class="col-md-8 col-lg-6">
                <div class="card rounded-4 shadow-lg mx-auto">
                    <div class="card-body p-4 text-center">
                        <div class="text-center mb-4">
                           <img src="{{ asset('foto/logobimbel.webp') }}" alt="Logo Bimbel" class="mb-2 rounded-3" style="max-width: 130px;">
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name -->
                            <div class="mb-3 text-start">
                                <x-input-label for="name" :value="__('Name')" class="form-label fw-semibold" />
                                <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mb-3 text-start">
                                <x-input-label for="email" :value="__('Email')" class="form-label fw-semibold" />
                                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mb-3 text-start">
                                <x-input-label for="password" :value="__('Password')" class="form-label fw-semibold" />
                                <x-text-input id="password" class="form-control"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-3 text-start">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="form-label fw-semibold" />
                                <x-text-input id="password_confirmation" class="form-control"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <a class="text-decoration-underline text-sm text-secondary" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>
                                <x-primary-button class="btn btn-primary ms-2 px-4 py-2 fs-5">
                                    {{ __('Register') }}
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
