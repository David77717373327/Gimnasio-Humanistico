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
    <link href="{{ asset('css/principios-valores.css') }}" rel="stylesheet">
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
                        <span class="title-highlight">Principios</span> y
                        <span class="title-highlight">Valores</span>
                    </h1>

                    <div class="hero-scroll-indicator" onclick="scrollToTimeline()">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>








<!-- SECCIÓN DE PRINCIPIOS -->
<section class="principios-section" id="principios-section">
    <div class="container-fluid principios-container-custom">
        <!-- Encabezado de la sección -->
        <div class="principios-header">
            <h2 class="principios-main-title">Principios del Colegio</h2>
            <p class="principios-intro">
                Los principios institucionales del Gimnasio Humanístico representan los pilares fundamentales 
                que orientan nuestra labor educativa y definen nuestra identidad como institución comprometida 
                con la formación.<br><br>
                
                A través de estos cinco principios fundamentales, construimos día a día un proyecto educativo 
                que prepara a nuestros estudiantes para los desafíos del mundo contemporáneo, formando ciudadanos 
                íntegros, libres, críticos y comprometidos con la transformación positiva de la sociedad. Cada 
                principio se complementa con los demás, creando un tejido educativo coherente y robusto que 
                sostiene nuestra visión de una educación humanizante, científica y transformadora.
            </p>
        </div>

        <!-- Navegación de Principios -->
        <div class="principios-navigation">
            <button class="principio-tab active" data-principio="vision">
                Visión Compartida y Propósito Transformador
            </button>
            <button class="principio-tab" data-principio="ciudadania">
                Ciudadanía Activa y Sostenibilidad
            </button>
            <button class="principio-tab" data-principio="crecimiento">
                Crecimiento Personal y Relacional
            </button>
            <button class="principio-tab" data-principio="excelencia">
                Excelencia Académica e Innovación
            </button>
            <button class="principio-tab" data-principio="libertad">
                Libertad y Sentido de Trascendencia
            </button>
        </div>

        <!-- Contenido de Principios -->
        <div class="principios-content">
            <!-- Visión Compartida y Propósito Transformador -->
            <div class="principio-item active" id="principio-vision">
                <div class="principio-grid">
                    <div class="principio-card">
                        <h3 class="principio-subtitle">Identidad y Propósito Claro</h3>
                        <p class="principio-text">
                            Nos movemos por la convicción de ofrecer una educación de la más alta calidad, que sea inclusiva, 
                            emprendedora, humanista y arraigada en la ciencia, alineada con los desafíos globales y los fines 
                            de la educación colombiana. Nuestro lema, "Nos educamos en el trabajo humanizante para un nuevo país", 
                            encapsula nuestro compromiso con la construcción de un futuro más justo y próspero para todos.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Ciudadanía Activa y Sostenibilidad -->
            <div class="principio-item" id="principio-ciudadania">
                <div class="principio-grid">
                    <div class="principio-card">
                        <h3 class="principio-subtitle">Participación Democrática</h3>
                        <p class="principio-text">
                            Se fomenta un espíritu de democracia activa y participación cívica a través de nuestro gobierno 
                            escolar y todas las instancias de decisión, empoderando a la comunidad para construir un entorno 
                            justo y equitativo.
                        </p>
                    </div>
                    
                    <div class="principio-card">
                        <h3 class="principio-subtitle">Conciencia Ambiental y Sostenibilidad</h3>
                        <p class="principio-text">
                            Se inculca un profundo respeto y amor por la naturaleza; se promueve un pensamiento y una cultura 
                            ambiental que impulsen acciones concretas para la preservación, el disfrute sostenible y la 
                            responsabilidad ecológica de nuestro planeta.
                        </p>
                    </div>
                    
                    <div class="principio-card">
                        <h3 class="principio-subtitle">Transformación Social y Convivencia</h3>
                        <p class="principio-text">
                            Se busca el cultivo de un espíritu crítico y constructivo hacia nuestro entorno social, buscando 
                            la innovación y el liderazgo para construir comunidades más justas, equitativas y con una convivencia 
                            armónica.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Crecimiento Personal y Relacional -->
            <div class="principio-item" id="principio-crecimiento">
                <div class="principio-grid">
                    <div class="principio-card">
                        <h3 class="principio-subtitle">Bienestar y Relaciones Humanas</h3>
                        <p class="principio-text">
                            Se valora y promueve relaciones humanas basadas en el respeto, la empatía y la afectividad, para 
                            crear un ambiente cálido y seguro donde se prioriza la salud emocional y física, y el bienestar 
                            integral de todos.
                        </p>
                    </div>
                    
                    <div class="principio-card">
                        <h3 class="principio-subtitle">Autonomía y Autorregulación</h3>
                        <p class="principio-text">
                            Se impulsa la autodisciplina y la autodirección como pilares para el aprendizaje autónomo y el 
                            desarrollo personal. Se capacita a los estudiantes para tomar decisiones conscientes y responsables, 
                            al fomentar su autodeterminación individual y colectiva.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Excelencia Académica e Innovación -->
            <div class="principio-item" id="principio-excelencia">
                <div class="principio-grid">
                    <div class="principio-card">
                        <h3 class="principio-subtitle">Curiosidad, Investigación y Creatividad</h3>
                        <p class="principio-text">
                            Prioriza la indagación, el pensamiento crítico y la creatividad en todos los procesos de aprendizaje. 
                            Se motiva la búsqueda activa de conocimiento, la experimentación y la generación de soluciones 
                            innovadoras a través de la investigación y la praxis.
                        </p>
                    </div>
                    
                    <div class="principio-card">
                        <h3 class="principio-subtitle">Desarrollo Pleno de Potencialidades</h3>
                        <p class="principio-text">
                            Se estimula el desarrollo integral de las múltiples inteligencias y talentos de cada estudiante a 
                            través de estrategias pedagógicas y programas que celebran la diversidad de capacidades.
                        </p>
                    </div>
                    
                    <div class="principio-card">
                        <h3 class="principio-subtitle">Cultura de Mejora Continua</h3>
                        <p class="principio-text">
                            Se adopta la evaluación como una herramienta esencial para la mejora constante de nuestros procesos 
                            de aprendizajes educativos, garantizando un aprendizaje significativo y un desarrollo humano inclusivo 
                            para todos.
                        </p>
                    </div>
                    
                    <div class="principio-card">
                        <h3 class="principio-subtitle">Búsqueda de la Excelencia</h3>
                        <p class="principio-text">
                            Nos comprometemos con el desarrollo de las máximas capacidades humanas, aspirando a la excelencia 
                            académica y personal como un camino para aportar significativamente al progreso social y científico.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Libertad y Sentido de Trascendencia -->
            <div class="principio-item" id="principio-libertad">
                <div class="principio-grid">
                    <div class="principio-card">
                        <h3 class="principio-subtitle">Libertad y Autenticidad</h3>
                        <p class="principio-text">
                            Como el fin último de la educación es formar seres libres, plenos e íntegros, capaces de desarrollar 
                            su personalidad al máximo. La búsqueda de la libertad y la plenitud del ser son los horizontes que 
                            guían nuestro proyecto educativo.
                        </p>
                    </div>
                    
                    <div class="principio-card">
                        <h3 class="principio-subtitle">Espiritualidad y Sentido de Vida</h3>
                        <p class="principio-text">
                            Se promueve la reflexión sobre la interconexión entre el ser humano, el mundo y la trascendencia, 
                            ofreciendo una dimensión espiritual que enriquece la interpretación de la realidad y dota de sentido 
                            a la existencia, en el marco de los valores católicos que nos inspiran.
                        </p>
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
            document.getElementById('principios-section').scrollIntoView({
                behavior: 'smooth'
            });
        }

        // Script para adaptar automáticamente el tamaño del título
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


        // Funcionalidad de navegación de principios
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.principio-tab');
    const items = document.querySelectorAll('.principio-item');
    
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const principioId = this.getAttribute('data-principio');
            
            // Remover clase active de todos los tabs
            tabs.forEach(t => t.classList.remove('active'));
            
            // Agregar clase active al tab clickeado
            this.classList.add('active');
            
            // Ocultar todos los items con animación
            items.forEach(item => {
                item.classList.remove('active');
            });
            
            // Mostrar el item correspondiente después de un breve delay
            setTimeout(() => {
                const targetItem = document.getElementById('principio-' + principioId);
                if (targetItem) {
                    targetItem.classList.add('active');
                    
                    // Scroll suave al contenido en dispositivos móviles
                    if (window.innerWidth <= 768) {
                        targetItem.scrollIntoView({ 
                            behavior: 'smooth', 
                            block: 'nearest' 
                        });
                    }
                }
            }, 150);
        });
    });
});

    </script>
</body>

</html>