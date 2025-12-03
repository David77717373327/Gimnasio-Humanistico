<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enfoque pedagogigo</title>
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

    <!-- Scripts -->
    <script src="{{ asset('js/hero.js') }}" defer></script>



    <!-- CSS personalizado -->
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/hero.css')}}" rel="stylesheet">
    <link href="{{ asset('css/enfoque_pedagogico.css')}}" rel="stylesheet">
    
</head>

<body>
    <header class="header-top" aria-label="Encabezado principal del sitio">
        @include('layouts.header')
    </header>

    <nav class="nav-sticky" aria-label="Navegación principal">
        @include('layouts.navigation')
    </nav>

    <main id="main" role="main">

        <!-- HERO -->
        <section class="hero-section" aria-label="Educación Inicial y Preescolar en Neiva">
            <div class="hero-background">
                <img src="../images/Mision1.jpg"
                    alt="Instalaciones del colegio en Neiva enfocadas en educación inicial y preescolar" width="1920"
                    height="1080" loading="lazy">
            </div>

            <div class="hero-overlay"></div>
            <div class="hero-particles" aria-hidden="true"></div>

            <div class="container hero-container">
                <div class="hero-content">
                    <h1 class="hero-title" data-title="Nuestra Identidad Institucional">
                        Enfoque Pedagógico
                    </h1>

                    <div class="hero-scroll-indicator" onclick="scrollToContent()" role="button" tabindex="0"
                        aria-label="Ir a contenido principal" onkeypress="if(event.key==='Enter')scrollToContent()">
                        <i class="fas fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </section>






        <!-- METODOLOGÍAS INTEGRADAS -->
<section class="metodologia-section" id="siguiente_sesion">
    <div class="container-wide">
        <!-- Header Principal -->
        <div class="section-intro fade-in">
            <span class="section-tag">Nuestro Sistema Educativo</span>
            <h2 class="main-title">Metodología Integrada de Aprendizaje</h2>
            <p class="main-description">Un ecosistema educativo completo que combina tecnología avanzada con materiales pedagógicos especializados</p>
        </div>

        <!-- Plataforma Digital Santillana -->
        <div class="metodologia-row reverse fade-in">
            <div class="metodologia-visual">
                <div class="image-wrapper">
                    <img src="../images/Santillana2.webp" alt="Estudiantes trabajando con tecnología educativa">
                    
                </div>
                <!-- Último feature movido debajo de la imagen -->
                <div class="feature-below-image">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                        </div>
                        <div class="feature-text">
                            <h4>Espacios Colaborativos</h4>
                            <p>Foros y herramientas para trabajo en equipo virtual</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="metodologia-content">
                <div class="content-badge">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                        <line x1="8" y1="21" x2="16" y2="21"></line>
                        <line x1="12" y1="17" x2="12" y2="21"></line>
                    </svg>
                    <span>Plataforma Digital</span>
                </div>
                <h3 class="content-title">Santillana Compartir</h3>
                <p class="content-description">
                    Una plataforma educativa integral que permite a los estudiantes acceder a contenido interactivo, desarrollar actividades prácticas y recibir retroalimentación inmediata sobre su progreso académico.
                </p>
                <div class="features-grid">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                            </svg>
                        </div>
                        <div class="feature-text">
                            <h4>Libros Web Interactivos</h4>
                            <p>Acceso digital a todos los textos escolares con contenido multimedia</p>
                        </div>

                        
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                            </svg>
                        </div>
                        <div class="feature-text">
                            <h4>Tareas y Talleres Digitales</h4>
                            <p>Actividades interactivas para reforzar el aprendizaje en clase</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                        </div>
                        <div class="feature-text">
                            <h4>Evaluaciones en Línea</h4>
                            <p>Sistema de evaluación continua con resultados inmediatos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kit Escolar y Cartilla -->
        <div class="metodologia-row fade-in">
            <div class="metodologia-visual">
                <div class="image-wrapper">
                    <img src="../images/libros.jpg" alt="Material educativo físico y cartilla de trabajo">
                </div>
                <!-- Componentes kit movidos debajo de la imagen -->
                <div class="kit-below-image">
                    <div class="kit-component primary">
                        <div class="component-header">
                            <span class="component-number">02</span>
                            <h4>Cartilla de Trabajo Integrada</h4>
                        </div>
                        <p>Herramienta pedagógica central que unifica las cinco materias en un solo recurso</p>
                        <div class="subjects-container">
                            <div class="subject-tag">Matemáticas</div>
                            <div class="subject-tag">Español</div>
                            <div class="subject-tag">Ciencias Naturales</div>
                            <div class="subject-tag">Sociales</div>
                            <div class="subject-tag">Inglés</div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="metodologia-content">
                <div class="content-badge">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                    </svg>
                    <span>Material Físico</span>
                </div>
                <h3 class="content-title">Kit Escolar Especializado</h3>
                <p class="content-description">
                    Cada estudiante recibe un conjunto completo de materiales pedagógicos diseñados específicamente para integrar las cinco áreas fundamentales del conocimiento en un solo sistema de trabajo.
                </p>
                
                <div class="kit-breakdown">
                    <div class="kit-component">
                        <div class="component-header">
                            <span class="component-number">01</span>
                            <h4>Libros Físicos Santillana</h4>
                        </div>
                        <p>Textos escolares impresos para cada asignatura con contenido actualizado</p>
                    </div>
                    <div class="kit-component">
                        <div class="component-header">
                            <span class="component-number">03</span>
                            <h4>Cuadernos de Trabajo</h4>
                        </div>
                        <p>Cuadernos especializados para práctica y desarrollo de actividades complementarias</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    

    
    

    <script>
        // Animación de scroll
        const observerOptions = {
            threshold: 0.10,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

       
    </script>
</body>
</html>


    @include('layouts.footer')


</body>

</html>
