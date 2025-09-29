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
    <link href="{{ asset('css/admision.css') }}" rel="stylesheet">
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
                <div class="col-lg-8 offset-lg-2 text-center">

                    <h1 class="hero-title">
                        <span class="title-highlight">Procesos</span>
                        <span class="title-highlight">Admision</span>
                    </h1>

                    <div class="hero-scroll-indicator" onclick="scrollToTimeline()">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- NAVEGACIÓN INTERNA DE ADMISIÓN -->
<section class="admision-nav-section" id="nav_Interna">
    <div class="container">
        <div class="admision-nav-header">
            <div class="header-label">
                <span class="label-icon">✦</span>
                <span class="label-text">Proceso de Admisión</span>
            </div>
            <h2 class="admision-nav-title">Información Clave para Tu Inscripción</h2>
            <p class="admision-nav-subtitle">Accede de manera ágil y transparente a toda la información necesaria para iniciar tu proceso educativo.</p>
        </div>

        <div class="admision-nav-layout">
            <!-- Grid Principal -->
            <div class="nav-grid-main">
                <!-- Requisitos de inscripción -->
                <a href="#requisitos-inscripcion" class="nav-card-featured nav-card-featured--primary">
                    <div class="featured-header">
                        <div class="featured-icon featured-icon--green">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                        <span class="featured-badge">Esencial</span>
                    </div>
                    <div class="featured-content">
                        <h3 class="featured-title">Requisitos de Inscripción</h3>
                        <p class="featured-description">Documentación y procedimientos necesarios para tu matrícula.</p>
                        <div class="featured-action">
                            <span class="action-text">Ver requisitos</span>
                            <div class="action-arrow">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Costos educativos -->
                <a href="#costos-educativos" class="nav-card-featured nav-card-featured--gold">
                    <div class="featured-header">
                        <div class="featured-icon featured-icon--gold">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <span class="featured-badge featured-badge--gold">Esencial</span>
                    </div>
                    <div class="featured-content">
                        <h3 class="featured-title">Costos Educativos</h3>
                        <p class="featured-description">Inversión educativa, planes de pago y opciones de financiamiento.</p>
                        <div class="featured-action">
                            <span class="action-text">Ver información</span>
                            <div class="action-arrow">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Grid Secundario -->
            <div class="nav-grid-secondary">
                <!-- Horarios de atención -->
                <a href="#horarios-atencion" class="nav-card-compact">
                    <div class="compact-left">
                        <div class="compact-icon">
                            <i class="far fa-clock"></i>
                        </div>
                        <div class="compact-content">
                            <h3 class="compact-title">Horarios de Atención</h3>
                            <p class="compact-description">Agenda tu visita personalizada</p>
                        </div>
                    </div>
                    <div class="compact-arrow">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </a>

                <!-- Formación complementaria -->
                <a href="#formacion-complementaria" class="nav-card-compact">
                    <div class="compact-left">
                        <div class="compact-icon">
                            <i class="fas fa-puzzle-piece"></i>
                        </div>
                        <div class="compact-content">
                            <h3 class="compact-title">Formación Complementaria</h3>
                            <p class="compact-description">Inglés, informática y deportes</p>
                        </div>
                    </div>
                    <div class="compact-arrow">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </a>

                <!-- Modalidades -->
                <a href="#modalidades" class="nav-card-compact">
                    <div class="compact-left">
                        <div class="compact-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="compact-content">
                            <h3 class="compact-title">Modalidades Educativas</h3>
                            <p class="compact-description">Preescolar, primaria y secundaria</p>
                        </div>
                    </div>
                    <div class="compact-arrow">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>




<!-- SECCIÓN HORARIOS DE ATENCIÓN -->
<section class="horarios-atencion-section" id="horarios-atencion">
    <div class="container">
        <!-- Header de la sección -->
        <div class="horarios-header">
            <h2 class="horarios-title">Horarios de Atención</h2>
            <p class="horarios-subtitle">Estamos disponibles para atenderte en los siguientes horarios. 
                Te recomendamos agendar tu cita con anticipación.</p>
        </div>

        <!-- Grid de horarios -->
        <div class="horarios-grid">
            <!-- Card: Oficina Administrativa -->
            <div class="horario-card">
                <div class="horario-card-header">
                    <div class="horario-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h3 class="horario-card-title">Oficina Administrativa</h3>
                </div>
                <div class="horario-card-body">
                    <div class="horario-item">
                        <span class="horario-label">Lunes a Viernes</span>
                        <span class="horario-time">7:00 AM - 4:00 PM</span>
                    </div>
                    <div class="horario-item">
                        <span class="horario-label">Sábados</span>
                        <span class="horario-time">8:00 AM - 12:00 PM</span>
                    </div>
                </div>
                <div class="horario-card-footer">
                    <i class="fas fa-info-circle"></i>
                    <span>Atención presencial y telefónica</span>
                </div>
            </div>

            <!-- Card: Coordinación Académica -->
            <div class="horario-card horario-card-featured">
                <div class="featured-badge">
                    <i class="fas fa-star"></i>
                    <span>Preferencial</span>
                </div>
                <div class="horario-card-header">
                    <div class="horario-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3 class="horario-card-title">Coordinación Académica</h3>
                </div>
                <div class="horario-card-body">
                    <div class="horario-item">
                        <span class="horario-label">Lunes a Viernes</span>
                        <span class="horario-time">7:30 AM - 3:30 PM</span>
                    </div>
                    <div class="horario-item">
                        <span class="horario-label">Agendamiento</span>
                        <span class="horario-time">Cita previa requerida</span>
                    </div>
                </div>
                <div class="horario-card-footer">
                    <i class="fas fa-calendar-check"></i>
                    <span>Agendar con 24 horas de anticipación</span>
                </div>
            </div>

            <!-- Card: Proceso de Admisión -->
            <div class="horario-card">
                <div class="horario-card-header">
                    <div class="horario-icon">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <h3 class="horario-card-title">Proceso de Admisión</h3>
                </div>
                <div class="horario-card-body">
                    <div class="horario-item">
                        <span class="horario-label">Lunes a Viernes</span>
                        <span class="horario-time">8:00 AM - 3:00 PM</span>
                    </div>
                    <div class="horario-item">
                        <span class="horario-label">Asesoría personalizada</span>
                        <span class="horario-time">Con cita previa</span>
                    </div>
                </div>
                <div class="horario-card-footer">
                    <i class="fas fa-phone-alt"></i>
                    <span>Llamar para agendar cita</span>
                </div>
            </div>
        </div>

        <!-- Información adicional -->
        <div class="horarios-info-adicional">
            <div class="info-card">
                <i class="fas fa-phone"></i>
                <div class="info-content">
                    <h4>Teléfono</h4>
                    <p>(+57) 315 2296832</p>
                </div>
            </div>
            <div class="info-card">
                <i class="fas fa-envelope"></i>
                <div class="info-content">
                    <h4>Correo Electrónico</h4>
                    <p>gimnasiohumanistico@gmail.com</p>
                </div>
            </div>
            <div class="info-card">
                <i class="fas fa-map-marker-alt"></i>
                <div class="info-content">
                    <h4>Dirección</h4>
                    <p>CLL.13 4-53 Neiva, Huila - Colombia</p>          
                </div>
            </div>
        </div>

        <!-- Nota importante -->
        <div class="horarios-nota">
            <i class="fas fa-exclamation-circle"></i>
            <p><strong>Nota importante:</strong> Los horarios pueden variar durante períodos de vacaciones o fechas especiales. 
            Te recomendamos contactarnos previamente para confirmar disponibilidad.</p>
        </div>
    </div>
</section>




    <!-- Incluir el footer -->
    @include('layouts.footer')

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

    <script>
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
                for (let i = 0; i < 100; i++) {
                    const particle = document.createElement('div');
                    particle.className = 'particle';
                    particle.style.left = Math.random() * 100 + '%';
                    particle.style.animationDelay = Math.random() * 10 + 's';
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
            document.getElementById('nav_Interna').scrollIntoView({
                behavior: 'smooth'
            });
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
