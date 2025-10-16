<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Misión y Visión - GIMNASIO HUMANÍSTICO</title>
    <!-- Google Fonts - Tipografía moderna -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Open+Sans:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Bootstrap y Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/Logo.png') }}">
    <!-- CSS personalizado -->
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prescolar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Incluir el header -->
    @include('layouts.header')

        <!-- Hero Section - Educación Preescolar -->
<section class="hero-preescolar">
    <!-- Formas decorativas animadas -->
    <div class="floating-shape shape-1"></div>
    <div class="floating-shape shape-2"></div>
    <div class="floating-shape shape-3"></div>
    <div class="floating-shape shape-4"></div>
    <div class="floating-shape shape-5"></div>
    
    <!-- Partículas decorativas -->
    <div class="particle particle-1">★</div>
    <div class="particle particle-2">✦</div>
    <div class="particle particle-3">●</div>
    <div class="particle particle-4">★</div>
    <div class="particle particle-5">✦</div>
    
    <div class="hero-container">
        <div class="hero-content">
            <!-- Lado izquierdo: Contenido -->
            <div class="hero-text-section">
                <div class="hero-tag">
                    <span>🎈 Nivel Preescolar</span>
                </div>
                
                <h1 class="hero-title">
                    PREESCOLAR 
                </h1>
                
                <p class="hero-description">
                    En nuestro preescolar, cada niño descubre su potencial único a través de experiencias 
                    de aprendizaje significativas, creativas y llenas de alegría. Creamos un ambiente donde 
                    los pequeños desarrollan habilidades fundamentales mientras se divierten y exploran el mundo.
                </p>
                
                
                <div class="hero-buttons">
                    <a href="#informacion" class="btn-primary">
                        Conocer el programa
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M7.5 15L12.5 10L7.5 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Lado derecho: Visual -->
            <div class="hero-visual-section">
                <div class="image-container">
                    <!-- Elementos decorativos alrededor de la imagen -->
                    <div class="deco-circle deco-1"></div>
                    <div class="deco-circle deco-2"></div>
                    <div class="deco-square"></div>
                    <div class="deco-line"></div>
                    
                    <!-- Imagen principal -->
                    <div class="main-image-wrapper">
                        <img src="{{ asset('images/Primariaa.jpeg') }}" 
                             alt="Niños felices en preescolar" class="main-image">
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Sección Principal de Contenido Preescolar -->
<section class="preescolar-content">
    
    

    <!-- Metodología Activa - Rediseño -->
    <div class="metodologia-section">
        <div class="container">

            <!-- Header de la sección con logo -->
        <div class="admision-nav-header">
            <div class="header-content-wrapper">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Colegio" class="header-logo">
                <div class="header-text-content">
                    <div class="header-label">
                        <span class="label-icon">✦</span>
                        <span class="label-text">Comunicate con nosotros</span>
                    </div>
                    <h2 class="admision-nav-title">Metodología Activa</h2>
                    <p class="admision-nav-subtitle">Estamos disponibles para atenderte en los siguientes horarios.
                    </p>
                </div>
            </div>
        </div>


            <div class="row align-items-center g-5">
                <div class="col-lg-6 order-lg-1 order-2">
                    <div class="metodologia-image">
                        <img src="{{ asset('images/Primariaa.jpeg') }}" alt="Aprender jugando">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2 order-1">
                    <div class="metodologia-content">    
                        <h2 class="section-title">Aprender Jugando es Nuestra Filosofía</h2>
                        <p class="section-description">
                            El juego es nuestra principal herramienta pedagógica, donde cada actividad 
                            está diseñada para que los niños exploren, experimenten y construyan conocimientos.
                        </p>
                        
                        <div class="metodologia-list">
                            <div class="metodologia-item">
                                <div class="metodologia-icon">
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M12 2L2 7L12 12L22 7L12 2Z"></path>
                                        <path d="M2 17L12 22L22 17"></path>
                                        <path d="M2 12L12 17L22 12"></path>
                                    </svg>
                                </div>
                                <div class="metodologia-text">
                                    <h4>Arte y Creatividad</h4>
                                    <p>Expresión artística mediante pintura, modelado y técnicas plásticas que desarrollan la motricidad fina y la imaginación.</p>
                                </div>
                            </div>
                            
                            <div class="metodologia-item">
                                <div class="metodologia-icon">
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M9 18V5L16 7V20"></path>
                                        <circle cx="6" cy="18" r="3"></circle>
                                        <circle cx="18" cy="20" r="3"></circle>
                                    </svg>
                                </div>
                                <div class="metodologia-text">
                                    <h4>Música y Movimiento</h4>
                                    <p>Estimulación sensorial, desarrollo del ritmo y coordinación a través de actividades musicales y expresión corporal.</p>
                                </div>
                            </div>
                            
                            <div class="metodologia-item">
                                <div class="metodologia-icon">
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M12 16V12"></path>
                                        <path d="M12 8H12.01"></path>
                                    </svg>
                                </div>
                                <div class="metodologia-text">
                                    <h4>Exploración Científica</h4>
                                    <p>Juegos didácticos y experimentos que promueven la curiosidad, el descubrimiento y el pensamiento lógico.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





   <!-- Horarios y Aulas - Rediseño Ultra Compacto -->
<div class="horarios-aulas-section">
    <div class="container">

        <!-- Header de la sección con logo -->
        <div class="admision-nav-header">
            <div class="header-content-wrapper">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Colegio" class="header-logo">
                <div class="header-text-content">
                    <div class="header-label">
                        <span class="label-icon">✦</span>
                        <span class="label-text">Información Institucional</span>
                    </div>
                    <h2 class="admision-nav-title">Horarios y Aulas</h2>
                    <p class="admision-nav-subtitle">Ofrecemos instalaciones diseñadas específicamente para el desarrollo integral de nuestros estudiantes de preescolar.                                                           
                    </p>
                </div>
            </div>
        </div>

        <span class="modalidad-badge">Lunes a Viernes • 7:00 AM - 12:00 PM</span>

        <!-- Aulas por Nivel -->
        <div class="aulas-grid">
            
            <div class="aula-item">
                
                <div class="aula-image">
                    <img src="{{ asset('images/Primariaa.jpeg') }}" alt="Aula Párvulos">
                    <div class="aula-overlay">
                        <span class="aula-nivel">Párvulos</span>
                    </div>
                </div>
                
                <div class="aula-info">
                    <h4>Párvulos</h4>
                    <p>Espacios amplios con áreas de juego sensorial, rincones de exploración y mobiliario adaptado para los más pequeños.</p>
                </div>
            </div>

            <div class="aula-item">
                <div class="aula-image">
                    <img src="{{ asset('images/Primariaa.jpeg') }}" alt="Aula Prejardín">
                    <div class="aula-overlay">
                        <span class="aula-nivel">Prejardín</span>
                    </div>
                </div>
                <div class="aula-info">
                    <h4>Prejardín</h4>
                    <p>Ambientes coloridos diseñados para promover la creatividad, con zonas de arte, lectura y juego dirigido.</p>
                </div>
            </div>

            <div class="aula-item">
                <div class="aula-image">
                    <img src="{{ asset('images/Primariaa.jpeg') }}" alt="Aula Jardín">
                    <div class="aula-overlay">
                        <span class="aula-nivel">Jardín</span>
                    </div>
                </div>
                <div class="aula-info">
                    <h4>Jardín</h4>
                    <p>Salones equipados con recursos para el desarrollo de habilidades pre-académicas en lectoescritura y matemáticas.</p>
                </div>
            </div>

            <div class="aula-item">
                <div class="aula-image">
                    <img src="{{ asset('images/Primariaa.jpeg') }}" alt="Aula Transición">
                    <div class="aula-overlay">
                        <span class="aula-nivel">Transición</span>
                    </div>
                </div>
                <div class="aula-info">
                    <h4>Transición</h4>
                    <p>Aulas preparatorias con tecnología educativa, biblioteca y espacios para trabajo individual y colaborativo.</p>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Experiencias por Nivel -->
<div class="experiencias-nivel-section">
    <div class="container">

        <!-- Header de la sección con logo -->
        <div class="admision-nav-header">
            <div class="header-content-wrapper">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Colegio" class="header-logo">
                <div class="header-text-content">
                    <div class="header-label">
                        <span class="label-icon">✦</span>
                        <span class="label-text">Programa Académico</span>
                    </div>
                    <h2 class="admision-nav-title">Aprendizaje por Nivel</h2>
                    <p class="admision-nav-subtitle">Cada nivel desarrolla un programa específico que responde
                         a las características propias,
                         de cada edad, garantizando un proceso educativo coherente, progresivo y significativo.                                                        
                    </p>
                </div>
            </div>
        </div>

        <div class="niveles-accordion">
            <!-- Párvulos -->
            <div class="nivel-accordion-item">
                <div class="nivel-header-modern">
                    <div class="nivel-info">
                        <div class="nivel-number">01</div>
                        <h3>Párvulos</h3>
                    </div>

                    <!-- Logo a la derecha -->
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Párvulos" class="nivel-logo">
                    <div class="nivel-color-bar parvulos-color"></div>
                </div>
                <div class="nivel-body-modern">
                    <div class="nivel-divider"></div>
                    <p class="nivel-intro">
                        Es el primer acercamiento del niño al entorno escolar, donde se promueve el desarrollo sensorial, 
                        emocional y social mediante experiencias lúdicas y de exploración.
                    </p>
                    <div class="nivel-activities-list">
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Adaptación al entorno escolar con acompañamiento afectivo
                        </div>
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Desarrollo de la motricidad gruesa y coordinación
                        </div>
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Exploración sensorial mediante juegos con texturas y sonidos
                        </div>
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Fomento de la comunicación y expresión emocional
                        </div>
                    </div>
                </div>
            </div>

            <!-- Prejardín -->
            <div class="nivel-accordion-item">
                <div class="nivel-header-modern">
                    <div class="nivel-info">
                        <div class="nivel-number">02</div>
                        <h3>Prejardín</h3>
                    </div>
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Prejardín" class="nivel-logo">
                    <div class="nivel-color-bar prejardin-color"></div>
                </div>
                <div class="nivel-body-modern">
                    <div class="nivel-divider"></div>
                    <p class="nivel-intro">
                        En esta etapa los niños fortalecen su autonomía, lenguaje y habilidades sociales a través 
                        de experiencias significativas de juego, arte y movimiento.
                    </p>
                    <div class="nivel-activities-list">
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Desarrollo de hábitos de orden y responsabilidad
                        </div>
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Estimulación del lenguaje y la comunicación oral
                        </div>
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Actividades artísticas y de expresión corporal
                        </div>
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Reconocimiento de colores, formas y objetos del entorno
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jardín -->
            <div class="nivel-accordion-item">
                <div class="nivel-header-modern">
                    <div class="nivel-info">
                        <div class="nivel-number">03</div>
                        <h3>Jardín</h3>
                    </div>
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Jardín" class="nivel-logo">
                    <div class="nivel-color-bar jardin-color"></div>
                </div>
                <div class="nivel-body-modern">
                    <div class="nivel-divider"></div>
                    <p class="nivel-intro">
                        En este nivel se promueve la curiosidad, la creatividad y el pensamiento lógico. 
                        Los niños comienzan a construir aprendizajes previos a la lectura, escritura y matemáticas.
                    </p>
                    <div class="nivel-activities-list">
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Iniciación en la lectura a través de cuentos y juegos de palabras
                        </div>
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Conceptos matemáticos: conteo, clasificación y seriación
                        </div>
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Exploración del entorno natural y social
                        </div>
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Actividades que fortalecen la autonomía y el trabajo en grupo
                        </div>
                    </div>
                </div>
            </div>

            <!-- Transición -->
            <div class="nivel-accordion-item featured-nivel">
                <div class="nivel-header-modern">
                    <div class="nivel-info">
                        <div class="nivel-number">04</div>
                        <h3>Transición</h3>
                    </div>
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Transición" class="nivel-logo">
                    <div class="nivel-color-bar transicion-color"></div>
                </div>
                <div class="nivel-body-modern">
                    <div class="nivel-divider"></div>
                    <p class="nivel-intro">
                        Es la etapa final del preescolar. Los niños consolidan su autonomía, fortalecen 
                        habilidades académicas básicas y se preparan para ingresar a la educación primaria.
                    </p>
                    <div class="nivel-activities-list">
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Lectura y escritura inicial de palabras y oraciones simples
                        </div>
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Comprensión de nociones matemáticas básicas
                        </div>
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Desarrollo del pensamiento lógico y la resolución de problemas
                        </div>
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Participación en proyectos integrados de aprendizaje
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Incluir el footer -->
@include('layouts.footer')

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
