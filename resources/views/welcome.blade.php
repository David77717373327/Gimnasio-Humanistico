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
                Bienvenidos al <span class="highlight-text">Colegio Gimnasio Humanístico</span>
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


<!-- ============================================
     ESTILOS CSS - Agregar al archivo CSS existente
============================================ -->
<style>
/* Sección de Bienvenida */
.welcome-section {
    padding: 6rem 0;
    background: linear-gradient(135deg, #ffffff 0%, #f8fafb 50%, #ffffff 100%);
    position: relative;
    overflow: hidden;
}

.welcome-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: 
        radial-gradient(circle at 20% 20%, rgba(244, 185, 66, 0.03) 0%, transparent 40%),
        radial-gradient(circle at 80% 80%, rgba(13, 63, 39, 0.02) 0%, transparent 40%);
    z-index: 1;
}

.welcome-section .container {
    position: relative;
    z-index: 2;
}

/* Header de Bienvenida */
.welcome-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    background: linear-gradient(135deg, rgba(244, 185, 66, 0.1), rgba(244, 185, 66, 0.05));
    color: var(--primary-green);
    padding: 1rem 2rem;
    border-radius: var(--border-radius-full);
    border: 1px solid rgba(244, 185, 66, 0.2);
    font-weight: 600;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 2rem;
    box-shadow: 0 4px 20px rgba(244, 185, 66, 0.1);
}

.welcome-badge i {
    color: var(--accent-gold);
    font-size: 1.1rem;
}

.welcome-main-title {
    font-size: clamp(2.5rem, 5vw, 3.8rem);
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 1.5rem;
    line-height: 1.2;
    font-family: 'Montserrat', sans-serif;
}

.welcome-main-title .highlight-text {
    background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    position: relative;
}

.welcome-main-subtitle {
    font-size: 1.2rem;
    color: var(--text-light);
    max-width: 800px;
    margin: 0 auto;
    line-height: 1.7;
    font-weight: 400;
}

/* Welcome Intro */
.welcome-intro {
    margin-bottom: 3rem;
}

.intro-subtitle {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--primary-green);
    margin-bottom: 1.5rem;
    font-family: 'Montserrat', sans-serif;
    line-height: 1.3;
}

.intro-description {
    font-size: 1rem;
    color: var(--text-light);
    line-height: 1.8;
    font-weight: 400;
    text-align: justify;
}

/* Stats Mini */
.welcome-stats-mini {
    display: flex;
    gap: 2rem;
    margin-bottom: 3rem;
    flex-wrap: wrap;
}

.stat-mini-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    background: var(--white);
    padding: 1.25rem;
    border-radius: var(--border-radius-lg);
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--medium-gray);
    transition: var(--transition-normal);
    flex: 1;
    min-width: 200px;
}

.stat-mini-item:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-lg);
    border-color: var(--accent-gold);
}

.stat-mini-icon {
    width: 50px;
    height: 50px;
    background: var(--gradient-primary);
    border-radius: var(--border-radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-size: 1.2rem;
    flex-shrink: 0;
}

.stat-mini-content {
    display: flex;
    flex-direction: column;
}

.stat-mini-number {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-green);
    line-height: 1;
    font-family: 'Montserrat', sans-serif;
}

.stat-mini-label {
    font-size: 0.85rem;
    color: var(--text-light);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

/* Feature Points */
.welcome-features {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.feature-point {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: rgba(255, 255, 255, 0.7);
    border-radius: var(--border-radius-md);
    border: 1px solid transparent;
    transition: var(--transition-normal);
}

.feature-point:hover {
    background: var(--white);
    border-color: var(--accent-gold);
    transform: translateX(5px);
    box-shadow: var(--shadow-sm);
}

.feature-point-icon {
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--success-green);
    font-size: 1rem;
    flex-shrink: 0;
}

.feature-point span {
    font-weight: 500;
    color: var(--text-dark);
    font-size: 0.95rem;
}

/* Imagen Principal */
.welcome-image-container {
    position: relative;
}

.main-image-wrapper {
    position: relative;
    border-radius: var(--border-radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-xl);
    background: var(--white);
}

.welcome-main-image {
    width: 100%;
    height: 400px;
    object-fit: cover;
    transition: var(--transition-slow);
}

.main-image-wrapper:hover .welcome-main-image {
    transform: scale(1.02);
}

.image-overlay-content {
    position: absolute;
    top: 2rem;
    right: 2rem;
    z-index: 3;
}

.overlay-badge {
    background: rgba(255, 255, 255, 0.95);
    color: var(--primary-green);
    padding: 1rem 1.5rem;
    border-radius: var(--border-radius-lg);
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-weight: 600;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    box-shadow: var(--shadow-lg);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(244, 185, 66, 0.2);
}

.overlay-badge i {
    color: var(--accent-gold);
    font-size: 1.1rem;
}

/* Elementos Flotantes */
.floating-element {
    position: absolute;
    width: 60px;
    height: 60px;
    background: var(--gradient-gold);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-dark);
    font-size: 1.5rem;
    box-shadow: var(--shadow-lg);
    animation: float 6s ease-in-out infinite;
    opacity: 0.9;
}

.element-1 {
    top: -20px;
    left: -20px;
    animation-delay: 0s;
}

.element-2 {
    bottom: -20px;
    left: 50%;
    transform: translateX(-50%);
    animation-delay: 2s;
}

.element-3 {
    top: 50%;
    right: -20px;
    transform: translateY(-50%);
    animation-delay: 4s;
}

@keyframes float {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
}

/* Galería */
.facilities-gallery {
    margin-top: 5rem;
}

.gallery-header {
    margin-bottom: 3rem;
}

.gallery-title {
    font-size: 1.8rem;
    font-weight: 600;
    color: var(--primary-green);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    font-family: 'Montserrat', sans-serif;
    margin-bottom: 1rem;
}

.title-decorator {
    width: 60px;
    height: 3px;
    background: var(--gradient-gold);
    border-radius: 2px;
}

.gallery-subtitle {
    color: var(--text-light);
    font-size: 1rem;
    max-width: 600px;
    margin: 0 auto;
}

.gallery-item {
    height: 100%;
    transition: var(--transition-normal);
}

.gallery-image-wrapper {
    position: relative;
    border-radius: var(--border-radius-lg);
    overflow: hidden;
    background: var(--white);
    box-shadow: var(--shadow-sm);
    height: 250px;
    transition: var(--transition-normal);
}

.gallery-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition-slow);
}

.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(13, 63, 39, 0.8), rgba(13, 63, 39, 0.6));
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: var(--transition-normal);
}

.gallery-image-wrapper:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
}

.gallery-image-wrapper:hover .gallery-overlay {
    opacity: 1;
}

.gallery-image-wrapper:hover .gallery-image {
    transform: scale(1.05);
}

.gallery-content {
    text-align: center;
    color: var(--white);
    padding: 1.5rem;
}

.gallery-content h4 {
    font-size: 1.3rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    font-family: 'Montserrat', sans-serif;
}

.gallery-content p {
    font-size: 0.9rem;
    opacity: 0.9;
    margin-bottom: 1rem;
}

.gallery-icon {
    width: 50px;
    height: 50px;
    background: var(--gradient-gold);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    font-size: 1.3rem;
    color: var(--text-dark);
    box-shadow: var(--shadow-md);
}

/* CTA Final */
.welcome-cta {
    margin-top: 4rem;
}

.cta-wrapper {
    background: linear-gradient(135deg, var(--white), var(--light-gray));
    padding: 3rem 2rem;
    border-radius: var(--border-radius-xl);
    box-shadow: var(--shadow-lg);
    border: 1px solid var(--medium-gray);
    max-width: 800px;
    margin: 0 auto;
}

.cta-title {
    font-size: 1.8rem;
    font-weight: 600;
    color: var(--primary-green);
    margin-bottom: 1rem;
    font-family: 'Montserrat', sans-serif;
}

.cta-subtitle {
    color: var(--text-light);
    font-size: 1rem;
    margin-bottom: 2rem;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.cta-buttons {
    display: flex;
    gap: 1.5rem;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-cta-primary, .btn-cta-secondary {
    padding: 1rem 2rem;
    border-radius: var(--border-radius-lg);
    text-decoration: none;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    font-size: 0.85rem;
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    transition: var(--transition-normal);
    font-family: 'Montserrat', sans-serif;
}

.btn-cta-primary {
    background: var(--gradient-gold);
    color: var(--text-dark);
    box-shadow: var(--shadow-md);
}

.btn-cta-primary:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-xl);
    color: var(--text-dark);
}

.btn-cta-secondary {
    background: transparent;
    color: var(--primary-green);
    border: 2px solid var(--primary-green);
}

.btn-cta-secondary:hover {
    background: var(--primary-green);
    color: var(--white);
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 992px) {
    .welcome-stats-mini {
        flex-direction: column;
        gap: 1rem;
    }
    
    .stat-mini-item {
        min-width: auto;
    }
    
    .floating-element {
        display: none;
    }
}

@media (max-width: 768px) {
    .welcome-section {
        padding: 4rem 0;
    }
    
    .welcome-main-image {
        height: 300px;
    }
    
    .image-overlay-content {
        top: 1rem;
        right: 1rem;
    }
    
    .overlay-badge {
        padding: 0.75rem 1rem;
        font-size: 0.8rem;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .btn-cta-primary, .btn-cta-secondary {
        width: 100%;
        max-width: 300px;
        justify-content: center;
    }
}

/* Animaciones AOS */
[data-aos="fade-up"] {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.8s ease, transform 0.8s ease;
}

[data-aos="fade-right"] {
    opacity: 0;
    transform: translateX(-30px);
    transition: opacity 0.8s ease, transform 0.8s ease;
}

[data-aos="fade-left"] {
    opacity: 0;
    transform: translateX(30px);
    transition: opacity 0.8s ease, transform 0.8s ease;
}

[data-aos="zoom-in"] {
    opacity: 0;
    transform: scale(0.8);
    transition: opacity 0.6s ease, transform 0.6s ease;
}

[data-aos].aos-animate {
    opacity: 1;
    transform: translate(0) scale(1);
}
</style>

<!-- Script para Animaciones AOS (Agregar antes del cierre de </body>) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
<script>
    // Inicializar AOS
    AOS.init({
        duration: 800,
        easing: 'ease-out',
        once: true,
        offset: 100
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
