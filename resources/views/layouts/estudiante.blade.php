<!DOCTYPE html>
<html lang="es" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión Escolar - @yield('title', 'Dashboard')</title>
    <!-- Google Fonts for Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS con paleta institucional -->
    <link rel="stylesheet" href="{{ asset('css/estudiante.css') }}">
    <!-- Meta tags adicionales -->
    <meta name="description" content="Sistema de Gestión Escolar - Administración educativa moderna y eficiente">
    <meta name="theme-color" content="#2E8B57">
</head>

<body class="min-h-screen font-inter">
    <!-- Header Principal con Colores Institucionales -->
    <header class="main-header">
        <div class="header-container">
            <!-- Sección Izquierda: Logo Institucional -->
            <div class="header-left">
                <div class="logo-container">
                    <!-- Logo con borde verde institucional -->
                    <img src="{{ asset('images/Logo.png') }}" alt="Logo del Colegio" class="header-logo">
                    <div class="brand-text">
                        <!-- Título en verde institucional -->
                        <h2 class="brand-title">Sistema Escolar</h2>
                        <span class="brand-subtitle">Gestión Educativa</span>
                    </div>
                </div>
            </div>

            <!-- Sección Central: Navegación Principal -->
            <nav class="header-navigation">
                <ul class="nav-menu">
                    <!-- Enlaces con efectos hover en verde y amarillo -->
                    <li class="nav-item">
                        <a href="{{ route('admin.estudiantes.index') }}" class="nav-link {{ Request::routeIs('admin.estudiantes.*') ? 'active' : '' }}">
                            <i class="fas fa-users nav-icon"></i>
                            <span>Estudiantes</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-chalkboard-teacher nav-icon"></i>
                            <span>Profesores</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-book nav-icon"></i>
                            <span>Materias</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fas fa-cog nav-icon"></i>
                            <span>Gestión</span>
                            <i class="fas fa-chevron-down dropdown-arrow"></i>
                        </a>
                        <!-- Dropdown con colores institucionales -->
                        <ul class="dropdown-menu nav-dropdown">
                            <li><a href="{{ route('admin.horarios.index') }}" class="dropdown-item">
                                <i class="fas fa-calendar-alt text-edu-green"></i>Horarios
                            </a></li>
                            <li><a href="#" class="dropdown-item">
                                <i class="fas fa-clipboard-list text-edu-green"></i>Calificaciones
                            </a></li>
                            <li><a href="#" class="dropdown-item">
                                <i class="fas fa-tasks text-edu-green"></i>Actividades
                            </a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <!-- Sección Derecha: Controles de Usuario -->
            <div class="header-right">
                <!-- Búsqueda con estilo institucional -->
                <div class="search-container">
                    <form class="search-form">
                        <div class="search-input-group">
                            <i class="fas fa-search search-icon"></i>
                            <input type="search" class="search-input" placeholder="Buscar estudiantes, profesores..." aria-label="Buscar">
                            <button type="button" class="search-clear" style="display: none;">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Controles de Usuario con colores institucionales -->
                <div class="user-controls">
                    <!-- Notificaciones con badge amarillo -->
                    <div class="control-item dropdown">
                        <button class="control-btn notification-btn" data-bs-toggle="dropdown" aria-label="Notificaciones">
                            <i class="fas fa-bell"></i>
                            <span class="notification-badge">3</span>
                        </button>
                        <div class="dropdown-menu notification-dropdown">
                            <div class="dropdown-header">
                                <h6 class="text-edu-green">Notificaciones</h6>
                                <span class="badge bg-edu-yellow text-edu-green">3 nuevas</span>
                            </div>
                            <div class="dropdown-body">
                                <a href="{{ route('admin.estudiantes.index') }}" class="notification-item dropdown-item">
                                    <div class="notification-icon">
                                        <i class="fas fa-user-graduate text-edu-green"></i>
                                    </div>
                                    <div class="notification-content">
                                        <p class="mb-1 fw-semibold">Nuevo estudiante registrado</p>
                                        <span class="notification-time text-muted small">Hace 5 min</span>
                                    </div>
                                </a>
                                <a href="#" class="notification-item dropdown-item">
                                    <div class="notification-icon">
                                        <i class="fas fa-calendar text-edu-yellow"></i>
                                    </div>
                                    <div class="notification-content">
                                        <p class="mb-1 fw-semibold">Horario actualizado</p>
                                        <span class="notification-time text-muted small">Hace 10 min</span>
                                    </div>
                                </a>
                                <a href="{{ route('admin.estudiantes.eliminados') }}" class="notification-item dropdown-item">
                                    <div class="notification-icon">
                                        <i class="fas fa-clipboard-check text-edu-green"></i>
                                    </div>
                                    <div class="notification-content">
                                        <p class="mb-1 fw-semibold">Calificaciones actualizadas</p>
                                        <span class="notification-time text-muted small">Hace 1 hora</span>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer">
                                <a href="#" class="btn-view-all text-edu-green fw-semibold">Ver todas las notificaciones</a>
                            </div>
                        </div>
                    </div>

                    <!-- Perfil de Usuario con diseño institucional -->
                    <div class="control-item dropdown">
                        <button class="control-btn user-btn" data-bs-toggle="dropdown" aria-label="Menú de usuario">
                            <img src="{{ asset('images/Usuario.png') }}" class="user-avatar" alt="Avatar del usuario">
                            <div class="user-info">
                                <span class="user-name">@auth {{ Auth::user()->name }} @endauth</span>
                                <span class="user-role">Administrador</span>
                            </div>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu user-dropdown">
                            <div class="dropdown-header">
                                <div class="user-card d-flex align-items-center">
                                    <img src="{{ asset('images/Usuario.png') }}" class="user-card-avatar me-3" alt="Usuario" style="width: 50px; height: 50px; border-radius: 50%; border: 2px solid var(--edu-green);">
                                    <div>
                                        <h6 class="mb-1 text-edu-green">@auth {{ Auth::user()->name }} @endauth</h6>
                                        <p class="mb-0 small text-muted">admin@colegio.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-body">
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-user text-edu-green me-2"></i>Mi Perfil
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-cog text-edu-green me-2"></i>Configuración
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-question-circle text-edu-yellow me-2"></i>Centro de Ayuda
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" class="dropdown-item logout-item text-danger"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Toggle Modo Oscuro -->
                    <div class="control-item">
                        <button class="control-btn theme-toggle" id="darkModeToggle" aria-label="Cambiar tema">
                            <i class="fas fa-moon"></i>
                        </button>
                    </div>

                    <!-- Menú Móvil Toggle -->
                    <div class="control-item mobile-menu-toggle d-md-none">
                        <button class="control-btn menu-btn" data-widget="pushmenu" aria-label="Abrir menú">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Sidebar con Diseño Institucional -->
    <aside class="sidebar">
        <!-- Header del Sidebar con gradiente institucional -->
        <div class="sidebar-header">
            <div class="sidebar-brand d-flex align-items-center">
                <!-- Icono en verde institucional -->
                <i class="fa-solid fa-graduation-cap fa-2x me-3" style="color: var(--edu-white);"></i>
                <div class="sidebar-brand-text">
                    <h5 class="mb-1">Panel Administrativo</h5>
                    <p class="mb-0 opacity-90">Gestión Escolar</p>
                </div>
            </div>
        </div>

        <div class="sidebar-body">
            <!-- Perfil Usuario en Sidebar con colores institucionales -->
            <div class="sidebar-user">
                <img src="{{ asset('images/Usuario.png') }}" class="sidebar-user-avatar" alt="Avatar del usuario">
                <div class="sidebar-user-info">
                    <h6 class="mb-1">@auth {{ Auth::user()->name }} @endauth</h6>
                    <p class="mb-0">Administrador</p>
                </div>
                <div class="sidebar-user-status">
                    <span class="status-dot online" title="En línea"></span>
                </div>
            </div>

            <!-- Navegación Sidebar con secciones organizadas -->
            <nav class="sidebar-nav">
                <!-- Sección Principal -->
                <div class="nav-section">
                    <h6 class="nav-section-title">Panel Principal</h6>
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                                <i class="fas fa-tachometer-alt nav-icon"></i>
                                <span class="nav-text">Dashboard</span>
                                <span class="nav-badge bg-edu-yellow text-edu-green">5</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-chart-line nav-icon"></i>
                                <span class="nav-text">Estadísticas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-bell nav-icon"></i>
                                <span class="nav-text">Notificaciones</span>
                                <span class="nav-badge bg-edu-yellow text-edu-green">3</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Sección Académica -->
                <div class="nav-section">
                    <h6 class="nav-section-title">Gestión Académica</h6>
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="{{ route('admin.estudiantes.pendientes') }}" class="nav-link {{ Request::routeIs('admin.estudiantes.*') ? 'active' : '' }}">
                                <i class="fas fa-user-graduate nav-icon"></i>
                                <span class="nav-text">Estudiantes</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-chalkboard-teacher nav-icon"></i>
                                <span class="nav-text">Profesores</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-book-open nav-icon"></i>
                                <span class="nav-text">Materias</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.horarios.index') }}" class="nav-link {{ Request::routeIs('admin.horarios.*') ? 'active' : '' }}">
                                <i class="fas fa-calendar-alt nav-icon"></i>
                                <span class="nav-text">Horarios</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Sección Evaluación -->
                <div class="nav-section">
                    <h6 class="nav-section-title">Evaluación</h6>
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-clipboard-list nav-icon"></i>
                                <span class="nav-text">Calificaciones</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-tasks nav-icon"></i>
                                <span class="nav-text">Actividades</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-file-alt nav-icon"></i>
                                <span class="nav-text">Reportes</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-award nav-icon"></i>
                                <span class="nav-text">Certificados</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Sección Sistema -->
                <div class="nav-section">
                    <h6 class="nav-section-title">Configuración</h6>
                    <ul class="nav-list">
                        <li class="nav-item has-submenu">
                            <a href="#" class="nav-link submenu-toggle" onclick="toggleSubmenu(this)">
                                <i class="fas fa-cogs nav-icon"></i>
                                <span class="nav-text">Sistema</span>
                                <i class="fas fa-chevron-down nav-arrow"></i>
                            </a>
                            <ul class="submenu">
                                <li><a href="#" class="submenu-link">
                                    <i class="fas fa-users-cog text-edu-green"></i>Gestión de Usuarios
                                </a></li>
                                <li><a href="#" class="submenu-link">
                                    <i class="fas fa-shield-alt text-edu-yellow"></i>Permisos y Roles
                                </a></li>
                                <li><a href="#" class="submenu-link">
                                    <i class="fas fa-database text-edu-green"></i>Respaldo de Datos
                                </a></li>
                                <li><a href="#" class="submenu-link">
                                    <i class="fas fa-palette text-edu-yellow"></i>Personalización
                                </a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-life-ring nav-icon"></i>
                                <span class="nav-text">Soporte</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Widget de progreso institucional (opcional) -->
            <div class="sidebar-widget mt-4 p-3" style="background: var(--edu-gray-100); border-radius: var(--border-radius-md); border-left: 4px solid var(--edu-yellow);">
                <h6 class="text-edu-green mb-2">
                    <i class="fas fa-chart-pie me-2"></i>Progreso del Período
                </h6>
                <div class="progress mb-2" style="height: 8px;">
                    <div class="progress-bar" style="background: var(--gradient-primary); width: 75%;" role="progressbar"></div>
                </div>
                <small class="text-muted">75% completado</small>
            </div>
        </div>
    </aside>

    <!-- Contenido Principal -->
    <main class="main-content">
        <!-- Overlay para móvil -->
        <div class="sidebar-overlay" onclick="toggleSidebar()"></div>
        
        <!-- Breadcrumb con estilo institucional -->
        @if(!empty($breadcrumb))
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb bg-edu-white p-3 rounded shadow-sm">
                @foreach($breadcrumb as $item)
                    @if($loop->last)
                        <li class="breadcrumb-item active text-edu-green fw-semibold" aria-current="page">
                            <i class="{{ $item['icon'] ?? 'fas fa-circle' }} me-1"></i>{{ $item['title'] }}
                        </li>
                    @else
                        <li class="breadcrumb-item">
                            <a href="{{ $item['url'] }}" class="text-edu-green text-decoration-none">
                                <i class="{{ $item['icon'] ?? 'fas fa-home' }} me-1"></i>{{ $item['title'] }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ol>
        </nav>
        @endif

        <!-- Contenido de la página -->
        <div class="content-wrapper">
            @yield('content')
        </div>
    </main>

    <!-- Footer Institucional -->
    <footer class="footer mt-5 py-4" style="background: var(--gradient-primary); color: var(--edu-white);">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-2 mb-md-0">
                        <i class="fas fa-graduation-cap me-2"></i>
                        <strong>Sistema de Gestión Escolar</strong> - Educación de Calidad
                    </p>
                    <small class="opacity-75">© {{ date('Y') }} Colegio. Todos los derechos reservados.</small>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="footer-links">
                        <a href="#" class="text-white text-decoration-none me-3 opacity-75 hover:opacity-100">
                            <i class="fas fa-question-circle me-1"></i>Ayuda
                        </a>
                        <a href="#" class="text-white text-decoration-none me-3 opacity-75 hover:opacity-100">
                            <i class="fas fa-phone me-1"></i>Contacto
                        </a>
                        <a href="#" class="text-white text-decoration-none opacity-75 hover:opacity-100">
                            <i class="fas fa-shield-alt me-1"></i>Privacidad
                        </a>
                    </div>
                    <small class="d-block mt-2 opacity-75">
                        Versión 2.1.0 | 
                        <span class="text-warning fw-semibold">
                            <i class="fas fa-heart me-1"></i>Hecho con dedicación
                        </span>
                    </small>
                </div>
            </div>
        </div>
    </footer>

    <!-- Form de logout -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- JavaScript Mejorado con Funcionalidades Institucionales -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Variables globales
            const sidebar = document.querySelector('.sidebar');
            const sidebarOverlay = document.querySelector('.sidebar-overlay');
            const mainContent = document.querySelector('.main-content');
            
            /**
             * FUNCIONALIDAD DEL SIDEBAR
             * Manejo responsive del menú lateral
             */
            const sidebarToggle = document.querySelector('[data-widget="pushmenu"]');
            
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    toggleSidebar();
                });
            }
            
            // Función global para toggle del sidebar
            window.toggleSidebar = function() {
                document.body.classList.toggle('sidebar-open');
                sidebar?.classList.toggle('show');
                sidebarOverlay?.classList.toggle('show');
            };
            
            // Cerrar sidebar al hacer clic en overlay
            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', function() {
                    toggleSidebar();
                });
            }
            
            /**
             * FUNCIONALIDAD DE SUBMENÚS
             * Control de menús desplegables en el sidebar
             */
            window.toggleSubmenu = function(element) {
                const submenu = element.nextElementSibling;
                const arrow = element.querySelector('.nav-arrow');
                const isOpen = submenu?.style.display === 'block';
                
                // Cerrar todos los otros submenús
                document.querySelectorAll('.submenu').forEach(menu => {
                    if (menu !== submenu) {
                        menu.style.display = 'none';
                    }
                });
                document.querySelectorAll('.nav-arrow').forEach(arr => {
                    if (arr !== arrow) {
                        arr.style.transform = 'rotate(0deg)';
                    }
                });
                
                // Toggle del submenú actual
                if (submenu) {
                    if (!isOpen) {
                        submenu.style.display = 'block';
                        arrow.style.transform = 'rotate(180deg)';
                    } else {
                        submenu.style.display = 'none';
                        arrow.style.transform = 'rotate(0deg)';
                    }
                }
            };
            
            /**
             * FUNCIONALIDAD DE BÚSQUEDA
             * Búsqueda mejorada con limpieza
             */
            const searchInput = document.querySelector('.search-input');
            const searchClear = document.querySelector('.search-clear');
            
            if (searchInput && searchClear) {
                searchInput.addEventListener('input', function() {
                    const hasValue = this.value.length > 0;
                    searchClear.style.display = hasValue ? 'block' : 'none';
                    
                    // Agregar clase de búsqueda activa
                    this.parentElement.classList.toggle('searching', hasValue);
                });
                
                searchClear.addEventListener('click', function() {
                    searchInput.value = '';
                    this.style.display = 'none';
                    searchInput.focus();
                    searchInput.parentElement.classList.remove('searching');
                });
            }
            
            /**
             * MODO OSCURO
             * Toggle entre tema claro y oscuro
             */
            const darkModeToggle = document.getElementById('darkModeToggle');
            const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)");
            
            if (darkModeToggle) {
                // Cargar preferencia guardada
                const currentTheme = localStorage.getItem('theme') || 
                    (prefersDarkScheme.matches ? 'dark' : 'light');
                
                if (currentTheme === 'dark') {
                    document.body.classList.add('dark-mode');
                    darkModeToggle.querySelector('i').classList.replace('fa-moon', 'fa-sun');
                }
                
                darkModeToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.body.classList.toggle('dark-mode');
                    
                    const icon = this.querySelector('i');
                    const isDark = document.body.classList.contains('dark-mode');
                    
                    if (isDark) {
                        icon.classList.replace('fa-moon', 'fa-sun');
                        localStorage.setItem('theme', 'dark');
                    } else {
                        icon.classList.replace('fa-sun', 'fa-moon');
                        localStorage.setItem('theme', 'light');
                    }
                    
                    // Animación suave
                    this.style.transform = 'scale(0.9)';
                    setTimeout(() => {
                        this.style.transform = 'scale(1)';
                    }, 150);
                });
            }
            
            /**
             * NAVEGACIÓN ACTIVA
             * Manejo de estados activos en los enlaces
             */
            document.querySelectorAll('.nav-link:not(.submenu-toggle)').forEach(link => {
                link.addEventListener('click', function(e) {
                    // Solo para enlaces que no son submenús
                    if (!this.classList.contains('submenu-toggle')) {
                        // Remover clase activa de todos los enlaces del mismo nivel
                        const navLinks = this.closest('.nav-list')?.querySelectorAll('.nav-link') || 
                                        this.closest('.nav-menu')?.querySelectorAll('.nav-link') || [];
                        
                        navLinks.forEach(l => l.classList.remove('active'));
                        this.classList.add('active');
                    }
                });
            });
            
            /**
             * NOTIFICACIONES
             * Manejo de notificaciones en tiempo real
             */
            function updateNotificationBadge(count) {
                const badges = document.querySelectorAll('.notification-badge');
                badges.forEach(badge => {
                    badge.textContent = count;
                    badge.style.display = count > 0 ? 'flex' : 'none';
                });
            }
            
            /**
             * TOOLTIPS Y MEJORAS UX
             * Inicialización de tooltips de Bootstrap
             */
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
            
            /**
             * RESPONSIVE BEHAVIOR
             * Comportamiento responsive mejorado
             */
            function handleResize() {
                const isMobile = window.innerWidth < 768;
                const isTablet = window.innerWidth >= 768 && window.innerWidth < 992;
                
                if (!isMobile && document.body.classList.contains('sidebar-open')) {
                    document.body.classList.remove('sidebar-open');
                    sidebar?.classList.remove('show');
                    sidebarOverlay?.classList.remove('show');
                }
            }
            
            window.addEventListener('resize', handleResize);
            handleResize(); // Ejecutar al cargar
            
            /**
             * ANIMACIONES Y EFECTOS
             * Mejoras visuales con animaciones suaves
             */
            
            // Efecto de carga para las cards
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                    }
                });
            }, observerOptions);
            
            // Observar elementos con animación
            document.querySelectorAll('.card, .sidebar-widget').forEach(el => {
                observer.observe(el);
            });
            
            /**
             * ACCESIBILIDAD
             * Mejoras de accesibilidad
             */
            
            // Navegación por teclado en el sidebar
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        this.click();
                    }
                });
            });
            
            // Focus trapping en dropdowns abiertos
            document.querySelectorAll('.dropdown').forEach(dropdown => {
                dropdown.addEventListener('shown.bs.dropdown', function() {
                    const firstFocusable = this.querySelector('.dropdown-menu a, .dropdown-menu button');
                    if (firstFocusable) {
                        firstFocusable.focus();
                    }
                });
            });
            
            console.log('✅ Sistema de Gestión Escolar inicializado correctamente');
            console.log('🎨 Paleta institucional: Verde (#2E8B57), Amarillo (#FFCC33), Blanco (#FFFFFF)');
        });
    </script>
    
    <!-- Scripts adicionales específicos de cada página -->
    @stack('scripts')
    
    