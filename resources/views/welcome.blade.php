<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIMNASIO HUMANÍSTICO</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/Logo.png') }}">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
</head>
<body>
        <!-- Overlay para mejor legibilidad -->
        <div class="logo-bar-overlay"></div>
        
        <div class="">
            <div class="institutional-header">
                <!-- Logo Izquierdo - Más prominente -->
                <div class="logo-left">
                    <div class="logo-container">
                        <img src="{{ asset('images/Logo.png') }}" 
                             alt="Logo Institucional Izquierdo" class="institutional-logo">
                        
                    </div>
                </div>
                
                <!-- Título Central - Tipografía mejorada -->
                <div class="institutional-title">
                    <h1 class="college-main-title">
                        <span class="title-line-1">COLEGIO GIMNASIO HUMANÍSTICO</span>
                        <span class="title-line-2">DEL ALTO MAGDALENA</span>
                        <span class="title-line-3">NEIVA, HUILA</span>
                    </h1>
                </div>
                
                <!-- Logo Derecho - Más prominente -->
                <div class="logo-right">
                    <div class="logo-container">
                        <img src="{{ asset('images/Logo.png') }}" 
                             alt="Logo Institucional Derecho" class="institutional-logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navegación Principal -->
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
                                        <a class="dropdown-item" href="#coordinadores">
                                            <i class="fas fa-user-tie"></i>
                                            Coordinaciones
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="dropdown-header">Reconocimientos</h6>
                                        <a class="dropdown-item" href="#certificaciones">
                                            <i class="fas fa-certificate"></i>
                                            Certificaciones
                                        </a>
                                        <a class="dropdown-item" href="#premios">
                                            <i class="fas fa-trophy"></i>
                                            Premios y Logros
                                        </a>
                                        <a class="dropdown-item" href="#acreditaciones">
                                            <i class="fas fa-medal"></i>
                                            Acreditaciones
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
                                        <a class="dropdown-item" href="#stem">
                                            <i class="fas fa-microscope"></i>
                                            Programa STEM
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
                                        <a class="dropdown-item" href="#deportes">
                                            <i class="fas fa-running"></i>
                                            Educación Física
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
                            <a class="dropdown-item" href="#inicial">
                                <i class="fas fa-baby"></i>
                                Educación Inicial (3-5 años)
                            </a>
                            <a class="dropdown-item" href="#primaria">
                                <i class="fas fa-child"></i>
                                Educación Primaria (6-11 años)
                            </a>
                            <a class="dropdown-item" href="#secundaria">
                                <i class="fas fa-user-graduate"></i>
                                Educación Secundaria (12-17 años)
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-door-open"></i>
                            ADMISIÓN
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#proceso">
                                <i class="fas fa-info-circle"></i>
                                Proceso de Admisión
                            </a>
                            <a class="dropdown-item" href="#cronograma">
                                <i class="fas fa-calendar-alt"></i>
                                Cronograma 2025
                            </a>
                            <a class="dropdown-item" href="#requisitos">
                                <i class="fas fa-file-alt"></i>
                                Requisitos
                            </a>
                            <a class="dropdown-item" href="#costos">
                                <i class="fas fa-dollar-sign"></i>
                                Costos y Pensiones
                            </a>
                            <a class="dropdown-item" href="#becas">
                                <i class="fas fa-hand-holding-usd"></i>
                                Becas y Descuentos
                            </a>
                        </div>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-smile"></i>
                            VIDA ESTUDIANTIL
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#actividades">
                                <i class="fas fa-calendar-check"></i>
                                Actividades Extracurriculares
                            </a>
                            <a class="dropdown-item" href="#eventos">
                                <i class="fas fa-calendar-star"></i>
                                Eventos y Celebraciones
                            </a>
                            <a class="dropdown-item" href="#cafeteria">
                                <i class="fas fa-utensils"></i>
                                Servicio de Alimentación
                            </a>
                            <a class="dropdown-item" href="#transporte">
                                <i class="fas fa-bus"></i>
                                Transporte Escolar
                            </a>
                            <a class="dropdown-item" href="#pastoral">
                                <i class="fas fa-praying-hands"></i>
                                Pastoral Estudiantil
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">
                            <i class="fas fa-envelope"></i>
                            CONTACTO
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i>
                            LOGIN
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-banner">
        <div class="hero-background">
            <img src="{{ asset('images/Header_1.jpg') }}" 
                 alt="Estudiantes del Colegio Excelencia" class="hero-bg-image">
            <div class="hero-overlay"></div>
        </div>
        
        <div class="hero-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <h1 class="hero-title">Formando Líderes del Mañana</h1>
                        <p class="hero-subtitle">Excelencia educativa con valores cristianos desde hace más de 25 años</p>
                        
                        <div class="hero-stats">
                            <div class="stat-card">
                                <span class="stat-number">25+</span>
                                <span class="stat-label">Años de Experiencia</span>
                            </div>
                            <div class="stat-card">
                                <span class="stat-number">1,500+</span>
                                <span class="stat-label">Estudiantes</span>
                            </div>
                            <div class="stat-card">
                                <span class="stat-number">98%</span>
                                <span class="stat-label">Ingreso Universitario</span>
                            </div>
                            <div class="stat-card">
                                <span class="stat-number">120+</span>
                                <span class="stat-label">Docentes Calificados</span>
                            </div>
                        </div>
                        
                        <div class="hero-cta">
                            <a href="#admision" class="btn-hero-primary">
                                <i class="fas fa-door-open"></i>
                                PROCESO DE ADMISIÓN 2025
                            </a>
                            <a href="#conocenos" class="btn-hero-primary">
                                <i class="fas fa-play-circle"></i>
                                CONOCE NUESTRO COLEGIO
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // Efecto de navegación al hacer scroll
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const navigation = document.querySelector('.main-navigation');
            
            if (scrolled > 100) {
                navigation.classList.add('scrolled');
            } else {
                navigation.classList.remove('scrolled');
            }
            
            // Efecto parallax sutil en el hero
            const heroImage = document.querySelector('.hero-bg-image');
            if (heroImage) {
                const speed = scrolled * 0.3;
                heroImage.style.transform = `translateY(${speed}px)`;
            }
        });

        // Smooth scroll para enlaces ancla
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offsetTop = target.offsetTop - 120;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Cerrar dropdown al hacer click fuera
        document.addEventListener('click', function(e) {
            const dropdowns = document.querySelectorAll('.dropdown-menu.show');
            dropdowns.forEach(dropdown => {
                if (!dropdown.contains(e.target) && !dropdown.previousElementSibling.contains(e.target)) {
                    dropdown.classList.remove('show');
                }
            });
        });

        // Animación de números en las estadísticas
        function animateCounters() {
            const counters = document.querySelectorAll('.stat-number');
            counters.forEach(counter => {
                const target = parseInt(counter.textContent.replace(/\D/g, ''));
                const duration = 2000;
                const increment = target / (duration / 16);
                let current = 0;
                
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    
                    // Mantener el formato original (+ y %)
                    const originalText = counter.textContent;
                    if (originalText.includes('+')) {
                        counter.textContent = Math.floor(current) + '+';
                    } else if (originalText.includes('%')) {
                        counter.textContent = Math.floor(current) + '%';
                    } else {
                        counter.textContent = Math.floor(current);
                    }
                }, 16);
            });
        }

        // Ejecutar animación cuando el hero sea visible
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.unobserve(entry.target);
                }
            });
        });

        const heroStats = document.querySelector('.hero-stats');
        if (heroStats) {
            observer.observe(heroStats);
        }

        // Mejorar la responsividad del menú
        const navbarToggler = document.querySelector('.navbar-toggler');
        const navbarCollapse = document.querySelector('.navbar-collapse');
        
        if (navbarToggler && navbarCollapse) {
            navbarToggler.addEventListener('click', function() {
                setTimeout(() => {
                    if (navbarCollapse.classList.contains('show')) {
                        document.body.style.overflow = 'hidden';
                    } else {
                        document.body.style.overflow = '';
                    }
                }, 300);
            });
        }

        // Cerrar menú móvil al hacer click en un enlace
        document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
            link.addEventListener('click', () => {
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse.classList.contains('show')) {
                    document.querySelector('.navbar-toggler').click();
                    document.body.style.overflow = '';
                }
            });
        });
    </script>
</body>
</html>