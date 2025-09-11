<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Colegio Gimnasio Humanístico del Alto Magdalena</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.32/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.32/sweetalert2.min.css">
</head>
<body>
    <div class="login-container">
        <div class="login-background">
            <div class="login-image-container">
                <img class="login-bg-image" src="{{ asset('images/Login/Login1.jpg') }}" alt="Background">
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-10 col-lg-8 col-xl-8">
                    <div class="card d-flex mx-auto my-5">
                        <div class="row">
                            <div class="col-md-5 col-sm-12 col-xs-12 c1 p-5">
                                <div id="hero" class="bg-transparent h-auto order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                                    <img class="img-fluid animated" src="{{ asset('images/Logo_inicio.png') }}" alt="Logo GHM">
                                </div>
                                <div class="row justify-content-center">
                                    <div class="w-75 mx-md-5 mx-1 mx-sm-2 mb-5 mt-4 px-sm-5 px-md-2 px-xl-1 px-2">
                                        <h1 class="wlcm">Bienvenido(a)</h1>
                                        <span class="sp1">
                                            <span style="margin-right: 2px;" class="px-3 bg-danger rounded-pill"></span>
                                            <span style="margin-right: 2px;" class="ml-2 px-1 rounded-circle"></span>
                                            <span class="ml-2 px-1 rounded-circle"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-12 col-xs-12 c2 px-5 pt-5">
                                <div class="row mb-4 m-3">
                                    <div class="institutional-header-with-logo text-center">
                                        <div class="college-logo-container mb-3">
                                            <img src="{{ asset('images/Logo.png') }}" alt="Logo del colegio" class="college-logo">
                                        </div>
                                        <h2 class="institutional-name-with-logo">Gimnasio Humanístico Neiva-Huila</h2>
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('login') }}" class="px-5 pb-5">
                                    @csrf
                                    <div class="login-header mb-4">
                                        <h3 class="login-title">
                                            <i class="fas fa-sign-in-alt me-2"></i>
                                            Iniciar Sesión
                                        </h3>
                                        <p class="login-subtitle">Ingresa tus credenciales para acceder</p>
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label">
                                            <i class="fas fa-envelope me-2"></i>
                                            Correo Electrónico
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-user"></i>
                                            </span>
                                            <input id="email" type="text" class="form-control input-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="ejemplo@correo.com" required autofocus>
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="password" class="form-label">
                                            <i class="fas fa-lock me-2"></i>
                                            Contraseña
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-key"></i>
                                            </span>
                                            <input id="password" type="password" class="form-control input-field @error('password') is-invalid @enderror" name="password" placeholder="Ingresa tu contraseña" required>
                                            <button class="btn btn-outline-secondary password-toggle" type="button" id="togglePassword">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-actions mb-4">
                                        <button type="submit" class="btn btn-primary btn-login">
                                            <i class="fas fa-sign-in-alt me-2"></i>
                                            Iniciar Sesión
                                        </button>
                                        <a href="{{ route('register') }}" class="btn btn-secondary btn-register">
                                            <i class="fas fa-user-plus me-2"></i>
                                            Registrarse
                                        </a>
                                    </div>

                                    <div class="forgot-password-section text-center">
                                        <a class="forgot-password-link" href="{{ route('password.request') }}">
                                            <i class="fas fa-question-circle me-1"></i>
                                            ¿Olvidaste tu contraseña?
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts para funcionalidad -->
    <script>
        // Toggle para mostrar/ocultar contraseña
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>

    <!-- Script para SweetAlert2 -->
    @if (session('status'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    icon: 'success',
                    title: 'Usuario Creado',
                    text: 'Esperando verificación del administrador. {{ session('status') }}',
                    confirmButtonText: 'Entendido',
                    timer: 5000,
                    timerProgressBar: true,
                    customClass: {
                        popup: 'swal-custom',
                        title: 'swal-title',
                        content: 'swal-text',
                        confirmButton: 'swal-button'
                    },
                    backdrop: true,
                    allowOutsideClick: false
                });
            });
        </script>
    @endif
    
    @if (session('auth_error'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    icon: 'warning',
                    title: 'Acceso Denegado',
                    text: '{{ session('auth_error') }}',
                    confirmButtonText: 'Intentar de nuevo',
                    timer: 4000,
                    timerProgressBar: true,
                    customClass: {
                        popup: 'swal-custom',
                        title: 'swal-title',
                        content: 'swal-text',
                        confirmButton: 'swal-button'
                    },
                    backdrop: true,
                    allowOutsideClick: false
                });
            });
        </script>
    @endif
</body>
</html>