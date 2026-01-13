<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Descubre los proyectos de vida del Gimnasio Humanístico del Alto Magdalena en Neiva. Más de 40 años formando líderes con excelencia académica y valores humanísticos.">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#0d3f27">
    <title>Eventos y Celebraciones | Gimnasio Humanístico del Alto Magdalena - Neiva</title>
    <!-- Canonical URL -->
    <link rel="canonical" href="https://tusitio.com/eventos-celebraciones">
    <!-- Preconnect para optimización de fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!--Scrip para el hero -->
    <script src="{{ asset('js/hero.js') }}"></script>
    <!-- Google Fonts con preload opcional -->
    <link rel="preload"
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Open+Sans:wght@300;400;500;600;700&display=swap"
        as="style">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Open+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Bootstrap y Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/Logo.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/Logo.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/Logo.png') }}">
    <!-- CSS personalizado -->
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Eventos_Celebraciones.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/hero.css') }}" rel="stylesheet">
</head>

<body>

    <header class="header-top" aria-label="Encabezado principal del sitio">
        @include('layouts.header') <!-- AQUÍ SOLO LOGO, TITULO -->
    </header>

    <nav class="nav-sticky" aria-label="Navegación principal">
        @include('layouts.navigation') <!-- AQUÍ SOLO EL MENU -->
    </nav>

    <!-- Contenido principal -->
    <main id="main" role="main">

        <!-- HERO SECTION -->
        <section class="hero-section" aria-label="Sección destacada de eventos">
            <div class="hero-background">
                <img src="../images/Educacion Secundaria/Imagen1.jpg"
                    alt="Vista del Gimnasio Humanístico del Alto Magdalena, institución educativa en Neiva"
                    width="1920" height="1080">
            </div>
            <div class="hero-overlay"></div>
            <div class="hero-particles" aria-hidden="true"></div>

            <div class="container hero-container">
                <div class="hero-content">
                    <h1 class="hero-title" data-title="Eventos y Celebraciones">Eventos y Celebraciones</h1>
                    <div class="hero-scroll-indicator" onclick="scrollToContent()" role="button" tabindex="0"
                        aria-label="Desplazarse a la siguiente sección"
                        onkeypress="if(event.key==='Enter')scrollToContent()">
                        <i class="fas fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- Navegación de Tabs -->
        <section class="eventos-tabs" id="siguiente_sesion" aria-label="Navegación de eventos y celebraciones">
            <div class="container">
                <div class="tabs-wrapper" id="tabsWrapper">
                    <!-- Tabs se generan dinámicamente -->
                </div>
            </div>
        </section>

        <!-- Contenido -->
        <section class="eventos-content">
            <div class="container">
                <div id="tabsContent">
                    <!-- Contenido de tabs se genera dinámicamente -->
                </div>
            </div>
        </section>

       <div class="lightbox" id="lightbox">
    <button class="lightbox-close" onclick="closeLightbox()" aria-label="Cerrar galería">
        <i class="fas fa-times"></i>
    </button>
    <button class="lightbox-nav lightbox-prev" onclick="navigateLightbox(-1)" aria-label="Imagen anterior">
        <i class="fas fa-chevron-left"></i>
    </button>
    <button class="lightbox-nav lightbox-next" onclick="navigateLightbox(1)" aria-label="Imagen siguiente">
        <i class="fas fa-chevron-right"></i>
    </button>
    <div class="lightbox-content">
        <img src="" alt="" class="lightbox-image" id="lightboxImage">
        <div class="lightbox-counter" id="lightboxCounter"></div>
    </div>
</div>

    </main>
    <script>





        const eventos = [
    {
        id: 'sanpedrito',
        category: 'Tradición',
        title: 'San Pedrito',
        icon: 'fa-child-reaching',
        description: 'Celebración tradicional donde nuestros estudiantes más pequeños comparten su alegría y talento en un ambiente festivo y educativo que fortalece su desarrollo integral.',
        date: 'Junio',
        images: [
            '../images/Celebraciones/sanpedro1.jpg',
            '../images/Celebraciones/sanpedro2.jpg',
            '../images/Celebraciones/sanpedro3.jpg'
        ]
    },

    


    {
        id: 'englishday',
        category: 'Académico',
        title: 'English Day',
        icon: 'fa-language',
        description: 'Jornada dedicada a la celebración del idioma inglés con actividades interactivas, presentaciones culturales y dinámicas que fortalecen el aprendizaje del idioma.',
        date: 'Septiembre',
        images: [

        '../images/Celebraciones/english day2.jpg',
            '../images/Celebraciones/english day1.jpg',
            
            '../images/Celebraciones/english day3.jpg'
        ]
    },
    {
        id: 'salidas',
        category: 'Experiencial',
        title: 'Salidas Pedagógicas',
        icon: 'fa-bus',
        description: 'Experiencias de aprendizaje fuera del aula que conectan teoría con práctica, explorando el entorno natural, histórico y cultural de nuestra región.',
        date: 'Todo el año',
        images: [
            '../images/Educacion Secundaria/Imagen1.jpg',
            '../images/Educacion Secundaria/Imagen1.jpg',
            '../images/Educacion Secundaria/Imagen1.jpg'
        ]
    },
    {
        id: 'comuniones',
        category: 'Espiritual',
        title: 'Comuniones',
        icon: 'fa-church',
        description: 'Ceremonia religiosa significativa donde nuestros estudiantes reciben el sacramento de la Eucaristía, acompañados por sus familias y comunidad educativa.',
        date: 'Mayo',
        images: [
            '../images/Celebraciones/comuniones1.jpg',
            '../images/Educacion Secundaria/Imagen1.jpg',
            '../images/Educacion Secundaria/Imagen1.jpg'
        ]
    },

    {
        id: 'confirmaciones',
        category: 'Espiritual',
        title: 'Confirmaciones',
        icon: 'fa-dove',
        description: 'Sacramento de la Confirmación donde nuestros jóvenes fortalecen su compromiso con la fe y los valores cristianos que guían nuestra institución educativa.',
        date: 'Octubre',
        images: [
            '../images/iniciooo2.jpeg',
            '../images/iniciooo2.jpeg',
            '../images/iniciooo2.jpeg'
        ]
    },


    {
        id: 'deportivo',
        category: 'Deportivo',
        title: 'Eventos Deportivos',
        icon: 'fa-medal',
        description: 'Competencia deportiva anual que promueve el trabajo en equipo, el espíritu deportivo y la vida saludable entre todos nuestros estudiantes.',
        date: 'Agosto',
        images: [
            '../images/Media Academica/Imagen6.jpg',
            '../images/Media Academica/Imagen6.jpg',
            '../images/Media Academica/Imagen6.jpg'
        ]
    }
];

// Variables para el lightbox
let currentLightboxImages = [];
let currentLightboxIndex = 0;

function renderTabs() {
    const tabsWrapper = document.getElementById('tabsWrapper');
    const tabsContent = document.getElementById('tabsContent');

    eventos.forEach((evento, index) => {
        // Crear tab button
        const tabBtn = document.createElement('button');
        tabBtn.className = `tab-btn ${index === 0 ? 'active' : ''}`;
        tabBtn.onclick = () => switchTab(evento.id);
        tabBtn.innerHTML = `
            <i class="fas ${evento.icon} tab-icon"></i>
            <span class="tab-title">${evento.title}</span>
        `;
        tabsWrapper.appendChild(tabBtn);

        // Crear tab content
        const tabPanel = document.createElement('div');
        tabPanel.className = `tab-panel ${index === 0 ? 'active' : ''}`;
        tabPanel.id = evento.id;
        tabPanel.innerHTML = `
            <div class="evento-layout">
                <div class="evento-info">
                    <span class="evento-category">${evento.category}</span>
                    <h2 class="evento-title">${evento.title}</h2>
                    <p class="evento-description">${evento.description}</p>
                    
                    <div class="evento-stats">
                        <div class="stat-box">
                            <span class="stat-number">${evento.date}</span>
                            <span class="stat-label">Fecha</span>
                        </div>
                    </div>
                </div>
                
                <div class="evento-gallery">
                    ${evento.images.map(img => `
                        <div class="gallery-item" onclick="openLightbox('${img}')">
                            <img src="${img}" alt="${evento.title}" class="gallery-img">
                            <div class="gallery-overlay">
                                <i class="fas fa-expand gallery-icon"></i>
                            </div>
                        </div>
                    `).join('')}
                </div>
            </div>
        `;
        tabsContent.appendChild(tabPanel);
    });
}

function switchTab(tabId) {
    // Desactivar todos los tabs
    document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
    document.querySelectorAll('.tab-panel').forEach(panel => panel.classList.remove('active'));

    // Activar tab seleccionado
    const selectedBtn = Array.from(document.querySelectorAll('.tab-btn')).find(btn => 
        btn.querySelector('.tab-title').textContent === eventos.find(e => e.id === tabId).title
    );
    selectedBtn.classList.add('active');
    document.getElementById(tabId).classList.add('active');
}

function openLightbox(src) {
    // Encontrar el evento actual
    const currentTab = document.querySelector('.tab-panel.active');
    const evento = eventos.find(e => e.id === currentTab.id);
    
    currentLightboxImages = evento.images;
    currentLightboxIndex = currentLightboxImages.indexOf(src);
    
    updateLightboxImage();
    
    const lightbox = document.getElementById('lightbox');
    lightbox.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function updateLightboxImage() {
    const img = document.getElementById('lightboxImage');
    const counter = document.getElementById('lightboxCounter');
    
    img.src = currentLightboxImages[currentLightboxIndex];
    counter.textContent = `${currentLightboxIndex + 1} / ${currentLightboxImages.length}`;
}

function navigateLightbox(direction) {
    currentLightboxIndex += direction;
    
    // Loop circular
    if (currentLightboxIndex < 0) {
        currentLightboxIndex = currentLightboxImages.length - 1;
    } else if (currentLightboxIndex >= currentLightboxImages.length) {
        currentLightboxIndex = 0;
    }
    
    updateLightboxImage();
}

function closeLightbox() {
    const lightbox = document.getElementById('lightbox');
    lightbox.classList.remove('active');
    document.body.style.overflow = '';
}

// Click fuera del lightbox para cerrar
document.getElementById('lightbox').addEventListener('click', function(e) {
    if (e.target === this) closeLightbox();
});

// Navegación con teclado
document.addEventListener('keydown', function(e) {
    const lightbox = document.getElementById('lightbox');
    if (lightbox.classList.contains('active')) {
        if (e.key === 'Escape') {
            closeLightbox();
        } else if (e.key === 'ArrowLeft') {
            navigateLightbox(-1);
        } else if (e.key === 'ArrowRight') {
            navigateLightbox(1);
        }
    }
});

// Inicializar al cargar la página
document.addEventListener('DOMContentLoaded', renderTabs);
    </script>


    <!-- Footer del sitio -->
    <footer aria-label="Pie de página del sitio">
        @include('layouts.footer')
    </footer>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

</body>

</html>