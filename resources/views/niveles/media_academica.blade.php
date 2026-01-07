<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educación Media Académica | Gimnasio Humanístico del Alto Magdalena - Neiva</title>
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

    <!-- Scripts -->
    <script src="{{ asset('js/hero.js') }}" defer></script>

    <!-- CSS personalizado -->
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/basica_primaria.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/hero.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Galeria.css') }}" rel="stylesheet">
</head>

<body>

    <header class="header-top" aria-label="Encabezado principal del sitio">
        @include('layouts.header')
    </header>

    <nav class="nav-sticky" aria-label="Navegación principal">
        @include('layouts.navigation')
    </nav>

    <main id="main" role="main">

        <!-- HERO -->
        <section class="hero-section" aria-label="Educación Media Académica en Neiva">
            <div class="hero-background">
                <img src="../images/Educacion Secundaria/Imagen1.jpg"
                    alt="Instalaciones del colegio en Neiva enfocadas en educación media académica" 
                    width="1920"
                    height="1080" 
                    loading="lazy">
            </div>

            <div class="hero-overlay"></div>
            <div class="hero-particles" aria-hidden="true"></div>

            <div class="container hero-container">
                <div class="hero-content">
                    <h1 class="hero-title" data-title="Nuestra Identidad Institucional">
                        Educación Media Académica
                    </h1>

                    <div class="hero-scroll-indicator" onclick="scrollToContent()" role="button" tabindex="0"
                        aria-label="Ir a contenido principal" onkeypress="if(event.key==='Enter')scrollToContent()">
                        <i class="fas fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </section>

        
        <!-- Título SEO -->
        <header class="admision-nav-header" id="siguiente_sesion">
            <h2 class="admision-nav-title">Objetivos Media Académica</h2>
        </header>


        <div class="objetivos-split-container">
            <!-- Panel de Navegación -->
            <div class="objetivos-nav-panel">

                <!-- Profundización Académica -->
                <div class="objetivos-nav-item active" data-category="profundizacion">
                    <div class="objetivos-nav-number">01</div>
                    <div class="objetivos-nav-content">
                        <div class="objetivos-nav-title">Profundización Académica</div>
                        <div class="objetivos-nav-subtitle">2 objetivos</div>
                    </div>
                </div>

                <!-- Preparación para Educación Superior -->
                <div class="objetivos-nav-item" data-category="superior">
                    <div class="objetivos-nav-number">02</div>
                    <div class="objetivos-nav-content">
                        <div class="objetivos-nav-title">Preparación para Educación Superior</div>
                        <div class="objetivos-nav-subtitle">3 objetivos</div>
                    </div>
                </div>

                <!-- Trabajo y Emprendimiento -->
                <div class="objetivos-nav-item" data-category="trabajo">
                    <div class="objetivos-nav-number">03</div>
                    <div class="objetivos-nav-content">
                        <div class="objetivos-nav-title">Trabajo y Emprendimiento</div>
                        <div class="objetivos-nav-subtitle">3 objetivos</div>
                    </div>
                </div>

                <!-- Formación Humana y Ciudadana -->
                <div class="objetivos-nav-item" data-category="formacion">
                    <div class="objetivos-nav-number">04</div>
                    <div class="objetivos-nav-content">
                        <div class="objetivos-nav-title">Formación Humana y Ciudadana</div>
                        <div class="objetivos-nav-subtitle">4 objetivos</div>
                    </div>
                </div>
            </div>

            <!-- Panel de Contenido -->
            <div class="objetivos-content-panel">

                <!-- PROFUNDIZACIÓN ACADÉMICA -->
                <!-- Objetivo 1 -->
                <div class="objetivos-content-item active" data-category="profundizacion" data-index="0">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">01</div>
                        <div class="objetivos-content-title-group">
                            <h2>Consolidación de Saberes</h2>
                            <p class="objetivos-content-category">Profundización Académica • 1 de 2</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        Buscamos que nuestros estudiantes consoliden sus saberes en las áreas obligatorias y fundamentales, fortaleciendo las competencias desarrolladas durante la educación básica para alcanzar un dominio profundo de cada disciplina.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>La profundización permite que el estudiante afiance contenidos clave y adquiera autonomía para estudiar con mayor rigor en su campo de interés.</p>
                    </div>
                </div>

                <!-- Objetivo 2 -->
                <div class="objetivos-content-item" data-category="profundizacion" data-index="1">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">02</div>
                        <div class="objetivos-content-title-group">
                            <h2>Exploración Personalizada</h2>
                            <p class="objetivos-content-category">Profundización Académica • 2 de 2</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        Ofrecemos la oportunidad de explorar y profundizar en aquellas disciplinas que se alineen con los intereses, aptitudes y proyecto de vida de cada estudiante, facilitando el descubrimiento de su vocación profesional.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>Permite al estudiante identificar rutas formativas y vocacionales, aumentando la motivación y la conexión con su proyecto de vida.</p>
                    </div>
                </div>

                <!-- PREPARACIÓN PARA EDUCACIÓN SUPERIOR -->
                <!-- Objetivo 3 -->
                <div class="objetivos-content-item" data-category="superior" data-index="0">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">01</div>
                        <div class="objetivos-content-title-group">
                            <h2>Competencias Académicas Universitarias</h2>
                            <p class="objetivos-content-category">Preparación para Educación Superior • 1 de 3</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        Nuestro currículo y metodología están diseñados para desarrollar las competencias académicas y habilidades de pensamiento crítico que son indispensables para el éxito en el nivel universitario, garantizando una formación integral y rigurosa.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>Desarrolla las competencias que facilitan la adaptación a exigencias académicas superiores y el pensamiento autónomo.</p>
                    </div>
                </div>

                <!-- Objetivo 4 -->
                <div class="objetivos-content-item" data-category="superior" data-index="1">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">02</div>
                        <div class="objetivos-content-title-group">
                            <h2>Excelencia en Pruebas Saber 11</h2>
                            <p class="objetivos-content-category">Preparación para Educación Superior • 2 de 3</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        Preparamos a los estudiantes para un desempeño sobresaliente en las pruebas de Estado Saber 11, proporcionando las herramientas y estrategias necesarias para obtener resultados destacados que faciliten su ingreso a instituciones de educación superior de calidad.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>Mejorar resultados en las pruebas estatales amplía opciones de admisión y acceso a becas y programas de alto nivel.</p>
                    </div>
                </div>

                <!-- Objetivo 5 -->
                <div class="objetivos-content-item" data-category="superior" data-index="2">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">03</div>
                        <div class="objetivos-content-title-group">
                            <h2>Transición Exitosa</h2>
                            <p class="objetivos-content-category">Preparación para Educación Superior • 3 de 3</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        Facilitamos una transición exitosa a la vida académica superior, desarrollando autonomía, habilidades de investigación, gestión del tiempo y todas las competencias necesarias para enfrentar con éxito los desafíos universitarios.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>Prepara a los estudiantes para los retos organizativos y académicos de la universidad, reduciendo el abandono y mejorando desempeño.</p>
                    </div>
                </div>

                <!-- TRABAJO Y EMPRENDIMIENTO -->
                <!-- Objetivo 6 -->
                <div class="objetivos-content-item" data-category="trabajo" data-index="0">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">01</div>
                        <div class="objetivos-content-title-group">
                            <h2>Vinculación al Mundo Laboral</h2>
                            <p class="objetivos-content-category">Trabajo y Emprendimiento • 1 de 3</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        Capacitamos a los estudiantes con las habilidades y conocimientos necesarios para que puedan vincularse al mundo laboral de manera exitosa, desarrollando competencias técnicas y blandas valoradas en el mercado actual.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>Facilita la inserción laboral y la empleabilidad mediante formación práctica y orientación ocupacional.</p>
                    </div>
                </div>

                <!-- Objetivo 7 -->
                <div class="objetivos-content-item" data-category="trabajo" data-index="1">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">02</div>
                        <div class="objetivos-content-title-group">
                            <h2>Pensamiento Emprendedor</h2>
                            <p class="objetivos-content-category">Trabajo y Emprendimiento • 2 de 3</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        Fomentamos el pensamiento emprendedor, la creatividad y la capacidad de resolver problemas, desarrollando habilidades esenciales para el siglo XXI que permitan a nuestros estudiantes crear oportunidades y generar valor en cualquier contexto.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>Incentiva la autonomía, la creatividad y la capacidad de generar proyectos y empresas sostenibles.</p>
                    </div>
                </div>

                <!-- Objetivo 8 -->
                <div class="objetivos-content-item" data-category="trabajo" data-index="2">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">03</div>
                        <div class="objetivos-content-title-group">
                            <h2>Competencias del Siglo XXI</h2>
                            <p class="objetivos-content-category">Trabajo y Emprendimiento • 3 de 3</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        Desarrollamos competencias clave como trabajo en equipo, comunicación efectiva, adaptabilidad, pensamiento crítico y alfabetización digital, preparando profesionales integrales capaces de enfrentar los retos de un mundo en constante transformación.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>Estas competencias son demandadas por empleadores y esenciales para el éxito personal y profesional.</p>
                    </div>
                </div>

                <!-- FORMACIÓN HUMANA Y CIUDADANA -->
                <!-- Objetivo 9 -->
                <div class="objetivos-content-item" data-category="formacion" data-index="0">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">01</div>
                        <div class="objetivos-content-title-group">
                            <h2>Formación en Valores</h2>
                            <p class="objetivos-content-category">Formación Humana y Ciudadana • 1 de 4</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        Consolidamos la formación en valores, el respeto, la responsabilidad y la autonomía, fortaleciendo el carácter y la integridad de nuestros estudiantes como fundamento de su desarrollo personal y profesional.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>Los valores guían el comportamiento ético y la convivencia democrática en la comunidad educativa y la sociedad.</p>
                    </div>
                </div>

                <!-- Objetivo 10 -->
                <div class="objetivos-content-item" data-category="formacion" data-index="1">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">02</div>
                        <div class="objetivos-content-title-group">
                            <h2>Ciudadanía Activa y Ética</h2>
                            <p class="objetivos-content-category">Formación Humana y Ciudadana • 2 de 4</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        Nuestro objetivo es que los estudiantes se conviertan en ciudadanos activos, éticos y conscientes de su rol en la construcción de una sociedad más justa, equitativa y solidaria, comprometidos con el bienestar colectivo.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>Promueve la participación ciudadana responsable y el compromiso con la comunidad y las normas democráticas.</p>
                    </div>
                </div>

                <!-- Objetivo 11 -->
                <div class="objetivos-content-item" data-category="formacion" data-index="2">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">03</div>
                        <div class="objetivos-content-title-group">
                            <h2>Solidaridad y Responsabilidad Social</h2>
                            <p class="objetivos-content-category">Formación Humana y Ciudadana • 3 de 4</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        Fomentamos la conciencia de solidaridad y la responsabilidad social, desarrollando la empatía y el compromiso con las comunidades vulnerables, promoviendo acciones concretas de servicio y transformación social.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>La solidaridad forma ciudadanos comprometidos con la justicia social y el bienestar colectivo.</p>
                    </div>
                </div>

                <!-- Objetivo 12 -->
                <div class="objetivos-content-item" data-category="formacion" data-index="3">
                    <div class="objetivos-content-header">
                        <div class="objetivos-content-number">04</div>
                        <div class="objetivos-content-title-group">
                            <h2>Identidad Cultural y Ambiental</h2>
                            <p class="objetivos-content-category">Formación Humana y Ciudadana • 4 de 4</p>
                        </div>
                    </div>
                    <p class="objetivos-content-text">
                        Promovemos que los estudiantes valoren y respeten la diversidad cultural y la rica naturaleza de nuestro país, desarrollando una identidad cultural sólida y una conciencia ambiental que impulse la conservación y el desarrollo sostenible.
                    </p>
                    <div class="objetivos-content-highlight">
                        <h3>¿Por qué es importante?</h3>
                        <p>Fortalece el sentido de pertenencia y la responsabilidad frente al cuidado del patrimonio natural y cultural.</p>
                    </div>
                </div>

                <!-- Navegación entre objetivos -->
                <div class="objetivos-content-navigation">
                    <button class="objetivos-nav-btn objetivos-prev" id="objetivosPrevBtn">
                        ← Anterior
                    </button>
                    <button class="objetivos-nav-btn objetivos-next" id="objetivosNextBtn">
                        Siguiente →
                    </button>
                </div>
            </div>
        </div>


        <!-- GALERÍA -->
        <section aria-label="Galería de momentos especiales en el preescolar de Neiva">
            <header class="gallery-header">
                <h2 class="gallery-title">Momentos Especiales</h2>
                <p class="gallery-subtitle">
                    Actividades, juegos y aprendizajes que viven nuestros estudiantes de educación inicial y preescolar.
                </p>
            </header>

            <!-- Modal Lightbox -->
            <div class="lightbox" id="lightbox">
                <button class="lightbox-close" onclick="closeLightbox()" aria-label="Cerrar galería">&times;</button>
                <button class="lightbox-nav lightbox-prev" onclick="changeImage(-1)"
                    aria-label="Imagen anterior">&#10094;</button>

                <div class="lightbox-content">
                    <img id="lightbox-img" src="" alt="Imagen ampliada">
                </div>

                <button class="lightbox-nav lightbox-next" onclick="changeImage(1)"
                    aria-label="Siguiente imagen">&#10095;</button>
            </div>

            <!-- GRID -->
            <div class="gallery-container">
                <div class="gallery-grid">

                    <article class="gallery-item" onclick="openLightbox(0)">
                        <img src="images/Media Academica/Imagen1.jpg" alt="Niños jugando en el aula del preescolar"
                            loading="lazy">
                    </article>

                    <article class="gallery-item" onclick="openLightbox(1)">
                        <img src="images/Media Academica/Imagen2.jpg" alt="Actividades creativas para primera infancia"
                            loading="lazy">
                    </article>

                    <article class="gallery-item" onclick="openLightbox(2)">
                        <img src="images/Media Academica/Imagen3.jpg" alt="Aprendizaje colaborativo en preescolar"
                            loading="lazy">
                    </article>

                    <article class="gallery-item" onclick="openLightbox(3)">
                        <img src="images/Media Academica/Imagen4.jpg" alt="Exploración educativa al aire libre"
                            loading="lazy">
                    </article>

                    <article class="gallery-item" onclick="openLightbox(4)">
                        <img src="images/Media Academica/Imagen5.jpg" alt="Juego libre y diversión en el colegio" loading="lazy">
                    </article>

                    <article class="gallery-item" onclick="openLightbox(5)">
                        <img src="images/Media Academica/Imagen6.jpg" alt="Desarrollo integral y acompañamiento docente"
                            loading="lazy">
                    </article>

                    <article class="gallery-item" onclick="openLightbox(6)">
                        <img src="images/Media Academica/Imagen7.jpg" alt="Momentos de aprendizaje diario" loading="lazy">
                    </article>

                </div>
            </div>
        </section>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
    const navItems = document.querySelectorAll('.objetivos-nav-item');
    const contentItems = document.querySelectorAll('.objetivos-content-item');
    const prevBtn = document.getElementById('objetivosPrevBtn');
    const nextBtn = document.getElementById('objetivosNextBtn');
    
    let currentCategory = 'profundizacion'; // ✅ CORRECTO
    let currentIndex = 0;
    let isTransitioning = false; // ✅ AGREGADO: previene clics múltiples

    function getObjectivesByCategory(category) {
        return Array.from(contentItems).filter(item => 
            item.getAttribute('data-category') === category
        );
    }

    function showContent(category, index) {
        if (isTransitioning) return; // ✅ AGREGADO: previene transiciones múltiples
        isTransitioning = true;

        const categoryObjectives = getObjectivesByCategory(category);
        
        // Paso 1: Agregar clase fade-out al contenido actual
        contentItems.forEach(item => {
            if (item.classList.contains('active')) {
                item.classList.add('fade-out');
            }
        });
        
        // Paso 2: Esperar que termine la animación de salida (300ms)
        setTimeout(() => {
            // Remover todas las clases active y fade-out
            contentItems.forEach(item => {
                item.classList.remove('active');
                item.classList.remove('fade-out');
            });
            
            // Paso 3: Mostrar el nuevo contenido
            if (categoryObjectives[index]) {
                categoryObjectives[index].classList.add('active');
            }

            // Actualizar botones
            prevBtn.disabled = index === 0;
            nextBtn.disabled = index === categoryObjectives.length - 1;

            // Scroll suave al inicio
            document.querySelector('.objetivos-content-panel').scrollTo({
                top: 0,
                behavior: 'smooth'
            });

            // Actualizar variables
            currentCategory = category;
            currentIndex = index;
            
            // Permitir nuevas transiciones después de que termine la animación de entrada
            setTimeout(() => {
                isTransitioning = false;
            }, 400);
            
        }, 300); // ✅ CORREGIDO: era 150ms, ahora 300ms para coincidir con la animación CSS
    }

    navItems.forEach((item) => {
        item.addEventListener('click', function() {
            if (isTransitioning) return; // ✅ AGREGADO: previene clics durante transiciones
            
            const category = this.getAttribute('data-category');
            
            navItems.forEach(nav => nav.classList.remove('active'));
            this.classList.add('active');
            
            showContent(category, 0);
        });
    });

    prevBtn.addEventListener('click', function() {
        if (currentIndex > 0 && !isTransitioning) { // ✅ AGREGADO: verificación de transición
            showContent(currentCategory, currentIndex - 1);
        }
    });

    nextBtn.addEventListener('click', function() {
        const categoryObjectives = getObjectivesByCategory(currentCategory);
        if (currentIndex < categoryObjectives.length - 1 && !isTransitioning) { // ✅ AGREGADO: verificación de transición
            showContent(currentCategory, currentIndex + 1);
        }
    });

    // Inicializar
    showContent('profundizacion', 0); // ✅ CORRECTO
});

function scrollToContent() {
    document.getElementById('siguiente_sesion').scrollIntoView({ 
        behavior: 'smooth' 
    });
}







        // Array con todas las imágenes de la galería (7 imágenes)
    const galleryImages = [
        { src: 'images/Media_Academica.jpg', alt: 'Niños jugando en el aula' },
        { src: 'images/Dansas.jpg', alt: 'Actividades creativas' },
        { src: 'images/Dansas.jpg', alt: 'Aprendizaje en grupo' },
        { src: 'images/Mision1.jpg', alt: 'Exploración educativa' },
        { src: 'images/iniciooo2.jpeg', alt: 'Tiempo de juego y diversión' },
        { src: 'images/Mision1.jpg', alt: 'Desarrollo integral' },
        { src: 'images/Primariaa.jpeg', alt: 'Momentos de aprendizaje' }
    ];

    let currentImageIndex = 0;

    // Mostrar u ocultar flechas según posición
    function updateArrows() {
        const prevBtn = document.querySelector('.lightbox-prev');
        const nextBtn = document.querySelector('.lightbox-next');

        // Primera imagen → esconder flecha izquierda
        prevBtn.style.display = currentImageIndex === 0 ? "none" : "block";

        // Última imagen → esconder flecha derecha
        nextBtn.style.display = currentImageIndex === galleryImages.length - 1 ? "none" : "block";
    }

    // Abrir lightbox
    function openLightbox(index) {
        currentImageIndex = index;

        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');

        lightboxImg.src = galleryImages[index].src;
        lightboxImg.alt = galleryImages[index].alt;
        lightbox.classList.add('active');

        updateArrows(); // Actualizar flechas al abrir

        document.body.style.overflow = 'hidden';
    }

    // Cerrar lightbox
    function closeLightbox() {
        document.getElementById('lightbox').classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    // Cambiar imagen sin bucle infinito
    function changeImage(direction) {
        currentImageIndex += direction;

        // Limitar índices
        if (currentImageIndex < 0) currentImageIndex = 0;
        if (currentImageIndex >= galleryImages.length)
            currentImageIndex = galleryImages.length - 1;

        const lightboxImg = document.getElementById('lightbox-img');

        lightboxImg.style.opacity = '0';

        setTimeout(() => {
            lightboxImg.src = galleryImages[currentImageIndex].src;
            lightboxImg.alt = galleryImages[currentImageIndex].alt;
            lightboxImg.style.opacity = '1';
        }, 200);

        updateArrows(); // Actualizar flechas cada vez que cambias imagen
    }

    // Cerrar con tecla ESC y navegar con flechas
    document.addEventListener('keydown', function(e) {
        const lightbox = document.getElementById('lightbox');

        if (e.key === 'Escape') closeLightbox();

        if (lightbox.classList.contains('active')) {
            if (e.key === 'ArrowLeft') changeImage(-1);
            if (e.key === 'ArrowRight') changeImage(1);
        }
    });

    // Cerrar al hacer clic fuera de la imagen
    document.getElementById('lightbox').addEventListener('click', function(e) {
        if (e.target === this) closeLightbox();
    });

    // Prevenir cierres al hacer clic en botones
    document.querySelector('.lightbox-close').addEventListener('click', e => e.stopPropagation());
    document.querySelector('.lightbox-prev').addEventListener('click', e => e.stopPropagation());
    document.querySelector('.lightbox-next').addEventListener('click', e => e.stopPropagation());

    // Transición suave
    document.getElementById('lightbox-img').style.transition = 'opacity 0.3s ease';
        

        </script>

    </main>

    <!-- Incluir el footer -->
    @include('layouts.footer')

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>