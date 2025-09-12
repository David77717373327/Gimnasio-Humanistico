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
                                            <img src="{{ asset('images/logo-colegio.png') }}" alt="Logo del colegio" class="college-logo">
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





/* Variables CSS para colores principales del colegio */
:root {
    /* Colores principales */
    --primary-green: #0d3f27;
    --accent-gold: #F4B942;
    --white: #FFFFFF;
    
    /* Colores complementarios */
    --light-green: #1a5d3a;
    --dark-green: #0a2f1e;
    --light-gold: #f6c567;
    --dark-gold: #d49e2a;
    
    /* Colores neutros */
    --light-gray: #f8f9fa;
    --medium-gray: #e9ecef;
    --dark-gray: #495057;
    --text-dark: #212529;
    --text-light: #6c757d;
    --text-muted: #868e96;
    
    /* Sombras y efectos */
    --shadow-light: 0 2px 4px rgba(13, 63, 39, 0.1);
    --shadow-medium: 0 4px 12px rgba(13, 63, 39, 0.15);
    --shadow-strong: 0 8px 25px rgba(13, 63, 39, 0.2);
    
    /* Transiciones */
    --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    --transition-fast: all 0.2s ease;
}

/* Reset y configuración base */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: var(--primary-green);
    color: var(--text-dark);
    line-height: 1.6;
}

/* Contenedor principal del login */
.login-container {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    padding: 20px;
}

/* Fondo con imagen */
.login-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
}

.login-image-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.login-bg-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
   
}

/* Card principal */
.card {
    background: rgba(255, 255, 255, 0.98);
    backdrop-filter: blur(15px);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: var(--shadow-strong);
    overflow: hidden;
    animation: slideInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    max-width: 900px;
    margin: 0 auto;
}

@keyframes slideInUp {
    0% {
        opacity: 0;
        transform: translateY(50px) scale(0.95);
    }
    100% {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

/* Panel izquierdo con imagen de bienvenida */
.c1 {
    background: linear-gradient(135deg, #f0f9f4 0%, #e8f5e8 100%);
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: 500px;
}

.c1::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle at center, rgba(13, 63, 39, 0.05) 0%, transparent 70%);
    pointer-events: none;
}

/* Logo y elementos de bienvenida */
#hero {
    width: 100%;
    max-width: 250px;
    animation: fadeInZoom 1s ease-out 0.3s both;
}

@keyframes fadeInZoom {
    0% {
        opacity: 0;
        transform: scale(0.8);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

#hero img {
    width: 100%;
    height: auto;
    filter: drop-shadow(0 10px 25px rgba(13, 63, 39, 0.1));
    transition: var(--transition-smooth);
}

#hero img:hover {
    transform: scale(1.05);
    filter: drop-shadow(0 15px 35px rgba(13, 63, 39, 0.15));
}

/* Texto de bienvenida */
.wlcm {
    font-size: 32px;
    font-weight: 700;
    color: var(--accent-gold);
    text-align: center;
    margin: 20px 0 10px 0;
    text-shadow: 0 2px 4px rgba(244, 185, 66, 0.2);
    animation: welcomeGlow 2s ease-in-out infinite alternate;
}

@keyframes welcomeGlow {
    0% { text-shadow: 0 2px 4px rgba(244, 185, 66, 0.2); }
    100% { text-shadow: 0 4px 8px rgba(244, 185, 66, 0.4); }
}

/* Indicadores decorativos */
.sp1 {
    text-align: center;
    margin-top: 10px;
}

.sp1 > span {
    display: inline-block;
    margin: 0 3px;
    animation: dotPulse 1.5s ease-in-out infinite;
}

.sp1 > span:nth-child(1) {
    background: var(--accent-gold);
    animation-delay: 0s;
}

.sp1 > span:nth-child(2) {
    background: var(--primary-green);
    animation-delay: 0.2s;
}

.sp1 > span:nth-child(3) {
    background: var(--accent-gold);
    animation-delay: 0.4s;
}

@keyframes dotPulse {
    0%, 100% { opacity: 0.6; transform: scale(1); }
    50% { opacity: 1; transform: scale(1.2); }
}

/* Panel derecho - Formulario */
.c2 {
    padding: 40px 30px;
    background: var(--white);
}

/* Header institucional */
.institutional-header-with-logo {
    text-align: center;
    margin-bottom: 30px;
}

.college-logo-container {
    margin-bottom: 15px;
}

.college-logo {
    width: 80px;
    height: 80px;
    object-fit: contain;
    filter: drop-shadow(0 4px 8px rgba(13, 63, 39, 0.1));
    animation: logoFloat 3s ease-in-out infinite;
}

@keyframes logoFloat {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-5px); }
}

.institutional-name-with-logo {
    font-size: 24px;
    font-weight: 700;
    color: var(--primary-green);
    margin: 0;
    line-height: 1.3;
    font-family: 'Georgia', serif;
}

/* Header del formulario */
.login-header {
    text-align: center;
    margin-bottom: 30px;
}

.login-title {
    font-size: 28px;
    font-weight: 700;
    color: var(--primary-green);
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.login-title i {
    color: var(--accent-gold);
}

.login-subtitle {
    font-size: 14px;
    color: var(--text-light);
    margin: 0;
}

/* Grupos de formulario */
.form-group {
    margin-bottom: 20px;
}

.form-label {
    font-size: 14px;
    font-weight: 600;
    color: var(--primary-green);
    margin-bottom: 8px;
    display: flex;
    align-items: center;
}

.form-label i {
    color: var(--accent-gold);
    font-size: 12px;
}

/* Campos de entrada */
.input-group {
    position: relative;
}

.input-group-text {
    background: linear-gradient(135deg, var(--light-gray) 0%, var(--white) 100%);
    border: 2px solid var(--medium-gray);
    border-right: none;
    color: var(--text-light);
    border-radius: 12px 0 0 12px;
}

.input-field {
    border: 2px solid var(--medium-gray);
    border-radius: 0 12px 12px 0;
    padding: 12px 16px;
    font-size: 14px;
    background: var(--white);
    transition: var(--transition-smooth);
}

.input-field:focus {
    outline: none;
    border-color: var(--primary-green);
    box-shadow: 0 0 0 3px rgba(13, 63, 39, 0.1);
    background: var(--white);
}

.input-field:focus + .input-group-text,
.input-field:focus ~ .input-group-text {
    border-color: var(--primary-green);
}

/* Botón para mostrar contraseña */
.password-toggle {
    border: 2px solid var(--medium-gray);
    border-left: none;
    border-radius: 0 12px 12px 0;
    background: var(--light-gray);
    color: var(--text-light);
    transition: var(--transition-fast);
}

.password-toggle:hover {
    background: var(--accent-gold);
    color: var(--white);
    border-color: var(--accent-gold);
}

/* Botones de acción */
.form-actions {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.btn-login,
.btn-register {
    flex: 1;
    min-width: 140px;
    padding: 12px 20px;
    font-size: 14px;
    font-weight: 600;
    border-radius: 12px;
    border: 2px solid transparent;
    cursor: pointer;
    transition: var(--transition-smooth);
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    position: relative;
    overflow: hidden;
}

/* Botón principal - Iniciar Sesión */
.btn-login {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--light-green) 100%);
    color: var(--white);
    box-shadow: var(--shadow-medium);
}

.btn-login::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.6s;
}

.btn-login:hover::before {
    left: 100%;
}

.btn-login:hover {
    background: linear-gradient(135deg, var(--light-green) 0%, var(--primary-green) 100%);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(13, 63, 39, 0.3);
    color: var(--white);
}

/* Botón secundario - Registrarse */
.btn-register {
    background: var(--white);
    color: var(--primary-green);
    border-color: var(--primary-green);
    box-shadow: var(--shadow-light);
}

.btn-register:hover {
    background: var(--primary-green);
    color: var(--white);
    transform: translateY(-2px);
    box-shadow: var(--shadow-medium);
}

/* Enlace de contraseña olvidada */
.forgot-password-section {
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid var(--medium-gray);
}

.forgot-password-link {
    color: var(--primary-green);
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    transition: var(--transition-fast);
    display: inline-flex;
    align-items: center;
}

.forgot-password-link:hover {
    color: var(--light-green);
    text-decoration: underline;
    transform: translateY(-1px);
}

.forgot-password-link i {
    color: var(--accent-gold);
}

/* Mensajes de error */
.invalid-feedback {
    color: #dc3545;
    font-size: 12px;
    margin-top: 5px;
    display: block;
    animation: errorShake 0.5s ease-in-out;
}

@keyframes errorShake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
}

/* Estilos para SweetAlert2 */
.swal-custom {
    border-radius: 16px !important;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
}

.swal-title {
    color: var(--primary-green) !important;
    font-weight: 700 !important;
}

.swal-text {
    color: var(--text-dark) !important;
    font-size: 16px !important;
}

.swal-button {
    background: linear-gradient(135deg, var(--primary-green) 0%, var(--light-green) 100%) !important;
    border: none !important;
    border-radius: 10px !important;
    font-weight: 600 !important;
    padding: 12px 24px !important;
}

.swal2-success .swal2-icon {
    border-color: var(--primary-green) !important;
    color: var(--primary-green) !important;
}

.swal2-warning .swal2-icon {
    border-color: var(--accent-gold) !important;
    color: var(--accent-gold) !important;
}

.swal2-timer-progress-bar {
    background: var(--primary-green) !important;
}

/* Responsive Design */
@media (max-width: 768px) {
    .login-container {
        padding: 10px;
    }
    
    .card {
        margin: 10px;
        border-radius: 16px;
    }
    
    .c1 {
        min-height: 300px;
        padding: 30px 20px;
    }
    
    .c2 {
        padding: 30px 20px;
    }
    
    .wlcm {
        font-size: 26px;
    }
    
    .institutional-name-with-logo {
        font-size: 20px;
    }
    
    .login-title {
        font-size: 24px;
    }
    
    .college-logo {
        width: 60px;
        height: 60px;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .btn-login,
    .btn-register {
        min-width: 100%;
        margin-bottom: 10px;
    }
}

@media (max-width: 576px) {
    .institutional-name-with-logo {
        font-size: 18px;
    }
    
    .login-title {
        font-size: 22px;
        flex-direction: column;
        gap: 5px;
    }
    
    .wlcm {
        font-size: 24px;
    }
    
    .form-label {
        font-size: 13px;
    }
    
    .input-field {
        font-size: 13px;
        padding: 10px 14px;
    }
}

/* Animaciones adicionales para mejorar la experiencia */
.form-group {
    animation: fadeInUp 0.6s ease-out both;
}

.form-group:nth-child(1) { animation-delay: 0.1s; }
.form-group:nth-child(2) { animation-delay: 0.2s; }
.form-group:nth-child(3) { animation-delay: 0.3s; }
.form-actions { animation-delay: 0.4s; }
.forgot-password-section { animation-delay: 0.5s; }

@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Estados de loading para botones */
.btn-login:disabled,
.btn-register:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
}

.btn-login:disabled:hover,
.btn-register:disabled:hover {
    transform: none;
    box-shadow: var(--shadow-light);
}

/* Mejoras de accesibilidad */
.btn-login:focus,
.btn-register:focus,
.input-field:focus,
.forgot-password-link:focus {
    outline: 3px solid rgba(13, 63, 39, 0.3);
    outline-offset: 2px;
}

/* Modo de alto contraste (opcional) */
@media (prefers-contrast: high) {
    :root {
        --primary-green: #0a3520;
        --accent-gold: #b8860b;
        --text-light: #495057;
    }
    
    .input-field,
    .input-group-text {
        border-width: 3px;
    }
}






<!-- Header Section -->
                <header class="form-header">
                    <div class="institution-identity">
                        <img src="{{ asset('images/Logo.png') }}" alt="Logo institucional" class="institution-logo">
                        <div class="institution-details">
                            <h2 class="institution-name">Gimnasio Humanístico</h2>
                            <p class="institution-location">Neiva, Huila</p>
                        </div>
                    </div>
                </header>



/* Header del formulario */
.form-header {
    margin-bottom: var(--spacing-xl);
}

.institution-identity {
    display: flex;
    align-items: center;
    gap: var(--spacing-md);
    padding-bottom: var(--spacing-lg);
    border-bottom: 2px solid var(--gray-100);
}

.institution-logo {
    width: 56px;
    height: 56px;
    object-fit: contain;
    filter: drop-shadow(0 4px 8px rgba(13, 63, 39, 0.1));
}

.institution-details {
    flex: 1;
}

.institution-name {
    font-family: var(--font-family-secondary);
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-green);
    margin: 0 0 var(--spacing-xs) 0;
    line-height: 1.3;
}

.institution-location {
    font-size: 0.9rem;
    color: var(--gray-500);
    margin: 0;
}
