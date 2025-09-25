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
                    <div class="visual-element mision-visual">
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
                    <div class="visual-element vision-visual">
                        <div class="timeline-container">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>







        <!-- SECCIÓN PRINCIPIOS Y VALORES -->
        <section class="section-valores" id="valores">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mb-5">
                        <div class="section-header">
                            <h2 class="section-title centered">
                                <span class="title-decoration"></span>
                                Principios y Valores Institucionales
                            </h2>
                            <p class="section-subtitle">
                                Los pilares fundamentales que guían nuestro proyecto educativo hacia la excelencia
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Principio 1: Visión Compartida -->
                <div class="valor-block">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="valor-icon-container">
                                <div class="valor-main-icon">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <h3 class="valor-title">Visión Compartida y Propósito Transformador</h3>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="valor-content">
                                <div class="valor-item">
                                    <div class="valor-item-header">
                                        <i class="fas fa-bullseye"></i>
                                        <h4>Identidad y Propósito Claro</h4>
                                    </div>
                                    <p>Nos movemos por la convicción de ofrecer una educación de la más alta calidad,
                                        que sea inclusiva, emprendedora, humanista y arraigada en la ciencia, alineada
                                        con los desafíos globales y los fines de la educación colombiana. Nuestro lema,
                                        <strong>"Nos educamos en el trabajo humanizante para un nuevo país"</strong>,
                                        encapsula nuestro compromiso con la construcción de un futuro más justo y
                                        próspero para todos.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Principio 2: Ciudadanía Activa -->
                <div class="valor-block">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="valor-icon-container">
                                <div class="valor-main-icon">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <h3 class="valor-title">Ciudadanía Activa y Sostenibilidad</h3>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="valor-content">
                                <div class="valor-item">
                                    <div class="valor-item-header">
                                        <i class="fas fa-vote-yea"></i>
                                        <h4>Participación Democrática</h4>
                                    </div>
                                    <p>Se fomenta un espíritu de democracia activa y participación cívica a través de
                                        nuestro gobierno escolar y todas las instancias de decisión, empoderando a la
                                        comunidad para construir un entorno justo y equitativo.</p>
                                </div>
                                <div class="valor-item">
                                    <div class="valor-item-header">
                                        <i class="fas fa-leaf"></i>
                                        <h4>Conciencia Ambiental y Sostenibilidad</h4>
                                    </div>
                                    <p>Se inculca un profundo respeto y amor por la naturaleza; se promueve un
                                        pensamiento y una cultura ambiental que impulsen acciones concretas para la
                                        preservación, el disfrute sostenible y la responsabilidad ecológica de nuestro
                                        planeta.</p>
                                </div>
                                <div class="valor-item">
                                    <div class="valor-item-header">
                                        <i class="fas fa-handshake"></i>
                                        <h4>Transformación Social y Convivencia</h4>
                                    </div>
                                    <p>Se busca el cultivo de un espíritu crítico y constructivo hacia nuestro entorno
                                        social, buscando la innovación y el liderazgo para construir comunidades más
                                        justas, equitativas y con una convivencia armónica.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Principio 3: Crecimiento Personal -->
                <div class="valor-block">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="valor-icon-container">
                                <div class="valor-main-icon">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <h3 class="valor-title">Crecimiento Personal y Relacional</h3>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="valor-content">
                                <div class="valor-item">
                                    <div class="valor-item-header">
                                        <i class="fas fa-heart"></i>
                                        <h4>Bienestar y Relaciones Humanas</h4>
                                    </div>
                                    <p>Se valora y promueve relaciones humanas basadas en el respeto, la empatía y la
                                        afectividad, para crear un ambiente cálido y seguro donde se prioriza la salud
                                        emocional y física, y el bienestar integral de todos.</p>
                                </div>
                                <div class="valor-item">
                                    <div class="valor-item-header">
                                        <i class="fas fa-compass"></i>
                                        <h4>Autonomía y Autorregulación</h4>
                                    </div>
                                    <p>Se impulsa la autodisciplina y la autodirección como pilares para el aprendizaje
                                        autónomo y el desarrollo personal. Se capacita a los estudiantes para tomar
                                        decisiones conscientes y responsables, al fomentar su autodeterminación
                                        individual y colectiva.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Principio 4: Excelencia Académica -->
                <div class="valor-block">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="valor-icon-container">
                                <div class="valor-main-icon">
                                    <i class="fas fa-trophy"></i>
                                </div>
                                <h3 class="valor-title">Excelencia Académica e Innovación</h3>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="valor-content">
                                <div class="valor-item">
                                    <div class="valor-item-header">
                                        <i class="fas fa-search"></i>
                                        <h4>Curiosidad, Investigación y Creatividad</h4>
                                    </div>
                                    <p>Prioriza la indagación, el pensamiento crítico y la creatividad en todos los
                                        procesos de aprendizaje. Se motiva la búsqueda activa de conocimiento, la
                                        experimentación y la generación de soluciones innovadoras a través de la
                                        investigación y la praxis.</p>
                                </div>
                                <div class="valor-item">
                                    <div class="valor-item-header">
                                        <i class="fas fa-brain"></i>
                                        <h4>Desarrollo Pleno de Potencialidades</h4>
                                    </div>
                                    <p>Se estimula el desarrollo integral de las múltiples inteligencias y talentos de
                                        cada estudiante a través de estrategias pedagógicas y programas que celebran la
                                        diversidad de capacidades.</p>
                                </div>
                                <div class="valor-item">
                                    <div class="valor-item-header">
                                        <i class="fas fa-chart-line"></i>
                                        <h4>Cultura de Mejora Continua</h4>
                                    </div>
                                    <p>Se adopta la evaluación como una herramienta esencial para la mejora constante de
                                        nuestros procesos de aprendizajes educativos, garantizando un aprendizaje
                                        significativo y un desarrollo humano inclusivo para todos.</p>
                                </div>
                                <div class="valor-item">
                                    <div class="valor-item-header">
                                        <i class="fas fa-star"></i>
                                        <h4>Búsqueda de la Excelencia</h4>
                                    </div>
                                    <p>Nos comprometemos con el desarrollo de las máximas capacidades humanas, aspirando
                                        a la excelencia académica y personal como un camino para aportar
                                        significativamente al progreso social y científico.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Principio 5: Libertad y Trascendencia -->
                <div class="valor-block">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="valor-icon-container">
                                <div class="valor-main-icon">
                                    <i class="fas fa-dove"></i>
                                </div>
                                <h3 class="valor-title">Libertad y Sentido de Trascendencia</h3>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="valor-content">
                                <div class="valor-item">
                                    <div class="valor-item-header">
                                        <i class="fas fa-feather-alt"></i>
                                        <h4>Libertad y Autenticidad</h4>
                                    </div>
                                    <p>Como el fin último de la educación es formar seres libres, plenos e íntegros,
                                        capaces de desarrollar su personalidad al máximo. La búsqueda de la libertad y
                                        la plenitud del ser son los horizontes que guían nuestro proyecto educativo.</p>
                                </div>
                                <div class="valor-item">
                                    <div class="valor-item-header">
                                        <i class="fas fa-praying-hands"></i>
                                        <h4>Espiritualidad y Sentido de Vida</h4>
                                    </div>
                                    <p>Se promueve la reflexión sobre la interconexión entre el ser humano, el mundo y
                                        la trascendencia, ofreciendo una dimensión espiritual que enriquece la
                                        interpretación de la realidad y dota de sentido a la existencia, en el marco de
                                        los valores católicos que nos inspiran.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

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
