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

        <!-- Scripts -->
    <script src="{{ asset('js/hero.js') }}" defer></script>

    <!-- CSS personalizado -->
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/basica_secundaria.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/hero.css')}}" rel="stylesheet">
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
        <section class="hero-section" aria-label="Educación Inicial y Preescolar en Neiva">
            <div class="hero-background">
                <img src="../images/Mision1.jpg"
                    alt="Instalaciones del colegio en Neiva enfocadas en educación inicial y preescolar" width="1920"
                    height="1080" loading="lazy">
            </div>

            <div class="hero-overlay"></div>
            <div class="hero-particles" aria-hidden="true"></div>

            <div class="container hero-container">
                <div class="hero-content">
                    <h1 class="hero-title" data-title="Nuestra Identidad Institucional">
                        Educación Basica Segundaria
                    </h1>

                    <div class="hero-scroll-indicator" onclick="scrollToContent()" role="button" tabindex="0"
                        aria-label="Ir a contenido principal" onkeypress="if(event.key==='Enter')scrollToContent()">
                        <i class="fas fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </section>



        






        <!-- METODOLOGÍA PRIMARIA -->
        <section class="metodologia-primaria" id="metodologia-secundaria">
            <div class="container">
                <!-- Header de la sección con logo -->
                <div class="admision-nav-header">
                    <div class="header-content-wrapper">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo Colegio" class="header-logo">
                        <div class="header-text-content">
                            <div class="header-label">
                                <span class="label-icon">✦</span>
                                <span class="label-text">Comunicate con nosotros</span>
                            </div>
                            <h2 class="admision-nav-title">Objetivos Basica Segunadaria</h2>
                        </div>
                    </div>
                </div>



                <!-- SECCIÓN DE OBJETIVOS SECUNDARIA -->
                <section class="objetivos-section" id="contenido-secundaria">
                    <div class="container-fluid objetivos-container-custom">

                        <!-- Encabezado de la sección -->
                        <div class="objetivos-header">
                            <p class="objetivos-intro">
                                "Nuestro programa de educación básica secundaria está
                                diseñado para desarrollar integralmente a nuestros estudiantes
                                a través de 4 pilares fundamentales:"
                            </p>
                        </div>

                        <!-- Navegación de Categorías -->
                        <nav class="objetivos-navigation">
                            <button class="objetivo-tab active" data-categoria="comunicacion">
                                Comunicación y Expresión
                            </button>
                            <button class="objetivo-tab" data-categoria="cientifico">
                                Desarrollo Científico y Tecnológico
                            </button>
                            <button class="objetivo-tab" data-categoria="social">
                                Formación Social y Ciudadana
                            </button>
                            <button class="objetivo-tab" data-categoria="integral">
                                Desarrollo Integral y Bienestar
                            </button>
                        </nav>

                        <!-- Contenido de Objetivos -->
                        <div class="objetivos-content">
                            <!-- Comunicación y Expresión -->
                            <div class="objetivo-item active" id="objetivo-comunicacion">
                                <div class="objetivo-grid">
                                    <div class="objetivo-card" data-bg="competencia-comunicativa">
                                        <div class="objetivo-overlay"></div>
                                        <div class="objetivo-content-wrapper">
                                            <h3 class="objetivo-subtitle">Competencia Comunicativa</h3>
                                            <p class="objetivo-text">
                                                El desarrollo de la capacidad para comprender textos y expresar
                                                correctamente mensajes complejos,
                                                orales y escritos en lengua castellana, así como para entender mediante
                                                un estudio sistemático
                                                los diferentes elementos constitutivos de la lengua.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="objetivo-card" data-bg="expresion-literaria">
                                        <div class="objetivo-overlay"></div>
                                        <div class="objetivo-content-wrapper">
                                            <h3 class="objetivo-subtitle">Expresión Literaria</h3>
                                            <p class="objetivo-text">
                                                La valoración de la lengua castellana como medio de expresión literaria
                                                y el estudio de la
                                                creación literaria en el país y en el mundo.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="objetivo-card" data-bg="lengua-extranjera">
                                        <div class="objetivo-overlay"></div>
                                        <div class="objetivo-content-wrapper">
                                            <h3 class="objetivo-subtitle">Lengua Extranjera</h3>
                                            <p class="objetivo-text">
                                                La comprensión y la capacidad de expresarse en lengua extranjera.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Desarrollo Científico y Tecnológico -->
                            <div class="objetivo-item" id="objetivo-cientifico">
                                <div class="objetivo-grid">
                                    <div class="objetivo-card" data-bg="razonamiento-logico">
                                        <div class="objetivo-overlay"></div>
                                        <div class="objetivo-content-wrapper">
                                            <h3 class="objetivo-subtitle">Razonamiento Lógico-Matemático</h3>
                                            <p class="objetivo-text">
                                                El desarrollo de las capacidades para el razonamiento lógico, mediante
                                                el dominio de los sistemas
                                                numéricos, geométricos, métricos, lógicos, analíticos, de conjuntos, de
                                                operaciones y relaciones,
                                                así como para su utilización en la solución de los problemas de la
                                                ciencia, de la tecnología y de la vida cotidiana.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="objetivo-card" data-bg="conocimiento-cientifico">
                                        <div class="objetivo-overlay"></div>
                                        <div class="objetivo-content-wrapper">
                                            <h3 class="objetivo-subtitle">Conocimiento Científico</h3>
                                            <p class="objetivo-text">
                                                El avance en el conocimiento científico de los fenómenos físicos,
                                                químicos y biológicos, mediante
                                                la comprensión de las leyes, el planteamiento de los problemas y la
                                                observación experimental.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="objetivo-card" data-bg="tecnologia-practica">
                                        <div class="objetivo-overlay"></div>
                                        <div class="objetivo-content-wrapper">
                                            <h3 class="objetivo-subtitle">Tecnología y Práctica</h3>
                                            <p class="objetivo-text">
                                                La iniciativa en los campos más avanzados de la tecnología moderna y el
                                                entrenamiento en disciplinas,
                                                procesos y técnicas que les permitan el ejercicio de una función
                                                socialmente útil.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="objetivo-card" data-bg="teoria-practica">
                                        <div class="objetivo-overlay"></div>
                                        <div class="objetivo-content-wrapper">
                                            <h3 class="objetivo-subtitle">Teoría y Práctica</h3>
                                            <p class="objetivo-text">
                                                La comprensión de la dimensión práctica de los conocimientos teóricos,
                                                así como la dimensión teórica
                                                del conocimiento práctico y la capacidad para utilizarla en la solución
                                                de problemas.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="objetivo-card" data-bg="busqueda-conocimiento">
                                        <div class="objetivo-overlay"></div>
                                        <div class="objetivo-content-wrapper">
                                            <h3 class="objetivo-subtitle">Búsqueda de Conocimiento</h3>
                                            <p class="objetivo-text">
                                                La utilización con sentido crítico de los distintos contenidos y formas
                                                de información y la búsqueda
                                                de nuevos conocimientos con su propio esfuerzo.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Formación Social y Ciudadana -->
                            <div class="objetivo-item" id="objetivo-social">
                                <div class="objetivo-grid">
                                    <div class="objetivo-card" data-bg="historia-sociedad">
                                        <div class="objetivo-overlay"></div>
                                        <div class="objetivo-content-wrapper">
                                            <h3 class="objetivo-subtitle">Historia y Sociedad</h3>
                                            <p class="objetivo-text">
                                                El estudio científico de la historia nacional y mundial dirigida a
                                                comprender el desarrollo de la
                                                sociedad y el estudio de las ciencias sociales, con miras al análisis de
                                                las condiciones actuales
                                                de la realidad social.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="objetivo-card" data-bg="geografia-cultura">
                                        <div class="objetivo-overlay"></div>
                                        <div class="objetivo-content-wrapper">
                                            <h3 class="objetivo-subtitle">Geografía y Cultura Mundial</h3>
                                            <p class="objetivo-text">
                                                El estudio científico del universo, de la tierra, de su estructura
                                                física, de su división y
                                                organización política, del desarrollo económico de los países y de las
                                                diferentes manifestaciones
                                                culturales de los pueblos.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="objetivo-card" data-bg="formacion-constitucional">
                                        <div class="objetivo-overlay"></div>
                                        <div class="objetivo-content-wrapper">
                                            <h3 class="objetivo-subtitle">Formación Constitucional</h3>
                                            <p class="objetivo-text">
                                                La formación en el ejercicio de sus deberes y derechos, el conocimiento
                                                de la constitución política
                                                y de las relaciones internacionales.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="objetivo-card" data-bg="conservacion-ambiental">
                                        <div class="objetivo-overlay"></div>
                                        <div class="objetivo-content-wrapper">
                                            <h3 class="objetivo-subtitle">Conservación Ambiental</h3>
                                            <p class="objetivo-text">
                                                El desarrollo de actitudes favorables al conocimiento, valoración y
                                                conservación de la naturaleza
                                                y el ambiente.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Desarrollo Integral y Bienestar -->
                            <div class="objetivo-item" id="objetivo-integral">
                                <div class="objetivo-grid">
                                    <div class="objetivo-card" data-bg="formacion-artistica">
                                        <div class="objetivo-overlay"></div>
                                        <div class="objetivo-content-wrapper">
                                            <h3 class="objetivo-subtitle">Formación Artística</h3>
                                            <p class="objetivo-text">
                                                La apreciación artística, la comprensión estética, la creatividad, la
                                                familiarización con los
                                                diferentes medios de expresión artística y el conocimiento, valoración y
                                                respeto por los bienes
                                                artísticos y culturales.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="objetivo-card" data-bg="salud-bienestar">
                                        <div class="objetivo-overlay"></div>
                                        <div class="objetivo-content-wrapper">
                                            <h3 class="objetivo-subtitle">Salud y Bienestar</h3>
                                            <p class="objetivo-text">
                                                La valoración de la salud y de los hábitos relacionados con ella.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="objetivo-card" data-bg="desarrollo-fisico">
                                        <div class="objetivo-overlay"></div>
                                        <div class="objetivo-content-wrapper">
                                            <h3 class="objetivo-subtitle">Desarrollo Físico y Recreación</h3>
                                            <p class="objetivo-text">
                                                La educación física y la práctica de la recreación y los deportes, la
                                                participación y organización
                                                juvenil y la utilización adecuada del tiempo libre.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </section>

                



        <!-- Incluir el footer -->
        @include('layouts.footer')

        <script>
            // Funcionalidad de navegación de objetivos
            document.addEventListener('DOMContentLoaded', function() {
                const tabs = document.querySelectorAll('.objetivo-tab');
                const items = document.querySelectorAll('.objetivo-item');

                tabs.forEach(tab => {
                    tab.addEventListener('click', function() {
                        const categoriaId = this.getAttribute('data-categoria');

                        tabs.forEach(t => t.classList.remove('active'));
                        this.classList.add('active');

                        items.forEach(item => {
                            item.classList.remove('active');
                        });

                        setTimeout(() => {
                            const targetItem = document.getElementById('objetivo-' +
                                categoriaId);
                            if (targetItem) {
                                targetItem.classList.add('active');

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
