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
                <span class="label-text">Comunícate con nosotros</span>
            </div>
            <h2 class="admision-nav-title">Propósitos Educación Inicial</h2>
            <p class="admision-nav-subtitle">
                Nuestro enfoque pedagógico se basa en los propósitos establecidos por el Ministerio de Educación Nacional de Colombia.
            </p>
        </div>
    </div>
</div>

<div class="row align-items-center g-5">
    <div class="col-lg-6 order-lg-1 order-2">
        <div class="metodologia-image">
            <img src="{{ asset('images/Primariaa.jpeg') }}" alt="Educación Inicial">
        </div>
    </div>
    <div class="col-lg-6 order-lg-2 order-1">
        <div class="metodologia-content">    
            <h2 class="section-title">Educamos desde los 3 Propósitos Fundamentales</h2>
            <p class="section-description">
                La educación inicial busca que los niños se reconozcan como sujetos activos de su aprendizaje, 
                desarrollando sus capacidades mediante experiencias de exploración, comunicación, juego y convivencia.
            </p>
            
            <div class="metodologia-list">

                <!-- Propósito 1 -->
                <div class="metodologia-item">
                    <div class="metodologia-number">01</div>
                    
                    <div class="metodologia-text">
                        <h4>Construir su identidad en relación con los otros</h4>
                        <p>
                            Promovemos que los niños se reconozcan como personas únicas, capaces de convivir, compartir y construir vínculos afectivos 
                            con su familia, sus compañeros y su entorno.
                        </p>
                    </div>
                </div>

                <!-- Propósito 2 -->
                <div class="metodologia-item">
                    <div class="metodologia-number">02</div>
                    
                    <div class="metodologia-text">
                        <h4>Ser comunicadores activos de sus ideas, sentimientos y emociones</h4>
                        <p>
                            Fomentamos diversas formas de expresión —oral, corporal, artística y simbólica— 
                            que les permitan comunicar su manera de ver y sentir el mundo.
                        </p>
                    </div>
                </div>

                <!-- Propósito 3 -->
                <div class="metodologia-item">
                    <div class="metodologia-number">03</div>
                    
                    <div class="metodologia-text">
                        <h4>Disfrutar aprender explorando y relacionándose con el mundo</h4>
                        <p>
                            A través del juego, la curiosidad y la exploración del entorno, 
                            los niños descubren, experimentan y construyen conocimiento de forma significativa y placentera.
                        </p>
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


    <!-- Propósito por Nivel -->
<div class="experiencias-nivel-section">
    <div class="container">

        <!-- Header de la sección con logo -->
<div class="admision-nav-header">
    <div class="header-content-wrapper">
        <!-- Logo -->
        <img src="{{ asset('images/logo.png') }}" alt="Logo Colegio" class="header-logo">
        
        <!-- Contenido central -->
        <div class="header-text-content">
            <div class="header-top-row">
                <div class="header-label">
                    <span class="label-icon">✦</span>
                    <span class="label-text">Programa Académico</span>
                </div>
            </div>
            
            <h2 class="admision-nav-title">Propósito y experiencias </h2>
            
            <p class="admision-nav-subtitle">
                Los propósitos de la educación inicial, orientados por el Ministerio de Educación Nacional,
                promueven el desarrollo integral de los niños según su edad y nivel educativo.
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
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Párvulos" class="nivel-logo">
                    <div class="nivel-color-bar parvulos-color"></div>
                </div>
                <div class="nivel-body-modern">
                    <div class="nivel-divider"></div>
                    <p class="nivel-intro">
                        Los propósitos del nivel Párvulos se enfocan en el reconocimiento del cuerpo, las emociones y la interacción social**, 
                        fortaleciendo la confianza y el vínculo con el entorno a través del juego y la exploración sensorial.
                    </p>
                    <div class="nivel-activities-list">
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Reconocimiento de sí mismo, sus emociones y las de los demás.
                        </div>
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Desarrollo de la motricidad gruesa mediante juegos de movimiento y equilibrio.
                        </div>
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Exploración sensorial del entorno a través de sonidos, texturas y colores.
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
                        En Prejardín los propósitos se orientan al fortalecimiento de la autonomía, el lenguaje y la expresión artística**, 
                        promoviendo la comunicación y la participación activa dentro del grupo.
                    </p>
                    <div class="nivel-activities-list">
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Fomento de la autonomía y hábitos de convivencia y responsabilidad.
                        </div>
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Expresión oral y corporal a través de juegos, canto y dramatizaciones.
                        </div>
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Reconocimiento de su entorno natural y social mediante actividades exploratorias.
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
                        En el grado Jardín se fortalecen los procesos de pensamiento lógico, la creatividad y la expresión comunicativa**, 
                        integrando el arte, la literatura y las experiencias científicas iniciales.
                    </p>
                    <div class="nivel-activities-list">
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Desarrollo de habilidades comunicativas mediante cuentos, relatos y diálogos.
                        </div>
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Iniciación en el pensamiento lógico a través de juegos de clasificación y seriación.
                        </div>
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Creación artística libre que fomente la imaginación y la autoexpresión.
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
                        En Transición, los propósitos se centran en la consolidación de la autonomía, el pensamiento lógico y la comunicación, 
                        preparando al niño para asumir con éxito los retos de la educación básica primaria.
                    </p>
                    <div class="nivel-activities-list">
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Comprensión y uso del lenguaje escrito mediante juegos de palabras y lecturas iniciales.
                        </div>
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Desarrollo del pensamiento lógico-matemático a través de situaciones cotidianas.
                        </div>
                        <div class="activity-point">
                            <span class="activity-bullet"></span>
                            Participación en proyectos de grupo que fomenten la responsabilidad y el trabajo cooperativo.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

    <!-- Incluir el footer -->
@include('layouts.footer')

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
