<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIMNASIO HUMANÍSTICO</title>
    <!-- Google Fonts - Tipografía moderna -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Open+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Bootstrap y Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/Logo.png') }}">
    <!-- CSS personalizado -->
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/quienes_somos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
</head>

<!-- Incluir el header -->
@include('layouts.header')

<body>






    <!-- Hero Section -->
    <section class="historia-hero">
        <div class="hero-background"></div>

        <!-- Partículas flotantes -->
        <div class="floating-particles"></div>

        <div class="hero-content">
            <h1 class="hero-title">Nuestra Historia</h1>
        </div>

        <div class="scroll-indicator" onclick="scrollToTimeline()">
            <i class="fas fa-chevron-down"></i>
        </div>
    </section>






    <!-- ============================================
     TIMELINE HISTÓRICA - HTML CORREGIDO
     ============================================ -->
<section class="timeline-section" id="timeline">
    <div class="timeline-container">
        <div class="timeline">

            <!-- Bola verde inicial CORRECTA -->
            <div class="timeline-start">
                <div class="timeline-start-circle"></div>
            </div>

            <!-- Item 1: 1983 -->
            <div class="timeline-item">
                <!-- Año + Marcador -->
                <div class="timeline-year-marker">
                    <div class="year-circle">
                        <span class="year-text">1983</span>
                    </div>
                    <div class="timeline-marker"></div>
                </div>

                <!-- Contenido -->
                <div class="timeline-content-wrapper">
                    <div class="timeline-arrow"></div>
                    <div class="timeline-content">
                        <div class="timeline-header-bar">
                            <span class="timeline-year-display">1983</span>
                        </div>
                        <div class="timeline-images">
                            <div class="timeline-image-item">
                                <img src="{{ asset('images/Historiaa2.jpeg') }}" alt="Fundación 1983">
                            </div>
                        </div>
                        <div class="timeline-text-content">
                            <p class="timeline-text">
                                El 15 de mayo de 1983, la institución fue fundada con el nombre de "Colegio Bilingüe
                                de la Sagrada Eucaristía" por la familia Cristancho Higuera. Sus primeros
                                propietarios, Don Eduardo Cristancho y Doña Graciela Higuera, establecieron la sede
                                inicial en la carrera 16 No 3-14 del barrio El Altico, bajo la rectoría de la
                                profesional en educación Alma Helena Cristancho. Esta fundación marcó el inicio de
                                lo que sería una trayectoria educativa excepcional en la ciudad de Neiva, con el
                                compromiso de brindar educación bilingüe de calidad desde sus primeros años.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Item 2: 1989-1991 -->
            <div class="timeline-item">
                <div class="timeline-year-marker">
                    <div class="year-circle">
                        <span class="year-text">1989</span>
                    </div>
                    <div class="timeline-marker"></div>
                </div>

                <div class="timeline-content-wrapper">
                    <div class="timeline-arrow"></div>
                    <div class="timeline-content">
                        <div class="timeline-header-bar">
                            <span class="timeline-year-display">1989-1991</span>
                        </div>
                        <div class="timeline-images">
                            <div class="timeline-image-item">
                                <img src="{{ asset('images/Mision1.jpg') }}" alt="Transición 1989-1991">
                            </div>
                        </div>
                        <div class="timeline-text-content">
                            <p class="timeline-text">
                                Tras el sensible fallecimiento del jefe de familia Don Eduardo Cristancho en 1989,
                                la institución enfrentó un período de incertidumbre. La familia tomó la difícil
                                decisión de poner el colegio en venta en mayo de 1991. Este momento crucial en la
                                historia institucional representó tanto el final de una era como el inicio de nuevas
                                oportunidades que llegarían con la visión renovadora de nuevos líderes educativos
                                comprometidos con la excelencia académica y la formación integral.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Item 3: 1991 -->
            <div class="timeline-item">
                <div class="timeline-year-marker">
                    <div class="year-circle">
                        <span class="year-text">1991</span>
                    </div>
                    <div class="timeline-marker"></div>
                </div>

                <div class="timeline-content-wrapper">
                    <div class="timeline-arrow"></div>
                    <div class="timeline-content">
                        <div class="timeline-header-bar">
                            <span class="timeline-year-display">1991</span>
                        </div>
                        <div class="timeline-images">
                            <div class="timeline-image-item">
                                <img src="{{ asset('images/Historiaa2.jpeg') }}" alt="Renacimiento 1991">
                            </div>
                        </div>
                        <div class="timeline-text-content">
                            <p class="timeline-text">
                                En un momento crucial, la Dra. Diana Patricia Cristancho de Iriarte, profesora de la
                                Universidad Surcolombiana, decidió adquirir el colegio con el objetivo de
                                materializar su visión pedagógica. Esta nueva etapa trajo consigo una transformación
                                profunda con el cambio de nombre a "Gimnasio Humanístico del Alto Magdalena",
                                propuesto por el Magister Antonio Iriarte Cadena. Este nombre reflejaba un nuevo
                                enfoque centrado en los valores humanos, la naturaleza y la identidad regional,
                                marcando el inicio de la era humanística que caracterizaría la institución.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Item 4: 1991-1996 -->
            <div class="timeline-item">
                <div class="timeline-year-marker">
                    <div class="year-circle">
                        <span class="year-text">1991</span>
                    </div>
                    <div class="timeline-marker"></div>
                </div>

                <div class="timeline-content-wrapper">
                    <div class="timeline-arrow"></div>
                    <div class="timeline-content">
                        <div class="timeline-header-bar">
                            <span class="timeline-year-display">1991-1996</span>
                        </div>
                        <div class="timeline-images">
                            <div class="timeline-image-item">
                                <img src="{{ asset('images/Prueba_1.jpeg') }}" alt="Modernización 1991-1996">
                            </div>
                        </div>
                        <div class="timeline-text-content">
                            <p class="timeline-text">
                                Durante este período se implementó una modernización pedagógica y tecnológica sin
                                precedentes. Se adoptó una visión educativa inspirada en pensadores como Gramsci,
                                Piaget, Freinet y Dewey, modernizando laboratorios y adquiriendo equipos de
                                informática. La institución se trasladó a una sede más amplia en la calle 6B No
                                14-55, con zonas de recreación y espacios adecuados. En 1992, la Secretaría de
                                Educación otorgó una calificación excepcional de 9.38 sobre 10, reconociendo la alta
                                calidad de los procesos educativos. Se crearon proyectos de servicio comunitario
                                como la Escuela de Padres, el Club de Abuelitos y el Programa de apoyo a madres
                                cabeza de familia.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- JavaScript de animaciones ELIMINADO -->




















    <!-- ============================================
     NAVEGACIÓN VISUAL INSTITUCIONAL
     ============================================ -->

    <section class="institutional-nav-section">
        <div class="institutional-nav-container">

            <!-- Grid de navegación - 4 columnas pegadas -->
            <div class="institutional-nav-grid">

                <!-- Card 1: Misión y Visión -->
                <a href="{{ route('mision-vision') }}" class="nav-card-inst">
                    <div class="nav-card-overlay-inst"></div>
                    <div class="nav-card-content-inst">
                        <div class="nav-icon-inst">
                            <i class="fas fa-landmark"></i>
                        </div>
                        <h3 class="nav-title-inst">Misión y Visión</h3>
                    </div>
                </a>

                <!-- Card 2: Filosofía -->
                <a href="{{ route('filosofia_institucional') }}" class="nav-card-inst filosofia">
                    <div class="nav-card-overlay-inst"></div>
                    <div class="nav-card-content-inst">
                        <div class="nav-icon-inst">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3 class="nav-title-inst">Filosofía</h3>
                    </div>
                </a>

                <!-- Card 3: Principios -->
                <a href="{{ route('principios-valores') }}" class="nav-card-inst principios">
                    <div class="nav-card-overlay-inst"></div>
                    <div class="nav-card-content-inst">
                        <div class="nav-icon-inst">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <h3 class="nav-title-inst">Principios</h3>
                    </div>
                </a>

                <!-- Card 4: Símbolos -->
                <a href="{{ route('simbolos') }}" class="nav-card-inst simbolos">
                    <div class="nav-card-overlay-inst"></div>
                    <div class="nav-card-content-inst">
                        <div class="nav-icon-inst">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h3 class="nav-title-inst">Símbolos</h3>
                    </div>
                </a>
            </div>
        </div>
    </section>











    <!-- Incluir el  -->
    @include('layouts.footer')



    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // Generar partículas flotantes
        function createParticles() {
            const container = document.querySelector('.floating-particles');
            const particleCount = 25;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');

                const size = Math.random() * 2 + 1;
                const startX = Math.random() * window.innerWidth;
                const duration = Math.random() * 15 + 10;
                const delay = Math.random() * 15;

                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${startX}px`;
                particle.style.animationDuration = `${duration}s`;
                particle.style.animationDelay = `${delay}s`;

                container.appendChild(particle);
            }
        }

        // Intersection Observer para animaciones
        const observerOptions = {
            threshold: 0.2,
            rootMargin: '0px 0px -80px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Scroll suave al timeline
        function scrollToTimeline() {
            document.getElementById('timeline').scrollIntoView({
                behavior: 'smooth'
            });
        }

        // Efectos de paralaje suave
        function parallaxEffect() {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.1;

            const heroBackground = document.querySelector('.hero-background');
            if (heroBackground) {
                heroBackground.style.transform = `translateY(${rate}px)`;
            }
        }

        // Inicialización
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();

            document.querySelectorAll('.timeline-item').forEach(el => {
                observer.observe(el);
            });

            window.addEventListener('scroll', parallaxEffect);
        });

        // Efecto de mouse en hero
        document.querySelector('.historia-hero').addEventListener('mousemove', (e) => {
            const {
                clientX,
                clientY
            } = e;
            const {
                innerWidth,
                innerHeight
            } = window;

            const xPercent = (clientX / innerWidth - 0.5) * 2;
            const yPercent = (clientY / innerHeight - 0.5) * 2;

            const heroContent = document.querySelector('.hero-content');
            heroContent.style.transform = `translate(${xPercent * 3}px, ${yPercent * 3}px)`;
        });
    </script>


</body>

</html>
