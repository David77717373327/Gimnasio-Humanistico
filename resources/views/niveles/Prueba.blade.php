<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Responsive - Colegio Gimnasio Humanístico</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-green: #1b5e3f;
            --secondary-green: #2d7a52;
            --accent-gold: #ffc857;
            --soft-gold: #ffd88a;
            --white: #ffffff;
            --light-gray: #f8f9fa;
            --medium-gray: #e0e0e0;
            --text-dark: #2c3e50;
            --text-light: #6c757d;
            --transition-normal: all 0.3s ease;
            --border-radius-lg: 12px;
            --border-radius-xl: 16px;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.12);
            --shadow-xl: 0 8px 32px rgba(0, 0, 0, 0.16);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        /* ============================================
           HEADER INSTITUCIONAL RESPONSIVE
        ============================================ */
        .logo-bar {
            background: var(--primary-green);
            padding: 15px 0;
            box-shadow: 0 8px 32px rgba(17, 75, 47, 0.12), 0 2px 16px rgba(0, 0, 0, 0.08);
            position: relative;
            z-index: 999;
            overflow: hidden;
            border-bottom: 1px solid var(--medium-gray);
        }

        .logo-bar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 20% 20%, rgba(255, 200, 87, 0.03) 0%, transparent 30%),
                        radial-gradient(circle at 80% 80%, rgba(255, 200, 87, 0.03) 0%, transparent 30%);
            z-index: -1;
            opacity: 0.6;
        }

        .institutional-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1800px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            gap: 20px;
        }

        .logo-container {
            position: relative;
            display: inline-block;
            flex-shrink: 0;
        }

        .institutional-logo {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            border: 3px solid var(--accent-gold);
            background: var(--primary-green);
            box-shadow: 0 12px 40px rgba(17, 75, 47, 0.15), 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: var(--transition-normal);
            object-fit: cover;
        }

        .institutional-title {
            flex: 1;
            text-align: center;
            padding: 0 15px;
        }

        .college-main-title {
            font-family: 'Georgia', serif;
            color: var(--white);
            margin: 0;
            line-height: 1.3;
            text-shadow: 0 2px 6px rgba(0, 0, 0, 0.4);
        }

        .title-line-1 {
            display: block;
            font-size: clamp(1rem, 3vw, 2rem);
            font-weight: 700;
            margin-bottom: 0.3rem;
            color: var(--white);
            text-transform: uppercase;
            letter-spacing: -0.02em;
        }

        .title-line-2 {
            display: block;
            font-size: clamp(1.1rem, 3.5vw, 2rem);
            font-weight: 600;
            margin-bottom: 0.3rem;
            color: var(--white);
            text-transform: uppercase;
            letter-spacing: -0.01em;
        }

        .title-line-3 {
            display: block;
            font-size: clamp(0.85rem, 2vw, 1.3rem);
            color: var(--accent-gold);
            font-weight: 500;
            letter-spacing: 0.05em;
        }

        /* ============================================
           NAVEGACIÓN PRINCIPAL RESPONSIVE
        ============================================ */
        .main-navigation {
            background: var(--primary-green);
            position: sticky;
            top: 0;
            z-index: 998;
            box-shadow: 0 4px 20px rgba(17, 75, 47, 0.15);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .navbar {
            padding: 0;
        }

        .navbar-nav {
            gap: 0;
            width: 100%;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .nav-indicator {
            position: absolute;
            bottom: 0;
            height: 4px;
            background: var(--accent-gold);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            pointer-events: none;
            z-index: 1;
            display: none;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            color: #ffffff !important;
            font-weight: 500;
            font-size: 0.875rem;
            padding: 1.25rem 1.5rem !important;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            transition: color 0.3s ease;
            position: relative;
            display: inline-block;
            background: transparent;
            cursor: pointer;
        }

        .nav-link:hover {
            color: var(--accent-gold) !important;
        }

        .nav-link.active {
            color: var(--accent-gold) !important;
            font-weight: 600;
        }

        .nav-link.login-btn {
            color: #ffffff !important;
            margin-left: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 4px;
            font-weight: 600;
            padding: 0.75rem 1.5rem !important;
            background: rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .nav-link.login-btn:hover {
            background: var(--accent-gold);
            color: var(--primary-green) !important;
            border-color: var(--accent-gold);
        }

        /* ============================================
           HAMBURGER MENU MODERNO
        ============================================ */
        .navbar-toggler {
            border: none;
            padding: 8px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            transition: var(--transition-normal);
            border: 1px solid rgba(255, 255, 255, 0.2);
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 2px rgba(255, 200, 87, 0.5);
            outline: none;
        }

        .navbar-toggler:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--accent-gold);
        }

        .navbar-toggler-icon {
            display: flex;
            flex-direction: column;
            gap: 4px;
            width: 24px;
            height: 18px;
            position: relative;
        }

        .navbar-toggler-icon span {
            width: 100%;
            height: 3px;
            background: #ffffff;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon span:nth-child(1) {
            transform: rotate(45deg) translate(6px, 6px);
        }

        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon span:nth-child(2) {
            opacity: 0;
        }

        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon span:nth-child(3) {
            transform: rotate(-45deg) translate(6px, -6px);
        }

        /* ============================================
           DROPDOWNS RESPONSIVE
        ============================================ */
        .nav-item.dropdown:hover > .dropdown-menu {
            display: flex;
            opacity: 1;
            visibility: visible;
        }

        .dropdown-menu {
            display: none;
            opacity: 0;
            visibility: hidden;
            border: none;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            border-radius: 0;
            padding: 0;
            margin-top: 0;
            background: #ffffff;
            position: absolute;
            top: 100%;
            left: 0;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .dropdown-menu.single-column {
            min-width: 235px;
            max-width: 235px;
            flex-direction: column;
            padding: 1rem 0;
        }

        .dropdown-menu.single-column .dropdown-item {
            padding: 0.65rem 1.5rem;
            font-size: 0.925rem;
        }

        .dropdown-menu:not(.single-column) {
            min-width: 550px;
            display: flex;
        }

        .dropdown-section {
            flex: 1;
            padding: 1rem 2rem;
            border-right: 1px solid #e0e0e0;
            min-width: 0;
        }

        .dropdown-section:last-child {
            border-right: none;
        }

        .dropdown-header {
            color: #000000;
            font-weight: 700;
            font-size: 0.82rem;
            margin-bottom: 1rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        .dropdown-item {
            padding: 0.65rem 0;
            border-radius: 0;
            transition: all 0.3s ease;
            color: #000;
            font-size: 0.915rem;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            display: block;
        }

        .dropdown-item:hover {
            color: var(--primary-green);
            background: transparent;
            text-decoration: underline;
        }

        /* ============================================
           RESPONSIVE BREAKPOINTS
        ============================================ */

        /* Tablets grandes y escritorio pequeño */
        @media (min-width: 993px) {
            .nav-indicator {
                display: block;
            }
        }

        /* Tablets */
        @media (max-width: 992px) {
            .institutional-logo {
                width: 90px;
                height: 90px;
                border-width: 3px;
            }

            .navbar-collapse {
                background: var(--primary-green);
                padding: 1rem;
                margin-top: 0;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            }

            .navbar-nav {
                flex-direction: column;
                align-items: stretch;
            }

            .nav-item {
                width: 100%;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            .nav-item:last-child {
                border-bottom: none;
            }

            .nav-link {
                text-align: left;
                padding: 1rem 1.5rem !important;
                width: 100%;
            }

            .nav-link.login-btn {
                margin: 0.5rem 1rem;
                text-align: center;
                width: calc(100% - 2rem);
            }

            .dropdown-menu {
                position: static !important;
                transform: none !important;
                min-width: 100% !important;
                max-width: 100% !important;
                flex-direction: column !important;
                box-shadow: none;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                margin-top: 0;
                background: rgba(0, 0, 0, 0.1);
            }

            .dropdown-menu:not(.single-column) {
                min-width: 100% !important;
            }

            .dropdown-section {
                border-right: none;
                border-bottom: 1px solid rgba(255, 255, 255, 0.05);
                padding: 1rem 1.5rem;
                width: 100%;
            }

            .dropdown-section:last-child {
                border-bottom: none;
            }

            .dropdown-header {
                color: var(--accent-gold);
                font-size: 0.8rem;
            }

            .dropdown-item {
                padding: 0.6rem 1rem;
                color: #ffffff;
            }

            .dropdown-item:hover {
                color: var(--accent-gold);
                background: rgba(255, 255, 255, 0.05);
            }

            .nav-item.dropdown .nav-link::after {
                content: '\f107';
                font-family: 'Font Awesome 6 Free';
                font-weight: 900;
                float: right;
                transition: transform 0.3s ease;
            }

            .nav-item.dropdown.show .nav-link::after {
                transform: rotate(180deg);
            }
        }

        /* Mobile landscape y tablets pequeñas */
        @media (max-width: 768px) {
            .logo-bar {
                padding: 10px 0;
            }

            .institutional-header {
                padding: 0 15px;
                gap: 15px;
            }

            .institutional-logo {
                width: 75px;
                height: 75px;
                border-width: 2px;
            }

            .title-line-1 {
                font-size: clamp(0.85rem, 3.5vw, 1.2rem);
                margin-bottom: 0.2rem;
            }

            .title-line-2 {
                font-size: clamp(0.95rem, 4vw, 1.3rem);
                margin-bottom: 0.2rem;
            }

            .title-line-3 {
                font-size: clamp(0.7rem, 2.5vw, 0.95rem);
            }

            .nav-link {
                font-size: 0.85rem;
                padding: 0.9rem 1.2rem !important;
            }
        }

        /* Mobile portrait */
        @media (max-width: 576px) {
            .institutional-header {
                padding: 0 10px;
                gap: 10px;
            }

            .institutional-logo {
                width: 65px;
                height: 65px;
            }

            .institutional-title {
                padding: 0 8px;
            }

            .navbar-toggler {
                width: 40px;
                height: 40px;
            }

            .navbar-toggler-icon {
                width: 20px;
                height: 15px;
            }

            .navbar-toggler-icon span {
                height: 2px;
            }

            .nav-link.login-btn {
                margin: 0.5rem 0.5rem;
                width: calc(100% - 1rem);
                padding: 0.7rem 1.2rem !important;
            }
        }

        /* Dispositivos muy pequeños (320px - 400px) */
        @media (max-width: 400px) {
            .logo-bar {
                padding: 8px 0;
            }

            .institutional-header {
                padding: 0 8px;
                gap: 8px;
            }

            .institutional-logo {
                width: 55px;
                height: 55px;
                border-width: 2px;
            }

            .title-line-1 {
                font-size: 0.75rem;
                margin-bottom: 0.15rem;
            }

            .title-line-2 {
                font-size: 0.85rem;
                margin-bottom: 0.15rem;
            }

            .title-line-3 {
                font-size: 0.65rem;
            }

            .navbar-collapse {
                padding: 0.75rem;
            }

            .nav-link {
                font-size: 0.8rem;
                padding: 0.75rem 1rem !important;
            }

            .dropdown-section {
                padding: 0.75rem 1rem;
            }

            .dropdown-item {
                padding: 0.5rem 0.75rem;
                font-size: 0.85rem;
            }
        }

        /* Extra pequeño (específico para 356px) */
        @media (max-width: 360px) {
            .institutional-logo {
                width: 50px;
                height: 50px;
            }

            .title-line-1 {
                font-size: 0.7rem;
                line-height: 1.2;
            }

            .title-line-2 {
                font-size: 0.8rem;
                line-height: 1.2;
            }

            .title-line-3 {
                font-size: 0.6rem;
            }

            .navbar-toggler {
                width: 38px;
                height: 38px;
            }
        }

        /* Demo content */
        .demo-content {
            padding: 60px 20px;
            text-align: center;
            background: var(--light-gray);
        }

        .demo-content h2 {
            color: var(--primary-green);
            margin-bottom: 20px;
        }

        .demo-content p {
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <!-- Header Institucional -->
    <div class="logo-bar">
        <div class="container-fluid">
            <div class="institutional-header">
                <div class="logo-container">
                    <img src="https://via.placeholder.com/140" alt="Logo Colegio Gimnasio Humanístico" class="institutional-logo">
                </div>
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

    <!-- Navegación Principal -->
    <nav class="main-navigation navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link" href="#" data-bs-toggle="dropdown">QUIÉNES SOMOS</a>
                        <div class="dropdown-menu">
                            <div class="dropdown-section">
                                <h6 class="dropdown-header">Institución</h6>
                                <a class="dropdown-item" href="#">Nuestra Historia</a>
                                <a class="dropdown-item" href="#">Misión y Visión</a>
                                <a class="dropdown-item" href="#">Filosofía Educativa</a>
                                <a class="dropdown-item" href="#">Símbolos Institucionales</a>
                                <a class="dropdown-item" href="#">Principios y Valores</a>
                            </div>
                            <div class="dropdown-section">
                                <h6 class="dropdown-header">Organización</h6>
                                <a class="dropdown-item" href="#">Directorio</a>
                                <a class="dropdown-item" href="#">Organigrama</a>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" data-bs-toggle="dropdown">PROPUESTA EDUCATIVA</a>
                        <div class="dropdown-menu single-column">
                            <a class="dropdown-item" href="#">Enfoque Pedagógico</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" data-bs-toggle="dropdown">NIVELES</a>
                        <div class="dropdown-menu single-column">
                            <a class="dropdown-item" href="#">Educación Inicial Prescolar</a>
                            <a class="dropdown-item" href="#">Educación Básica Primaria</a>
                            <a class="dropdown-item" href="#">Educación Básica Secundaria</a>
                            <a class="dropdown-item" href="#">Educación Media Académica</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">ADMISIÓN</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" data-bs-toggle="dropdown">VIDA ESTUDIANTIL</a>
                        <div class="dropdown-menu single-column">
                            <a class="dropdown-item" href="#">Actividades Extracurriculares</a>
                            <a class="dropdown-item" href="#">Eventos y Celebraciones</a>
                            <a class="dropdown-item" href="#">Transporte Escolar</a>
                            <a class="dropdown-item" href="#">Pastoral Estudiantil</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTACTO</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link login-btn" href="#">ACCEDER</a>
                    </li>
                </ul>
                <div class="nav-indicator"></div>
            </div>
        </div>
    </nav>

    <!-- Demo Content -->
    <div class="demo-content">
        <h2>Header Completamente Responsive</h2>
        <p>Este header se adapta perfectamente a todas las resoluciones, desde 320px hasta pantallas 4K. Prueba redimensionando la ventana del navegador para ver cómo se comporta en diferentes tamaños.</p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.nav-link:not(.login-btn)');
            const indicator = document.querySelector('.nav-indicator');
            const navbarNav = document.querySelector('.navbar-nav');

            if (!indicator || !navbarNav) return;

            // Solo activar el indicador en desktop
            if (window.innerWidth > 992) {
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
                    let activeLink = document.querySelector('.nav-link.active:not(.login-btn)');
                    if (!activeLink) {
                        activeLink = navLinks[0];
                        activeLink.classList.add('active');
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

            // Manejo de dropdowns en móvil
            if (window.innerWidth <= 992) {
                document.querySelectorAll('.nav-item.dropdown > .nav-link').forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        const parent = this.parentElement;
                        const dropdown = parent.querySelector('.dropdown-menu');
                        
                        // Cerrar otros dropdowns
                        document.querySelectorAll('.nav-item.dropdown').forEach(item => {
                            if (item !== parent) {
                                item.classList.remove('show');
                                const otherDropdown = item.querySelector('.dropdown-menu');
                                if (otherDropdown) {
                                    otherDropdown.style.display = 'none';
                                }
                            }
                        });

                        // Toggle actual
                        parent.classList.toggle('show');
                        if (dropdown) {
                            dropdown.style.display = dropdown.style.display === 'flex' ? 'none' : 'flex';
                        }
                    });
                });
            }

            // Cerrar menú al hacer clic en un enlace
            document.querySelectorAll('.dropdown-item, .nav-link:not([data-bs-toggle])').forEach(link => {
                link.addEventListener('click', function() {
                    const navbarCollapse = document.querySelector('.navbar-collapse');
                    const navbarToggler = document.querySelector('.navbar-toggler');
                    if (navbarCollapse.classList.contains('show')) {
                        navbarToggler.click();
                    }
                });
            });
        });
    </script>
</body>
</html>