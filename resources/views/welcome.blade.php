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
               <span class="highlight-text"> Bienvenidos al Colegio Gimnasio Humanístico</span>
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
                        <h2 class="intro-subtitle">Formación Integral con Excelencia</h2>
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
                        <img src="{{ asset('images/iniciooo2.jpeg') }}" alt="Instalaciones del Colegio Gimnasio Humanístico" class="welcome-main-image">
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
                            <div class="gallery-overlay">
                                <div class="gallery-content">
                                    <h4>Laboratorios de Ciencias</h4>
                                    <p>Equipamiento científico de última generación</p>
                                    <div class="gallery-icon">
                                        <i class="fas fa-flask"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200">
                        <div class="gallery-image-wrapper">
                            <img src="{{ asset('images/iniciooo2.jpeg') }}" alt="Aulas Inteligentes" class="gallery-image">
                            <div class="gallery-overlay">
                                <div class="gallery-content">
                                    <h4>Aulas Inteligentes</h4>
                                    <p>Tecnología interactiva para el aprendizaje</p>
                                    <div class="gallery-icon">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
                        <div class="gallery-image-wrapper">
                            <img src="{{ asset('images/iniciooo2.jpeg') }}" alt="Biblioteca Digital" class="gallery-image">
                            <div class="gallery-overlay">
                                <div class="gallery-content">
                                    <h4>Biblioteca Digital</h4>
                                    <p>Recursos educativos digitales y físicos</p>
                                    <div class="gallery-icon">
                                        <i class="fas fa-book-open"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="400">
                        <div class="gallery-image-wrapper">
                            <img src="{{ asset('images/iniciooo2.jpeg') }}" alt="Espacios Deportivos" class="gallery-image">
                            <div class="gallery-overlay">
                                <div class="gallery-content">
                                    <h4>Espacios Deportivos</h4>
                                    <p>Instalaciones para el desarrollo físico</p>
                                    <div class="gallery-icon">
                                        <i class="fas fa-running"></i>
                                    </div>
                                </div>
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
                    Quiénes Somos
                </h1>
                <p class="about-main-subtitle" data-aos="fade-up" data-aos-delay="400">
                    Más de 25 años forjando el futuro de Colombia a través de una educación integral, 
                    innovadora y fundamentada en valores cristianos que transforman vidas.
                </p>
            </div>

            <!-- Grid de Cards Profesional: 2x2 -->
            <div class="cards-grid">
                <!-- Historia -->
                <div class="about-card history-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-header">
                        <h3>Misión</h3>
                    </div>
                    <div class="card-body">
                        <p class="card-description">
                            Fundado en 1999, el Colegio Gimnasio Humanístico ha sido pionero en 
                            educación integral, formando generaciones de líderes comprometidos 
                            con la excelencia académica y el desarrollo humano integral.
                        </p>
                    </div>
                </div>

                <!-- Misión -->
                <div class="about-card mission-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-header">
                        <h3>Visión</h3>
                    </div>
                    <div class="card-body">
                        <p class="card-description">
                            Formar ciudadanos íntegros con pensamiento crítico y competencias 
                            globales, fundamentados en valores cristianos, capaces de liderar 
                            la transformación positiva de nuestra sociedad.
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
                            Ser reconocidos como institución líder en educación humanística 
                            e innovadora, formando graduados que impacten positivamente 
                            en el desarrollo social, económico y cultural del país.
                        </p>
                    </div>
                </div>

                <!-- Filosofía Educativa -->
                <div class="about-card philosophy-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="card-header">
                        <h3>Filosofía Educativa</h3>
                    </div>
                    <div class="card-body">
                        <p class="card-description">
                            Metodología humanística que integra tecnología, innovación 
                            pedagógica y formación en valores, desarrollando el potencial 
                            único de cada estudiante para su crecimiento integral.
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
                Formación integral desde los primeros años hasta la preparación universitaria, 
                con metodologías innovadoras y enfoque en el desarrollo de competencias para el siglo XXI.
            </p>
        </div>

        <!-- Grid de Niveles Educativos -->
        <div class="row g-4">
            <!-- Preescolar -->
            <div class="col-lg-3 col-md-6">
                <div class="level-card preescolar-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-image-wrapper">
                        <img src="{{ asset('images/Primariaa.jpeg') }}" alt="Educación Preescolar" class="level-image">
                        <div class="card-overlay">
                            <div class="overlay-content">
                                <div class="overlay-icon">
                                    <i class="fas fa-child"></i>
                                </div>
                                <h4 class="overlay-title">Preescolar</h4>
                                <p class="overlay-description">
                                    Primeros pasos hacia el aprendizaje con amor, creatividad y desarrollo integral
                                </p>
                                <div class="overlay-features">
                                    <span class="feature-item"><i class="fas fa-check"></i> Jardín y Transición</span>
                                    <span class="feature-item"><i class="fas fa-check"></i> Desarrollo psicomotor</span>
                                    <span class="feature-item"><i class="fas fa-check"></i> Estimulación temprana</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="level-badge preescolar-badge">
                            <i class="fas fa-child"></i>
                            <span>3-5 años</span>
                        </div>
                        <h3 class="level-title">Educación Preescolar</h3>
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
                        <img src="{{ asset('images/segundariaaa.jpeg') }}" alt="Educación Primaria" class="level-image">
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
                                    <span class="feature-item"><i class="fas fa-check"></i> Educación bilingüe</span>
                                    <span class="feature-item"><i class="fas fa-check"></i> Competencias STEM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="level-badge primaria-badge">
                            <i class="fas fa-book"></i>
                            <span>6-10 años</span>
                        </div>
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
                        <img src="{{ asset('images/iniciooo2.jpeg') }}" alt="Educación Secundaria" class="level-image">
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
                                    <span class="feature-item"><i class="fas fa-check"></i> Proyectos de investigación</span>
                                    <span class="feature-item"><i class="fas fa-check"></i> Liderazgo estudiantil</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="level-badge secundaria-badge">
                            <i class="fas fa-users"></i>
                            <span>11-14 años</span>
                        </div>
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
                        <img src="{{ asset('images/iniciooo2.jpeg') }}" alt="Educación Media" class="level-image">
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
                                    <span class="feature-item"><i class="fas fa-check"></i> Grados 10° y 11°</span>
                                    <span class="feature-item"><i class="fas fa-check"></i> Orientación vocacional</span>
                                    <span class="feature-item"><i class="fas fa-check"></i> Preparación ICFES</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="level-badge media-badge">
                            <i class="fas fa-graduation-cap"></i>
                            <span>15-17 años</span>
                        </div>
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

















<!-- FOOTER PRINCIPAL - OPTIMIZADO CON MAPA -->
    <footer class="main-footer">
        <div class="footer-decoration"></div>
        
        <div class="footer-top">
            <div class="container">
                <div class="row g-4">
                    <!-- Información de la Institución -->
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-section footer-brand" data-aos="fade-up" data-aos-delay="100">
                            <a href="#" class="footer-logo">
                                <div class="footer-logo-icon">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <span>Gimnasio Humanístico</span>
                            </a>
                            <p class="footer-description">
                                Formando ciudadanos íntegros con excelencia académica, valores cristianos y 
                                compromiso social desde hace más de 25 años.
                            </p>
                            <div class="social-links">
                                <a href="#" class="social-link facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="social-link instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="social-link youtube">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <a href="#" class="social-link whatsapp">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Enlaces Rápidos -->
                    <div class="col-lg-2 col-md-6">
                        <div class="footer-section" data-aos="fade-up" data-aos-delay="200">
                            <h5 class="footer-title">Enlaces Rápidos</h5>
                            <ul class="footer-links">
                                <li><a href="#inicio" class="footer-link"><i class="fas fa-chevron-right"></i>Inicio</a></li>
                                <li><a href="#quienes-somos" class="footer-link"><i class="fas fa-chevron-right"></i>Quiénes Somos</a></li>
                                <li><a href="#niveles-educativos" class="footer-link"><i class="fas fa-chevron-right"></i>Oferta Académica</a></li>
                                <li><a href="#admisiones" class="footer-link"><i class="fas fa-chevron-right"></i>Admisiones</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Servicios Académicos -->
                    <div class="col-lg-2 col-md-6">
                        <div class="footer-section" data-aos="fade-up" data-aos-delay="300">
                            <h5 class="footer-title">Servicios</h5>
                            <ul class="footer-links">
                                <li><a href="#" class="footer-link"><i class="fas fa-chevron-right"></i>Educación Preescolar</a></li>
                                <li><a href="#" class="footer-link"><i class="fas fa-chevron-right"></i>Básica Primaria</a></li>
                                <li><a href="#" class="footer-link"><i class="fas fa-chevron-right"></i>Básica Secundaria</a></li>
                                <li><a href="#" class="footer-link"><i class="fas fa-chevron-right"></i>Media Académica</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Información de Contacto Completa -->
                    <div class="col-lg-2 col-md-6">
                        <div class="footer-section" data-aos="fade-up" data-aos-delay="400">
                            <h5 class="footer-title">Contacto</h5>
                            
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-content">
                                    <div class="contact-label">Dirección</div>
                                    <p class="contact-text">Calle 23 #45-67<br>Neiva, Huila - Colombia</p>
                                </div>
                            </div>

                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="contact-content">
                                    <div class="contact-label">Teléfono</div>
                                    <p class="contact-text">(+57) 8 875 2345<br>(+57) 300 123 4567</p>
                                </div>
                            </div>

                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-content">
                                    <div class="contact-label">Email</div>
                                    <p class="contact-text">informacios@gmail.com<br>gimnasiohumanistico.edu.co</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mapa de Ubicación - NUEVA SECCIÓN -->
                    <div class="col-lg-3 col-md-12">
                        <div class="footer-section" data-aos="fade-up" data-aos-delay="500">
                            <h5 class="footer-title">Nuestra Ubicación</h5>
                            <div class="footer-map">
                                <!-- Reemplaza esta URL con la ubicación real de tu colegio -->
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.5980542106286!2d-75.29349652622278!3d2.9312627970450427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3b74649b7ec0f3%3A0x6bd869e2c80a8862!2sGimnasio%20Human%C3%ADstico%20del%20Alto%20Magdalena!5e0!3m2!1ses!2sco!4v1758286578845!5m2!1ses!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-content" data-aos="fade-up" data-aos-delay="600">
                    <p class="copyright">
                        © 2024 Gimnasio Humanístico. Todos los derechos reservados.
                    </p>
                    <div class="footer-bottom-links">
                        <a href="#" class="footer-bottom-link">Política de Privacidad</a>
                        <a href="#" class="footer-bottom-link">Términos y Condiciones</a>
                        <a href="#" class="footer-bottom-link">Manual de Convivencia</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


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

    // JavaScript mejorado para el footer
        document.addEventListener('DOMContentLoaded', function() {
            
            // Observer para efectos adicionales
            const footerObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        
                        // Animación escalonada para los enlaces
                        const footerLinks = entry.target.querySelectorAll('.footer-link');
                        footerLinks.forEach((link, index) => {
                            setTimeout(() => {
                                link.style.opacity = '1';
                                link.style.transform = 'translateX(0)';
                            }, index * 100);
                        });

                        // Efecto para los iconos sociales
                        const socialLinks = entry.target.querySelectorAll('.social-link');
                        socialLinks.forEach((social, index) => {
                            setTimeout(() => {
                                social.style.opacity = '1';
                                social.style.transform = 'scale(1)';
                            }, 300 + (index * 100));
                        });

                        // Animación especial para el footer-bottom
                        const footerBottom = entry.target.querySelector('.footer-bottom-content');
                        if (footerBottom) {
                            setTimeout(() => {
                                footerBottom.style.opacity = '1';
                                footerBottom.style.transform = 'translateY(0)';
                            }, 500);
                        }

                        footerObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.2 });

            // Observar el footer
            const footer = document.querySelector('.main-footer');
            if (footer) {
                footerObserver.observe(footer);
            }

            // Inicializar estilos de los elementos animados
            document.querySelectorAll('.footer-link').forEach(link => {
                link.style.opacity = '0';
                link.style.transform = 'translateX(-20px)';
                link.style.transition = 'all 0.3s ease-out';
            });

            document.querySelectorAll('.social-link').forEach(social => {
                social.style.opacity = '0';
                social.style.transform = 'scale(0.8)';
                social.style.transition = 'all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
            });

            // Inicializar footer-bottom-content
            const footerBottomContent = document.querySelector('.footer-bottom-content');
            if (footerBottomContent) {
                footerBottomContent.style.opacity = '0';
                footerBottomContent.style.transform = 'translateY(30px)';
                footerBottomContent.style.transition = 'all 0.6s ease-out';
            }

            // Efectos hover adicionales
            document.querySelectorAll('.footer-link').forEach(link => {
                link.addEventListener('mouseenter', function() {
                    this.style.textShadow = '0 0 10px rgba(244, 185, 66, 0.5)';
                });
                
                link.addEventListener('mouseleave', function() {
                    this.style.textShadow = 'none';
                });
            });

            // Parallax sutil para la decoración
            let ticking = false;
            
            function updateParallax() {
                const scrolled = window.pageYOffset;
                const decoration = document.querySelector('.footer-decoration');
                if (decoration) {
                    const speed = scrolled * 0.1;
                    decoration.style.transform = `translateY(${speed}px) rotate(${scrolled * 0.05}deg)`;
                }
                ticking = false;
            }

            window.addEventListener('scroll', function() {
                if (!ticking) {
                    requestAnimationFrame(updateParallax);
                    ticking = true;
                }
            });
        });

    // Animación adicional para contadores
    function animateWelcomeCounters() {
        const counters = document.querySelectorAll('.stat-mini-number');
        counters.forEach(counter => {
            const target = counter.textContent;
            const numericTarget = parseInt(target.replace(/\D/g, ''));
            const suffix = target.replace(/\d/g, '');
            let current = 0;
            const increment = numericTarget / 50;
            const timer = setInterval(() => {
                current += increment;
                if (current >= numericTarget) {
                    current = numericTarget;
                    clearInterval(timer);
                }
                counter.textContent = Math.floor(current) + suffix;
            }, 40);
        });
    }

    // Observador para activar animaciones de contadores
    const welcomeObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && entry.target.classList.contains('welcome-stats-mini')) {
                animateWelcomeCounters();
                welcomeObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    // Observar la sección de estadísticas
    document.addEventListener('DOMContentLoaded', function() {
        const statsSection = document.querySelector('.welcome-stats-mini');
        if (statsSection) {
            welcomeObserver.observe(statsSection);
        }
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
