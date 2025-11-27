<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO -->
    <title>Equipo Directivo | Gimnasio Humanístico</title>
    <meta name="description"
        content="Conoce al equipo directivo del Gimnasio Humanístico. Liderazgo académico, visión humanística, gestión educativa moderna y compromiso con la excelencia institucional.">
    <link rel="canonical" href="https://gimnasiohumanistico.edu/directivos">

    <!-- Open Graph -->
    <meta property="og:title" content="Equipo Directivo | Gimnasio Humanístico">
    <meta property="og:description"
        content="Líderes comprometidos con la excelencia educativa y el enfoque humanístico del Gimnasio Humanístico.">
    <meta property="og:image" content="{{ asset('images/Politica_de_calidad2.webp') }}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="es_ES">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Equipo Directivo | Gimnasio Humanístico">
    <meta name="twitter:description"
        content="Conoce a los líderes que guían el proyecto educativo del Gimnasio Humanístico.">

    <!-- Icono -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/Logo.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Open+Sans:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap y Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- CSS personalizado -->
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Directivos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/hero.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navegacion.css') }}" rel="stylesheet">

    <!-- Script Hero -->
    <script src="{{ asset('js/hero.js') }}" defer></script>


    @verbatim
        <!-- JSON-LD STRUCTURED DATA -->
        <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "EducationalOrganization",
      "name": "Gimnasio Humanístico",
      "url": "https://gimnasiohumanistico.edu",
      "logo": "{{ asset('images/Logo.png') }}",
      "description": "Institución educativa con enfoque humanístico, comprometida con la excelencia académica, la formación integral y la innovación pedagógica.",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Neiva",
        "addressRegion": "Huila",
        "addressCountry": "Colombia"
      },
      "employee": [
        {
          "@type": "Person",
          "name": "Dra. Silvia Cristina Ruiz Campos",
          "jobTitle": "Rectora",
          "image": "{{ asset('images/Logo.png') }}",
          "description": "Líder educativa con más de 25 años de experiencia. Encabezando el proyecto educativo humanístico."
        },
        {
          "@type": "Person",
          "name": "Lic. XXXX",
          "jobTitle": "Coordinadora Académica",
          "image": "https://images.unsplash.com/photo-1580489944761-15a19d654956?w=800&h=1000&fit=crop",
          "description": "Encargada de coordinar los procesos académicos y garantizar la implementación del modelo pedagógico humanístico."
        }
      ]
    }
    </script>
    @endverbatim

</head>

<body>

    <header class="header-top" aria-label="Encabezado principal del sitio">
        @include('layouts.header')
    </header>

    <nav class="nav-sticky" aria-label="Navegación principal del sitio">
        @include('layouts.navigation')
    </nav>

    <main>

        <!-- HERO -->
        <section class="hero-section" aria-label="Equipo Directivo del Gimnasio Humanístico">
            <div class="hero-background">
                <img src="{{ asset('images/Politica_de_calidad2.webp') }}"
                    alt="Instalaciones del Gimnasio Humanístico en Neiva, Colombia" width="1920" height="1080"
                    loading="lazy">
            </div>

            <div class="hero-overlay"></div>

            <div class="container hero-container">
                <div class="hero-content">
                    <h1 class="hero-title" data-title="Liderazgo Institucional">Equipo Directivo</h1>

                    <div class="hero-scroll-indicator" onclick="scrollToContent()" role="button" tabindex="0"
                        aria-label="Desplazarse a la siguiente sección"
                        onkeypress="if(event.key==='Enter')scrollToContent()">
                        <i class="fas fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECCIÓN DIRECTIVOS -->
        <section class="directivos-section" id="siguiente_sesion">
            <div class="container">

                <!-- RECTORa -->
                <article class="directivo-item">
                    <div class="directivo-image">
                        <div class="image-accent"></div>
                        <div class="image-wrapper">
                            <img src="{{ asset('images/Logo.png') }}"
                                alt="Retrato de la Rectora Silvia Cristina Ruiz Campos del Gimnasio Humanístico"
                                width="600" height="600" loading="lazy">
                        </div>
                    </div>

                    <div class="directivo-content">
                        <header class="directivo-header">
                            <h2 class="directivo-nombre">Dra. Silvia Cristina Ruiz Campos</h2>
                            <p class="directivo-cargo">Rectora</p>
                        </header>

                        <div class="directivo-divider"></div>

                        <p class="directivo-descripcion">
                            Con más de 25 años de experiencia en el sector educativo, la Dra. Silvia Cristina Ruiz
                            Campos lidera
                            nuestra institución con una visión humanística e innovadora. Su compromiso con la excelencia
                            académica
                            y la formación integral ha consolidado al Gimnasio Humanístico como una institución
                            referente en calidad educativa.
                            Su liderazgo se fundamenta en valores como ciudadanía activa, sostenibilidad, creatividad,
                            investigación y trascendencia.
                        </p>
                    </div>
                </article>

                <!-- COORDINADORA -->
                <article class="directivo-item reverse">
                    <div class="directivo-image">
                        <div class="image-accent"></div>
                        <div class="image-wrapper">
                            <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=800&h=1000&fit=crop"
                                alt="Retrato de la coordinadora académica del Gimnasio Humanístico" width="600"
                                height="750" loading="lazy">
                        </div>
                    </div>

                    <div class="directivo-content">
                        <header class="directivo-header">
                            <h2 class="directivo-nombre">Lic. XXXX</h2>
                            <p class="directivo-cargo">Coordinadora Académica</p>
                        </header>

                        <div class="directivo-divider"></div>

                        <p class="directivo-descripcion">
                            La Lic. XXXX lidera la coordinación académica, garantizando la implementación efectiva del
                            modelo pedagógico humanístico.
                            Su experiencia en gestión educativa y su enfoque innovador permiten desarrollar programas
                            modernos que integran tradición,
                            metodología activa y acompañamiento personalizado, asegurando que cada estudiante alcance su
                            máximo potencial.
                        </p>
                    </div>
                </article>
            </div>
        </section>
    </main>

    <footer aria-label="Pie de página institucional">
        @include('layouts.footer')
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
