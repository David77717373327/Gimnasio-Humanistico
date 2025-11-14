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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a class="nav-link" href="#" role="button">QUIÉNES SOMOS</a>
                    <div class="dropdown-menu">
                        <div class="dropdown-section">
                            <h6 class="dropdown-header">Institución</h6>
                            <a class="dropdown-item" href="{{ route('Historia') }}">Nuestra Historia</a>
                            <a class="dropdown-item" href="{{ route('mision-vision') }}">Misión y Visión</a>
                            <a class="dropdown-item" href="{{ route('filosofia_institucional') }}">Filosofía
                                Educativa</a>
                            <a class="dropdown-item" href="{{ route('simbolos') }}">Símbolos Institucionales</a>
                            <a class="dropdown-item" href="{{ route('principios-valores') }}">Principios y Valores</a>
                            <a class="dropdown-item" href="{{ route('politica-calidad') }}">Política de Calidad</a>
                        </div>
                        <div class="dropdown-section">
                            <h6 class="dropdown-header">Organización</h6>
                            <a class="dropdown-item" href="{{ route('organigrama') }}">Organigrama</a>
                            <a class="dropdown-item" href="{{ route('Grupo_humanistico') }}">Grupo Humanístico S.A.S</a>
                            <a class="dropdown-item" href="{{ route('Gobierno_escolar') }}">Gobierno Escolar</a>
                            <a class="dropdown-item" href="{{ route('Directivos') }}">Directivos</a>
                            <a class="dropdown-item" href="{{ route('Administrativos') }}">Administrativos</a>
                            <a class="dropdown-item" href="{{ route('Docentes') }}">Docentes</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button">PROPUESTA EDUCATIVA</a>
                    <div class="dropdown-menu single-column">
                        <a class="dropdown-item" href="#enfoque">Enfoque Pedagógico</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button">NIVELES</a>
                    <div class="dropdown-menu single-column">
                        <a class="dropdown-item" href="{{ route('prescolar') }}">Educación Inicial Prescolar</a>
                        <a class="dropdown-item" href="{{ route('basica_primaria') }}">Educación Básica Primaria</a>
                        <a class="dropdown-item" href="{{ route('basica_segundaria') }}">Educación Básica
                            Secundaria</a>
                        <a class="dropdown-item" href="{{ route('media_academica') }}">Educación Media Académica</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admision') }}">ADMISIÓN</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button">VIDA ESTUDIANTIL</a>
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
        // ============================================
        // VARIABLES GLOBALES
        // ============================================
        const navLinks = document.querySelectorAll('.nav-link:not(.login-btn)');
        const indicator = document.querySelector('.nav-indicator');
        const navbarNav = document.querySelector('.navbar-nav');
        const navbarCollapse = document.querySelector('.navbar-collapse');
        const navbarToggler = document.querySelector('.navbar-toggler');
        const dropdownItems = document.querySelectorAll('.nav-item.dropdown');

        // ============================================
        // FUNCIONALIDAD DESKTOP - INDICADOR
        // ============================================
        function initDesktopFeatures() {
            if (window.innerWidth <= 992 || !indicator || !navbarNav) return;

            const currentUrl = window.location.href;
            const currentPath = window.location.pathname.toLowerCase();

            function moveIndicator(link) {
                const rect = link.getBoundingClientRect();
                const navRect = navbarNav.getBoundingClientRect();
                const left = rect.left - navRect.left;
                const width = rect.width;

                indicator.style.left = left + 'px';
                indicator.style.width = width + 'px';
                indicator.style.opacity = '1';
            }

            function setActiveLink() {
                let activeLink = null;
                let bestMatch = null;
                let bestMatchLength = 0;

                // Buscar en items de dropdown
                document.querySelectorAll('.dropdown-item').forEach(item => {
                    const href = item.getAttribute('href');
                    if (!href || href === '#') return;

                    const fullHref = new URL(href, window.location.origin).href;

                    if (fullHref === currentUrl || currentPath.includes(href.toLowerCase())) {
                        const parentNavLink = item.closest('.dropdown').querySelector('.nav-link');
                        if (parentNavLink && href.length > bestMatchLength) {
                            bestMatch = parentNavLink;
                            bestMatchLength = href.length;
                        }
                    }
                });

                // Buscar en nav-links principales
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    const href = link.getAttribute('href');
                    if (!href || href === '#') return;

                    const fullHref = new URL(href, window.location.origin).href;

                    if (fullHref === currentUrl) {
                        link.classList.add('active');
                        activeLink = link;
                    } else if (currentPath === '/' && href === '/') {
                        link.classList.add('active');
                        activeLink = link;
                    } else if (href !== '/' && currentPath.includes(href.toLowerCase()) && href.length >
                        bestMatchLength) {
                        link.classList.add('active');
                        activeLink = link;
                        bestMatchLength = href.length;
                    }
                });

                if (bestMatch && !activeLink) {
                    navLinks.forEach(link => link.classList.remove('active'));
                    bestMatch.classList.add('active');
                    activeLink = bestMatch;
                }

                return activeLink;
            }

            // Inicializar
            let activeLink = setActiveLink();
            if (activeLink) {
                moveIndicator(activeLink);
            }

            // Hover sobre enlaces
            navLinks.forEach(link => {
                link.addEventListener('mouseenter', function() {
                    moveIndicator(this);
                });
            });

            // Volver al activo cuando sale el cursor
            navbarNav.addEventListener('mouseleave', function() {
                const activeLink = document.querySelector('.nav-link.active:not(.login-btn)');
                if (activeLink) {
                    moveIndicator(activeLink);
                }
            });
        }

        // ============================================
        // FUNCIONALIDAD DESKTOP - HOVER DROPDOWNS
        // ============================================
        function initDesktopDropdowns() {
            if (window.innerWidth <= 992) return;

            dropdownItems.forEach(item => {
                const dropdownMenu = item.querySelector('.dropdown-menu');

                item.addEventListener('mouseenter', function() {
                    dropdownMenu.classList.add('show');
                    item.classList.add('show');
                });

                item.addEventListener('mouseleave', function() {
                    dropdownMenu.classList.remove('show');
                    item.classList.remove('show');
                });
            });
        }

        // ============================================
        // FUNCIONALIDAD MÓVIL - CLICK DROPDOWNS
        // ============================================
        function initMobileDropdowns() {
            if (window.innerWidth > 992) return;

            dropdownItems.forEach(item => {
                const navLink = item.querySelector('.nav-link');
                const dropdownMenu = item.querySelector('.dropdown-menu');

                // Remover event listeners anteriores
                const newNavLink = navLink.cloneNode(true);
                navLink.parentNode.replaceChild(newNavLink, navLink);

                newNavLink.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const isOpen = item.classList.contains('show');

                    // Cerrar todos los dropdowns
                    dropdownItems.forEach(otherItem => {
                        if (otherItem !== item) {
                            otherItem.classList.remove('show');
                            const otherMenu = otherItem.querySelector('.dropdown-menu');
                            if (otherMenu) otherMenu.classList.remove('show');
                        }
                    });

                    // Toggle del dropdown actual
                    if (isOpen) {
                        item.classList.remove('show');
                        dropdownMenu.classList.remove('show');
                    } else {
                        item.classList.add('show');
                        dropdownMenu.classList.add('show');
                    }
                });
            });

            // Cerrar menú al hacer click en item del dropdown
            document.querySelectorAll('.dropdown-item').forEach(item => {
                item.addEventListener('click', function() {
                    closeNavbar();
                });
            });

            // Cerrar menú al hacer click en enlaces simples
            document.querySelectorAll('.nav-link:not([role="button"])').forEach(link => {
                link.addEventListener('click', function() {
                    if (!this.closest('.dropdown')) {
                        closeNavbar();
                    }
                });
            });
        }

        // ============================================
        // FUNCIÓN PARA CERRAR NAVBAR
        // ============================================
        function closeNavbar() {
            if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                if (bsCollapse) {
                    bsCollapse.hide();
                } else {
                    navbarCollapse.classList.remove('show');
                }
            }

            // Limpiar todos los dropdowns
            dropdownItems.forEach(item => {
                item.classList.remove('show');
                const menu = item.querySelector('.dropdown-menu');
                if (menu) menu.classList.remove('show');
            });
        }

        // ============================================
        // LIMPIAR DROPDOWNS AL CERRAR NAVBAR
        // ============================================
        if (navbarCollapse) {
            navbarCollapse.addEventListener('hidden.bs.collapse', function() {
                dropdownItems.forEach(item => {
                    item.classList.remove('show');
                    const menu = item.querySelector('.dropdown-menu');
                    if (menu) menu.classList.remove('show');
                });
            });
        }

        // ============================================
        // INICIALIZACIÓN
        // ============================================
        function initialize() {
            if (window.innerWidth > 992) {
                initDesktopFeatures();
                initDesktopDropdowns();
            } else {
                initMobileDropdowns();
            }
        }

        // Inicializar al cargar
        initialize();

        // ============================================
        // REINICIALIZAR EN RESIZE
        // ============================================
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                // Limpiar todos los dropdowns
                dropdownItems.forEach(item => {
                    item.classList.remove('show');
                    const menu = item.querySelector('.dropdown-menu');
                    if (menu) menu.classList.remove('show');
                });

                // Cerrar navbar si está abierto
                if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                    navbarCollapse.classList.remove('show');
                }

                // Reinicializar
                initialize();

                // Actualizar indicador en desktop
                if (window.innerWidth > 992 && indicator) {
                    const activeLink = document.querySelector(
                        '.nav-link.active:not(.login-btn)');
                    if (activeLink) {
                        const rect = activeLink.getBoundingClientRect();
                        const navRect = navbarNav.getBoundingClientRect();
                        indicator.style.left = (rect.left - navRect.left) + 'px';
                        indicator.style.width = rect.width + 'px';
                    }
                }
            }, 250);
        });

        // ============================================
        // CERRAR DROPDOWNS AL HACER CLICK FUERA
        // ============================================
        document.addEventListener('click', function(e) {
            if (window.innerWidth <= 992 && navbarCollapse && navbarCollapse.classList.contains(
                'show')) {
                if (!e.target.closest('.navbar')) {
                    closeNavbar();
                }
            }
        });
    });
</script>



