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
    <link href="{{ asset('css/filosofia_institucional.css') }}" rel="stylesheet">
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
                        <span class="title-highlight">Componente</span>
                        <span class="title-highlight">Filosófico</span>
                    </h1>

                    <div class="hero-scroll-indicator" onclick="scrollToTimeline()">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- SECCIÓN PRINCIPAL DEL COMPONENTE FILOSÓFICO -->
    <section id="componente-filosofico" class="componente-filosofico-section">
        <div class="container">

            <!-- Introducción Principal -->
            <div class="institutional-header" data-aos="fade-up">
                <div class="header-badge">
                    <i class="fas fa-university"></i>
                    <span>Filosofía Institucional</span>
                </div>
                <h1 class="main-title">
                    Nuestra <span class="highlight-text">Identidad Educativa</span>
                </h1>
                <p class="header-subtitle">
                    Nos educamos en el trabajo humanízante para un nuevo país.
                </p>
                <div class="header-divider"></div>
            </div>

            <!-- Contenido Principal -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="filosofia-content" data-aos="fade-up" data-aos-delay="200">
                        <div class="content-card">
                            <div class="card-decoration"></div>

                            <div class="content-text">
                                <div class="philosophy-blocks">
                                    <div class="philosophy-block" data-aos="fade-up" data-aos-delay="200">
                                        <div class="block-icon">
                                            <i class="fas fa-brain"></i>
                                        </div>
                                        <div class="block-content">
                                            <h4>Principios Humanísticos</h4>
                                            <p>Nuestra filosofía se arraiga en los principios del humanismo, por lo
                                                tanto promueve el desarrollo de la autodisciplina intelectual y la
                                                autonomía moral, fundamentales para el pensamiento crítico y la toma de
                                                decisiones responsables.</p>
                                        </div>
                                    </div>

                                    <div class="philosophy-block" data-aos="fade-up" data-aos-delay="200">
                                        <div class="block-icon">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <div class="block-content">
                                            <h4>Cultura Democrática</h4>
                                            <p>Fomentamos una cultura de democracia, trabajo, investigación y
                                                creatividad, donde cada miembro de la comunidad educativa se sienta
                                                valorado y protagonista de su aprendizaje.</p>
                                        </div>
                                    </div>

                                    <div class="philosophy-block" data-aos="fade-up" data-aos-delay="200">
                                        <div class="block-icon">
                                            <i class="fas fa-rocket"></i>
                                        </div>
                                        <div class="block-content">
                                            <h4>Emprendimiento y Liderazgo</h4>
                                            <p>Priorizamos el emprendimiento y la autodeterminación individual y
                                                colectiva, capacitando a nuestros estudiantes para liderar sus propios
                                                proyectos de vida y contribuir activamente a la sociedad.</p>
                                        </div>
                                    </div>

                                    <div class="philosophy-block" data-aos="fade-up" data-aos-delay="200">
                                        <div class="block-icon">
                                            <i class="fas fa-leaf"></i>
                                        </div>
                                        <div class="block-content">
                                            <h4>Cultura Ambiental</h4>
                                            <p>Nos comprometemos con la preservación de la naturaleza y la
                                                sostenibilidad ambiental, reconociendo nuestra responsabilidad con el
                                                territorio.</p>
                                        </div>
                                    </div>

                                    <div class="philosophy-block" data-aos="fade-up" data-aos-delay="200">
                                        <div class="block-icon">
                                            <i class="fas fa-heart"></i>
                                        </div>
                                        <div class="block-content">
                                            <h4>Valores y Calidad de Vida</h4>
                                            <p>Guiados por la libertad y los valores del catolicismo, buscamos promover
                                                una vida humana de calidad que trascienda lo meramente académico.</p>
                                        </div>
                                    </div>

                                    <div class="philosophy-block" data-aos="fade-up" data-aos-delay="200">
                                        <div class="block-icon">
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="block-content">
                                            <h4>Excelencia e Inclusión</h4>
                                            <p>Con un enfoque transversal de calidad total, inclusión y excelencia
                                                académica, nuestra institución está dedicada a cultivar mentes curiosas
                                                y espíritus solidarios, preparando individuos capaces de transformar su
                                                territorio y construir un futuro más justo y digno.</p>
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


 
@include('layouts.navegacion_Interna')



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
            document.getElementById('componente-filosofico').scrollIntoView({
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
