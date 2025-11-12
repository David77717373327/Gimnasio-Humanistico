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
    <link href="{{ asset('css/Gobierno_escolar.css') }}" rel="stylesheet">
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
                        <span class="title-highlight">Gobierno</span>
                        <span class="title-highlight">Escolar</span>
                    </h1>
                    <div class="hero-scroll-indicator" onclick="scrollToTimeline()">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="intro-section" id="intro-section">
        <p class="intro-text">
            El Gobierno Escolar está conformado por el Consejo Directivo, como órgano de máxima autoridad para la toma
            de decisiones, y el Consejo Académico como órgano asesor. Estos organismos trabajan de manera articulada
            para garantizar el cumplimiento de los objetivos institucionales, promover la participación democrática de
            toda la comunidad educativa y velar por la calidad académica y formativa del establecimiento. La Rectoría,
            como máxima autoridad ejecutiva, coordina las acciones de ambos consejos.
        </p>

        <div class="gobierno-grid">
            <!-- RECTORÍA -->
            <div class="gobierno-column">
                <h3 class="column-title">Rectoría</h3>
                <p class="column-description">
                    Máxima autoridad ejecutiva del establecimiento, responsable de la representación legal y ejecución
                    de decisiones del Gobierno Escolar.
                </p>
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="card-icon">
                                <img src="{{ asset('images/Grupo-Humanistico2.png') }}" alt="Rectoría">
                            </div>
                            <h4 class="front-title">Rectoría</h4>
                            <p class="front-subtitle">Representación Legal</p>
                            <div class="hover-hint">Pasa el cursor →</div>
                        </div>
                        <div class="flip-card-back">
                            <h5 class="back-title">Rectoría</h5>
                            <div class="members-list">
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>Representante legal</strong> del establecimiento ante las autoridades
                                        educativas y ejecutor de las decisiones del Gobierno Escolar y de los
                                        propietarios.
                                    </p>
                                </div>
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>Preside y convoca</strong> tanto al Consejo Directivo como al Consejo
                                        Académico periódica y extraordinariamente cuando lo considere conveniente.
                                    </p>
                                </div>
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>Responsable</strong> de la dirección general y coordinación de todas las
                                        actividades institucionales.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CONSEJO DIRECTIVO -->
            <div class="gobierno-column">
                <h3 class="column-title">Consejo Directivo</h3>
                <p class="column-description">
                    Instancia directiva de toma de decisiones de la comunidad educativa y de orientación académica y
                    administrativa del establecimiento.
                </p>

                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="card-icon">
                                <img src="{{ asset('images/Logo.png') }}" alt="Consejo Directivo">
                            </div>
                            <h4 class="front-title">Consejo Directivo</h4>
                            <p class="front-subtitle">Órgano de Decisión</p>
                            <div class="hover-hint">Pasa el cursor →</div>
                        </div>
                        <div class="flip-card-back">
                            <h5 class="back-title">Miembros del Consejo</h5>
                            <div class="members-list">
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>La Rectoría</strong>, quien lo preside y lo convoca periódica y
                                        extraordinariamente.
                                    </p>
                                </div>
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>Dos representantes del personal docente</strong>, elegidos por mayoría
                                        de votos en una Asamblea de Docentes.
                                    </p>
                                </div>
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>Un representante de los padres de familia</strong>, elegido por la Junta
                                        Directiva de la Asociación de Padres de Familia.
                                    </p>
                                </div>
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>Un representante de los estudiantes</strong>, elegido por el Consejo de
                                        Estudiantes entre los del último grado.
                                    </p>
                                </div>
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>Un representante de los exalumnos</strong>, elegido por el Consejo
                                        Directivo.
                                    </p>
                                </div>
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>Un representante del sector productivo</strong>, escogido de candidatos
                                        propuestos por la respectiva organización.
                                    </p>
                                </div>
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>Un representante de los Directivos Propietarios</strong>: Grupo
                                        Humanístico SAS.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CONSEJO ACADÉMICO -->
            <div class="gobierno-column">
                <h3 class="column-title">Consejo Académico</h3>
                <p class="column-description">
                    Instancia superior para decidir y proponer orientaciones en aspectos académicos, curriculares,
                    pedagógicos y formativos.
                </p>

                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="card-icon">
                                <img src="{{ asset('images/Mision1.jpg') }}" alt="Consejo Académico">
                            </div>
                            <h4 class="front-title">Consejo Académico</h4>
                            <p class="front-subtitle">Órgano Asesor</p>
                            <div class="hover-hint">Pasa el cursor →</div>
                        </div>
                        <div class="flip-card-back">
                            <h5 class="back-title">Miembros del Consejo</h5>
                            <div class="members-list">
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>La Rectoría</strong>, representante legal del establecimiento ante las
                                        autoridades educativas y ejecutor de las decisiones del Gobierno Escolar y de
                                        los propietarios.
                                    </p>
                                </div>
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>La Coordinadora</strong>, quien dirige los niveles educativos asignados.
                                    </p>
                                </div>
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>Los Directivos Propietarios</strong>: Un representante de los directivos propetarios 
                                    </p>
                                </div>
                                <div class="member-item">
                                    <span class="bullet">•</span>
                                    <p class="member-text">
                                        <strong>El jefe de cada área académica</strong>, elegido para cada año escolar.
                                    </p>
                                </div>
                            </div>
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
