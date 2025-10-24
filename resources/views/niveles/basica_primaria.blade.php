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
                            <h2 class="admision-nav-title">Objetivos Primaria</h2>
                            
                        </div>
                    </div>
                </div>












                <!-- SECCIÓN DE OBJETIVOS PRIMARIA -->
    <section class="objetivos-section" id="contenido-primaria">
        <div class="container-fluid objetivos-container-custom">
           
            <!-- Encabezado de la sección -->
            <div class="objetivos-header">
                
                <p class="objetivos-intro">
                    "Nuestro programa de primaria está 
                    diseñado para desarrollar integralmente a nuestros estudiantes
                     a través de 4 pilares fundamentales:"
                </p>
            </div>



            <!-- Navegación de Categorías -->
            <div class="objetivos-navigation">
                <button class="objetivo-tab active" data-categoria="formacion">
                    Formación en Valores y Ciudadanía
                </button>
                <button class="objetivo-tab" data-categoria="academico">
                    Desarrollo Académico y Cognitivo
                </button>
                <button class="objetivo-tab" data-categoria="fisico">
                    Desarrollo Físico y Artístico
                </button>
                <button class="objetivo-tab" data-categoria="social">
                    Habilidades Sociales y Autonomía
                </button>
            </div>

            <!-- Contenido de Objetivos -->
            <div class="objetivos-content">
                <!-- Formación en Valores y Ciudadanía -->
                <div class="objetivo-item active" id="objetivo-formacion">
                    <div class="objetivo-grid">
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Valores para la Convivencia</h3>
                            <p class="objetivo-text">
                                La formación de los valores fundamentales para la convivencia de una sociedad democrática, 
                                participativa y pluralista.
                            </p>
                        </div>
                        
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-balance-scale"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Valores Cívicos y Morales</h3>
                            <p class="objetivo-text">
                                El desarrollo de valores civiles y morales de organización social y de convivencia humana.
                            </p>
                        </div>
                        
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-landmark"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Educación Constitucional</h3>
                            <p class="objetivo-text">
                                La iniciación en el conocimiento de la constitución política.
                            </p>
                        </div>
                        
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-child"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Participación Infantil</h3>
                            <p class="objetivo-text">
                                La formación para la participación y organización infantil y la utilización adecuada del tiempo libre.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Desarrollo Académico y Cognitivo -->
                <div class="objetivo-item" id="objetivo-academico">
                    <div class="objetivo-grid">
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Deseo de Saber</h3>
                            <p class="objetivo-text">
                                El fomento del deseo del saber, de la iniciativa personal frente al conocimiento y frente a 
                                la realidad social, así como el espíritu crítico.
                            </p>
                        </div>
                        
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Habilidades Comunicativas</h3>
                            <p class="objetivo-text">
                                El desarrollo de las habilidades comunicativas básicas para leer, comprender, escribir, escuchar, 
                                hablar y expresarse correctamente en lengua castellana, así como el fomento de la afición por la lectura.
                            </p>
                        </div>
                        
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-feather-alt"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Expresión Estética</h3>
                            <p class="objetivo-text">
                                El desarrollo de la capacidad para apreciar y utilizar la lengua como medio de expresión estética.
                            </p>
                        </div>
                        
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-calculator"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Pensamiento Matemático</h3>
                            <p class="objetivo-text">
                                El desarrollo de los conocimientos matemáticos necesarios para manejar y utilizar operaciones simples 
                                de cálculo y procedimientos lógicos elementales en diferentes situaciones, así como la capacidad para 
                                solucionar problemas que impliquen conocimientos.
                            </p>
                        </div>
                        
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-globe-americas"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Comprensión del Medio</h3>
                            <p class="objetivo-text">
                                La comprensión básica del medio físico, social y cultural en el nivel local, nacional y universal, 
                                de acuerdo con el desarrollo intelectual correspondiente a su edad.
                            </p>
                        </div>
                        
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-brain"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Asimilación de Conceptos</h3>
                            <p class="objetivo-text">
                                La asimilación de conceptos en áreas del conocimiento que sean objeto de estudio, de acuerdo con 
                                el desarrollo intelectual y la edad.
                            </p>
                        </div>
                        
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-language"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Lengua Extranjera</h3>
                            <p class="objetivo-text">
                                La adquisición de elementos de conversación y de lectura al menos en una lengua extranjera.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Desarrollo Físico y Artístico -->
                <div class="objetivo-item" id="objetivo-fisico">
                    <div class="objetivo-grid">
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-heartbeat"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Salud y Cuidado Personal</h3>
                            <p class="objetivo-text">
                                La valoración de la higiene y la salud del propio cuerpo y la formación para la protección de 
                                la naturaleza y el ambiente.
                            </p>
                        </div>
                        
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-running"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Educación Física y Deportes</h3>
                            <p class="objetivo-text">
                                El conocimiento y ejercitación del propio cuerpo mediante la práctica de la educación física, 
                                la recreación y los deportes adecuados a su edad y conducentes a un desarrollo físico armónico.
                            </p>
                        </div>
                        
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-palette"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Formación Artística</h3>
                            <p class="objetivo-text">
                                La formación artística mediante la expresión corporal, la representación, la música, la plástica 
                                y la literatura.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Habilidades Sociales y Autonomía -->
                <div class="objetivo-item" id="objetivo-social">
                    <div class="objetivo-grid">
                        <div class="objetivo-card">
                            <div class="objetivo-icon">
                                <i class="fas fa-user-check"></i>
                            </div>
                            <h3 class="objetivo-subtitle">Autonomía Personal</h3>
                            <p class="objetivo-text">
                                La adquisición de habilidades para desempeñarse con autonomía en la sociedad.
                            </p>
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
            </div>
        </section>




            


 


        <!-- Incluir el footer -->
        @include('layouts.footer')

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

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
                        const targetItem = document.getElementById('objetivo-' + categoriaId);
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
