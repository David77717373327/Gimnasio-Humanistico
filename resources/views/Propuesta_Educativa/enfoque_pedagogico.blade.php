<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enfoque Pedagógico</title>
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
                <img src="../images/Educacion Secundaria/Imagen1.jpg"
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


        <!-- METODOLOGÍA INNOVADORA - DISEÑO ARQUITECTÓNICO -->
        <section class="metodologia-arquitectura" id="siguiente_sesion">
            
            <!-- Intro Centrada -->
            <div class="arquitectura-intro">
                <div class="intro-line"></div>
                <div class="intro-content">
                    <span class="intro-micro">SISTEMA EDUCATIVO INTEGRAL</span>
                    <h2 class="intro-macro">Metodología Integrada<br>de Aprendizaje</h2>
                </div>
                <div class="intro-line"></div>
            </div>

            <!-- Grid Simétrico Principal -->
            <div class="grid-simetrico">
                
                <!-- MÓDULO 1: SANTILLANA -->
                <div class="modulo-educativo" data-modulo="01">
                    
                    <div class="modulo-header">
                        <div class="header-left">
                            <span class="modulo-tag">PLATAFORMA DIGITAL</span>
                            <h3 class="modulo-titulo">Santillana Compartir</h3>
                        </div>
                        
                    </div>

                    <div class="modulo-grid">
                        <!-- Imagen -->
                        <div class="modulo-imagen">
                            <div class="imagen-frame">
                                <img src="../images/Santillana2.webp" alt="Plataforma Santillana">
                            </div>
                        </div>

                        <!-- Contenido -->
                        <div class="modulo-contenido">
                            <p class="contenido-descripcion">
                                Ecosistema digital integral que transforma la experiencia educativa mediante recursos interactivos, evaluación continua y análisis de datos en tiempo real.
                            </p>

                            <div class="caracteristicas-grid">
                                <div class="caracteristica">
                                    <div class="caracteristica-icono">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                                        </svg>
                                    </div>
                                    <div class="caracteristica-texto">
                                        <h4>Libros Web Interactivos</h4>
                                        <p>Biblioteca digital completa con multimedia integrado</p>
                                    </div>
                                </div>

                                <div class="caracteristica">
                                    <div class="caracteristica-icono">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <polyline points="9 11 12 14 22 4"/>
                                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
                                        </svg>
                                    </div>
                                    <div class="caracteristica-texto">
                                        <h4>Tareas Digitales</h4>
                                        <p>Actividades adaptativas con gamificación</p>
                                    </div>
                                </div>

                                <div class="caracteristica">
                                    <div class="caracteristica-icono">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <line x1="18" y1="20" x2="18" y2="10"/>
                                            <line x1="12" y1="20" x2="12" y2="4"/>
                                            <line x1="6" y1="20" x2="6" y2="14"/>
                                        </svg>
                                    </div>
                                    <div class="caracteristica-texto">
                                        <h4>Analytics Educativo</h4>
                                        <p>Métricas precisas de progreso individual</p>
                                    </div>
                                </div>

                                <div class="caracteristica">
                                    <div class="caracteristica-icono">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                            <circle cx="9" cy="7" r="4"/>
                                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                        </svg>
                                    </div>
                                    <div class="caracteristica-texto">
                                        <h4>Colaboración</h4>
                                        <p>Espacios virtuales para trabajo en equipo</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- MÓDULO 2: KIT ESCOLAR -->
                <div class="modulo-educativo" data-modulo="02">
                    
                    <div class="modulo-header">
                        <div class="header-left">
                            <span class="modulo-tag">MATERIAL PEDAGÓGICO</span>
                            <h3 class="modulo-titulo">Kit Escolar Especializado</h3>
                        </div>
                        <div class="header-right">
                            <div class="numero-grande">02</div>
                        </div>
                    </div>

                    <div class="modulo-grid">
                        <!-- Imagen -->
                        <div class="modulo-imagen">
                            <div class="imagen-frame">
                                <img src="../images/libros.jpg" alt="Kit Escolar">
                            </div>
                        </div>

                        <!-- Contenido -->
                        <div class="modulo-contenido">
                            <p class="contenido-descripcion">
                                Sistema integrado de recursos físicos diseñados con estándares editoriales internacionales para complementar y reforzar el aprendizaje digital.
                            </p>

                            <div class="componentes-lista">
                                <div class="componente">
                                    <div class="componente-numero">
                                        <span>01</span>
                                    </div>
                                    <div class="componente-info">
                                        <h4>Libros Físicos Santillana</h4>
                                        <p>Colección editorial completa con contenido actualizado y certificado</p>
                                    </div>
                                </div>

                                <div class="componente">
                                    <div class="componente-numero">
                                        <span>02</span>
                                    </div>
                                    <div class="componente-info">
                                        <h4>Cartilla Integrada</h4>
                                        <p>Herramienta unificada que consolida cinco áreas de conocimiento</p>
                                    </div>
                                </div>

                                <div class="componente">
                                    <div class="componente-numero">
                                        <span>03</span>
                                    </div>
                                    <div class="componente-info">
                                        <h4>Cuadernos Especializados</h4>
                                        <p>Material de práctica diseñado para desarrollo de competencias</p>
                                    </div>
                                </div>
                            </div>

                            <div class="materias-etiquetas">
                                <span class="etiqueta">Matemáticas</span>
                                <span class="etiqueta">Español</span>
                                <span class="etiqueta">Ciencias Naturales</span>
                                <span class="etiqueta">Sociales</span>
                                <span class="etiqueta">Inglés</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>

    </main>

    @include('layouts.footer')

    <script>
        // Intersection Observer para animaciones
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.modulo-educativo').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(40px)';
            el.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
            observer.observe(el);
        });
    </script>

</body>

</html>