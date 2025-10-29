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
    <link href="{{ asset('css/basica_secundaria.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">    
</head>

<body>
    <!-- Incluir el header -->
    @include('layouts.header')

    <body>
        <!-- HERO SECTION AVANZADO -->
        <section class="hero-advanced">
            <div class="hero-background">
                <div class="hero-overlay"></div>
                <div class="hero-particles"></div>
            </div>
            <div class="container hero-container">
                <div class="row align-items-center min-vh-100">
                    <div class="col-lg-10 offset-lg-1 text-center">

                        <h1 class="hero-title">
                            <span class="title-highlight">Educación Basica</span> 
                            <span class="title-highlight">Secundaria</span>
                        </h1>
                        <div class="hero-scroll-indicator" onclick="scrollToTimeline()">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>






        <!-- METODOLOGÍA PRIMARIA -->
        <section class="metodologia-primaria" id="metodologia-primaria">
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
                            <h2 class="admision-nav-title">Objetivos  Basica Segunadaria</h2>
                        </div>
                    </div>
                </div>
           


            <!-- SECCIÓN DE OBJETIVOS SECUNDARIA -->
    <section class="objetivos-section" id="contenido-secundaria">
        <div class="container-fluid objetivos-container-custom">
           
            <!-- Encabezado de la sección -->
            <div class="objetivos-header">
                <p class="objetivos-intro">
                    "Nuestro programa de educación básica secundaria está 
                    diseñado para desarrollar integralmente a nuestros estudiantes
                     a través de 4 pilares fundamentales:"
                </p>
            </div>

            <!-- Navegación de Categorías -->
            <div class="objetivos-navigation">
                <button class="objetivo-tab active" data-categoria="comunicacion">
                    Comunicación y Expresión
                </button>
                <button class="objetivo-tab" data-categoria="cientifico">
                    Desarrollo Científico y Tecnológico
                </button>
                <button class="objetivo-tab" data-categoria="social">
                    Formación Social y Ciudadana
                </button>
                <button class="objetivo-tab" data-categoria="integral">
                    Desarrollo Integral y Bienestar
                </button>
            </div>

            <!-- Contenido de Objetivos -->
            <div class="objetivos-content">
                <!-- Comunicación y Expresión -->
                <div class="objetivo-item active" id="objetivo-comunicacion">
                    <div class="objetivo-grid">
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-comments"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Competencia Comunicativa</h3>
                            <p class="objetivo-text">
                                El desarrollo de la capacidad para comprender textos y expresar correctamente mensajes complejos, 
                                orales y escritos en lengua castellana, así como para entender mediante un estudio sistemático 
                                los diferentes elementos constitutivos de la lengua.
                            </p>
                        </div>
                        
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Expresión Literaria</h3>
                            <p class="objetivo-text">
                                La valoración de la lengua castellana como medio de expresión literaria y el estudio de la 
                                creación literaria en el país y en el mundo.
                            </p>
                        </div>
                        
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-globe"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Lengua Extranjera</h3>
                            <p class="objetivo-text">
                                La comprensión y la capacidad de expresarse en lengua extranjera.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Desarrollo Científico y Tecnológico -->
                <div class="objetivo-item" id="objetivo-cientifico">
                    <div class="objetivo-grid">
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-calculator"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Razonamiento Lógico-Matemático</h3>
                            <p class="objetivo-text">
                                El desarrollo de las capacidades para el razonamiento lógico, mediante el dominio de los sistemas 
                                numéricos, geométricos, métricos, lógicos, analíticos, de conjuntos, de operaciones y relaciones, 
                                así como para su utilización en la solución de los problemas de la ciencia, de la tecnología y de la vida cotidiana.
                            </p>
                        </div>
                        
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-flask"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Conocimiento Científico</h3>
                            <p class="objetivo-text">
                                El avance en el conocimiento científico de los fenómenos físicos, químicos y biológicos, mediante 
                                la comprensión de las leyes, el planteamiento de los problemas y la observación experimental.
                            </p>
                        </div>
                        
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-laptop-code"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Tecnología y Práctica</h3>
                            <p class="objetivo-text">
                                La iniciativa en los campos más avanzados de la tecnología moderna y el entrenamiento en disciplinas, 
                                procesos y técnicas que les permitan el ejercicio de una función socialmente útil.
                            </p>
                        </div>
                        
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Teoría y Práctica</h3>
                            <p class="objetivo-text">
                                La comprensión de la dimensión práctica de los conocimientos teóricos, así como la dimensión teórica 
                                del conocimiento práctico y la capacidad para utilizarla en la solución de problemas.
                            </p>
                        </div>
                        
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-search"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Búsqueda de Conocimiento</h3>
                            <p class="objetivo-text">
                                La utilización con sentido crítico de los distintos contenidos y formas de información y la búsqueda 
                                de nuevos conocimientos con su propio esfuerzo.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Formación Social y Ciudadana -->
                <div class="objetivo-item" id="objetivo-social">
                    <div class="objetivo-grid">
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-history"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Historia y Sociedad</h3>
                            <p class="objetivo-text">
                                El estudio científico de la historia nacional y mundial dirigida a comprender el desarrollo de la 
                                sociedad y el estudio de las ciencias sociales, con miras al análisis de las condiciones actuales 
                                de la realidad social.
                            </p>
                        </div>
                        
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-earth-americas"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Geografía y Cultura Mundial</h3>
                            <p class="objetivo-text">
                                El estudio científico del universo, de la tierra, de su estructura física, de su división y 
                                organización política, del desarrollo económico de los países y de las diferentes manifestaciones 
                                culturales de los pueblos.
                            </p>
                        </div>
                        
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-scale-balanced"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Formación Constitucional</h3>
                            <p class="objetivo-text">
                                La formación en el ejercicio de sus deberes y derechos, el conocimiento de la constitución política 
                                y de las relaciones internacionales.
                            </p>
                        </div>
                        
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-leaf"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Conservación Ambiental</h3>
                            <p class="objetivo-text">
                                El desarrollo de actitudes favorables al conocimiento, valoración y conservación de la naturaleza 
                                y el ambiente.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Desarrollo Integral y Bienestar -->
                <div class="objetivo-item" id="objetivo-integral">
                    <div class="objetivo-grid">
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-palette"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Formación Artística</h3>
                            <p class="objetivo-text">
                                La apreciación artística, la comprensión estética, la creatividad, la familiarización con los 
                                diferentes medios de expresión artística y el conocimiento, valoración y respeto por los bienes 
                                artísticos y culturales.
                            </p>
                        </div>
                        
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-heartbeat"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Salud y Bienestar</h3>
                            <p class="objetivo-text">
                                La valoración de la salud y de los hábitos relacionados con ella.
                            </p>
                        </div>
                        
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-running"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Desarrollo Físico y Recreación</h3>
                            <p class="objetivo-text">
                                La educación física y la práctica de la recreación y los deportes, la participación y organización 
                                juvenil y la utilización adecuada del tiempo libre.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>




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
                        <span class="aula-nivel">Sexto</span>
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
                        <span class="aula-nivel">Septimo</span>
                    </div>
                </div>
                <div class="aula-info">
                    <h4>Prejardín</h4>
                    <p>Ambientes coloridos diseñados para promover la creatividad, con zonas de arte,
                         lectura y juego dirigido.</p>
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
                    <h4>Octavo</h4>
                    <p>Salones equipados con recursos para el desarrollo de habilidades pre-académicas
                         en lectoescritura y matemáticas.</p>
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
                    <h4>Noveno</h4>
                    <p>Aulas preparatorias con tecnología educativa, biblioteca y espacios para trabajo individual y colaborativo.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
        
    <!-- Incluir el footer -->
    @include('layouts.footer')

    <script>
        // Funcionalidad de navegación de objetivos
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.objetivo-tab');
            const items = document.querySelectorAll('.objetivo-item');
            
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const categoriaId = this.getAttribute('data-categoria');
                    
                    tabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    
                    items.forEach(item => {
                        item.classList.remove('active');
                    });
                    
                    setTimeout(() => {
                        const targetItem = document.getElementById('objetivo-' + categoriaId);
                        if (targetItem) {
                            targetItem.classList.add('active');
                            
                            if (window.innerWidth <= 768) {
                                targetItem.scrollIntoView({ 
                                    behavior: 'smooth', 
                                    block: 'nearest' 
                                });
                            }
                        }
                    }, 150);
                });
            });
        });


        // Scroll suave para navegación
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Animación de partículas en el hero (MODIFICADO para funcionar con ambas clases)
            function createParticles() {
                const particles = document.querySelector('.hero-particles') ||
                    document.querySelector('.floating-particles');
                if (particles) {
                    for (let i = 0; i < 50; i++) {
                        const particle = document.createElement('div');
                        particle.className = 'particle';
                        particle.style.left = Math.random() * 100 + '%';
                        particle.style.animationDelay = Math.random() * 20 + 's';
                        particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
                        particles.appendChild(particle);
                    }
                }
            }

            // Inicializar partículas
            createParticles();


            // Scroll suave para el indicador de scroll del hero
            document.addEventListener('DOMContentLoaded', function() {
                const scrollIndicator = document.querySelector('.scroll-indicator');
                if (scrollIndicator) {
                    scrollIndicator.addEventListener('click', function() {
                        const nextSection = document.querySelector('.historia-hero').nextElementSibling;
                        if (nextSection) {
                            nextSection.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        } else {
                            window.scrollBy({
                                top: window.innerHeight * 0.7,
                                behavior: 'smooth'
                            });
                        }
                    });
                }
            });


            // Scroll suave al timeline
            function scrollToTimeline() {
                document.getElementById('preescolar-content').scrollIntoView({
                    behavior: 'smooth'
                });
            }

            // Scroll suave al timeline con offset
            function scrollToTimeline() {
                const target = document.getElementById('metodologia-primaria');
                if (target) {
                    const headerHeight = document.querySelector('header')?.offsetHeight || 60;
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight - 1;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            }


            // Script para adaptar automáticamente el tamaño del título
            // Agregar este script al final del body o en tu archivo JS principal

            function adaptHeroTitle() {
                const heroTitle = document.querySelector('.hero-title');
                if (!heroTitle) return;

                const titleText = heroTitle.textContent.trim();
                const characterCount = titleText.length;
                const wordCount = titleText.split(' ').length;

                // Remover clases previas
                heroTitle.classList.remove('auto-long', 'auto-short');

                // Aplicar clase según la longitud del texto
                if (characterCount > 35 || wordCount > 5) {
                    // Título largo como "Componente Filosófico De Identidad"
                    heroTitle.classList.add('auto-long');
                } else if (characterCount < 15 || wordCount < 3) {
                    // Título corto
                    heroTitle.classList.add('auto-short');
                }
                // Si está en el rango medio, usa el estilo por defecto
            }

            // Ejecutar cuando la página cargue
            document.addEventListener('DOMContentLoaded', function() {
                adaptHeroTitle();
            });

            // Re-evaluar si cambia el tamaño de ventana
            window.addEventListener('resize', function() {
                adaptHeroTitle();
            });

    </script>
</body>
</html>
