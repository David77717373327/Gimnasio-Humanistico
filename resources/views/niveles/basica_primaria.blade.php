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
    <link href="{{ asset('css/basica_primaria.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Incluir el header -->
    @include('layouts.header')



    <body>
        <!-- HERO SECTION PRIMARIA -->
        <section class="hero-primaria">
            <!-- Formas decorativas -->
            <div class="floating-shape-primaria shape-primaria-1"></div>
            <div class="floating-shape-primaria shape-primaria-2"></div>
            <div class="floating-shape-primaria shape-primaria-3"></div>

            <!-- Partículas académicas -->
            <div class="particle-primaria particle-primaria-1">📚</div>
            <div class="particle-primaria particle-primaria-2">🎓</div>
            <div class="particle-primaria particle-primaria-3">✏️</div>
            <div class="particle-primaria particle-primaria-4">🔬</div>

            <div class="hero-container-primaria">
                <div class="hero-content-primaria">
                    <!-- Lado izquierdo -->
                    <div class="hero-text-primaria">
                        <div class="hero-tag-primaria">
                            📖 Nivel Primaria
                        </div>

                        <h1 class="hero-title-primaria">
                            Básica Primaria
                        </h1>

                        <p class="hero-description-primaria">
                            En la Educación Básica Primaria desarrollamos las competencias fundamentales
                            para el éxito académico y personal de nuestros estudiantes. A través de un
                            programa riguroso y equilibrado, formamos niños autónomos, críticos y con
                            sólidas bases en todas las áreas del conocimiento.
                        </p>

                        <div class="features-primaria">
                            <div class="feature-item-primaria">
                                <div class="feature-icon-primaria">
                                    <i class="fas fa-book-open"></i>
                                </div>
                                <span class="feature-text-primaria">Currículo integral y actualizado</span>
                            </div>

                            <div class="feature-item-primaria">
                                <div class="feature-icon-primaria">
                                    <i class="fas fa-users"></i>
                                </div>
                                <span class="feature-text-primaria">Grupos reducidos</span>
                            </div>

                            <div class="feature-item-primaria">
                                <div class="feature-icon-primaria">
                                    <i class="fas fa-microscope"></i>
                                </div>
                                <span class="feature-text-primaria">Laboratorios especializados</span>
                            </div>

                            <div class="feature-item-primaria">
                                <div class="feature-icon-primaria">
                                    <i class="fas fa-laptop"></i>
                                </div>
                                <span class="feature-text-primaria">Tecnología educativa</span>
                            </div>
                        </div>

                        <div class="hero-buttons-primaria">
                            <a href="#informacion" class="btn-primary-primaria">
                                Conocer el programa
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M7.5 15L12.5 10L7.5 5" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Lado derecho -->
                    <div class="hero-visual-primaria">
                        <div class="image-container-primaria">
                            <!-- Elementos decorativos -->
                            <div class="deco-hex-primaria deco-hex-1"></div>
                            <div class="deco-hex-primaria deco-hex-2"></div>
                            <div class="deco-square-primaria"></div>

                            <!-- Imagen principal -->
                            <div class="main-image-wrapper-primaria">
                                <img src="images/Primariaa.jpeg" alt="Estudiantes de Primaria"
                                    class="main-image-primaria">
                            </div>

                            <!-- Badges flotantes -->
                            <div class="floating-badge-primaria badge-primaria-1">
                                <span class="badge-icon-primaria"><i class="fa-solid fa-award"></i></span>
                                <div class="badge-content-primaria">
                                    <strong>Excelencia</strong>
                                </div>
                            </div>

                            <div class="floating-badge-primaria badge-primaria-2">
                                <span class="badge-icon-primaria"><i class="fa-solid fa-graduation-cap"></i></span>
                                <div class="badge-content-primaria">
                                    <strong>Formación</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- METODOLOGÍA PRIMARIA -->
        <section class="metodologia-primaria">
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
                            <h2 class="admision-nav-title">Metodología Activa</h2>
                            <p class="admision-nav-subtitle">Estamos disponibles para atenderte en los siguientes
                                horarios.
                            </p>
                        </div>
                    </div>
                </div>







                <div class="metodologia-grid-primaria">
                    <div class="metodologia-image-primaria">
                        <img src="images/Primariaa.jpeg" alt="Metodología Primaria">
                    </div>

                    <div class="metodologia-content-primaria">
                        <h2>Aprendizaje Significativo</h2>
                        <p>
                            Nuestro enfoque pedagógico se centra en el estudiante como protagonista
                            de su proceso de aprendizaje, desarrollando habilidades del siglo XXI.
                        </p>

                        <div class="metodologia-list-primaria">
                            <div class="metodologia-item-primaria">
                                <div class="metodologia-icon-primaria">
                                    <i class="fas fa-brain"></i>
                                </div>
                                <div class="metodologia-text-primaria">
                                    <h4>Pensamiento Crítico</h4>
                                    <p>Estrategias que estimulan el análisis, la argumentación y la toma de decisiones
                                        fundamentadas.</p>
                                </div>
                            </div>

                            <div class="metodologia-item-primaria">
                                <div class="metodologia-icon-primaria">
                                    <i class="fas fa-project-diagram"></i>
                                </div>
                                <div class="metodologia-text-primaria">
                                    <h4>Aprendizaje por Proyectos</h4>
                                    <p>Integración de áreas del conocimiento mediante proyectos interdisciplinarios y
                                        colaborativos.</p>
                                </div>
                            </div>

                            <div class="metodologia-item-primaria">
                                <div class="metodologia-icon-primaria">
                                    <i class="fas fa-flask"></i>
                                </div>
                                <div class="metodologia-text-primaria">
                                    <h4>Experimentación Científica</h4>
                                    <p>Desarrollo del método científico a través de prácticas de laboratorio y proyectos
                                        de investigación.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- HORARIOS Y AULAS -->
        <section class="horarios-primaria">
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
                            <h2 class="admision-nav-title">Horarios y Aulas</h2>
                            <p class="admision-nav-subtitle">Conoce nuestras instalaciones y espacios de aprendizaje.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <span class="modalidad-badge-primaria">
                        <i class="far fa-clock"></i> Lunes a Viernes • 7:00 AM - 2:30 PM
                    </span>
                </div>

                <div class="aulas-grid-primaria">
                    <!-- Aula 1 -->
                    <div class="aula-card-primaria">
                        <div class="aula-image-primaria">
                            <img src="images/Primariaa.jpeg" alt="Aula 1">
                            <div class="aula-overlay-primaria">
                                <span class="aula-numero-primaria">Aula 1</span>
                            </div>
                        </div>
                        <div class="aula-info-primaria">
                            <h4>Aula de Primero</h4>
                            <p>
                                Espacio equipado con materiales didácticos para el aprendizaje
                                inicial de lectoescritura y matemáticas básicas.
                            </p>
                        </div>
                    </div>

                    <!-- Aula 2 -->
                    <div class="aula-card-primaria">
                        <div class="aula-image-primaria">
                            <img src="images/Primariaa.jpeg" alt="Aula 2">
                            <div class="aula-overlay-primaria">
                                <span class="aula-numero-primaria">Aula 2</span>
                            </div>
                        </div>
                        <div class="aula-info-primaria">
                            <h4>Aula de Segundo</h4>
                            <p>
                                Ambiente diseñado para fortalecer procesos de lectura,
                                escritura y operaciones matemáticas fundamentales.
                            </p>
                        </div>
                    </div>

                    <!-- Aula 3 -->
                    <div class="aula-card-primaria">
                        <div class="aula-image-primaria">
                            <img src="images/Primariaa.jpeg" alt="Aula 3">
                            <div class="aula-overlay-primaria">
                                <span class="aula-numero-primaria">Aula 3</span>
                            </div>
                        </div>
                        <div class="aula-info-primaria">
                            <h4>Aula de Tercero</h4>
                            <p>
                                Salón equipado con recursos para el desarrollo del pensamiento
                                analítico y la investigación científica básica.
                            </p>
                        </div>
                    </div>

                    <!-- Aula 4 -->
                    <div class="aula-card-primaria">
                        <div class="aula-image-primaria">
                            <img src="images/Primariaa.jpeg" alt="Aula 4">
                            <div class="aula-overlay-primaria">
                                <span class="aula-numero-primaria">Aula 4</span>
                            </div>
                        </div>
                        <div class="aula-info-primaria">
                            <h4>Aula de Cuarto</h4>
                            <p>
                                Espacio especializado para competencias científicas, históricas
                                y resolución de problemas matemáticos avanzados.
                            </p>
                        </div>
                    </div>

                    <!-- Aula 5 -->
                    <div class="aula-card-primaria aula-card-centrada">
                        <div class="aula-image-primaria">
                            <img src="images/Primariaa.jpeg" alt="Aula 5">
                            <div class="aula-overlay-primaria">
                                <span class="aula-numero-primaria">Aula 5</span>
                            </div>
                        </div>
                        <div class="aula-info-primaria">
                            <h4>Aula de Quinto</h4>
                            <p>
                                Salón preparado para estudiantes en transición hacia secundaria,
                                enfocado en autonomía y liderazgo estudiantil.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>







 <!-- TIMELINE DE GRADOS -->
<section class="timeline-primaria">
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
                    <h2 class="admision-nav-title">Niveles Académicos</h2>
                    <p class="admision-nav-subtitle">Desarrollo progresivo y formación integral en cada etapa educativa.</p>
                </div>
            </div>
        </div>

        <div class="timeline-container-primaria">
            <div class="timeline-line-primaria"></div>

            <!-- Primero -->
            <div class="timeline-item-primaria">
                <div class="timeline-content-left-primaria">
                    <div class="timeline-card-header">
                        <span class="timeline-badge-primaria">Primaria</span>
                        <h3 class="timeline-grade-primaria">Grado Primero</h3>
                    </div>
                    <p class="timeline-description-primaria">
                        En primer grado iniciamos el proceso formal de aprendizaje con fundamentos sólidos 
                        en lectura, escritura y operaciones matemáticas básicas. Nuestro enfoque pedagógico 
                        busca fortalecer las habilidades comunicativas y el desarrollo del pensamiento lógico. 
                    </p>
                    <div class="timeline-features-primaria">
                        <div class="timeline-feature-primaria">
                            
                            <span class="feature-text-primaria">•  Proceso lectoescritor consolidado mediante técnicas de fonética y comprensión textual</span>
                        </div>
                        <div class="timeline-feature-primaria">
                            <span class="feature-text-primaria">•  Operaciones de suma y resta con material concreto y representaciones gráficas</span>
                        </div>
                        
                    </div>
                </div>
                <div class="timeline-marker-primaria">1°</div>
                <div></div>
            </div>

            <!-- Segundo -->
            <div class="timeline-item-primaria">
                <div></div>
                <div class="timeline-marker-primaria">2°</div>
                <div class="timeline-content-right-primaria">
                    <div class="timeline-card-header">
                        <span class="timeline-badge-primaria">Primaria</span>
                        <h3 class="timeline-grade-primaria">Grado Segundo</h3>
                    </div>
                    <p class="timeline-description-primaria">
                        El segundo grado representa una etapa crucial en el fortalecimiento de competencias 
                        comunicativas y el desarrollo del pensamiento lógico-matemático. Los estudiantes 
                        consolidan sus habilidades de lectura y escritura.
                    </p>
                    <div class="timeline-features-primaria">
                        <div class="timeline-feature-primaria">
                            <span class="feature-text-primaria">•  Comprensión lectora avanzada con análisis de textos narrativos y descriptivos</span>
                        </div>
                        <div class="timeline-feature-primaria">
                            <span class="feature-text-primaria">•  Multiplicación y división básica aplicada a situaciones cotidianas</span>
                        </div>
                       
                    </div>
                </div>
            </div>

            <!-- Tercero -->
            <div class="timeline-item-primaria">
                <div class="timeline-content-left-primaria">
                    <div class="timeline-card-header">
                        <span class="timeline-badge-primaria">Primaria</span>
                        <h3 class="timeline-grade-primaria">Grado Tercero</h3>
                    </div>
                    <p class="timeline-description-primaria">
                        Tercer grado marca el desarrollo del pensamiento crítico y habilidades investigativas 
                        iniciales. Los estudiantes aprenden a cuestionar, analizar y proponer soluciones a 
                        problemas de su entorno. 
                    </p>
                    <div class="timeline-features-primaria">
                        <div class="timeline-feature-primaria">

                            <span class="feature-text-primaria">•  Producción textual estructurada con coherencia, cohesión y propósito comunicativo claro</span>
                        </div>
                        <div class="timeline-feature-primaria">

                            <span class="feature-text-primaria">•  Resolución de problemas matemáticos aplicando estrategias de razonamiento lógico</span>
                        </div>
                        
                    </div>
                </div>
                <div class="timeline-marker-primaria">3°</div>
                <div></div>
            </div>

            <!-- Cuarto -->
            <div class="timeline-item-primaria">
                <div></div>
                <div class="timeline-marker-primaria">4°</div>
                <div class="timeline-content-right-primaria">
                    <div class="timeline-card-header">
                        <span class="timeline-badge-primaria">Primaria</span>
                        <h3 class="timeline-grade-primaria">Grado Cuarto</h3>
                    </div>
                    <p class="timeline-description-primaria">
                        En cuarto grado profundizamos en las áreas del conocimiento y desarrollamos la 
                        autonomía académica de nuestros estudiantes. Se introduce el análisis e interpretación 
                        textual más complejo, geometría avanzada y estadística básica. 
                    </p>
                    <div class="timeline-features-primaria">
                        <div class="timeline-feature-primaria">

                            <span class="feature-text-primaria">•  Análisis e interpretación textual de diversos géneros literarios y académicos</span>
                        </div>
                        <div class="timeline-feature-primaria">

                            <span class="feature-text-primaria">•  Geometría plana, estadística básica y análisis de datos en contextos reales</span>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!-- Quinto -->
            <div class="timeline-item-primaria">
                <div class="timeline-content-left-primaria">
                    <div class="timeline-card-header">
                        <span class="timeline-badge-primaria">Primaria</span>
                        <h3 class="timeline-grade-primaria">Grado Quinto</h3>
                    </div>
                    <p class="timeline-description-primaria">
                        Quinto grado representa la consolidación de conocimientos y la preparación integral 
                        para la educación secundaria. Los estudiantes desarrollan habilidades de argumentación, 
                        pensamiento crítico avanzado y razonamiento matemático complejo.
                    </p>
                    <div class="timeline-features-primaria">
                        <div class="timeline-feature-primaria">

                            <span class="feature-text-primaria">•  Argumentación oral y escrita con fundamentos sólidos y pensamiento crítico reflexivo</span>
                        </div>
                        <div class="timeline-feature-primaria">

                            <span class="feature-text-primaria">•  Argumentación oral y escrita con fundamentos sólidos y pensamiento crítico reflexivo</span>
                        </div>
                        
                        
                    </div>
                </div>
                <div class="timeline-marker-primaria">5°</div>
                <div></div>
            </div>
        </div>
    </div>
</section>


        <!-- Incluir el footer -->
        @include('layouts.footer')

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    </body>

</html>
