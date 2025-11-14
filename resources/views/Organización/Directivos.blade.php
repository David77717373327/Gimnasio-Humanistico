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
    <link href="{{ asset('css/Directivos.css') }}" rel="stylesheet">
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
                        <span class="title-highlight">Equipo</span> -
                        <span class="title-highlight">Directivo</span>
                    </h1>
                    <div class="hero-scroll-indicator" onclick="scrollToTimeline()">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN DIRECTIVOS -->
    <section class="directivos-section" id="directivos">
        <div class="container">

            <!-- RECTORA - Imagen Izquierda -->
            <div class="directivo-item">
                <div class="directivo-image">
                    <div class="image-accent"></div>
                    <div class="image-wrapper">
                        <img src="{{ asset('images/Logo.png') }}"
                            alt="Rectora del Gimnasio Humanístico">
                    </div>
                </div>

                <div class="directivo-content">
                    <div class="directivo-header">
                        <h2 class="directivo-nombre">Dra. Silvia Cristina Ruiz Campos</h2>
                        <p class="directivo-cargo">Rectora</p>
                    </div>

                    <div class="directivo-divider"></div>

                    <p class="directivo-descripcion">
                        Con más de 25 años de experiencia en el sector educativo, la Dra. Silvia Cristina Ruiz Campos lidera
                        nuestra institución con una visión humanística e innovadora. Su compromiso con la excelencia
                        académica y el desarrollo integral de nuestros estudiantes ha sido fundamental para consolidar
                        al Gimnasio Humanístico como una institución de referencia en educación de calidad e inclusiva. Su liderazgo
                        se caracteriza por promover valores como la Ciudadanía activa, Sostenibilidad, investigación, creatividad, libertad y sentido de trascendencia.
                    </p>
                </div>
            </div>

            <!-- COORDINADORA - Imagen Derecha -->
            <div class="directivo-item reverse">
                <div class="directivo-image">
                    <div class="image-accent"></div>
                    <div class="image-wrapper">
                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=800&h=1000&fit=crop"
                            alt="Coordinadora del Gimnasio Humanístico">
                    </div>
                </div>

                <div class="directivo-content">
                    <div class="directivo-header">
                        <h2 class="directivo-nombre">Lic. XXXX</h2>
                        <p class="directivo-cargo">Coordinadora </p>
                    </div>

                    <div class="directivo-divider"></div>

                    <p class="directivo-descripcion">
                        La Lic. XXXX coordina todos los procesos académicos de nuestra institución,
                        garantizando la implementación efectiva de nuestro modelo pedagógico humanístico. Su experiencia
                        en gestión educativa y su pasión por la innovación pedagógica han sido clave para el desarrollo
                        de programas académicos que integran el conocimiento tradicional con metodologías modernas. Su
                        enfoque holístico asegura que cada estudiante reciba la atención y el apoyo necesarios para
                        alcanzar su máximo potencial. 
                    </p>
                </div>
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
            const target = document.getElementById('directivos');
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
</body>

</html>
