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
    <link href="{{ asset('css/simbolos.css') }}" rel="stylesheet">
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
                        <span class="title-highlight">Símbolos </span> y
                        <span class="title-highlight">Himno </span>
                    </h1>

                    <div class="hero-scroll-indicator" onclick="scrollToTimeline()">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>



    


    <!-- ============================================
     HTML - SECCIÓN HIMNO
     ============================================ -->
<section class="himno-section"  id="himno-section">
    <div class="himno-container">
        <div class="himno-header">
            <h2 class="himno-title">Himno del Colegio</h2>
            <p class="himno-subtitle">Gimnasio Humanístico de Neiva</p>
        </div>

        <div class="himno-main-content">
            <!-- COLUMNA IZQUIERDA: Introducción -->
            <div class="himno-intro">
                <h3 class="himno-intro-title">Composición</h3>
                <p class="himno-intro-text">
                    Compuesto por el Magíster <strong>JESÚS MARÍA VIDAL ARIAS</strong>, quien, inspirado en su amplia trayectoria 
                    pedagógica y folclorista, imprimió a este himno todo el amor a un territorio, por una institución, 
                    por una comunidad educativa.
                </p>
                <p class="himno-intro-text">
                    El himno expresa los tres pilares fundamentales que constituyen la filosofía institucional: 
                    <strong>trabajo, humanismo, cultura ambiental, inclusión y sentido de pertenencia</strong>. 
                    El sentido de pertenencia manifestado en la primera estrofa. La importancia del trabajo humanizante 
                    se manifiesta en la segunda estrofa. En la tercera estrofa se refleja el sentido ecológico, humano e 
                    integral de la formación de cada uno de los miembros de la comunidad educativa humanística.
                </p>
            </div>

            <!-- COLUMNA DERECHA: Himno -->
            <div class="himno-content">
                <!-- Coro -->
                <div class="himno-stanza">
                    <h3 class="himno-stanza-title">Coro</h3>
                    <p class="himno-verse">Un futuro mejor yo persigo</p>
                    <p class="himno-verse">Y por eso al estudio me doy</p>
                    <p class="himno-verse">Con orgullo lo pienso y lo digo</p>
                    <p class="himno-verse">Del Gimnasio Humanístico soy. (Bis)</p>
                </div>

                

                <!-- Estrofa I -->
                <div class="himno-stanza">
                    <h3 class="himno-stanza-title">I</h3>
                    <p class="himno-verse">Somos hijos del Alto Magdalena</p>
                    <p class="himno-verse">De la estirpe aborigen y español</p>
                    <p class="himno-verse">Nos distingue una lumbre de nobleza</p>
                    <p class="himno-verse">Y un encuadre mestizo hecho de amor.</p>
                </div>

                

                <!-- Estrofa II -->
                <div class="himno-stanza">
                    <h3 class="himno-stanza-title">II</h3>
                    <p class="himno-verse">Nos forjamos al ritmo del trabajo</p>
                    <p class="himno-verse">Con la mira humanista de ideal</p>
                    <p class="himno-verse">Construyendo la patria que soñamos</p>
                    <p class="himno-verse">De justicia, de paz y libertad.</p>
                </div>

                

                <!-- Estrofa III -->
                <div class="himno-stanza">
                    <h3 class="himno-stanza-title">III</h3>
                    <p class="himno-verse">Hermanamos esfuerzos y esperanzas</p>
                    <p class="himno-verse">Con el árbol, el agua y con el sol</p>
                    <p class="himno-verse">Nos sentimos amigos del planeta</p>
                    <p class="himno-verse">Ciudadanos del mundo, hijos de Dios.</p>
                </div>

                <!-- Coro Final -->
                <div class="himno-stanza">
                    <h3 class="himno-stanza-title">Coro</h3>
                    <p class="himno-verse">Un futuro mejor yo persigo</p>
                    <p class="himno-verse">Y por eso al estudio me doy</p>
                    <p class="himno-verse">Con orgullo lo pienso y lo digo</p>
                    <p class="himno-verse">Del Gimnasio Humanístico soy.</p>
                </div>
            </div>
        </div>    
    </div>
</section>











    
    <!-- SECCIÓN SÍMBOLOS -->
    <section class="simbolos-section" id="simbolos-section">
        <div class="simbolos-container">
            <div class="simbolos-header">
                <h2 class="simbolos-title">Símbolos Institucionales</h2>
            </div>

            <!-- Escudo -->
            <div class="simbolo-item">
                <div class="simbolo-row">
                    <div class="simbolo-image-container">
                        <img src="{{ asset('images/logoo.png') }}" alt="Escudo del Colegio" class="simbolo-image">
                    </div>
                    <div class="simbolo-content">
                        <h3 class="simbolo-name">Escudo Institucional</h3>
                        <p class="simbolo-description">
                            Él refleja la integración e interacción del hombre con la naturalez
                             especialmente con el paisaje de nuestro territorio del Alto Magdalena. 
                             La silueta de un estudiante está en el centro del escudo y demuestra que el
                              humanismo es lo vital en la institución.  Un árbol que da forma a una casa 
                              refleja el pensamiento y cultura ambiental la fortaleza de la familia humanística
                             y la de nuestros estudiantes, que se constituye como elemento trascendental en la formación humana.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Bandera -->
            <div class="simbolo-item">
                <div class="simbolo-row reverse">
                    <div class="simbolo-image-container">
                        <img src="{{ asset('images/bandera.png') }}" alt="Bandera del Colegio" class="simbolo-image bandera-image">
                    </div>
                    <div class="simbolo-content">
                        <h3 class="simbolo-name">Bandera Institucional</h3>
                        <p class="simbolo-description">
                            Ella consta de dos colores: <strong>Amarillo:</strong> refleja la riqueza intelectual, física y moral 
                            que posee el ser humano y que la institución en su misión educativa busca potenciar en cada educando 
                            para que logre una formación con sentido humano.
                        </p>
                        <p class="simbolo-description">
                            <strong>Verde:</strong> expresa la esperanza hacia un mejor mañana y también la interacción del hombre 
                            con la naturaleza, llevada hacia la formación intelectual y espiritual para incentivar una relación 
                            más racional con el entorno natural.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>









@include('layouts.navegacion_Interna')







    <!-- Incluir el footer -->
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
            document.getElementById('himno-section').scrollIntoView({
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
    </script>

</body>

</html>
