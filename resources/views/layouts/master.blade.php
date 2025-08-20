<!DOCTYPE html>
<html lang="es" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión Escolar</title>
    <!-- Google Fonts for Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap JS for dropdowns -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="min-h-screen flex flex-col bg-gray-100 text-gray-800 font-inter">
    <!-- Header Principal Reorganizado -->
    <header class="main-header">
        <div class="header-container">
            <!-- Sección Izquierda: Logo -->
            <div class="header-left">
                <div class="logo-container">
                    <img src="{{ asset('images/Logo.png') }}" alt="Logo del Colegio" class="header-logo">
                    <div class="brand-text">
                        <h2 class="brand-title">Sistema Escolar</h2>
                        <span class="brand-subtitle">Gestión Educativa</span>
                    </div>
                </div>
            </div>

            <!-- Sección Central: Navegación Principal -->
            <nav class="header-navigation">
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="fas fa-home nav-icon"></i>
                            <span>Inicio</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
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
                        <ul class="dropdown-menu nav-dropdown">
                            <li><a href="#" class="dropdown-item">
                                <i class="fas fa-calendar-alt"></i>Horarios
                            </a></li>
                            <li><a href="#" class="dropdown-item">
                                <i class="fas fa-clipboard-list"></i>Calificaciones
                            </a></li>
                            <li><a href="#" class="dropdown-item">
                                <i class="fas fa-tasks"></i>Actividades
                            </a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <!-- Sección Derecha: Controles de Usuario -->
            <div class="header-right">
                <!-- Búsqueda Mejorada -->
                <div class="search-container">
                    <form class="search-form">
                        <div class="search-input-group">
                            <i class="fas fa-search search-icon"></i>
                            <input type="search" class="search-input" placeholder="Buscar..." aria-label="Buscar">
                            <button type="button" class="search-clear" style="display: none;">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Controles de Usuario -->
                <div class="user-controls">
                    <!-- Notificaciones -->
                    <div class="control-item dropdown">
                        <button class="control-btn notification-btn" data-bs-toggle="dropdown">
                            <i class="fas fa-bell"></i>
                            <span class="notification-badge">3</span>
                        </button>
                        <div class="dropdown-menu notification-dropdown">
                            <div class="dropdown-header">
                                <h6>Notificaciones</h6>
                                <span class="badge">3 nuevas</span>
                            </div>
                            <div class="dropdown-body">
                                <a href="#" class="notification-item">
                                    <div class="notification-icon">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                    <div class="notification-content">
                                        <p>Nuevo estudiante registrado</p>
                                        <span class="notification-time">Hace 5 min</span>
                                    </div>
                                </a>
                                <a href="#" class="notification-item">
                                    <div class="notification-icon">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                    <div class="notification-content">
                                        <p>Horario actualizado</p>
                                        <span class="notification-time">Hace 10 min</span>
                                    </div>
                                </a>
                                <a href="#" class="notification-item">
                                    <div class="notification-icon">
                                        <i class="fas fa-clipboard-check"></i>
                                    </div>
                                    <div class="notification-content">
                                        <p>Calificaciones subidas</p>
                                        <span class="notification-time">Hace 1 hora</span>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer">
                                <a href="#" class="btn-view-all">Ver todas</a>
                            </div>
                        </div>
                    </div>

                    <!-- Perfil de Usuario -->
                    <div class="control-item dropdown">
                        <button class="control-btn user-btn" data-bs-toggle="dropdown">
                            <img src="{{ asset('images/Usuario.png') }}" class="user-avatar" alt="Usuario">
                            <div class="user-info">
                                <span class="user-name">@auth {{ Auth::user()->name }} @endauth</span>
                                <span class="user-role">Administrador</span>
                            </div>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu user-dropdown">
                            <div class="dropdown-header">
                                <div class="user-card">
                                    <img src="{{ asset('images/Usuario.png') }}" class="user-card-avatar" alt="Usuario">
                                    <div>
                                        <h6>@auth {{ Auth::user()->name }} @endauth</h6>
                                        <p>admin@colegio.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-body">
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-user"></i>Mi Perfil
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-cog"></i>Configuración
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-question-circle"></i>Ayuda
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" class="dropdown-item logout-item"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>Cerrar Sesión
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Modo Oscuro -->
                    <div class="control-item">
                        <button class="control-btn theme-toggle" id="darkModeToggle">
                            <i class="fas fa-moon"></i>
                        </button>
                    </div>

                    <!-- Menú Móvil Toggle -->
                    <div class="control-item mobile-menu-toggle">
                        <button class="control-btn menu-btn" data-widget="pushmenu">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Sidebar Mejorado -->
    <aside class="sidebar">
        <div class="sidebar-header">
    <div class="sidebar-brand d-flex align-items-center">
        <!-- Icono en vez de imagen -->
        <i class="fa-solid fa-gear fa-2x text-success me-2"></i>

        <div class="sidebar-brand-text">
            <h5>Panel Admin</h5>
            <p>Gestión Escolar</p>
        </div>
    </div>
</div>


        <div class="sidebar-body">
            <!-- Perfil Usuario en Sidebar -->
            <div class="sidebar-user">
                <img src="{{ asset('images/Usuario.png') }}" class="sidebar-user-avatar" alt="Usuario">
                <div class="sidebar-user-info">
                    <h6>@auth {{ Auth::user()->name }} @endauth</h6>
                    <p>Administrador</p>
                </div>
                <div class="sidebar-user-status">
                    <span class="status-dot online"></span>
                </div>
            </div>

            <!-- Navegación Sidebar -->
            <nav class="sidebar-nav">
                <div class="nav-section">
                    <h6 class="nav-section-title">Principal</h6>
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fas fa-tachometer-alt nav-icon"></i>
                                <span class="nav-text">Dashboard</span>
                                <span class="nav-badge">5</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-chart-line nav-icon"></i>
                                <span class="nav-text">Estadísticas</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="nav-section">
                    <h6 class="nav-section-title">Académico</h6>
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
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
                            <a href="#" class="nav-link">
                                <i class="fas fa-calendar-alt nav-icon"></i>
                                <span class="nav-text">Horarios</span>
                            </a>
                        </li>
                    </ul>
                </div>

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
                    </ul>
                </div>

                <div class="nav-section">
                    <h6 class="nav-section-title">Sistema</h6>
                    <ul class="nav-list">
                        <li class="nav-item has-submenu">
                            <a href="#" class="nav-link submenu-toggle" onclick="toggleSubmenu(this)">
                                <i class="fas fa-cogs nav-icon"></i>
                                <span class="nav-text">Configuración</span>
                                <i class="fas fa-chevron-down nav-arrow"></i>
                            </a>
                            <ul class="submenu">
                                <li><a href="#" class="submenu-link">
                                    <i class="fas fa-users-cog"></i>Usuarios
                                </a></li>
                                <li><a href="#" class="submenu-link">
                                    <i class="fas fa-shield-alt"></i>Permisos
                                </a></li>
                                <li><a href="#" class="submenu-link">
                                    <i class="fas fa-database"></i>Respaldo
                                </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>

    <!-- JavaScript Mejorado -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar Toggle
            const sidebarToggle = document.querySelector('[data-widget="pushmenu"]');
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');
            
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.body.classList.toggle('sidebar-collapsed');
                });
            }

            // Submenu Toggle
            function toggleSubmenu(element) {
                const submenu = element.nextElementSibling;
                const arrow = element.querySelector('.nav-arrow');
                const isOpen = submenu.style.display === 'block';
                
                // Cerrar otros submenus
                document.querySelectorAll('.submenu').forEach(menu => {
                    menu.style.display = 'none';
                });
                document.querySelectorAll('.nav-arrow').forEach(arr => {
                    arr.style.transform = 'rotate(0deg)';
                });
                
                if (!isOpen) {
                    submenu.style.display = 'block';
                    arrow.style.transform = 'rotate(180deg)';
                }
            }
            
            window.toggleSubmenu = toggleSubmenu;

            // Search functionality
            const searchInput = document.querySelector('.search-input');
            const searchClear = document.querySelector('.search-clear');
            
            if (searchInput && searchClear) {
                searchInput.addEventListener('input', function() {
                    if (this.value.length > 0) {
                        searchClear.style.display = 'block';
                    } else {
                        searchClear.style.display = 'none';
                    }
                });
                
                searchClear.addEventListener('click', function() {
                    searchInput.value = '';
                    this.style.display = 'none';
                    searchInput.focus();
                });
            }

            // Dark Mode Toggle
            const darkModeToggle = document.getElementById('darkModeToggle');
            if (darkModeToggle) {
                darkModeToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.body.classList.toggle('dark-mode');
                    const icon = this.querySelector('i');
                    icon.classList.toggle('fa-moon');
                    icon.classList.toggle('fa-sun');
                    localStorage.setItem('darkMode', document.body.classList.contains('dark-mode') ? 'enabled' : 'disabled');
                });
            }

            // Load dark mode preference
            if (localStorage.getItem('darkMode') === 'enabled') {
                document.body.classList.add('dark-mode');
                if (darkModeToggle) {
                    darkModeToggle.querySelector('i').classList.replace('fa-moon', 'fa-sun');
                }
            }

            // Active nav link
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    // Remove active class from all links
                    document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                    // Add active class to clicked link
                    this.classList.add('active');
                });
            });
        });
    </script>
    @stack('scripts')
</body>

</html>