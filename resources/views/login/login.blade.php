    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Mr+De+Haviland&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <title>Login - PT Jemla Ferry</title>
        <style>
            body {
                font-family: 'Roboto', sans-serif;
                background-image: url('{{ asset("images/gilimanuk2.jpg") }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                height: 100vh;
            }

            .navbar {
                background-color: rgba(255, 255, 255, 0.8);
            }

            .navbar-brand img {
                width: 150px;
                height: auto;
            }

            .navbar-text {
                font-family: 'Mr De Haviland', cursive;
                font-size: 2rem;
                margin-right: 20px;
            }

            .login-container {
                background-color: rgba(255, 255, 255, 0.9);
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                width: 400px;
            }

            .login-container h3 {
                margin-bottom: 20px;
            }

            .btn-primary {
                background-color: #007bff;
                border: none;
            }

            .btn-primary:hover {
                background-color: #0056b3;
            }

            .form-check-label {
                font-size: 1rem;
            }

                .text-end a {
            text-decoration: none;
            color: inherit;
        }

        .text-end a:hover {
            text-decoration: underline;
        }

        .text-end button {
            border: none;
            background: none;
            padding: 0;
            margin: 0;
            color: #0d6efd;
            font-size: 1rem;
            font-weight: 600;
        }

        .text-end button:hover {
            text-decoration: underline;
            background: none;
            color: #0a58ca;
        }

        </style>
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/logo_pt.png') }}" alt="PT Jemla Ferry">
                </a>
                <div class="collapse navbar-collapse">
                    <span class="navbar-text ms-auto">Ketapang - Gilimanuk</span>
                </div>
            </div>
        </nav>

        <!-- Login Form -->
        <div class="d-flex justify-content-center align-items-center" style="height: calc(100vh - 70px);">
            <div class="login-container">
                <h3 class="text-center">Sign in to start your session</h3>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Masukkan email" required>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <!-- <div class="form-check">
                            <input type="checkbox" id="remember" name="remember" class="form-check-input">
                            <label for="remember" class="form-check-label">Remember me</label>
                        </div> -->
                        <div class="text-end">
                            <label class="text-decoration-none d-inline-flex align-items-center">
                                <span class="me-2">Tidak punya akun?</span>
                                <a href="/register" class="btn btn-outline-primary btn-sm">Register</a>
                            </label>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+pmnsKAu6UJ0kBlFDi7j7zw5RJJ0y" crossorigin="anonymous"></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                    timer: 2000,
                    showConfirmButton: false
                });
            @endif
        });
        document.addEventListener('DOMContentLoaded', function() {
            @if ($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: `
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                `,
                });
            @endif

            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                });
            @endif
        });
    </script>
    </body>
    </html>
