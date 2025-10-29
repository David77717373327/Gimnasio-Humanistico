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
    <link href="{{ asset('css/prescolar.css') }}" rel="stylesheet">
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
                        <span class="title-highlight">Educación Inicial</span> -
                        <span class="title-highlight">Preescolar</span>
                    </h1>
                    <div class="hero-scroll-indicator" onclick="scrollToTimeline()">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>


        
    

    








<!-- Sección Principal de Contenido Preescolar -->
<section class="preescolar-content" id="preescolar-content">
    

    <!-- Metodología Activa - Rediseño -->
    <div class="metodologia-section">
        <div class="container">

            <!-- Header de la sección con logo -->
<div class="admision-nav-header">
    <div class="header-content-wrapper">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Colegio" class="header-logo">
        <div class="header-text-content">
            <div class="header-label">
                <span class="label-icon">✦</span>
                <span class="label-text">Comunícate con nosotros</span>
            </div>
            <h2 class="admision-nav-title">Propósitos Educación Inicial</h2>
            <p class="admision-nav-subtitle">
                Nuestro enfoque pedagógico se basa en los propósitos establecidos por el Ministerio de Educación Nacional de Colombia.
            </p>
        </div>
    </div>
</div>

<div class="row align-items-center g-5">
    <div class="col-lg-6 order-lg-1 order-2">
        <div class="metodologia-image">
            <img src="{{ asset('images/Primariaa.jpeg') }}" alt="Educación Inicial">
        </div>
    </div>
    <div class="col-lg-6 order-lg-2 order-1">
        <div class="metodologia-content">    
            <h2 class="section-title">Educamos desde los 3 Propósitos Fundamentales</h2>
            <p class="section-description">
                La educación inicial busca que los niños se reconozcan como sujetos activos de su aprendizaje, 
                desarrollando sus capacidades mediante experiencias de exploración, comunicación, juego y convivencia.
            </p>
            
            <div class="metodologia-list">

                <!-- Propósito 1 -->
                <div class="metodologia-item">
                    <div class="metodologia-number">01</div>     
                    <div class="metodologia-text">
                        <h4>Construir su identidad en relación con los otros</h4>
                        <p>
                            Promovemos que los niños se reconozcan como personas únicas, capaces de convivir, compartir y construir vínculos afectivos 
                            con su familia, sus compañeros y su entorno.
                        </p>
                    </div>
                </div>

                <!-- Propósito 2 -->
                <div class="metodologia-item">
                    <div class="metodologia-number">02</div>
                    
                    <div class="metodologia-text">
                        <h4>Ser comunicadores activos de sus ideas, sentimientos y emociones</h4>
                        <p>
                            Fomentamos diversas formas de expresión —oral, corporal, artística y simbólica— 
                            que les permitan comunicar su manera de ver y sentir el mundo.
                        </p>
                    </div>
                </div>

                <!-- Propósito 3 -->
                <div class="metodologia-item">
                    <div class="metodologia-number">03</div>
                    
                    <div class="metodologia-text">
                        <h4>Disfrutar aprender explorando y relacionándose con el mundo</h4>
                        <p>
                            A través del juego, la curiosidad y la exploración del entorno, 
                            los niños descubren, experimentan y construyen conocimiento de forma significativa y placentera.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>











   <!-- Horarios y Aulas - Rediseño Ultra Compacto -->
<div class="horarios-aulas-section">
    <div class="container">

        <!-- Header de la sección con logo -->
        <div class="admision-nav-header">
            <div class="header-content-wrapper">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Colegio" class="header-logo">
                <div class="header-text-content">
                    <div class="header-label">
                        <span class="label-icon">✦</span>
                        <span class="label-text">Información Institucional</span>
                    </div>
                    <h2 class="admision-nav-title">Horarios y Aulas</h2>
                    <p class="admision-nav-subtitle">Ofrecemos instalaciones diseñadas específicamente para el desarrollo integral de nuestros estudiantes de preescolar.                                                           
                    </p>
                </div>
            </div>
        </div>

        <span class="modalidad-badge">Lunes a Viernes • 7:00 AM - 12:00 PM</span>

        <!-- Aulas por Nivel -->
        <div class="aulas-grid">
            <div class="aula-item">
                <div class="aula-image">
                    <img src="{{ asset('images/Primariaa.jpeg') }}" alt="Aula Párvulos">
                    <div class="aula-overlay">
                        <span class="aula-nivel">Párvulos</span>
                    </div>
                </div>
                
                <div class="aula-info">
                    <h4>Párvulos</h4>
                    <p>Espacios amplios con áreas de juego sensorial, rincones de exploración y mobiliario adaptado para los más pequeños.</p>
                </div>
            </div>

            <div class="aula-item">
                <div class="aula-image">
                    <img src="{{ asset('images/Primariaa.jpeg') }}" alt="Aula Prejardín">
                    <div class="aula-overlay">
                        <span class="aula-nivel">Prejardín</span>
                    </div>
                </div>
                <div class="aula-info">
                    <h4>Prejardín</h4>
                    <p>Ambientes coloridos diseñados para promover la creatividad, con zonas de arte,
                         lectura y juego dirigido.</p>
                </div>
            </div>

            <div class="aula-item">
                <div class="aula-image">
                    <img src="{{ asset('images/Primariaa.jpeg') }}" alt="Aula Jardín">
                    <div class="aula-overlay">
                        <span class="aula-nivel">Jardín</span>
                    </div>
                </div>
                <div class="aula-info">
                    <h4>Jardín</h4>
                    <p>Salones equipados con recursos para el desarrollo de habilidades pre-académicas
                         en lectoescritura y matemáticas.</p>
                </div>
            </div>

            <div class="aula-item">
                <div class="aula-image">
                    <img src="{{ asset('images/Primariaa.jpeg') }}" alt="Aula Transición">
                    <div class="aula-overlay">
                        <span class="aula-nivel">Transición</span>
                    </div>
                </div>
                <div class="aula-info">
                    <h4>Transición</h4>
                    <p>Aulas preparatorias con tecnología educativa, biblioteca y espacios para trabajo individual y colaborativo.</p>
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