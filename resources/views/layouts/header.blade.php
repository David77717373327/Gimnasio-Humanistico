

<!-- Header Institucional Mejorado -->
<div class="logo-bar">
    <div class="container-fluid">
        <div class="institutional-header">
            <!-- Solo un logo a la izquierda -->
            <div class="logo-container">
                <img src="{{ asset('images/Logo.png') }}" alt="Logo Colegio Gimnasio Humanístico"
                    class="institutional-logo">
            </div>

            <!-- Título modernizado -->
            <div class="institutional-title">
                <h1 class="college-main-title">
                    <span class="title-line-1">COLEGIO GIMNASIO HUMANÍSTICO</span>
                    <span class="title-line-2">DEL ALTO MAGDALENA</span>
                    <span class="title-line-3">Neiva, Huila</span>
                </h1>
            </div>
        </div>
    </div>
</div>

<!-- Navegación Principal Mejorada -->
<nav class="main-navigation navbar navbar-expand-lg">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="/">INICIO</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#">QUIÉNES SOMOS</a>
                    <div class="dropdown-menu">
                        <div class="dropdown-section">
                            <h6 class="dropdown-header">Institución</h6>
                            <a class="dropdown-item" href="{{ route('Historia') }}">Nuestra Historia</a>
                            <a class="dropdown-item" href="{{ route('mision-vision') }}">Misión y Visión</a>
                            <a class="dropdown-item" href="{{ route('filosofia_institucional') }}">Filosofía Educativa</a>
                            <a class="dropdown-item" href="{{ route('simbolos') }}">Símbolos Institucionales</a>
                            <a class="dropdown-item" href="{{ route('principios-valores') }}">principios y valores</a>
                            <a class="dropdown-item" href="{{ route('politica-calidad') }}">Politica de Calidad</a>
                        </div>
                        <div class="dropdown-section"> 
                            <h6 class="dropdown-header">Organización</h6>
                            <a class="dropdown-item" href="{{ route('organigrama') }}">Organigrama</a>
                            <a class="dropdown-item" href="{{ route('Grupo_humanistico') }}">Grupo Humanistico S.A.S</a>                            
                            <a class="dropdown-item" href="{{ route('Gobierno_escolar') }}">Gobierno Escolar</a>
                            <a class="dropdown-item" href="#directorio">Directivos</a>
                            <a class="dropdown-item" href="{{ route('Administrativos') }}">Administrativos</a>
                            <a class="dropdown-item" href="{{ route('Docentes') }}">Docentes</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#">PROPUESTA EDUCATIVA</a>
                    <div class="dropdown-menu single-column">
                        <a class="dropdown-item" href="#enfoque">Enfoque Pedagógico</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#">NIVELES</a>
                    <div class="dropdown-menu single-column">
                        <a class="dropdown-item" href="{{ route('prescolar') }}">Educación Inicial Prescolar</a>
                        <a class="dropdown-item" href="{{ route('basica_primaria') }}">Educación Básica Primaria</a>
                        <a class="dropdown-item" href="{{ route('basica_segundaria') }}">Educación Básica Secundaria</a>
                        <a class="dropdown-item" href="{{ route('media_academica') }}">Educación Media Académica</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admision') }}">ADMISIÓN</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#">VIDA ESTUDIANTIL</a>
                    <div class="dropdown-menu single-column">
                        <a class="dropdown-item" href="#actividades">Actividades Extracurriculares</a>
                        <a class="dropdown-item" href="#eventos">Eventos y Celebraciones</a>
                        <a class="dropdown-item" href="{{ route('transporte') }}">Transporte Escolar</a>
                        <a class="dropdown-item" href="#pastoral">Pastoral Estudiantil</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contacto">CONTACTO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link login-btn" href="{{ route('login') }}">ACCEDER</a>
                </li>
            </ul>

            <!-- Línea blanca que persigue el cursor (FUERA del ul) -->
            <div class="nav-indicator"></div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('.nav-link:not(.login-btn)');
        const indicator = document.querySelector('.nav-indicator');
        const navbarNav = document.querySelector('.navbar-nav');

        if (!indicator || !navbarNav) return;

        // Obtener la URL actual completa y el path
        const currentUrl = window.location.href;
        const currentPath = window.location.pathname.toLowerCase();

        // Función para mover el indicador
        function moveIndicator(link) {
            const rect = link.getBoundingClientRect();
            const navRect = navbarNav.getBoundingClientRect();

            const left = rect.left - navRect.left;
            const width = rect.width;

            indicator.style.left = left + 'px';
            indicator.style.width = width + 'px';
            indicator.style.opacity = '1';
        }

        // Detectar automáticamente la página activa
        function setActiveLink() {
            let activeLink = null;
            let bestMatch = null;
            let bestMatchLength = 0;

            // Primero revisar los items de dropdown para coincidencias exactas
            document.querySelectorAll('.dropdown-item').forEach(item => {
                const href = item.getAttribute('href');

                if (!href || href === '#') return;

                // Obtener la URL completa del enlace
                const fullHref = new URL(href, window.location.origin).href;

                // Coincidencia exacta de URL completa
                if (fullHref === currentUrl) {
                    const parentNavLink = item.closest('.dropdown').querySelector('.nav-link');
                    if (parentNavLink && href.length > bestMatchLength) {
                        bestMatch = parentNavLink;
                        bestMatchLength = href.length;
                    }
                }
                // Coincidencia de path
                else if (currentPath.includes(href.toLowerCase())) {
                    const parentNavLink = item.closest('.dropdown').querySelector('.nav-link');
                    if (parentNavLink && href.length > bestMatchLength) {
                        bestMatch = parentNavLink;
                        bestMatchLength = href.length;
                    }
                }
            });

            // Luego revisar los nav-links principales
            navLinks.forEach(link => {
                link.classList.remove('active');
                const href = link.getAttribute('href');

                if (!href || href === '#') return;

                // Obtener la URL completa del enlace
                const fullHref = new URL(href, window.location.origin).href;

                // Coincidencia exacta
                if (fullHref === currentUrl) {
                    link.classList.add('active');
                    activeLink = link;
                }
                // Para la página de inicio
                else if (currentPath === '/' && href === '/') {
                    link.classList.add('active');
                    activeLink = link;
                }
                // Coincidencia parcial del path
                else if (href !== '/' && currentPath.includes(href.toLowerCase()) && href.length >
                    bestMatchLength) {
                    link.classList.add('active');
                    activeLink = link;
                    bestMatchLength = href.length;
                }
            });

            // Si encontramos una mejor coincidencia en los dropdowns
            if (bestMatch && !activeLink) {
                navLinks.forEach(link => link.classList.remove('active'));
                bestMatch.classList.add('active');
                activeLink = bestMatch;
            }

            return activeLink;
        }

        // Establecer el enlace activo al cargar
        let activeLink = setActiveLink();
        if (activeLink) {
            moveIndicator(activeLink);
        }

        // Cuando el cursor pasa sobre un enlace
        navLinks.forEach(link => {
            link.addEventListener('mouseenter', function() {
                moveIndicator(this);
            });
        });

        // Cuando el cursor sale de la navegación, vuelve al activo
        navbarNav.addEventListener('mouseleave', function() {
            const activeLink = document.querySelector('.nav-link.active:not(.login-btn)');
            if (activeLink) {
                moveIndicator(activeLink);
            } else {
                // Si no hay activo, intentar detectar de nuevo
                const detectedActive = setActiveLink();
                if (detectedActive) {
                    moveIndicator(detectedActive);
                }
            }
        });

        // Actualizar posición al hacer resize
        window.addEventListener('resize', function() {
            const activeLink = document.querySelector('.nav-link.active:not(.login-btn)');
            if (activeLink) {
                moveIndicator(activeLink);
            }
        });

        // Detectar cambios en la URL (para SPAs o cambios dinámicos)
        let lastUrl = currentUrl;
        setInterval(function() {
            if (window.location.href !== lastUrl) {
                lastUrl = window.location.href;
                const newActive = setActiveLink();
                if (newActive) {
                    moveIndicator(newActive);
                }
            }
        }, 100);
    });
</script>
