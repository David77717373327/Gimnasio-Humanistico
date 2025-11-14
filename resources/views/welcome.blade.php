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
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
</head>

<!-- Incluir el header -->
@include('layouts.header')


<body>

    <section class="hero-banner" id="inicio">
        <!-- Fondo con video y overlays profesionales -->
        <div class="hero-background">
            <!-- Video de fondo -->
            <div class="hero-video-container">
                <video class="hero-bg-video" autoplay muted loop playsinline
                    poster="{{ asset('images/video-poster.jpg') }}">
                    <source src="{{ asset('videos/hero-background4.mp4') }}" type="video/mp4">
                    <source src="{{ asset('videos/hero-background.webm') }}" type="video/webm">
                    <!-- Fallback para navegadores sin soporte -->
                    <img src="{{ asset('images/iniciooo2.jpeg') }}" alt="Estudiantes del Colegio"
                        class="hero-fallback-image">
                </video>
            </div>

            <!-- Overlays para mejor legibilidad -->
            <div class="hero-video-overlay"></div>
            <div class="hero-gradient-overlay"></div>
        </div>

        <!-- Contenido del Hero -->
        <div class="hero-content">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-10 col-xl-9">
                        <!-- Título principal -->
                        <div class="hero-title-section">
                            <h1 class="hero-title">
                                Nos educamos en el trabajo humanizante para un nuevo país
                            </h1>
                        </div>

                        <!-- Subtítulo y botones -->
                        <div class="hero-bottom-section">
                            <!-- Subtítulo -->
                            <div class="hero-subtitle-wrapper">
                                <p class="hero-subtitle">
                                    En nuestras aulas se fortalece el vuelo de la creatividad, la imaginación,
                                    el humanismo y el conocimiento.<br>
                                    ¡Ven y alza el vuelo con nosotros; el futuro nos inspira!
                                </p>
                            </div>

                            <!-- Botones de acción -->
                            <div class="hero-buttons-wrapper">
                                <a href="{{ route('admision') }}" class="btn-primary-modern">
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
                </div>
            </div>
        </div>

        <!-- Control de reproducción (opcional) -->
        <button class="video-control-btn" id="videoControl" aria-label="Pausar video">
            <i class="fas fa-pause"></i>
        </button>

        <!-- Scroll indicator -->
        <div class="scroll-indicator">
            <span class="scroll-text">Descubre más</span>
            <div class="scroll-arrow">
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </section>











    <!-- ============================================
     SECCIÓN DE BIENVENIDA INSTITUCIONAL
     Insertar este código DESPUÉS de la hero section (después del </section> de .hero-banner)
============================================ -->

    <!-- Sección de Bienvenida -->
    <section class="welcome-section" id="bienvenida">
        <div class="container">
            <!-- Mensaje de Bienvenida Principal -->
            <div class="welcome-header text-center mb-5">

                <h1 class="welcome-main-title" data-aos="fade-up" data-aos-delay="200">
                    <span class="highlight-text"> Bienvenidos al Gimnasio Humanístico Del Alto Magdalena</span>
                </h1>
                <div class="welcome-badge" data-aos="fade-up">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Excelencia Educativa Desde 1999</span>
                </div>
                <p class="welcome-main-subtitle" data-aos="fade-up" data-aos-delay="400">
                    Formamos líderes íntegros con valores cristianos, excelencia académica y visión global.
                    Nuestro compromiso es brindar una educación de calidad que transforme vidas y construya futuro.
                </p>
            </div>

            <!-- Contenido Principal con Grid Moderno -->
            <div class="row align-items-center mb-5">
                <!-- Columna de Texto e Información -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="welcome-content" data-aos="fade-right">
                        <div class="welcome-intro">
                            <h2 class="intro-subtitle">Educación con Excelencia</h2>
                            <p class="intro-description">
                                En el Colegio Gimnasio Humanístico del Alto Magdalena, nos comprometemos con el
                                desarrollo pleno de nuestros estudiantes a través de una educación de calidad que
                                combina tradición académica, valores cristianos e innovación pedagógica.
                            </p>
                        </div>

                        <div class="welcome-features">
                            <div class="feature-point" data-aos="fade-up" data-aos-delay="100">
                                <div class="feature-point-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <span>Metodología innovadora basada en competencias</span>
                            </div>
                            <div class="feature-point" data-aos="fade-up" data-aos-delay="200">
                                <div class="feature-point-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <span>Formación bilingüe certificada</span>
                            </div>
                            <div class="feature-point" data-aos="fade-up" data-aos-delay="300">
                                <div class="feature-point-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <span>Tecnología educativa de vanguardia</span>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Columna de Imagen Principal -->
                <div class="col-lg-6">
                    <div class="welcome-image-container" data-aos="fade-left">
                        <div class="main-image-wrapper">
                            <img src="{{ asset('images/iniciooo2.jpeg') }}"
                                alt="Instalaciones del Colegio Gimnasio Humanístico" class="welcome-main-image">
                            <div class="image-overlay-content">
                                <div class="overlay-badge">
                                    <i class="fas fa-building"></i>
                                    <span>Instalaciones Modernas</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>







            <!-- Galería de Instalaciones -->
            <div class="facilities-gallery" data-aos="fade-up">
                <div class="gallery-header text-center mb-4">
                    <h2 class="gallery-title">
                        <span class="title-decorator"></span>
                        Nuestras Instalaciones
                        <span class="title-decorator"></span>
                    </h2>
                    <p class="gallery-subtitle">Espacios diseñados para potenciar el aprendizaje y el desarrollo
                        integral</p>
                </div>

                <div class="row g-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                            <div class="gallery-image-wrapper">
                                <img src="{{ asset('images/iniciooo2.jpeg') }}" alt="Laboratorios de Ciencias"
                                    class="gallery-image">
                                <div class="gallery-title-overlay">
                                    <h4 class="facility-title">Laboratorios de Ciencias</h4>
                                </div>
                                <div class="gallery-icon-container">
                                    <i class="fas fa-flask"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200">
                            <div class="gallery-image-wrapper">
                                <img src="{{ asset('images/Mision3.jpg') }}" alt="Aulas Inteligentes"
                                    class="gallery-image">
                                <div class="gallery-title-overlay">
                                    <h4 class="facility-title">Aulas Inteligentes</h4>
                                </div>
                                <div class="gallery-icon-container">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
                            <div class="gallery-image-wrapper">
                                <img src="{{ asset('images/Mision1.jpg') }}" alt="Biblioteca Digital"
                                    class="gallery-image">
                                <div class="gallery-title-overlay">
                                    <h4 class="facility-title">Biblioteca Digital</h4>
                                </div>
                                <div class="gallery-icon-container">
                                    <i class="fas fa-book-open"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="400">
                            <div class="gallery-image-wrapper">
                                <img src="{{ asset('images/Mision1.jpg') }}" alt="Espacios Deportivos"
                                    class="gallery-image">
                                <div class="gallery-title-overlay">
                                    <h4 class="facility-title">Espacios Deportivos</h4>
                                </div>
                                <div class="gallery-icon-container">
                                    <i class="fas fa-running"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <!-- Sección Quiénes Somos - HTML DE LA SEGUNDA PLANTILLA + ATRIBUTOS AOS -->
    <section class="about-us-section" id="quienes-somos">
        <div class="container">
            <!-- Header de la Sección -->
            <div class="about-header text-center mb-5">
                <h1 class="about-main-title" data-aos="fade-up" data-aos-delay="200">
                    ¿Quiénes Somos?
                </h1>
                <p class="about-main-subtitle" data-aos="fade-up" data-aos-delay="400">
                    Más de 25 años forjando el futuro de Colombia a través de una educación
                    innovadora, Fundamentada en valores humanísticos y cristianos que transforman vidas.
                </p>
            </div>

            <!-- Grid de Cards Profesional: 2x2 -->
            <div class="cards-grid">
                <!-- Historia -->
                <div class="about-card history-card" data-aos="fade-up" data-aos-delay="100">

                    <div class="card-header">
                        <h3>MISIÓN</h3>
                    </div>

                    <div class="educational-icons"></div>
                    <div class="card-body">


                        <p class="card-description">
                            En el Gimnasio Humanístico del Alto Magdalena, nuestra misión es transformar vidas a través
                            de una
                            educación de excelencia. Nos comprometemos a promover el desarrollo holistico de cada
                            estudiante
                            (intelectual, espiritual, social, fisico y mental), mediante el cultivo de un pensamiento
                            científico,
                            crítico y ambiental; basados en un enfoque humanístico, inclusivo y emprendedor,
                            e impulsados por un equipo docente altamente cualificado y apasionado,
                            para preparar ciudadanos capaces de innovar, liderar y contribuir a una sociedad más digna y
                            sostenible.
                        </p>
                    </div>
                </div>

                <!-- Misión -->
                <div class="about-card mission-card" data-aos="fade-up" data-aos-delay="200">



                    <div class="card-header">
                        <h3>VISIÓN</h3>
                    </div>
                    <div class="card-body">

                        <p class="card-description">
                            Para el 2035, el Gimnasio Humanístico del Alto Magdalena será reconocido
                            como un referente en innovación educativa, consolidado por un Proyecto Educativo
                            Institucional que ofrece una formación de excelencia. Nuestro modelo se distinguirá
                            por su enfoque humanista, inclusivo, cientifico, ecológico y tecnológico, que prepara
                            a las nuevas generaciones con una mentalidad
                            global y las habilidades y competencias necesarias para impactar positivamente en la
                            sociedad.
                        </p>
                    </div>
                </div>

                <!-- Visión -->
                <div class="about-card vision-card" data-aos="fade-up" data-aos-delay="300">



                    <div class="card-header">
                        <h3>HISTORIA</h3>
                    </div>
                    <div class="card-body">
                        <p class="card-description">
                            El Gimnasio Humanístico del Alto Magdalena, fundado en 1983 en Neiva como Colegio Bilingüe
                            de la Sagrada Eucaristía, se destacó desde sus inicios por su calidad educativa.
                            En 1991 fue adquirido por la Dra. Diana Patricia Cristancho de Iriarte, quien impulsó un
                            nuevo enfoque pedagógico humanístico y regional.
                            El colegio adoptó su nombre actual, propuesto por el Magíster Antonio Iriarte Cadena,
                            reflejando valores humanos e identidad local.
                            Se modernizó con innovaciones pedagógicas y tecnológicas inspiradas en pensadores como
                            Gramsci, Piaget, Freinet y Dewey.
                        </p>
                    </div>
                </div>

                <!-- Filosofía Educativa -->
                <div class="about-card philosophy-card" data-aos="fade-up" data-aos-delay="400">

                    <div class="card-header">
                        <h3>FILOSOFÍA </h3>
                    </div>
                    <div class="card-body">

                        <p class="card-description">
                            El Gimnasio Humanístico del Alto Magdalena fundamenta su filosofía en el humanismo,
                            promoviendo la autodisciplina intelectual y la autonomía moral para formar seres críticos y
                            responsables.
                            Fomenta una cultura de democracia, creatividad e investigación, donde los estudiantes son
                            protagonistas de su aprendizaje.
                            Da prioridad al emprendimiento y la autodeterminación, impulsando a los jóvenes a liderar
                            sus proyectos de vida y aportar a la sociedad.
                            Además, asume un compromiso con la sostenibilidad ambiental y los valores del catolicismo,
                            buscando una formación integral que trascienda lo académico.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>









    <!-- ============================================
     SECCIÓN OFERTA ACADÉMICA - NIVELES EDUCATIVOS
     Insertar este código DESPUÉS de la sección Quiénes Somos
============================================ -->

    <!-- Sección Oferta Académica Mejorada - Nivel Empresarial -->
    <section class="academic-levels-section" id="niveles-educativos">
        <div class="container">
            <!-- Header de la Sección -->
            <div class="levels-header text-center mb-5">
                <h1 class="levels-main-title" data-aos="fade-up">
                    Oferta Académica
                </h1>
                <p class="levels-main-subtitle" data-aos="fade-up" data-aos-delay="200">
                    Formacion academica y humanística desde los primeros años hasta la preparación universitaria,
                    con metodologías innovadoras y enfoque en el desarrollo de competencias para el siglo XXI.
                </p>
            </div>

            <!-- Grid de Niveles Educativos -->
            <div class="row g-4">
                <!-- Preescolar -->
                <div class="col-lg-3 col-md-6">
                    <div class="level-card preescolar-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="card-image-wrapper">
                            <img src="{{ asset('images/Primariaa.jpeg') }}" alt="Educación Preescolar"
                                class="level-image">

                        </div>
                        <div class="card-content">

                            <h3 class="level-title">Educación Inicial - Preescolar</h3>
                            <p class="level-description">
                                Desarrollamos las habilidades fundamentales a través del juego,
                                la exploración y actividades que estimulan la creatividad y el pensamiento crítico.
                            </p>
                            <a href="{{ route('prescolar') }}" class="level-link">
                                <span>Ver más información</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="card-decoration preescolar-decoration"></div>
                    </div>
                </div>

                <!-- Primaria -->
                <div class="col-lg-3 col-md-6">
                    <div class="level-card primaria-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="card-image-wrapper">
                            <img src="{{ asset('images/segundariaaa.jpeg') }}" alt="Educación Primaria"
                                class="level-image">
                            <div class="card-overlay">
                                <div class="overlay-content">
                                    <div class="overlay-icon">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    <h4 class="overlay-title">Primaria</h4>
                                    <p class="overlay-description">
                                        Consolidación de competencias básicas con enfoque bilingüe y tecnológico
                                    </p>
                                    <div class="overlay-features">
                                        <span class="feature-item"><i class="fas fa-check"></i> Grados 1° a 5°</span>
                                        <span class="feature-item"><i class="fas fa-check"></i> Educación
                                            bilingüe</span>
                                        <span class="feature-item"><i class="fas fa-check"></i> Competencias
                                            STEM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">

                            <h3 class="level-title">Educación Básica Primaria</h3>
                            <p class="level-description">
                                Fortalecemos las competencias comunicativas, matemáticas y científicas
                                con metodologías activas y enfoque en el aprendizaje colaborativo.
                            </p>

                            <a href="{{ route('basica_primaria') }}" class="level-link">
                                <span>Ver más información</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="card-decoration primaria-decoration"></div>
                    </div>
                </div>

                <!-- Secundaria -->
                <div class="col-lg-3 col-md-6">
                    <div class="level-card secundaria-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="card-image-wrapper">
                            <img src="{{ asset('images/iniciooo2.jpeg') }}" alt="Educación Secundaria"
                                class="level-image">
                            <div class="card-overlay">
                                <div class="overlay-content">
                                    <div class="overlay-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <h4 class="overlay-title">Secundaria</h4>
                                    <p class="overlay-description">
                                        Fortalecimiento del pensamiento crítico y preparación para la media académica
                                    </p>
                                    <div class="overlay-features">
                                        <span class="feature-item"><i class="fas fa-check"></i> Grados 6° a 9°</span>
                                        <span class="feature-item"><i class="fas fa-check"></i> Proyectos de
                                            investigación</span>
                                        <span class="feature-item"><i class="fas fa-check"></i> Liderazgo
                                            estudiantil</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <h3 class="level-title">Educación Básica Secundaria</h3>
                            <p class="level-description">
                                Desarrollo del pensamiento crítico y analítico a través de proyectos
                                interdisciplinarios que preparan para los desafíos de la educación media.
                            </p>
                            <a href="#secundaria-detalle" class="level-link">
                                <span>Ver más información</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="card-decoration secundaria-decoration"></div>
                    </div>
                </div>

                <!-- Media -->
                <div class="col-lg-3 col-md-6">
                    <div class="level-card media-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="card-image-wrapper">
                            <img src="{{ asset('images/iniciooo2.jpeg') }}" alt="Educación Media"
                                class="level-image">
                            <div class="card-overlay">
                                <div class="overlay-content">
                                    <div class="overlay-icon">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    <h4 class="overlay-title">Media Académica</h4>
                                    <p class="overlay-description">
                                        Preparación integral para la educación superior y el proyecto de vida
                                    </p>
                                    <div class="overlay-features">
                                        <span class="feature-item"><i class="fas fa-check"></i> Grados 10° y
                                            11°</span>
                                        <span class="feature-item"><i class="fas fa-check"></i> Orientación
                                            vocacional</span>
                                        <span class="feature-item"><i class="fas fa-check"></i> Preparación
                                            ICFES</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <h3 class="level-title">Educación Media Académica</h3>
                            <p class="level-description">
                                Preparación integral para la educación superior con énfasis en el desarrollo
                                del proyecto de vida y competencias para el siglo XXI.
                            </p>
                            <a href="#media-detalle" class="level-link">
                                <span>Ver más información</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="card-decoration media-decoration"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Incluir el  -->
    @include('layouts.footer')



    <!-- Script para Animaciones AOS (Agregar antes del cierre de </body>) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <script>
        // Inicializar AOS
        AOS.init({
            duration: 600,
            easing: 'ease-out',
            once: false,
            offset: 50
        });
    </script>




    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
    /**
     * ============================================
     * SCRIPT PRINCIPAL - SCROLL INDICATOR SIEMPRE VISIBLE
     * ============================================
     */

    // ============================================
    // NAVEGACIÓN CON SCROLL
    // ============================================
    let scrollTicking = false;

    window.addEventListener('scroll', function() {
        if (!scrollTicking) {
            window.requestAnimationFrame(function() {
                const scrolled = window.pageYOffset;
                const navigation = document.querySelector('.main-navigation');

                // Navegación sticky
                if (navigation) {
                    if (scrolled > 50) {
                        navigation.classList.add('scrolled');
                    } else {
                        navigation.classList.remove('scrolled');
                    }
                }

                // EL SCROLL INDICATOR NUNCA SE OCULTA
                // No hay código aquí que lo oculte

                scrollTicking = false;
            });

            scrollTicking = true;
        }
    });

    // ============================================
    // ANIMACIÓN DE CONTADORES
    // ============================================
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

    // ============================================
    // INTERSECTION OBSERVER PARA ANIMACIONES
    // ============================================
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
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.stats-panel, .feature-card').forEach(el => {
            observer.observe(el);
        });
    });

    // ============================================
    // SMOOTH SCROLL PARA ENLACES
    // ============================================
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');

                // Ignorar enlaces vacíos o solo con #
                if (!href || href === '#') {
                    e.preventDefault();
                    return;
                }

                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    const offsetTop = target.offsetTop - 80;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    });

    // ============================================
    // NAVEGACIÓN MÓVIL
    // ============================================
    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                    const toggler = document.querySelector('.navbar-toggler');
                    if (toggler) {
                        toggler.click();
                    }
                }
            });
        });
    });

    /**
     * ============================================
     * HERO VIDEO CONTROLLER
     * ============================================
     */
    document.addEventListener('DOMContentLoaded', function() {
        const video = document.querySelector('.hero-bg-video');
        const videoControlBtn = document.getElementById('videoControl');
        let isPlaying = false;

        // ============================================
        // REPRODUCCIÓN AUTOMÁTICA DEL VIDEO
        // ============================================
        function forceVideoPlay() {
            if (!video) return;

            video.muted = true;
            video.playsInline = true;
            video.autoplay = true;

            const playPromise = video.play();

            if (playPromise !== undefined) {
                playPromise
                    .then(function() {
                        console.log('✅ Video reproduciendo automáticamente');
                        isPlaying = true;
                        if (videoControlBtn) {
                            videoControlBtn.innerHTML = '<i class="fas fa-pause"></i>';
                            videoControlBtn.setAttribute('aria-label', 'Pausar video');
                        }
                    })
                    .catch(function(error) {
                        console.warn('Primer intento falló:', error.message);
                        setTimeout(function() {
                            video.play()
                                .then(function() {
                                    console.log('✅ Video reproduciendo (segundo intento)');
                                    isPlaying = true;
                                    if (videoControlBtn) {
                                        videoControlBtn.innerHTML = '<i class="fas fa-pause"></i>';
                                    }
                                })
                                .catch(function(err) {
                                    console.error('❌ No se pudo reproducir:', err.message);
                                    if (videoControlBtn) {
                                        videoControlBtn.innerHTML = '<i class="fas fa-play"></i>';
                                    }
                                });
                        }, 500);
                    });
            }
        }

        // Múltiples puntos de inicio
        if (video) {
            forceVideoPlay();

            video.addEventListener('loadedmetadata', function() {
                if (video.paused && !isPlaying) {
                    forceVideoPlay();
                }
            });

            video.addEventListener('canplay', function() {
                if (video.paused && !isPlaying) {
                    forceVideoPlay();
                }
            });

            setTimeout(function() {
                if (video.paused) {
                    console.log('🔄 Iniciando video (intento de respaldo)');
                    forceVideoPlay();
                }
            }, 1000);

            video.addEventListener('loadeddata', function() {
                video.style.opacity = '1';
            });

            video.addEventListener('error', function(e) {
                console.error('Error de video:', e);
            });
        }

        // ============================================
        // CONTROL MANUAL DEL VIDEO
        // ============================================
        if (videoControlBtn && video) {
            videoControlBtn.addEventListener('click', function() {
                if (video.paused) {
                    video.play()
                        .then(function() {
                            videoControlBtn.innerHTML = '<i class="fas fa-pause"></i>';
                            videoControlBtn.setAttribute('aria-label', 'Pausar video');
                            isPlaying = true;
                        })
                        .catch(function(error) {
                            console.error('Error al reproducir:', error);
                        });
                } else {
                    video.pause();
                    videoControlBtn.innerHTML = '<i class="fas fa-play"></i>';
                    videoControlBtn.setAttribute('aria-label', 'Reproducir video');
                    isPlaying = false;
                }
            });
        }

        // ============================================
        // VISIBILIDAD DE PÁGINA
        // ============================================
        document.addEventListener('visibilitychange', function() {
            if (!video) return;

            if (document.hidden) {
                video.pause();
            } else if (isPlaying) {
                video.play().catch(function(err) {
                    console.log('No se pudo reanudar:', err);
                });
            }
        });

        // ============================================
        // OBSERVER PARA EL VIDEO
        // ============================================
        if ('IntersectionObserver' in window && video) {
            const videoObserver = new IntersectionObserver(
                function(entries) {
                    entries.forEach(function(entry) {
                        if (!entry.isIntersecting && !video.paused) {
                            video.pause();
                        } else if (entry.isIntersecting && isPlaying && video.paused) {
                            video.play().catch(function(err) {
                                console.log('No se pudo reproducir al volver visible:', err);
                            });
                        }
                    });
                }, {
                    threshold: 0.1
                }
            );

            videoObserver.observe(video);
        }

        // ============================================
        // CALIDAD ADAPTATIVA EN MÓVILES
        // ============================================
        function adjustVideoForMobile() {
            if (!video) return;

            if (window.innerWidth < 768) {
                const mobileSrc = video.getAttribute('data-mobile-src');
                if (mobileSrc && video.currentSrc.indexOf(mobileSrc) === -1) {
                    video.src = mobileSrc;
                    if (isPlaying) {
                        video.play();
                    }
                }
            }
        }

        adjustVideoForMobile();
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(adjustVideoForMobile, 250);
        });

        // ============================================
        // CONEXIONES LENTAS
        // ============================================
        if ('connection' in navigator) {
            const connection = navigator.connection || navigator.mozConnection || navigator.webkitConnection;

            if (connection && (connection.effectiveType === 'slow-2g' ||
                    connection.effectiveType === '2g' ||
                    connection.saveData)) {
                console.log('⚠️ Conexión lenta detectada');
            }
        }

        // ============================================
        // SCROLL INDICATOR - SIEMPRE VISIBLE
        // ============================================
        const scrollIndicator = document.querySelector('.scroll-indicator');

        if (scrollIndicator) {
            console.log('✅ Scroll indicator encontrado y configurado (siempre visible)');

            // Asegurar propiedades CSS desde JavaScript
            scrollIndicator.style.cursor = 'pointer';
            scrollIndicator.style.pointerEvents = 'auto';
            scrollIndicator.style.opacity = '1';
            scrollIndicator.style.visibility = 'visible';

            // Event listener principal con máxima prioridad
            scrollIndicator.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                console.log('🖱️ Click en scroll indicator detectado');

                // Buscar sección de bienvenida
                const welcomeSection = document.getElementById('bienvenida');

                if (welcomeSection) {
                    console.log('✅ Navegando a sección de bienvenida');

                    // Calcular posición con offset para navbar
                    const navbar = document.querySelector('.main-navigation');
                    const navbarHeight = navbar ? navbar.offsetHeight : 80;
                    const targetPosition = welcomeSection.offsetTop - navbarHeight;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                } else {
                    console.log('⚠️ Sección bienvenida no encontrada, buscando alternativa');

                    // Buscar por clase
                    const welcomeAlt = document.querySelector('.welcome-section');
                    if (welcomeAlt) {
                        const navbar = document.querySelector('.main-navigation');
                        const navbarHeight = navbar ? navbar.offsetHeight : 80;
                        const targetPosition = welcomeAlt.offsetTop - navbarHeight;

                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    } else {
                        // Último recurso: scroll una pantalla completa
                        console.log('⚠️ Usando scroll por defecto');
                        window.scrollTo({
                            top: window.innerHeight,
                            behavior: 'smooth'
                        });
                    }
                }
            }, true); // useCapture = true para mayor prioridad

            // Listener adicional para dispositivos táctiles
            scrollIndicator.addEventListener('touchstart', function(e) {
                e.preventDefault();
                
                const welcomeSection = document.getElementById('bienvenida') || 
                                      document.querySelector('.welcome-section');
                
                if (welcomeSection) {
                    const navbar = document.querySelector('.main-navigation');
                    const navbarHeight = navbar ? navbar.offsetHeight : 80;
                    const targetPosition = welcomeSection.offsetTop - navbarHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                } else {
                    window.scrollTo({
                        top: window.innerHeight,
                        behavior: 'smooth'
                    });
                }
            }, { passive: false });

        } else {
            console.error('❌ Scroll indicator NO encontrado en el DOM');
        }

        // ============================================
        // ANIMACIONES DE ENTRADA
        // ============================================
        const heroElements = document.querySelectorAll('.hero-title-section, .hero-bottom-section');

        if ('IntersectionObserver' in window && heroElements.length > 0) {
            const animationObserver = new IntersectionObserver(
                function(entries) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                        }
                    });
                }, {
                    threshold: 0.1
                }
            );

            heroElements.forEach(function(element) {
                animationObserver.observe(element);
            });
        }

        // ============================================
        // PREFERENCIAS DE ACCESIBILIDAD
        // ============================================
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

        if (prefersReducedMotion.matches && video) {
            console.log('ℹ️ Usuario prefiere reducir movimiento');
            video.pause();
            video.removeAttribute('autoplay');
            isPlaying = false;
            if (videoControlBtn) {
                videoControlBtn.innerHTML = '<i class="fas fa-play"></i>';
                videoControlBtn.setAttribute('aria-label', 'Reproducir video');
            }
        }

        prefersReducedMotion.addEventListener('change', function(e) {
            if (e.matches && video) {
                video.pause();
                isPlaying = false;
                if (videoControlBtn) {
                    videoControlBtn.innerHTML = '<i class="fas fa-play"></i>';
                }
            }
        });
    });
</script>
</body>
</html>
