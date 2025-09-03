<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Colegio Gimnasio Humanístico del Alto Magdalena</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.32/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.32/sweetalert2.min.css">
</head>
<body>
    <div class="login-container">
        <div class="login-background">
            <div class="login-image-container">
                <img class="login-bg-image" src="{{ asset('images/Login_3.jpg') }}" alt="Background">
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
                                        <h1 class="wlcm">Welcome</h1>
                                        <span class="sp1">
                                            <span style="margin-right: 2px;" class="px-3 bg-danger rounded-pill"></span>
                                            <span style="margin-right: 2px;" class="ml-2 px-1 rounded-circle"></span>
                                            <span class="ml-2 px-1 rounded-circle"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-12 col-xs-12 c2 px-5 pt-5">
                                <div class="row mb-5 m-3">
                                    <h2 class="institutional-name">Gimnasio Humanístico Neiva-Huila</h2>
                                </div>
                                <form method="POST" action="{{ route('login') }}" class="px-5 pb-5">
                                    @csrf
                                    <h3 class="font-weight-bold mb-3">{{ __('Login') }}</h3>
                                    
                                    <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="text" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                    <label for="password" class="col-form-label mt-3">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                    <div class="mt-4">
                                        <button type="submit" class="btlogin text-white">Login</button>
                                        <a href="{{ route('register') }}" class="btlogin text-white">Registrarse</a>
                                    </div>
                                    <a class="btn btn-link forgot mt-2" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Script para SweetAlert2 -->
    @if (session('status'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    icon: 'success',
                    title: 'Usuario Creado, Esperar Verificación del Administrador',
                    text: '{{ session('status') }}',
                    confirmButtonText: 'OK',
                    timer: 3000,
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
                    confirmButtonText: 'OK',
                    timer: 3000,
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