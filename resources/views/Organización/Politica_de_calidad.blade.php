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
    <link href="{{ asset('css/Politica_de_calidad.css') }}" rel="stylesheet">
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
                            <span class="title-highlight">Política</span> De  
                            <span class="title-highlight">Calidad</span>
                        </h1>
                        <div class="hero-scroll-indicator" onclick="scrollToTimeline()">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        
<section class="main-content" id="policy-content">
    <div class="container">
        <div class="policy-container">
            <div class="policy-text-content">
                <h2 class="policy-title">Nuestro Compromiso</h2>
                <p class="policy-intro">
                    El Gimnasio Humanístico del Alto Magdalena, se compromete a ofrecer un servicio educativo de excelencia, 
                    centrado en el desarrollo holístico y el bienestar de la comunidad educativa, mediante:
                </p>
                <ul class="policy-list">
                    <li class="policy-item">
                        La implementación y mejora continua del Sistema de Gestión de Calidad, para garantizar la 
                        optimización constante de todos los procesos.
                    </li>
                    <li class="policy-item">
                        El estricto cumplimiento de la normativa legal vigente y los principios y objetivos establecidos 
                        en el Proyecto Educativo Institucional (PEI).
                    </li>
                    <li class="policy-item">
                        La provisión de una formación humanista, inclusiva, católica y académica de alta calidad, 
                        que asegura el desarrollo pleno y el bienestar físico y mental de cada estudiante.
                    </li>
                </ul>
            </div>

            <div class="policy-image-container">
                <img src="{{ asset('images/politica_de_calidad2.jpg') }}" alt="Política de Calidad" class="policy-image">
            </div>
        </div>

        <div class="policy-summary">
            <p class="summary-text">
                Nuestra política de calidad refleja el compromiso institucional con la excelencia educativa y el desarrollo integral 
                de nuestros estudiantes. A través de la implementación rigurosa de estándares de calidad, el seguimiento continuo de 
                procesos y la evaluación permanente, garantizamos un servicio educativo que responde a las necesidades de nuestra 
                comunidad y a los desafíos del mundo contemporáneo. Cada miembro de nuestra institución trabaja con dedicación para 
                mantener los más altos niveles de calidad en todos los aspectos de la vida escolar, desde lo académico hasta lo formativo, 
                asegurando así el cumplimiento de nuestra misión educativa y el logro de la visión institucional.
            </p>
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
                const target = document.getElementById('policy-content');
                if (target) {
                    const headerHeight = document.querySelector('header')?.offsetHeight || 1;
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


        </script>
    </body>

</html>
