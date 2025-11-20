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
    <link href="{{ asset('css/Mision_vision.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Incluir el header -->
    @include('layouts.header')

    <!-- CONTENEDOR PRINCIPAL -->
    <main class="mision-vision-main">

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
                            <span class="title-highlight">Misión</span> y
                            <span class="title-highlight">Visión</span>
                        </h1>


                        <div class="hero-scroll-indicator" onclick="scrollToTimeline()">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>











        <!-- SECCIÓN MISIÓN -->
        <section class="section-mision" id="mision">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="content-wrapper">
                            <div class="section-header">
                                <h2 class="section-title">
                                    <span class="title-decoration"></span>
                                    Nuestra Misión
                                </h2>
                            </div>
                            <div class="section-content">
                                <p class="lead-paragraph">
                                    En el <strong>Gimnasio Humanístico del Alto Magdalena</strong>, nuestra misión es
                                    transformar vidas a través de una educación de excelencia.
                                </p>
                                <p>
                                    Nos comprometemos a promover el desarrollo holístico de cada estudiante
                                    (intelectual, espiritual, social, físico y mental), mediante el cultivo de un
                                    pensamiento científico, crítico y ambiental; basados en un enfoque humanístico,
                                    inclusivo y emprendedor, e impulsados por un equipo docente altamente cualificado y
                                    apasionado, para preparar ciudadanos capaces de innovar, liderar y contribuir a una
                                    sociedad más digna y sostenible.
                                </p>
                            </div>
                            <div class="pillars-grid">
                                <div class="pillar-item">
                                    <i class="fas fa-brain pillar-icon"></i>
                                    <span>Desarrollo Intelectual</span>
                                </div>
                                <div class="pillar-item">
                                    <i class="fas fa-heart pillar-icon"></i>
                                    <span>Crecimiento Espiritual</span>
                                </div>
                                <div class="pillar-item">
                                    <i class="fas fa-users pillar-icon"></i>
                                    <span>Formación Social</span>
                                </div>
                                <div class="pillar-item">
                                    <i class="fas fa-running pillar-icon"></i>
                                    <span>Bienestar Físico</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Imagen profesional sin íconos flotantes -->
                    <div class="col-lg-6">
                        <div class="mision-visual">
                            <!-- Eliminados todos los íconos flotantes como solicitaste -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECCIÓN VISIÓN -->
        <section class="section-vision" id="vision">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 order-lg-2 d-flex align-items-center">
                        <div class="content-wrapper">
                            <div class="section-header">
                                <h2 class="section-title">
                                    <span class="title-decoration"></span>
                                    Nuestra Visión
                                </h2>
                            </div>
                            <div class="section-content">
                                <div class="vision-year">2035</div>
                                <p class="lead-paragraph">
                                    Para el <strong>2035</strong>, el Gimnasio Humanístico del Alto Magdalena será
                                    reconocido como un referente en innovación educativa.
                                </p>
                                <p>
                                    Consolidado por un Proyecto Educativo Institucional que ofrece una formación de
                                    excelencia. Nuestro modelo se distinguirá por su enfoque humanista, inclusivo,
                                    científico, ecológico y tecnológico, que prepara a las nuevas generaciones con una
                                    mentalidad global y las habilidades y competencias necesarias para impactar
                                    positivamente en la sociedad.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Imagen profesional con timeline mejorado - SIN íconos flotantes -->
                    <div class="col-lg-6 order-lg-1">
                        <div class="vision-visual">
                            <div class="timeline-container">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        







        
    </main>



    @include('layouts.navegacion_Interna')

    <!-- Incluir el footer -->
    @include('layouts.footer')

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

    <script>
        // Intersection Observer para animaciones
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

        // Observar elementos
        document.querySelectorAll('.valor-block, .content-wrapper, .visual-element').forEach(el => {
            observer.observe(el);
        });
                             /*  
                <           div class="col-lg-6">
                            <div class="visual-element mision-visual
                            */

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
            document.getElementById('mision').scrollIntoView({
                behavior: 'smooth'
            });
        }
    </script>
</body>

</html>
