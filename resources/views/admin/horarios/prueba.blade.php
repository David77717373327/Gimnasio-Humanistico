<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIMNASIO HUMANÍSTICO</title>
    <!-- Google Fonts - Tipografía moderna -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Open+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap y Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/Logo.png') }}">

    <!-- CSS personalizado -->
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Header Institucional Mejorado -->
    <div class="logo-bar">
        <div class="container-fluid">
            <div class="institutional-header">
                <!-- Solo un logo a la izquierda -->
                <div class="logo-container">
                    <img src="{{ asset('images/Logo.png') }}" alt="Logo Colegio Gimnasio Humanístico"
                        class="institutional-logo">
                </div>

                <!-- Título modernizado -->
                <div class="institutional-title">
                    <h1 class="college-main-title">
                        <span class="title-line-1">COLEGIO GIMNASIO HUMANÍSTICO</span>
                        <span class="title-line-2">DEL ALTO MAGDALENA</span>
                        <span class="title-line-3">Neiva, Huila</span>
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Navegación Principal Mejorada -->
    <nav class="main-navigation navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#inicio">
                            <i class="fas fa-home"></i>
                            INICIO
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-users"></i>
                            QUIÉNES SOMOS
                        </a>
                        <div class="dropdown-menu mega-dropdown">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h6 class="dropdown-header">Institución</h6>
                                        <a class="dropdown-item" href="#historia">
                                            <i class="fas fa-history"></i>
                                            Nuestra Historia
                                        </a>
                                        <a class="dropdown-item" href="#mision">
                                            <i class="fas fa-eye"></i>
                                            Misión y Visión
                                        </a>
                                        <a class="dropdown-item" href="#valores">
                                            <i class="fas fa-heart"></i>
                                            Valores Institucionales
                                        </a>
                                        <a class="dropdown-item" href="#filosofia">
                                            <i class="fas fa-lightbulb"></i>
                                            Filosofía Educativa
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="dropdown-header">Organización</h6>
                                        <a class="dropdown-item" href="#directorio">
                                            <i class="fas fa-users-cog"></i>
                                            Directorio
                                        </a>
                                        <a class="dropdown-item" href="#plana-docente">
                                            <i class="fas fa-chalkboard-teacher"></i>
                                            Plana Docente
                                        </a>
                                        <a class="dropdown-item" href="#organigrama">
                                            <i class="fas fa-sitemap"></i>
                                            Organigrama
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="dropdown-header">Reconocimientos</h6>
                                        <a class="dropdown-item" href="#premios">
                                            <i class="fas fa-trophy"></i>
                                            Premios y Logros
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-graduation-cap"></i>
                            PROPUESTA EDUCATIVA
                        </a>
                        <div class="dropdown-menu mega-dropdown">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="dropdown-header">Metodología</h6>
                                        <a class="dropdown-item" href="#enfoque-pedagogico">
                                            <i class="fas fa-brain"></i>
                                            Enfoque Pedagógico
                                        </a>
                                        <a class="dropdown-item" href="#tecnologia">
                                            <i class="fas fa-laptop-code"></i>
                                            Tecnología Educativa
                                        </a>
                                        <a class="dropdown-item" href="#bilinguismo">
                                            <i class="fas fa-globe"></i>
                                            Educación Bilingüe
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="dropdown-header">Formación Integral</h6>
                                        <a class="dropdown-item" href="#valores-cristianos">
                                            <i class="fas fa-cross"></i>
                                            Valores Cristianos
                                        </a>
                                        <a class="dropdown-item" href="#liderazgo">
                                            <i class="fas fa-crown"></i>
                                            Formación en Liderazgo
                                        </a>
                                        <a class="dropdown-item" href="#artes">
                                            <i class="fas fa-palette"></i>
                                            Artes y Cultura
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-school"></i>
                            NIVELES
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#prescolar">
                                <i class="fas fa-child"></i>
                                Educación Prescolar
                            </a>
                            <a class="dropdown-item" href="#primaria">
                                <i class="fas fa-book"></i>
                                Educación Básica Primaria
                            </a>
                            <a class="dropdown-item" href="#secundaria">
                                <i class="fas fa-users"></i>
                                Educación Básica Secundaria
                            </a>
                            <a class="dropdown-item" href="#media">
                                <i class="fas fa-graduation-cap"></i>
                                Educación Media Académica
                            </a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#admision">
                            <i class="fas fa-door-open"></i>
                            ADMISIÓN 2025
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">
                            <i class="fas fa-envelope"></i>
                            CONTACTO
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link login-btn" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i>
                            ACCEDER
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section Completamente Rediseñado -->
    <section class="hero-banner" id="inicio">
        <!-- Fondo con gradiente mejorado -->
        <div class="hero-background">
            <!-- Imagen de fondo más inspiradora -->
            <div class="hero-image-container">
                <img src="{{ asset('images/Header_2.jpg') }}" alt="Estudiantes exitosos del Colegio"
                    class="hero-bg-image">
            </div>
            <div class="hero-overlay"></div>
        </div>

        <div class="hero-content">
            <div class="container">
                <div class="row align-items-center min-vh-100">
                    <div class="col-lg-6">
                        <!-- Contenido principal del hero -->
                        <div class="hero-text-content">
                            <span class="hero-badge">25 años de excelencia educativa</span>
                            <h1 class="hero-title">
                                Formando
                                <span class="highlight">Líderes</span>
                                del Mañana
                            </h1>
                            <p class="hero-subtitle">
                                Educación integral con valores cristianos, tecnología de vanguardia y metodologías
                                innovadoras que preparan a nuestros estudiantes para un futuro exitoso.
                            </p>

                            <!-- Botones de acción modernos -->
                            <div class="hero-actions">
                                <a href="#admision" class="btn-primary-modern">
                                    <i class="fas fa-rocket"></i>
                                    Solicitar Admisión
                                </a>
                                <a href="#virtual-tour" class="btn-secondary-modern">
                                    <i class="fas fa-play"></i>
                                    Tour Virtual
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <!-- Panel de estadísticas moderno -->
                        <div class="stats-panel">
                            <div class="stats-grid">
                                <div class="stat-item">
                                    <div class="stat-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <span class="stat-number" data-count="1500">0</span>
                                        <span class="stat-label">Estudiantes Activos</span>
                                    </div>
                                </div>

                                <div class="stat-item">
                                    <div class="stat-icon">
                                        <i class="fas fa-university"></i>
                                    </div>
                                    <div class="stat-content">
                                        <span class="stat-number" data-count="98">0</span>
                                        <span class="stat-label">% Ingreso Universitario</span>
                                    </div>
                                </div>

                                <div class="stat-item">
                                    <div class="stat-icon">
                                        <i class="fas fa-award"></i>
                                    </div>
                                    <div class="stat-content">
                                        <span class="stat-number" data-count="50">0</span>
                                        <span class="stat-label">Reconocimientos</span>
                                    </div>
                                </div>

                                <div class="stat-item">
                                    <div class="stat-icon">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                    </div>
                                    <div class="stat-content">
                                        <span class="stat-number" data-count="120">0</span>
                                        <span class="stat-label">Docentes Especializados</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navegación con scroll mejorada
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const navigation = document.querySelector('.main-navigation');

            if (scrolled > 50) {
                navigation.classList.add('scrolled');
            } else {
                navigation.classList.remove('scrolled');
            }
        });

        // Animación de contadores mejorada
        function animateCounters() {
            const counters = document.querySelectorAll('.stat-number');
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-count'));
                const duration = 2000;
                const increment = target / (duration / 16);
                let current = 0;

                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    counter.textContent = Math.floor(current);
                }, 16);
            });
        }

        // Observer para activar animaciones
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    if (entry.target.classList.contains('stats-panel')) {
                        animateCounters();
                    }
                    entry.target.classList.add('animate-in');
                }
            });
        }, {
            threshold: 0.1
        });

        // Observar elementos para animación
        document.querySelectorAll('.stats-panel, .feature-card').forEach(el => {
            observer.observe(el);
        });

        // Smooth scroll mejorado
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offsetTop = target.offsetTop - 80;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Mejorar navegación móvil
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse.classList.contains('show')) {
                    const toggler = document.querySelector('.navbar-toggler');
                    toggler.click();
                }
            });
        });
    </script>
</body>

</html>
