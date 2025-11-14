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
                    <a class="nav-link dropdown-toggle-custom" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        QUIÉNES SOMOS
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-section">
                            <h6 class="dropdown-header">Institución</h6>
                            <a class="dropdown-item" href="{{ route('Historia') }}">Nuestra Historia</a>
                            <a class="dropdown-item" href="{{ route('mision-vision') }}">Misión y Visión</a>
                            <a class="dropdown-item" href="{{ route('filosofia_institucional') }}">Filosofía Educativa</a>
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
                    <a class="nav-link dropdown-toggle-custom" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        PROPUESTA EDUCATIVA
                    </a>
                    <div class="dropdown-menu single-column">
                        <a class="dropdown-item" href="#enfoque">Enfoque Pedagógico</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle-custom" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        NIVELES
                    </a>
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
                    <a class="nav-link dropdown-toggle-custom" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        VIDA ESTUDIANTIL
                    </a>
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



<style>
/* ============================================
   RESPONSIVE DESIGN
============================================ */
@media (max-width: 1200px) {
    .institutional-header {
        gap: 1.5rem;
    }

    .stats-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
}

@media (max-width: 992px) {
    .logo-bar {
        padding: 1rem 0;
    }

    .institutional-header {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }

    .institutional-logo {
        margin-left: 0;
    }

    .contact-info {
        flex-direction: row;
        justify-content: center;
        gap: 2rem;
    }

    .hero-banner {
        min-height: 100vh;
    }

    .hero-text-content {
        padding-right: 0;
        text-align: center;
        margin-bottom: 3rem;
    }

    .stats-panel {
        margin-top: 2rem;
    }

    /* Navbar móvil mejorado */
    .main-navigation .container-fluid {
        padding: 0.75rem 1rem;
    }

    .navbar-toggler {
        display: block;
        position: relative;
        z-index: 1001;
        margin-left: auto;
    }

    .navbar-collapse {
        background: var(--primary-green);
        padding: 0;
        margin-top: 0.75rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        width: 100%;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .navbar-collapse.show,
    .navbar-collapse.collapsing {
        display: block;
    }

    .navbar-nav {
        flex-direction: column;
        width: 100%;
        padding: 0.5rem 0;
    }

    .nav-item {
        width: 100%;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .nav-item:last-child {
        border-bottom: none;
    }

    .nav-link {
        text-align: left;
        padding: 1rem 1.5rem !important;
        width: 100%;
        display: block;
    }

    .nav-link.dropdown-toggle-custom::after {
        content: '\25BC';
        float: right;
        font-size: 0.7rem;
        transition: transform 0.3s ease;
    }

    .dropdown.show .nav-link.dropdown-toggle-custom::after {
        transform: rotate(180deg);
    }

    .nav-indicator {
        display: none;
    }

    /* Dropdowns en móvil */
    .dropdown-menu {
        position: static !important;
        transform: none !important;
        width: 100%;
        min-width: 100%;
        flex-direction: column;
        box-shadow: none;
        border: none;
        border-radius: 0;
        margin: 0;
        padding: 0;
        background: rgba(255, 255, 255, 0.05);
    }

    .dropdown-menu.show {
        display: flex;
    }

    .dropdown-section {
        border-right: none;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        padding: 0.75rem 0;
        background: transparent;
    }

    .dropdown-section:last-child {
        border-bottom: none;
    }

    .dropdown-header {
        color: rgba(255, 255, 255, 0.7);
        padding: 0.5rem 1.5rem;
        font-size: 0.75rem;
        margin-bottom: 0.25rem;
    }

    .dropdown-item {
        padding: 0.65rem 2rem;
        color: rgba(255, 255, 255, 0.9);
        background: transparent;
        font-size: 0.875rem;
    }

    .dropdown-item:hover {
        background: rgba(255, 255, 255, 0.1);
        color: #ffffff;
        text-decoration: none;
    }

    .nav-link.login-btn {
        margin: 0.5rem 1rem 1rem;
        display: block;
        width: calc(100% - 2rem);
        text-align: center;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }
}

@media (max-width: 768px) {
    .institutional-logo {
        width: 100px;
        height: 100px;
        border-width: 3px;
    }

    .title-line-1 {
        font-size: clamp(1.5rem, 5vw, 2rem);
    }

    .title-line-2 {
        font-size: clamp(1.2rem, 3.5vw, 1.5rem);
    }

    .title-line-3 {
        font-size: clamp(0.9rem, 2vw, 1rem);
    }

    .hero-actions {
        flex-direction: column;
        width: 100%;
    }

    .btn-primary-modern,
    .btn-secondary-modern {
        width: 100%;
        justify-content: center;
        max-width: 300px;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .stat-item {
        padding: 1.5rem;
    }

    .feature-card {
        padding: 2rem 1.5rem;
    }

    /* Ajustes adicionales para navbar en tablets */
    .nav-link {
        padding: 0.875rem 1.25rem !important;
        font-size: 0.85rem;
    }

    .dropdown-item {
        padding: 0.6rem 1.75rem;
        font-size: 0.825rem;
    }
}

@media (max-width: 480px) {
    .logo-bar {
        padding: 0.75rem 0;
    }

    .institutional-header {
        padding: 0 1rem;
    }

    .institutional-logo {
        width: 70px;
        height: 70px;
    }

    .contact-info {
        flex-direction: column;
        gap: 0.5rem;
    }

    .hero-banner {
        min-height: 90vh;
    }

    .stats-panel {
        padding: 1.5rem;
    }

    .stat-icon {
        width: 45px;
        height: 45px;
        font-size: 1rem;
    }

    .stat-number {
        font-size: 1.5rem;
    }

    .btn-primary-modern,
    .btn-secondary-modern {
        padding: 0.8rem 1.5rem;
        font-size: 0.8rem;
    }

    .feature-icon {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
    }

    /* Navbar optimizado para móviles pequeños */
    .main-navigation .container-fluid {
        padding: 0.5rem 0.75rem;
    }

    .navbar-toggler {
        padding: 0.4rem;
    }

    .navbar-toggler-icon {
        width: 22px;
        height: 16px;
    }

    .nav-link {
        font-size: 0.8rem;
        padding: 0.75rem 1rem !important;
    }

    .dropdown-header {
        font-size: 0.7rem;
        padding: 0.4rem 1rem;
    }

    .dropdown-item {
        font-size: 0.8rem;
        padding: 0.55rem 1.5rem;
    }

    .nav-link.login-btn {
        font-size: 0.8rem;
        padding: 0.65rem 1rem !important;
        margin: 0.5rem 0.75rem 0.75rem;
        width: calc(100% - 1.5rem);
    }
}

/* Pantallas extra pequeñas - 356px y menores */
@media (max-width: 360px) {
    .main-navigation .container-fluid {
        padding: 0.4rem 0.5rem;
    }

    .navbar-toggler {
        padding: 0.35rem;
    }

    .navbar-toggler-icon {
        width: 20px;
        height: 14px;
        gap: 2px;
    }

    .navbar-toggler-icon span {
        height: 1.5px;
    }

    .nav-link {
        font-size: 0.75rem;
        padding: 0.65rem 0.875rem !important;
    }

    .dropdown-header {
        font-size: 0.65rem;
        padding: 0.35rem 0.875rem;
    }

    .dropdown-item {
        font-size: 0.75rem;
        padding: 0.5rem 1.25rem;
    }

    .nav-link.login-btn {
        font-size: 0.75rem;
        padding: 0.6rem 0.875rem !important;
        margin: 0.4rem 0.5rem 0.6rem;
        width: calc(100% - 1rem);
    }

    .institutional-logo {
        width: 60px;
        height: 60px;
    }
}
</style>



<script>
document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-link:not(.login-btn):not(.dropdown-toggle-custom)');
    const indicator = document.querySelector('.nav-indicator');
    const navbarNav = document.querySelector('.navbar-nav');
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');

    // Funcionalidad del indicador (solo desktop)
    if (indicator && navbarNav && window.innerWidth > 992) {
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

            document.querySelectorAll('.dropdown-item').forEach(item => {
                const href = item.getAttribute('href');
                if (!href || href === '#') return;

                const fullHref = new URL(href, window.location.origin).href;

                if (fullHref === currentUrl) {
                    const parentNavLink = item.closest('.dropdown').querySelector('.nav-link');
                    if (parentNavLink && href.length > bestMatchLength) {
                        bestMatch = parentNavLink;
                        bestMatchLength = href.length;
                    }
                } else if (currentPath.includes(href.toLowerCase())) {
                    const parentNavLink = item.closest('.dropdown').querySelector('.nav-link');
                    if (parentNavLink && href.length > bestMatchLength) {
                        bestMatch = parentNavLink;
                        bestMatchLength = href.length;
                    }
                }
            });

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
                } else if (href !== '/' && currentPath.includes(href.toLowerCase()) && href.length > bestMatchLength) {
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

        let activeLink = setActiveLink();
        if (activeLink) {
            moveIndicator(activeLink);
        }

        navLinks.forEach(link => {
            link.addEventListener('mouseenter', function() {
                moveIndicator(this);
            });
        });

        navbarNav.addEventListener('mouseleave', function() {
            const activeLink = document.querySelector('.nav-link.active:not(.login-btn)');
            if (activeLink) {
                moveIndicator(activeLink);
            } else {
                const detectedActive = setActiveLink();
                if (detectedActive) {
                    moveIndicator(detectedActive);
                }
            }
        });

        window.addEventListener('resize', function() {
            if (window.innerWidth > 992) {
                const activeLink = document.querySelector('.nav-link.active:not(.login-btn)');
                if (activeLink) {
                    moveIndicator(activeLink);
                }
            }
        });
    }

    // Cerrar navbar al hacer click en un enlace (móvil)
    if (navbarCollapse) {
        const allNavLinks = document.querySelectorAll('.nav-link, .dropdown-item');
        allNavLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                // Solo cerrar si no es un dropdown toggle y estamos en móvil
                if (!this.classList.contains('dropdown-toggle-custom') && window.innerWidth <= 992) {
                    const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                    if (bsCollapse) {
                        bsCollapse.hide();
                    }
                }
            });
        });
    }

    // Animación del toggler
    if (navbarToggler) {
        navbarToggler.addEventListener('click', function() {
            this.classList.toggle('active');
        });

        navbarCollapse.addEventListener('hidden.bs.collapse', function() {
            navbarToggler.classList.remove('active');
        });
    }
});
</script>