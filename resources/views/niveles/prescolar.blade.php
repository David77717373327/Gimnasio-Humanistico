<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educacion Inicial - Prescolar</title>
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
    <link href="{{ asset('css/prescolar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/hero.css') }}" rel="stylesheet">
</head>

<body>

    <header class="header-top" aria-label="Encabezado principal del sitio">
        @include('layouts.header')
    </header>

    <nav class="nav-sticky" aria-label="Navegación principal">
        @include('layouts.navigation')
    </nav>

    <!-- Contenido principal -->
    <main id="main" role="main">

    <!-- HERO -->
    <section class="hero-section" aria-label="Sección principal de símbolos institucionales">
        <div class="hero-background">
            <img src="../images/Mision1.jpg" alt="Instalaciones del Gimnasio Humanístico de Neiva" width="1920" height="1080" loading="lazy">
        </div>
        <div class="hero-overlay"></div>
        <div class="hero-particles" aria-hidden="true"></div>

        <div class="container hero-container">
            <div class="hero-content">
                <h1 class="hero-title" data-title="Nuestra Identidad Institucional">Educacion Inicial - Prescolar</h1>
                <div class="hero-scroll-indicator" onclick="scrollToContent()" role="button" tabindex="0" aria-label="Desplazarse a la siguiente sección" onkeypress="if(event.key==='Enter')scrollToContent()">
                    <i class="fas fa-chevron-down" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </section>


    <!-- Sección Principal de Contenido Preescolar -->
    <section class="preescolar-content" id="siguiente_sesion">

        <!-- Metodología Activa - Rediseño -->
        <div class="metodologia-section">
            <div class="container">

                <!-- Header de la sección con logo -->
                <div class="admision-nav-header">
                        <h2 class="admision-nav-title">Propósitos Educación Inicial</h2>
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
                                La educación inicial busca que los niños se reconozcan como sujetos activos de su
                                aprendizaje,
                                desarrollando sus capacidades mediante experiencias de exploración, comunicación, juego
                                y convivencia.
                            </p>

                            <div class="metodologia-list">

                                <!-- Propósito 1 -->
                                <div class="metodologia-item">
                                    <div class="metodologia-number">01</div>
                                    <div class="metodologia-text">
                                        <h4>Construir su identidad en relación con los otros</h4>
                                        <p>
                                            Promovemos que los niños se reconozcan como personas únicas, capaces de
                                            convivir, compartir y construir vínculos afectivos
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
                                            Fomentamos diversas formas de expresión —oral, corporal, artística y
                                            simbólica—
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
                                            los niños descubren, experimentan y construyen conocimiento de forma
                                            significativa y placentera.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>          
    </section>





    <!--  Galeria Imagnes-->
<section>
    <div class="gallery-header">
        <h2 class="gallery-title">Momentos Especiales</h2>
        <p class="gallery-subtitle">Momentos especiales de aprendizaje, exploración y diversión en nuestro preescolar</p>
    </div>

    <!-- Lightbox Modal -->
    <div class="lightbox" id="lightbox">
        <button class="lightbox-close" onclick="closeLightbox()">&times;</button>
        <button class="lightbox-nav lightbox-prev" onclick="changeImage(-1)">&#10094;</button>
        <div class="lightbox-content">
            <img id="lightbox-img" src="" alt="Imagen ampliada">
        </div>
        <button class="lightbox-nav lightbox-next" onclick="changeImage(1)">&#10095;</button>
    </div>

    <div class="gallery-container">
        <div class="gallery-grid">
            <!-- Primera fila: 3 imágenes -->
            <div class="gallery-item" onclick="openLightbox(0)">
                <img src="images/Primariaa.jpeg" 
                     alt="Niños jugando en el aula" 
                     loading="lazy">
            </div>
            <div class="gallery-item" onclick="openLightbox(1)">
                <img src="images/Dansas.jpg" 
                     alt="Actividades creativas" 
                     loading="lazy">
            </div>
            <div class="gallery-item" onclick="openLightbox(2)">
                <img src="images/Educacion_Inicila.jpg" 
                     alt="Aprendizaje en grupo" 
                     loading="lazy">
            </div>

            <!-- Segunda fila: 4 imágenes -->
            <div class="gallery-item" onclick="openLightbox(3)">
                <img src="images/Educacion_Primaria.webp" 
                     alt="Exploración educativa" 
                     loading="lazy">
            </div>
            <div class="gallery-item" onclick="openLightbox(4)">
                <img src="images/iniciooo2.jpeg" 
                     alt="Tiempo de juego y diversión" 
                     loading="lazy">
            </div>
            <div class="gallery-item" onclick="openLightbox(5)">
                <img src="images/iniciooo2.jpeg" 
                     alt="Arte y creatividad" 
                     loading="lazy">
            </div>
            <div class="gallery-item" onclick="openLightbox(6)">
                <img src="images/Mision1.jpg" 
                     alt="Desarrollo integral" 
                     loading="lazy">
            </div>

            <!-- Tercera fila: 3 imágenes -->
            <div class="gallery-item" onclick="openLightbox(7)">
                <img src="images/Primariaa.jpeg" 
                     alt="Momentos de aprendizaje" 
                     loading="lazy">
            </div>
            <div class="gallery-item" onclick="openLightbox(8)">
                <img src="images/Dansas.jpg" 
                     alt="Expresión artística" 
                     loading="lazy">
            </div>
            <div class="gallery-item" onclick="openLightbox(9)">
                <img src="images/Educacion_Inicila.jpg" 
                     alt="Creciendo juntos" 
                     loading="lazy">
            </div>
        </div>
    </div>
</section>




    <!-- Incluir el footer -->
    @include('layouts.footer')

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

    <script>
    // Array con todas las imágenes de la galería
    const galleryImages = [
        { src: 'images/Primariaa.jpeg', alt: 'Niños jugando en el aula' },
        { src: 'images/Dansas.jpg', alt: 'Actividades creativas' },
        { src: 'images/Educacion_Inicila.jpg', alt: 'Aprendizaje en grupo' },
        { src: 'images/Educacion_Primaria.webp', alt: 'Exploración educativa' },
        { src: 'images/iniciooo2.jpeg', alt: 'Tiempo de juego y diversión' },
        { src: 'images/iniciooo2.jpeg', alt: 'Arte y creatividad' },
        { src: 'images/Mision1.jpg', alt: 'Desarrollo integral' },
        { src: 'images/Primariaa.jpeg', alt: 'Momentos de aprendizaje' },
        { src: 'images/Dansas.jpg', alt: 'Expresión artística' },
        { src: 'images/Educacion_Inicila.jpg', alt: 'Creciendo juntos' }
    ];

    let currentImageIndex = 0;

    // Abrir lightbox
    function openLightbox(index) {
        currentImageIndex = index;
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        
        lightboxImg.src = galleryImages[index].src;
        lightboxImg.alt = galleryImages[index].alt;
        lightbox.classList.add('active');
        
        // Prevenir scroll del body
        document.body.style.overflow = 'hidden';
    }

    // Cerrar lightbox
    function closeLightbox() {
        const lightbox = document.getElementById('lightbox');
        lightbox.classList.remove('active');
        
        // Restaurar scroll del body
        document.body.style.overflow = 'auto';
    }

    // Cambiar imagen (prev/next)
    function changeImage(direction) {
        currentImageIndex += direction;
        
        // Loop infinito
        if (currentImageIndex < 0) {
            currentImageIndex = galleryImages.length - 1;
        } else if (currentImageIndex >= galleryImages.length) {
            currentImageIndex = 0;
        }
        
        const lightboxImg = document.getElementById('lightbox-img');
        lightboxImg.src = galleryImages[currentImageIndex].src;
        lightboxImg.alt = galleryImages[currentImageIndex].alt;
    }

    // Cerrar con tecla ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeLightbox();
        }
    });

    // Navegación con flechas del teclado
    document.addEventListener('keydown', function(e) {
        const lightbox = document.getElementById('lightbox');
        if (lightbox.classList.contains('active')) {
            if (e.key === 'ArrowLeft') {
                changeImage(-1);
            } else if (e.key === 'ArrowRight') {
                changeImage(1);
            }
        }
    });

    // Cerrar al hacer clic fuera de la imagen
    document.getElementById('lightbox').addEventListener('click', function(e) {
        if (e.target === this) {
            closeLightbox();
        }
    });
</script>
</body>
</html>
