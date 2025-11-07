<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organigrama Institucional - GIMNASIO HUMANÍSTICO</title>
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
    <link href="{{ asset('css/organigrama.css') }}" rel="stylesheet">
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
                        <span class="title-highlight">Organigrama</span>
                        <span class="title-highlight">Institucional</span>
                    </h1>

                    <div class="hero-scroll-indicator" onclick="scrollToTimeline()">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="organigrama-section" class="organigrama-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="section-title">Estructura Organizacional</h2>
                    <p class="section-subtitle">Conoce la jerarquía y distribución de responsabilidades en nuestra
                        institución</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="organigrama-container animate-in">
                        <div class="organigrama-content-wrapper">
                            <!-- Logo en esquina superior izquierda -->
                            <div class="organigrama-logo-container">
                                <img src="{{ asset('images/Logo.png') }}" alt="Logo Colegio" class="organigrama-logo"
                                    id="logoImg">
                            </div>

                            <!-- Organigrama -->
                            <div class="organigrama-wrapper">
                                <img src="{{ asset('images/Organigrama.jpeg') }}"
                                    alt="Organigrama Institucional Gimnasio Humanístico" class="organigrama-image"
                                    id="organigrama-img" crossorigin="anonymous">
                                <div class="organigrama-overlay">
                                    <span class="overlay-text"><i class="fas fa-search-plus"></i> Click para
                                        ampliar</span>
                                </div>
                            </div>
                        </div>

                        <!-- Botón de descarga con canvas -->
                        <div class="organigrama-actions">
                            <button class="btn-download" id="downloadBtn">
                                <i class="fas fa-download"></i>
                                <span>Descargar Organigrama</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Canvas oculto para generar imagen con logo y título -->
    <canvas id="downloadCanvas"></canvas>



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
            document.getElementById('organigrama-section').scrollIntoView({
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





        document.addEventListener('DOMContentLoaded', function() {
            const downloadBtn = document.getElementById('downloadBtn');
            const organigramaImg = document.getElementById('organigrama-img');
            const logoImg = document.getElementById('logoImg');
            const canvas = document.getElementById('downloadCanvas');
            const ctx = canvas.getContext('2d');

            // Función para descargar organigrama con logo y título
            downloadBtn.addEventListener('click', function() {
                // Crear nuevas imágenes para asegurar que se carguen
                const img = new Image();
                const logo = new Image();

                img.crossOrigin = "anonymous";
                logo.crossOrigin = "anonymous";

                let imagesLoaded = 0;

                function checkImagesLoaded() {
                    imagesLoaded++;
                    if (imagesLoaded === 2) {
                        generateDownload();
                    }
                }

                img.onload = checkImagesLoaded;
                logo.onload = checkImagesLoaded;

                img.src = organigramaImg.src;
                logo.src = logoImg.src;

                function generateDownload() {
                    // Dimensiones
                    const padding = 60;
                    const logoSize = 120;
                    const titleHeight = 80;
                    const spacing = 40;

                    canvas.width = img.width + (padding * 2);
                    canvas.height = img.height + titleHeight + spacing + (padding * 2);

                    // Fondo blanco
                    ctx.fillStyle = '#ffffff';
                    ctx.fillRect(0, 0, canvas.width, canvas.height);

                    // Dibujar logo en esquina superior izquierda
                    ctx.drawImage(logo, padding, padding, logoSize, logoSize);

                    // Título centrado
                    ctx.fillStyle = '#1a1a1a';
                    ctx.font = 'bold 36px Playfair Display, serif';
                    ctx.textAlign = 'center';
                    ctx.fillText('ORGANIGRAMA INSTITUCIONAL', canvas.width / 2, padding + 50);

                    ctx.font = '20px Open Sans, sans-serif';
                    ctx.fillStyle = '#666666';
                    ctx.fillText('Gimnasio Humanístico', canvas.width / 2, padding + 85);

                    // Dibujar organigrama
                    ctx.drawImage(img, padding, padding + titleHeight + spacing, img.width, img.height);

                    // Descargar
                    canvas.toBlob(function(blob) {
                        const url = URL.createObjectURL(blob);
                        const a = document.createElement('a');
                        a.href = url;
                        a.download = 'Organigrama_Gimnasio_Humanistico.png';
                        document.body.appendChild(a);
                        a.click();
                        document.body.removeChild(a);
                        URL.revokeObjectURL(url);
                    }, 'image/png');
                }
            });

            // Click para ampliar (funcionalidad básica)
            organigramaImg.addEventListener('click', function() {
                const modal = document.createElement('div');
                modal.style.cssText =
                    'position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.9);z-index:9999;display:flex;align-items:center;justify-content:center;cursor:pointer;';

                const img = document.createElement('img');
                img.src = this.src;
                img.style.cssText = 'max-width:90%;max-height:90%;object-fit:contain;';

                modal.appendChild(img);
                document.body.appendChild(modal);
                document.body.style.overflow = 'hidden';

                modal.addEventListener('click', function() {
                    document.body.removeChild(modal);
                    document.body.style.overflow = 'auto';
                });
            });
        });
    </script>
</body>

</html>
