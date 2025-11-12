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
    <link href="{{ asset('css/Docentes.css') }}" rel="stylesheet">
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
                        <span class="title-highlight">Personal</span> -
                        <span class="title-highlight">Docente</span>
                    </h1>
                    <div class="hero-scroll-indicator" onclick="scrollToTimeline()">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>



    
    <!-- SECCIÓN DE PROFESORES -->
    <section class="profesores-section" id="profesores">
        <div class="container">
            <div class="section-intro">
                
                <p> Acorde con el horizonte institucional, los maestros encarnan
                     un liderazgo pedagógico inspirador.  Es un profesional con una 
                     sólida formación humanista que promueve la justicia, la inclusión
                      y el respeto por la diversidad de ritmos y estilos de aprendizaje
                       de sus estudiantes. Posee un profundo dominio 
                    de su disciplina y un compromiso activo con la actualización y resignificación 
                    continua de sus saberes</p>
            </div>

            <div class="profesores-grid">
                <!-- Profesor 1 -->
                <div class="profesor-item">
                    <div class="profesor-image">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=500&h=500&fit=crop" alt="María González">
                    </div>
                    <div class="profesor-info">
                        <h3>María González</h3>
                        <p class="profesor-cargo">Coordinadora Académica</p>
                        <p class="profesor-descripcion">
                            Licenciada en Pedagogía con más de 15 años de experiencia en educación humanística. Especialista en desarrollo curricular y metodologías innovadoras de enseñanza.
                        </p>
                        <div class="profesor-especialidades">
                            <span class="especialidad-tag">Pedagogía</span>
                            <span class="especialidad-tag">Currículo</span>
                            <span class="especialidad-tag">Liderazgo</span>
                        </div>
                    </div>
                </div>

                <div class="profesor-divider"></div>

                <!-- Profesor 2 -->
                <div class="profesor-item">
                    <div class="profesor-image">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=500&h=500&fit=crop" alt="Carlos Rodríguez">
                    </div>
                    <div class="profesor-info">
                        <h3>Carlos Rodríguez</h3>
                        <p class="profesor-cargo">Docente de Matemáticas</p>
                        <p class="profesor-descripcion">
                            Ingeniero con maestría en Educación Matemática. Apasionado por hacer de las matemáticas una experiencia comprensible y aplicable a la vida cotidiana.
                        </p>
                        <div class="profesor-especialidades">
                            <span class="especialidad-tag">Matemáticas</span>
                            <span class="especialidad-tag">Física</span>
                            <span class="especialidad-tag">Robótica</span>
                        </div>
                    </div>
                </div>

                <div class="profesor-divider"></div>

                <!-- Profesor 3 -->
                <div class="profesor-item">
                    <div class="profesor-image">
                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=500&h=500&fit=crop" alt="Ana Martínez">
                    </div>
                    <div class="profesor-info">
                        <h3>Ana Martínez</h3>
                        <p class="profesor-cargo">Docente de Lengua y Literatura</p>
                        <p class="profesor-descripcion">
                            Filóloga con doctorado en Literatura Latinoamericana. Promotora de la lectura crítica y la expresión creativa como herramientas de desarrollo personal.
                        </p>
                        <div class="profesor-especialidades">
                            <span class="especialidad-tag">Literatura</span>
                            <span class="especialidad-tag">Redacción</span>
                            <span class="especialidad-tag">Oratoria</span>
                        </div>
                    </div>
                </div>

                <div class="profesor-divider"></div>

                <!-- Profesor 4 -->
                <div class="profesor-item">
                    <div class="profesor-image">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=500&h=500&fit=crop" alt="Diego Herrera">
                    </div>
                    <div class="profesor-info">
                        <h3>Diego Herrera</h3>
                        <p class="profesor-cargo">Docente de Ciencias Naturales</p>
                        <p class="profesor-descripcion">
                            Biólogo con maestría en Educación Ambiental. Enfocado en desarrollar conciencia ecológica y pensamiento científico en los estudiantes.
                        </p>
                        <div class="profesor-especialidades">
                            <span class="especialidad-tag">Biología</span>
                            <span class="especialidad-tag">Química</span>
                            <span class="especialidad-tag">Ecología</span>
                        </div>
                    </div>
                </div>

                <div class="profesor-divider"></div>

                <!-- Profesor 5 -->
                <div class="profesor-item">
                    <div class="profesor-image">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=500&h=500&fit=crop" alt="Laura Ramírez">
                    </div>
                    <div class="profesor-info">
                        <h3>Laura Ramírez</h3>
                        <p class="profesor-cargo">Docente de Inglés</p>
                        <p class="profesor-descripcion">
                            Licenciada en Lenguas Extranjeras con certificación internacional TESOL. Especialista en metodologías comunicativas y aprendizaje inmersivo.
                        </p>
                        <div class="profesor-especialidades">
                            <span class="especialidad-tag">Inglés</span>
                            <span class="especialidad-tag">Francés</span>
                            <span class="especialidad-tag">TESOL</span>
                        </div>
                    </div>
                </div>

                <div class="profesor-divider"></div>

                <!-- Profesor 6 -->
                <div class="profesor-item">
                    <div class="profesor-image">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=500&h=500&fit=crop" alt="Juan Pérez">
                    </div>
                    <div class="profesor-info">
                        <h3>Juan Pérez</h3>
                        <p class="profesor-cargo">Docente de Educación Física</p>
                        <p class="profesor-descripcion">
                            Profesional en Ciencias del Deporte con énfasis en formación integral. Promotor de hábitos saludables y valores deportivos.
                        </p>
                        <div class="profesor-especialidades">
                            <span class="especialidad-tag">Deportes</span>
                            <span class="especialidad-tag">Salud</span>
                            <span class="especialidad-tag">Liderazgo</span>
                        </div>
                    </div>
                </div>

                <div class="profesor-divider"></div>

                <!-- Profesor 7 -->
                <div class="profesor-item">
                    <div class="profesor-image">
                        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=500&h=500&fit=crop" alt="Sofía Vargas">
                    </div>
                    <div class="profesor-info">
                        <h3>Sofía Vargas</h3>
                        <p class="profesor-cargo">Docente de Arte</p>
                        <p class="profesor-descripcion">
                            Licenciada en Artes Plásticas con experiencia en técnicas mixtas. Fomenta la creatividad y expresión artística como medio de desarrollo personal.
                        </p>
                        <div class="profesor-especialidades">
                            <span class="especialidad-tag">Pintura</span>
                            <span class="especialidad-tag">Escultura</span>
                            <span class="especialidad-tag">Arte Digital</span>
                        </div>
                    </div>
                </div>

                <div class="profesor-divider"></div>

                <!-- Profesor 8 -->
                <div class="profesor-item">
                    <div class="profesor-image">
                        <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=500&h=500&fit=crop" alt="Roberto Silva">
                    </div>
                    <div class="profesor-info">
                        <h3>Roberto Silva</h3>
                        <p class="profesor-cargo">Docente de Música</p>
                        <p class="profesor-descripcion">
                            Maestro en Música con especialización en pedagogía musical. Apasionado por desarrollar el talento musical y la apreciación artística.
                        </p>
                        <div class="profesor-especialidades">
                            <span class="especialidad-tag">Música</span>
                            <span class="especialidad-tag">Piano</span>
                            <span class="especialidad-tag">Teoría Musical</span>
                        </div>
                    </div>
                </div>

                <div class="profesor-divider"></div>

                <!-- Profesor 9 -->
                <div class="profesor-item">
                    <div class="profesor-image">
                        <img src="https://images.unsplash.com/photo-1489424731084-a5d8b219a5bb?w=500&h=500&fit=crop" alt="Patricia Moreno">
                    </div>
                    <div class="profesor-info">
                        <h3>Patricia Moreno</h3>
                        <p class="profesor-cargo">Psicóloga Educativa</p>
                        <p class="profesor-descripcion">
                            Psicóloga con maestría en Orientación Educativa. Enfocada en el bienestar emocional y desarrollo socioemocional de los estudiantes.
                        </p>
                        <div class="profesor-especialidades">
                            <span class="especialidad-tag">Psicología</span>
                            <span class="especialidad-tag">Orientación</span>
                            <span class="especialidad-tag">Desarrollo</span>
                        </div>
                    </div>
                </div>

                <div class="profesor-divider"></div>

                <!-- Profesor 10 -->
                <div class="profesor-item">
                    <div class="profesor-image">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=500&h=500&fit=crop" alt="Miguel Torres">
                    </div>
                    <div class="profesor-info">
                        <h3>Miguel Torres</h3>
                        <p class="profesor-cargo">Docente de Tecnología</p>
                        <p class="profesor-descripcion">
                            Ingeniero de Sistemas con pasión por la educación tecnológica. Especialista en programación, desarrollo web y pensamiento computacional.
                        </p>
                        <div class="profesor-especialidades">
                            <span class="especialidad-tag">Programación</span>
                            <span class="especialidad-tag">Web</span>
                            <span class="especialidad-tag">Apps</span>
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
