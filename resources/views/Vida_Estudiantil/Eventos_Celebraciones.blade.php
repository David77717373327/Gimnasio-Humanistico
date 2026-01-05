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
                <img src="../images/Mision1.jpg"
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

        



        

    <!-- Footer del sitio -->
    <footer aria-label="Pie de página del sitio">
        @include('layouts.footer')
    </footer>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    

</body>

</html>
