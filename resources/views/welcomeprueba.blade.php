Quiero que generes contenido HTML optimizado para SEO, pero sin agregar estilos, sin CSS, sin clases nuevas y sin modificar los estilos existentes. Únicamente genera estructura HTML semántica y contenido textual optimizado.

Sigue exactamente estas instrucciones:

🔎 1. SEO dentro del HTML

Incluye:

Títulos optimizados (H1, H2, H3…)

Descripciones claras en párrafos

Palabras clave principales y secundarias (incluye variaciones naturales)

Keywords locales (Ciudad, región, país)

ALT descriptivos con keywords para imágenes (pero sin agregar estilos)

🧱 2. Estructura semántica (sin estilos)

Usar únicamente estas etiquetas:

<header>

<nav>

<main>

<section>

<article>

<footer>

<h1> a <h4>

<p>

<ul> <li>

<img> (solo con alt y title)

<a> (con buen anchor text)

No agregar clases ni ids nuevos, a menos que yo los proporcione explícitamente.

🦾 3. Accesibilidad

Agregar:

alt="" con descripciones reales (incluyendo keywords)

aria-label funcional cuando corresponda

Texto natural para lectores de pantalla

Sin afectar estilos.

⚡ 4. No modificar estilos existentes

No crear:

Clases nuevas

IDs nuevos

CSS inline

Estilos embebidos

Scripts que alteren el diseño

Solo contenido textual dentro del HTML ya existente.

📝 5. Contenido

Redactar:

Texto profesional y persuasivo

Orientado al SEO moderno

Claro, humano y natural

Optimizado para posicionar en Google

🎯 6. Entrega

Solo dame:

Fragmentos HTML listos para pegar en una vista existente

Sin estilos

Sin clases nuevas

Sin nada visual

Solamente contenido optimizado.

🔚 Instrucción final

Genera el contenido HTML optimizado respetando TODO lo anterior y manteniendo completamente intactos mis estilos actuales.





QUIERO QUE ME AYUDES A QUE MI CONTENIDO DE SIMBOLOS Y HIMNOS SEA ADAPTABLE A 
CUALQUIER TIPO DE PANTALLAS
ES DESIR QUE SEA RESPONSIVE SIN DAÑAR NI MODIFICAR LOS ESTILOS QUE YA TENGO EN PANTALLAS
COMPLETAS PORFAVOR DE LA MANERA MAS PROFESIONAL POSIBLE Y EMPRESARIAL 
PERFECIONALO MAS PORFAVOR DAME EL CSS COMPLETO






<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipo Administrativo</title>
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
    <link href="{{ asset('css/Administrativos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/hero.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navegacion.css') }}" rel="stylesheet">

    <!-- Script Hero -->
    <script src="{{ asset('js/hero.js') }}" defer></script>

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
                    <h1 class="hero-title" data-title="Liderazgo Institucional">Equipo Administrativo</h1>

                    <div class="hero-scroll-indicator" onclick="scrollToContent()" role="button" tabindex="0"
                        aria-label="Desplazarse a la siguiente sección"
                        onkeypress="if(event.key==='Enter')scrollToContent()">
                        <i class="fas fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </section>

    <!-- Sección de Introducción -->
    <section class="intro-section" id="siguiente_sesion">
        <div class="equipo-grid">
            <!-- Jefe Administrativo -->
            <div class="equipo-column">
                <h3 class="column-title">Jefe Administrativo</h3>
                <p class="column-description">
                    Líder de la planificación operativa y supervisor del personal administrativo.
                </p>
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="card-logo">
                                <img src="{{ asset('images/Jefe_Administracion.png') }}" alt="Jefe Administrativo">
                            </div>
                            <h4 class="front-title">Jefe Administrativo</h4>
                            <p class="front-subtitle">Liderazgo Operativo</p>
                            <div class="hover-hint">Pasa el cursor →</div>
                        </div>
                        <div class="flip-card-back">
                            <h5 class="back-title">Jefe Administrativo</h5>
                            <p class="back-description">
                                Lidera la planificación operativa (presupuesto, compras, infraestructura) alineada 
                                con las directrices de la Rectoría. Supervisa y articula el trabajo del personal 
                                administrativo (Contaduría, Pagaduría, Servicios Generales, Secretaría).
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contador -->
            <div class="equipo-column">
                <h3 class="column-title">Contador</h3>
                <p class="column-description">
                    Responsable del rigor contable y la transparencia financiera institucional.
                </p>
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="card-logo">
                                <img src="{{ asset('images/Contador.png') }}" alt="Contador">
                            </div>
                            <h4 class="front-title">Contador</h4>
                            <p class="front-subtitle">Rigor Financiero</p>
                            <div class="hover-hint">Pasa el cursor →</div>
                        </div>
                        <div class="flip-card-back">
                            <h5 class="back-title">Contador</h5>
                            <p class="back-description">
                                Es el profesional responsable del rigor contable y la transparencia financiera, 
                                esencial para la toma de decisiones estratégicas. Es experto en NIIF y en la 
                                legislación tributaria colombiana, garantizando la veracidad, exactitud y oportunidad 
                                de todos los informes contables.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Secretaria Académica -->
            <div class="equipo-column">
                <h3 class="column-title">Secretaria Académica</h3>
                <p class="column-description">
                    Guardiana de la información académica y primer contacto con la comunidad.
                </p>
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="card-logo">
                                <img src="{{ asset('images/Secretaria_Academica.png') }}" alt="Secretaria Académica">
                            </div>
                            <h4 class="front-title">Secretaria Académica</h4>
                            <p class="front-subtitle">Gestión Académica</p>
                            <div class="hover-hint">Pasa el cursor →</div>
                        </div>
                        <div class="flip-card-back">
                            <h5 class="back-title">Secretaria Académica</h5>
                            <p class="back-description">
                                Es la depositaria y responsable de la información académica, procesos de matrícula 
                                y demás funciones afines que le asigne la rectoría y el primer punto de contacto 
                                para la comunidad, requiere precisión técnica, confidencialidad, y alta calidad humana.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagador - Tesorero -->
            <div class="equipo-column">
                <h3 class="column-title">Pagador - Tesorero</h3>
                <p class="column-description">
                    Ejecutor de transacciones financieras con exactitud y seguridad.
                </p>
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="card-logo">
                                <img src="{{ asset('images/Pagador_Tesorero.png') }}" alt="Pagador-Tesorero">
                            </div>
                            <h4 class="front-title">Pagador - Tesorero</h4>
                            <p class="front-subtitle">Gestión Financiera</p>
                            <div class="hover-hint">Pasa el cursor →</div>
                        </div>
                        <div class="flip-card-back">
                            <h5 class="back-title">Pagador - Tesorero</h5>
                            <p class="back-description">
                                Ejecuta las transacciones financieras con máxima exactitud y puntualidad. Es garante 
                                de la seguridad en el manejo del flujo de caja y la documentación de soporte.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Maestra de Apoyo -->
            <div class="equipo-column">
                <h3 class="column-title">Maestra de Apoyo</h3>
                <p class="column-description">
                    Experta en inclusión educativa y flexibilidad curricular.
                </p>
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="card-logo">
                                <img src="{{ asset('images/Maestra_Apoyo.png') }}" alt="Maestra de Apoyo">
                            </div>
                            <h4 class="front-title">Maestra de Apoyo</h4>
                            <p class="front-subtitle">Inclusión Educativa</p>
                            <div class="hover-hint">Pasa el cursor →</div>
                        </div>
                        <div class="flip-card-back">
                            <h5 class="back-title">Maestra de Apoyo</h5>
                            <p class="back-description">
                                Es el experto técnico que materializa la inclusión educativa, trabajando como docente 
                                y consultor para la flexibilidad curricular. Posee un profundo conocimiento del Diseño 
                                Universal de Aprendizaje DUA y del Decreto 1421/2017. Es el experto en el diseño e 
                                implementación de los Planes Individuales de Ajustes Razonables PIAR y la flexibilidad 
                                curricular.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Personal de Servicios Generales -->
            <div class="equipo-column">
                <h3 class="column-title">Servicios Generales</h3>
                <p class="column-description">
                    Garantes de la salud, seguridad y habitabilidad institucional.
                </p>
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="card-logo">
                                <img src="{{ asset('images/Servicios_Generales.png') }}" alt="Servicios Generales">
                            </div>
                            <h4 class="front-title">Servicios Generales</h4>
                            <p class="front-subtitle">Bienestar y Seguridad</p>
                            <div class="hover-hint">Pasa el cursor →</div>
                        </div>
                        <div class="flip-card-back">
                            <h5 class="back-title">Servicios Generales</h5>
                            <p class="back-description">
                                Es el equipo garante de la salud, seguridad y habitabilidad de la institución, 
                                fundamental para el bienestar de toda la comunidad. Garantizan la higiene y salubridad 
                                de todas las áreas, actuando de manera proactiva en la prevención de riesgos sanitarios. 
                                Mantiene los estándares de orden y limpieza requeridos para un ambiente educativo de 
                                calidad.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer aria-label="Pie de página institucional">
        @include('layouts.footer')
    </footer>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
