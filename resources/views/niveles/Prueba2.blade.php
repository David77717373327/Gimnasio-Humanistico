<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organigrama - GIMNASIO HUMANÍSTICO</title>
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
    <link href="{{ asset('css/organigrama.css') }}" rel="stylesheet">
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
                        <span class="title-highlight">Organigrama</span>
                        <span class="title-highlight">Institucional</span>
                    </h1>

                    <div class="hero-scroll-indicator" onclick="scrollToOrganigrama()">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN DE ORGANIGRAMA -->
    <section id="organigrama-section" class="organigrama-section">
        <div class="container">
            <!-- Título de la sección -->
            <div class="row mb-5">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="section-badge">
                        <i class="fas fa-sitemap"></i>
                        <span>Estructura Organizacional</span>
                    </div>
                    <h2 class="section-title">Nuestro Organigrama Institucional</h2>
                    <p class="section-description">
                        Conoce la estructura jerárquica y organizacional del Gimnasio Humanístico, 
                        diseñada para garantizar una gestión eficiente y una educación de calidad.
                    </p>
                </div>
            </div>

            <!-- Contenedor de la imagen del organigrama -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="organigrama-container">
                        <div class="organigrama-frame">
                            <img 
                                src="{{ asset('images/organigrama.png') }}" 
                                alt="Organigrama Institucional - Gimnasio Humanístico"
                                class="organigrama-image"
                            >
                            <!-- Overlay decorativo -->
                            <div class="organigrama-overlay-corners">
                                <div class="corner corner-tl"></div>
                                <div class="corner corner-tr"></div>
                                <div class="corner corner-bl"></div>
                                <div class="corner corner-br"></div>
                            </div>
                        </div>
                        
                        <!-- Botón de descarga opcional -->
                        <div class="organigrama-actions">
                            <a href="{{ asset('images/organigrama.png') }}" download class="btn-download">
                                <i class="fas fa-download"></i>
                                <span>Descargar Organigrama</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Información adicional (opcional) -->
            <div class="row mt-5">
                <div class="col-lg-10 offset-lg-1">
                    <div class="organigrama-info">
                        <div class="info-card">
                            <i class="fas fa-users"></i>
                            <h4>Trabajo Colaborativo</h4>
                            <p>Cada miembro de nuestra institución trabaja en conjunto para alcanzar la excelencia educativa.</p>
                        </div>
                        <div class="info-card">
                            <i class="fas fa-chart-line"></i>
                            <h4>Gestión Eficiente</h4>
                            <p>Nuestra estructura organizacional permite una toma de decisiones ágil y efectiva.</p>
                        </div>
                        <div class="info-card">
                            <i class="fas fa-handshake"></i>
                            <h4>Comunicación Directa</h4>
                            <p>Mantenemos canales de comunicación claros entre todos los niveles de la institución.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

        // Scroll suave al organigrama
        function scrollToOrganigrama() {
            document.getElementById('organigrama-section').scrollIntoView({
                behavior: 'smooth'
            });
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
            
            // Animación de aparición para las tarjetas
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.info-card, .organigrama-frame').forEach(el => {
                observer.observe(el);
            });
        });

        // Re-evaluar si cambia el tamaño de ventana
        window.addEventListener('resize', function() {
            adaptHeroTitle();
        });
    </script>

</body>
</html>