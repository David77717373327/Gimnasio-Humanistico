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
    <link href="{{ asset('css/media_academica.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Incluir el header -->
    @include('layouts.header')


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
                            <span class="title-highlight">Educación Media </span> 
                            <span class="title-highlight">Academica</span>
                        </h1>
                        <div class="hero-scroll-indicator" onclick="scrollToTimeline()">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>



<!-- METODOLOGÍA MEDIA ACADÉMICA -->
<section class="metodologia-primaria" id="metodologia-media">
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
                    <h2 class="admision-nav-title">Objetivos Educación Media Académica</h2>
                </div>
            </div>
        </div>

        <!-- SECCIÓN DE OBJETIVOS MEDIA -->
        <section class="objetivos-section" id="contenido-media">
            <div class="container-fluid objetivos-container-custom">
                
                <!-- Encabezado de la sección -->
                <div class="objetivos-header">
                    <p class="objetivos-intro">
                        "De acuerdo con lo estipulado en la Ley General de Educación (Ley 115 de 1994) y el Decreto 1075 de 2015, 
                        la educación media en el Gimnasio Humanístico del Alto Magdalena se orienta a cumplir los siguientes 
                        objetivos fundamentales para preparar a nuestros estudiantes para su futuro académico y profesional:"
                    </p>
                </div>

                <!-- Navegación de Categorías -->
                <div class="objetivos-navigation">
                    <button class="objetivo-tab active" data-categoria="profundizacion">
                        Profundización Académica
                    </button>
                    <button class="objetivo-tab" data-categoria="superior">
                        Preparación para Educación Superior
                    </button>
                    <button class="objetivo-tab" data-categoria="trabajo">
                        Trabajo y Emprendimiento
                    </button>
                    <button class="objetivo-tab" data-categoria="formacion">
                        Formación Humana y Ciudadana
                    </button>
                </div>

                <!-- Contenido de Objetivos -->
                <div class="objetivos-content">
                    <!-- Profundización Académica -->
                    <div class="objetivo-item active" id="objetivo-profundizacion">
                        <div class="objetivo-grid">
                            <div class="objetivo-card">
                                <div class="objetivo-icon">
                                    <i class="fas fa-book-reader"></i>
                                </div>
                                <h3 class="objetivo-subtitle">Consolidación de Saberes</h3>
                                <p class="objetivo-text">
                                    Buscamos que nuestros estudiantes consoliden sus saberes en las áreas obligatorias y fundamentales, 
                                    fortaleciendo las competencias desarrolladas durante la educación básica para alcanzar un dominio 
                                    profundo de cada disciplina.
                                </p>
                            </div>
                            
                            <div class="objetivo-card">
                                <div class="objetivo-icon">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <h3 class="objetivo-subtitle">Exploración Personalizada</h3>
                                <p class="objetivo-text">
                                    Ofrecemos la oportunidad de explorar y profundizar en aquellas disciplinas que se alineen con 
                                    los intereses, aptitudes y proyecto de vida de cada estudiante, facilitando el descubrimiento 
                                    de su vocación profesional.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Preparación para Educación Superior -->
                    <div class="objetivo-item" id="objetivo-superior">
                        <div class="objetivo-grid">
                            <div class="objetivo-card">
                                <div class="objetivo-icon">
                                    <i class="fas fa-university"></i>
                                </div>
                                <h3 class="objetivo-subtitle">Competencias Académicas Universitarias</h3>
                                <p class="objetivo-text">
                                    Nuestro currículo y metodología están diseñados para desarrollar las competencias académicas y 
                                    habilidades de pensamiento crítico que son indispensables para el éxito en el nivel universitario, 
                                    garantizando una formación integral y rigurosa.
                                </p>
                            </div>
                            
                            <div class="objetivo-card">
                                <div class="objetivo-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <h3 class="objetivo-subtitle">Excelencia en Pruebas Saber 11</h3>
                                <p class="objetivo-text">
                                    Preparamos a los estudiantes para un desempeño sobresaliente en las pruebas de Estado Saber 11, 
                                    proporcionando las herramientas y estrategias necesarias para obtener resultados destacados que 
                                    faciliten su ingreso a instituciones de educación superior de calidad.
                                </p>
                            </div>
                            
                            <div class="objetivo-card">
                                <div class="objetivo-icon">
                                    <i class="fas fa-rocket"></i>
                                </div>
                                <h3 class="objetivo-subtitle">Transición Exitosa</h3>
                                <p class="objetivo-text">
                                    Facilitamos una transición exitosa a la vida académica superior, desarrollando autonomía, 
                                    habilidades de investigación, gestión del tiempo y todas las competencias necesarias para 
                                    enfrentar con éxito los desafíos universitarios.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Trabajo y Emprendimiento -->
                    <div class="objetivo-item" id="objetivo-trabajo">
                        <div class="objetivo-grid">
                            <div class="objetivo-card">
                                <div class="objetivo-icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <h3 class="objetivo-subtitle">Vinculación al Mundo Laboral</h3>
                                <p class="objetivo-text">
                                    Capacitamos a los estudiantes con las habilidades y conocimientos necesarios para que puedan 
                                    vincularse al mundo laboral de manera exitosa, desarrollando competencias técnicas y blandas 
                                    valoradas en el mercado actual.
                                </p>
                            </div>
                            
                            <div class="objetivo-card">
                                <div class="objetivo-icon">
                                    <i class="fas fa-lightbulb"></i>
                                </div>
                                <h3 class="objetivo-subtitle">Pensamiento Emprendedor</h3>
                                <p class="objetivo-text">
                                    Fomentamos el pensamiento emprendedor, la creatividad y la capacidad de resolver problemas, 
                                    desarrollando habilidades esenciales para el siglo XXI que permitan a nuestros estudiantes 
                                    crear oportunidades y generar valor en cualquier contexto.
                                </p>
                            </div>
                            
                            <div class="objetivo-card">
                                <div class="objetivo-icon">
                                    <i class="fas fa-cogs"></i>
                                </div>
                                <h3 class="objetivo-subtitle">Competencias del Siglo XXI</h3>
                                <p class="objetivo-text">
                                    Desarrollamos competencias clave como trabajo en equipo, comunicación efectiva, adaptabilidad, 
                                    pensamiento crítico y alfabetización digital, preparando profesionales integrales capaces de 
                                    enfrentar los retos de un mundo en constante transformación.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Formación Humana y Ciudadana -->
                    <div class="objetivo-item" id="objetivo-formacion">
                        <div class="objetivo-grid">
                            <div class="objetivo-card">
                                <div class="objetivo-icon">
                                    <i class="fas fa-heart"></i>
                                </div>
                                <h3 class="objetivo-subtitle">Formación en Valores</h3>
                                <p class="objetivo-text">
                                    Consolidamos la formación en valores, el respeto, la responsabilidad y la autonomía, 
                                    fortaleciendo el carácter y la integridad de nuestros estudiantes como fundamento de 
                                    su desarrollo personal y profesional.
                                </p>
                            </div>
                            
                            <div class="objetivo-card">
                                <div class="objetivo-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <h3 class="objetivo-subtitle">Ciudadanía Activa y Ética</h3>
                                <p class="objetivo-text">
                                    Nuestro objetivo es que los estudiantes se conviertan en ciudadanos activos, éticos y 
                                    conscientes de su rol en la construcción de una sociedad más justa, equitativa y solidaria, 
                                    comprometidos con el bienestar colectivo.
                                </p>
                            </div>
                            
                            <div class="objetivo-card">
                                <div class="objetivo-icon">
                                    <i class="fas fa-hands-helping"></i>
                                </div>
                                <h3 class="objetivo-subtitle">Solidaridad y Responsabilidad Social</h3>
                                <p class="objetivo-text">
                                    Fomentamos la conciencia de solidaridad y la responsabilidad social, desarrollando la 
                                    empatía y el compromiso con las comunidades vulnerables, promoviendo acciones concretas 
                                    de servicio y transformación social.
                                </p>
                            </div>
                            
                            <div class="objetivo-card">
                                <div class="objetivo-icon">
                                    <i class="fas fa-globe-americas"></i>
                                </div>
                                <h3 class="objetivo-subtitle">Identidad Cultural y Ambiental</h3>
                                <p class="objetivo-text">
                                    Promovemos que los estudiantes valoren y respeten la diversidad cultural y la rica naturaleza 
                                    de nuestro país, desarrollando una identidad cultural sólida y una conciencia ambiental que 
                                    impulse la conservación y el desarrollo sostenible.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>






<!-- Horarios y Aulas - Educación Media -->
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
                        <p class="admision-nav-subtitle">
                            Espacios especializados diseñados para potenciar el aprendizaje y desarrollo académico 
                            de nuestros estudiantes de educación media.
                        </p>
                    </div>
                </div>
            </div>

            <span class="modalidad-badge">Lunes a Viernes • 7:00 AM - 1:30 PM</span>

            <!-- Aulas por Nivel -->
            <div class="aulas-grid">
                <div class="aula-item">
                    <div class="aula-image">
                        <img src="{{ asset('images/Primariaa.jpeg') }}" alt="Aula Décimo">
                        <div class="aula-overlay">
                            <span class="aula-nivel">Décimo</span>
                        </div>
                    </div>
                    
                    <div class="aula-info">
                        <h4>Décimo</h4>
                        <p>
                            Aulas equipadas con tecnología avanzada, recursos multimedia y espacios para trabajo 
                            colaborativo que facilitan la preparación para la educación superior y el desarrollo 
                            de proyectos de investigación.
                        </p>
                    </div>
                </div>

                <div class="aula-item">
                    <div class="aula-image">
                        <img src="{{ asset('images/Primariaa.jpeg') }}" alt="Aula Once">
                        <div class="aula-overlay">
                            <span class="aula-nivel">Once</span>
                        </div>
                    </div>
                    
                    <div class="aula-info">
                        <h4>Once</h4>
                        <p>
                            Salones especializados con laboratorios integrados, biblioteca digital y espacios de 
                            estudio individual, diseñados específicamente para la preparación de las pruebas Saber 11 
                            y la transición a la universidad.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>





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
    
    // Scroll suave para navegación general
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

    // Animación de partículas en el hero
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

    // ===== ÚNICA FUNCIÓN scrollToTimeline() =====
    function scrollToTimeline() {
        const target = document.getElementById('metodologia-media');
        if (target) {
            const headerHeight = document.querySelector('header')?.offsetHeight || 40;
            const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight - 10;

            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        }
    }

    // Script para adaptar automáticamente el tamaño del título
    function adaptHeroTitle() {
        const heroTitle = document.querySelector('.hero-title');
        if (!heroTitle) return;

        const titleText = heroTitle.textContent.trim();
        const characterCount = titleText.length;
        const wordCount = titleText.split(' ').length;

        heroTitle.classList.remove('auto-long', 'auto-short');

        if (characterCount > 35 || wordCount > 5) {
            heroTitle.classList.add('auto-long');
        } else if (characterCount < 15 || wordCount < 3) {
            heroTitle.classList.add('auto-short');
        }
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

<body>
</html>

