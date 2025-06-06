<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UMDP Portal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            /* Gradient pastel background */
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            min-height: 100vh;
        }
        .card {
            background: rgba(255,255,255,0.85);
            backdrop-filter: blur(2px);
            border: none;
        }
        .btn-danger, .btn-outline-danger {
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            border: none;
        }
        .btn-outline-danger {
            background: transparent;
            color: #764ba2;
            border: 2px solid #764ba2;
        }
        .btn-danger:hover, .btn-outline-danger:hover {
            background: linear-gradient(90deg, #764ba2 0%, #667eea 100%);
            color: #fff;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4 text-center">
                        <!-- Gambar UMDP -->
                        <img src="{{ asset('foto/umdplogo.png') }}" alt="Logo UMDP" class="mb-3 rounded-3" style="max-width: 150px;">
                        <h2 class="fw-bold mb-2 text">Selamat Datang di Portal UMDP</h2>
                        <p class="text-secondary mb-4">
                            Sistem Informasi Akademik Universitas Mandiri Digital Prestasi
                        </p>
                        <div class="d-grid gap-2 mb-3">
                            <a href="{{ route('login') }}" class="btn btn-danger btn-lg rounded-pill fw-semibold">
                                <i class="bi bi-box-arrow-in-right me-2"></i> Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-outline-danger btn-lg rounded-pill fw-semibold">
                                    <i class="bi bi-person-plus me-2"></i> Register
                                </a>
                            @endif
                        </div>
                        <hr>
                        <div class="text-muted small">
                            <a href="https://laravel.com/docs" target="_blank" class="text-decoration-none me-2">Documentation</a> |
                            <a href="https://laracasts.com" target="_blank" class="text-decoration-none ms-2">Laracasts</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Icons (optional, for icons) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
