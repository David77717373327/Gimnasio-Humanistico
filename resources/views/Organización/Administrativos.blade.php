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
    <link href="{{ asset('css/Administrativos.css') }}" rel="stylesheet">
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
                        <span class="title-highlight">Administrativo</span>
                    </h1>
                    <div class="hero-scroll-indicator" onclick="scrollToTimeline()">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Sección de Introducción -->
    <section class="intro-section" id="intro-section">
        <div class="equipo-grid">
            <!-- Jefe Administrativo -->
            <div class="equipo-column">
                <h3 class="column-title">Jefe Administrativo</h3>
                <p class="column-description">
                    Líder de la planificación operativa y supervisor del personal administrativo.
                </p>
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="card-logo">
                                <img src="{{ asset('images/Jefe_Administracion.png') }}" alt="Jefe Administrativo">
                            </div>
                            <h4 class="front-title">Jefe Administrativo</h4>
                            <p class="front-subtitle">Liderazgo Operativo</p>
                            <div class="hover-hint">Pasa el cursor →</div>
                        </div>
                        <div class="flip-card-back">
                            <h5 class="back-title">Jefe Administrativo</h5>
                            <p class="back-description">
                                Lidera la planificación operativa (presupuesto, compras, infraestructura) alineada 
                                con las directrices de la Rectoría. Supervisa y articula el trabajo del personal 
                                administrativo (Contaduría, Pagaduría, Servicios Generales, Secretaría).
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contador -->
            <div class="equipo-column">
                <h3 class="column-title">Contador</h3>
                <p class="column-description">
                    Responsable del rigor contable y la transparencia financiera institucional.
                </p>
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="card-logo">
                                <img src="{{ asset('images/Contador.png') }}" alt="Contador">
                            </div>
                            <h4 class="front-title">Contador</h4>
                            <p class="front-subtitle">Rigor Financiero</p>
                            <div class="hover-hint">Pasa el cursor →</div>
                        </div>
                        <div class="flip-card-back">
                            <h5 class="back-title">Contador</h5>
                            <p class="back-description">
                                Es el profesional responsable del rigor contable y la transparencia financiera, 
                                esencial para la toma de decisiones estratégicas. Es experto en NIIF y en la 
                                legislación tributaria colombiana, garantizando la veracidad, exactitud y oportunidad 
                                de todos los informes contables.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Secretaria Académica -->
            <div class="equipo-column">
                <h3 class="column-title">Secretaria Académica</h3>
                <p class="column-description">
                    Guardiana de la información académica y primer contacto con la comunidad.
                </p>
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="card-logo">
                                <img src="{{ asset('images/Secretaria_Academica.png') }}" alt="Secretaria Académica">
                            </div>
                            <h4 class="front-title">Secretaria Académica</h4>
                            <p class="front-subtitle">Gestión Académica</p>
                            <div class="hover-hint">Pasa el cursor →</div>
                        </div>
                        <div class="flip-card-back">
                            <h5 class="back-title">Secretaria Académica</h5>
                            <p class="back-description">
                                Es la depositaria y responsable de la información académica, procesos de matrícula 
                                y demás funciones afines que le asigne la rectoría y el primer punto de contacto 
                                para la comunidad, requiere precisión técnica, confidencialidad, y alta calidad humana.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagador - Tesorero -->
            <div class="equipo-column">
                <h3 class="column-title">Pagador - Tesorero</h3>
                <p class="column-description">
                    Ejecutor de transacciones financieras con exactitud y seguridad.
                </p>
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="card-logo">
                                <img src="{{ asset('images/Pagador_Tesorero.png') }}" alt="Pagador-Tesorero">
                            </div>
                            <h4 class="front-title">Pagador - Tesorero</h4>
                            <p class="front-subtitle">Gestión Financiera</p>
                            <div class="hover-hint">Pasa el cursor →</div>
                        </div>
                        <div class="flip-card-back">
                            <h5 class="back-title">Pagador - Tesorero</h5>
                            <p class="back-description">
                                Ejecuta las transacciones financieras con máxima exactitud y puntualidad. Es garante 
                                de la seguridad en el manejo del flujo de caja y la documentación de soporte.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Maestra de Apoyo -->
            <div class="equipo-column">
                <h3 class="column-title">Maestra de Apoyo</h3>
                <p class="column-description">
                    Experta en inclusión educativa y flexibilidad curricular.
                </p>
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="card-logo">
                                <img src="{{ asset('images/Maestra_Apoyo.png') }}" alt="Maestra de Apoyo">
                            </div>
                            <h4 class="front-title">Maestra de Apoyo</h4>
                            <p class="front-subtitle">Inclusión Educativa</p>
                            <div class="hover-hint">Pasa el cursor →</div>
                        </div>
                        <div class="flip-card-back">
                            <h5 class="back-title">Maestra de Apoyo</h5>
                            <p class="back-description">
                                Es el experto técnico que materializa la inclusión educativa, trabajando como docente 
                                y consultor para la flexibilidad curricular. Posee un profundo conocimiento del Diseño 
                                Universal de Aprendizaje DUA y del Decreto 1421/2017. Es el experto en el diseño e 
                                implementación de los Planes Individuales de Ajustes Razonables PIAR y la flexibilidad 
                                curricular.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Personal de Servicios Generales -->
            <div class="equipo-column">
                <h3 class="column-title">Servicios Generales</h3>
                <p class="column-description">
                    Garantes de la salud, seguridad y habitabilidad institucional.
                </p>
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="card-logo">
                                <img src="{{ asset('images/Servicios_Generales.png') }}" alt="Servicios Generales">
                            </div>
                            <h4 class="front-title">Servicios Generales</h4>
                            <p class="front-subtitle">Bienestar y Seguridad</p>
                            <div class="hover-hint">Pasa el cursor →</div>
                        </div>
                        <div class="flip-card-back">
                            <h5 class="back-title">Servicios Generales</h5>
                            <p class="back-description">
                                Es el equipo garante de la salud, seguridad y habitabilidad de la institución, 
                                fundamental para el bienestar de toda la comunidad. Garantizan la higiene y salubridad 
                                de todas las áreas, actuando de manera proactiva en la prevención de riesgos sanitarios. 
                                Mantiene los estándares de orden y limpieza requeridos para un ambiente educativo de 
                                calidad.
                            </p>
                        </div>
                    </div>
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
            const target = document.getElementById('intro-section');
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
