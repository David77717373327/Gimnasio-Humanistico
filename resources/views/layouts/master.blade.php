<!DOCTYPE html>
<html lang="es" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión Escolar</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
   
</head>

<body>
    <!-- Header Principal -->
    <header class="main-header">
        <div class="header-container">
            <!-- Sección Izquierda -->
            <div class="header-left">
                <button class="sidebar-toggle-btn" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="logo-container">
                    <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="header-logo">
                    <div class="brand-text">
                        <h2 class="brand-title">Gimnasio Humanístico</h2>
                        <span class="brand-subtitle">Gestión Educativa Nieva Huila</span>
                    </div>
                </div>
            </div>

            <!-- Navegación Central -->
            <nav class="header-navigation">
                <ul class="nav-menu">

                </ul>
            </nav>

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
                            <span class="user-name">@auth {{ Auth::user()->name }} @endauth
                            </span>
                            <span class="user-role">Administrador</span>
                        </div>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="dropdown-menu user-dropdown">
                        <div class="dropdown-header">
                            <div class="user-card">
                                <img src="{{ asset('images/Usuario.png') }}" class="user-card-avatar" alt="Usuario">
                                <div>
                                    <h6>@auth {{ Auth::user()->name }} @endauth
                                    </h6>
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
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-brand">
                <i class="fa-solid fa-gear"></i>
                <div class="sidebar-brand-text">
                    <h5>Panel Admin</h5>
                    <p>Gestión Escolar</p>
                </div>
            </div>
        </div>
        <div class="sidebar-body">


            <!-- Navegación Sidebar -->
            <nav class="sidebar-nav">
                <div class="nav-section">
                    <h6 class="nav-section-title">Principal</h6>
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="{{ route('admin.estudiantes.index') }}" class="nav-link active">
                                <i class="fas fa-tachometer-alt nav-icon"></i>
                                <span class="nav-text">Dashboard</span>
                                <span class="nav-badge">5</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="nav-section">
                    <h6 class="nav-section-title">Académico</h6>
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="{{ route('admin.estudiantes.pendientes') }}" class="nav-link">
                                <i class="fas fa-user-graduate nav-icon"></i>
                                <span class="nav-text">Estudiantes</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.profesores.index') }}" class="nav-link">
                                <i class="fas fa-chalkboard-teacher nav-icon"></i>
                                <span class="nav-text">Profesores</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.asignaturas.index') }}" class="nav-link">
                                <i class="fas fa-book-open nav-icon"></i>
                                <span class="nav-text">Materias</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.horarios.index') }}" class="nav-link">
                                <i class="fas fa-calendar-alt nav-icon"></i>
                                <span class="nav-text">Horarios</span>
                            </a>
                        </li>

                        {{-- 🔹 Nuevo ítem NIVELES --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.niveles.index') }}" class="nav-link">
                                <i class="fas fa-layer-group nav-icon"></i>
                                <span class="nav-text">Niveles</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </aside>

     @yield('scripts')
    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <!-- JavaScript -->
    <script>
        function toggleSidebar() {
            document.body.classList.toggle('sidebar-collapsed');
            localStorage.setItem('sidebarCollapsed', document.body.classList.contains('sidebar-collapsed'));
        }

        // Cargar preferencia del sidebar
        document.addEventListener('DOMContentLoaded', function() {
            if (localStorage.getItem('sidebarCollapsed') === 'true') {
                document.body.classList.add('sidebar-collapsed');
            }

            // Responsive: toggle sidebar en mobile
            const sidebarToggle = document.querySelector('.sidebar-toggle-btn');
            if (window.innerWidth <= 992) {
                sidebarToggle.addEventListener('click', function() {
                    document.body.classList.toggle('sidebar-open');
                });
            }
        });
    </script>

 @stack('scripts')
</body>

</html>
