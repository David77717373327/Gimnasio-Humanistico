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
    <!-- Hero Section Completamente Rediseñado -->
    <section class="hero-banner" id="inicio">
        <!-- Fondo con gradiente mejorado -->
        <div class="hero-background">
            <!-- Imagen de fondo más inspiradora -->
            <div class="hero-image-container">
                <img src="{{ asset('images/iniciooo2.jpeg') }}" alt="Estudiantes exitosos del Colegio"
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
                            
                            <h1 class="hero-title">
                                Nos educamos en el trabajo humanizante para un nuevo país
                            </h1><br><br><br><br><br><br><br><br><br><br>
                            <p class="hero-subtitle">
                                En nuestras aulas se fortalece el vuelo de la creatividad, la imaginacion, el humanismo y el conocimiento.<br>
                                 ¡Ven y alza el veulo con nosotros; el futuro nos inspira!  
                            </p>


                            
                        </div>
                    </div>
                </div>
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
                            <div class="feature-point" data-aos="fade-up" data-aos-delay="400">
                                <div class="feature-point-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <span>Valores cristianos y formación integral</span>
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
        <p class="gallery-subtitle">Espacios diseñados para potenciar el aprendizaje y el desarrollo integral</p>
    </div>

    <div class="row g-4">
        <div class="col-lg-3 col-md-6">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                <div class="gallery-image-wrapper">
                    <img src="{{ asset('images/iniciooo2.jpeg') }}" alt="Laboratorios de Ciencias" class="gallery-image">
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
                    <img src="{{ asset('images/Mision3.jpg') }}" alt="Aulas Inteligentes" class="gallery-image">
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
                    <img src="{{ asset('images/Mision1.jpg') }}" alt="Biblioteca Digital" class="gallery-image">
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
                    <img src="{{ asset('images/Mision1.jpg') }}" alt="Espacios Deportivos" class="gallery-image">
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
                        <h3>Historia</h3>
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
                        <h3>FILOSOFÍA INSTITUCIONAL</h3>
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
                            <div class="level-highlights">
                                <div class="highlight-item">
                                    <i class="fas fa-palette"></i>
                                    <span>Arte y Creatividad</span>
                                </div>
                                <div class="highlight-item">
                                    <i class="fas fa-music"></i>
                                    <span>Música y Movimiento</span>
                                </div>
                            </div>
                            <a href="#preescolar-detalle" class="level-link">
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
                            <div class="level-highlights">
                                <div class="highlight-item">
                                    <i class="fas fa-globe"></i>
                                    <span>Bilingüismo Intensivo</span>
                                </div>
                                <div class="highlight-item">
                                    <i class="fas fa-laptop"></i>
                                    <span>Tecnología Educativa</span>
                                </div>
                            </div>
                            <a href="#primaria-detalle" class="level-link">
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
                            <div class="level-highlights">
                                <div class="highlight-item">
                                    <i class="fas fa-flask"></i>
                                    <span>Laboratorios Especializados</span>
                                </div>
                                <div class="highlight-item">
                                    <i class="fas fa-chart-line"></i>
                                    <span>Proyectos de Investigación</span>
                                </div>
                            </div>
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
                            <div class="level-highlights">
                                <div class="highlight-item">
                                    <i class="fas fa-university"></i>
                                    <span>Preparación Universitaria</span>
                                </div>
                                <div class="highlight-item">
                                    <i class="fas fa-certificate"></i>
                                    <span>Certificaciones Internacionales</span>
                                </div>
                            </div>
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
