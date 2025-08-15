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
    <!-- Top Navbar -->
    <header class="main-header bg-white border-b shadow-sm fixed w-full z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center py-2">
                <!-- Logo a la izquierda -->
                <div class="flex-shrink-0">
                    <img src="{{ asset('images/Logo.png') }}" alt="Logo del Colegio" class="logo-colegio">
                </div>


                <div class="AcomodarLasNavegaciones">
                    <!-- Espacio flexible para empujar el resto a la derecha -->
                    <div class="flex-grow"></div>
                    <!-- Elementos a la derecha: búsqueda, notificaciones, usuario, dark mode -->
                    <div class="flex items-center space-x-6">

                        <!-- Notifications Dropdown Menu -->
                        <div class="nav-item dropdown">
                            <a class="nav-link text-gray-700 hover:text-gray-900" data-bs-toggle="dropdown"
                                href="#" role="button">
                                <i class="far fa-bell"></i>
                                <span class="badge bg-yellow-400 text-white text-xs ml-1">15</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-2">
                                <h6 class="dropdown-header text-sm font-semibold">15 Notificaciones</h6>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item text-sm py-1">
                                    <i class="fas fa-envelope mr-2"></i> 4 nuevos mensajes
                                    <span class="float-right text-gray-500 text-xs">3 mins</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item dropdown-footer text-sm">Ver todas las
                                    notificaciones</a>
                            </div>
                        </div>
                        <!-- User Dropdown Menu -->
                        <div class="nav-item dropdown">
                            <a class="nav-link text-gray-700 hover:text-gray-900" data-bs-toggle="dropdown"
                                href="#" role="button">
                                <img src="{{ asset('images/Usuario.png') }}" class="rounded-full w-8 h-8 object-cover"
                                    alt="User Image">
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-2">
                                <h6 class="dropdown-header text-sm font-semibold">Perfil de Usuario</h6>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item text-sm py-1">
                                    <i class="fas fa-user mr-2"></i> Perfil
                                </a>
                                <a href="#" class="dropdown-item text-sm py-1">
                                    <i class="fas fa-cog mr-2"></i> Configuraciones
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}"
                                    class="dropdown-item text-sm py-1 text-red-600 hover:bg-red-100"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión
                                </a>
                            </div>
                        </div>
                        <!-- Dark Mode Toggle -->
                        <div class="nav-item">
                            <a class="nav-link text-gray-700 hover:text-gray-900" id="darkModeToggle" href="#"
                                role="button">
                                <i class="fas fa-moon"></i>
                            </a>
                        </div>
                        <!-- SEARCH FORM -->
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input
                                    class="form-control form-control-navbar border-gray-300 rounded-l focus:ring-2 focus:ring-green-500"
                                    type="search" placeholder="Buscar" aria-label="Buscar">
                                <button
                                    class="btn btn-outline-secondary border-gray-300 rounded-r hover:bg-gray-200 focus:ring-2 focus:ring-green-500"
                                    type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                        <!-- Botón hamburguesa junto al logo -->
                        <div class="ml-4">
                            <button class="nav-link text-gray-700 hover:text-gray-900 focus:outline-none"
                                data-widget="pushmenu">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    </header>

    <!-- Main Content Area -->
    <div class="flex flex-1 pt-16"> <!-- Padding-top to account for fixed header -->
        <!-- Sidebar -->
        <aside
            class="sidebar bg-gradient-to-b from-green-800 to-green-900 shadow-lg flex flex-col transition-all duration-300 fixed h-screen z-40">
            <div class="sidebar-content">
                <!-- User Panel -->
                <div class="user-panel mt-3 pb-3 mb-3 flex items-center px-4 border-b border-green-700">
                    <div class="image">
                        <img src="{{ asset('images/Usuario.png') }}" class="rounded-full w-10 h-10 object-cover shadow"
                            alt="User Image">
                    </div>
                    <div class="info ml-3">
                        <a href="#" class="block text-white font-semibold">@auth {{ Auth::user()->name }} @endauth
                        </a>
                    </div>
                </div>
                <nav class="flex-1 p-4">
                    <a href="#"
                        class="menu-item block mb-2 nav-link text-white hover:bg-yellow-300 hover:text-green-900 rounded p-2 transition flex items-center group">
                        <i class="fa-solid fa-home nav-icon mr-3 text-green-300"></i> Dashboard
                    </a>
                    <a href="#"
                        class="menu-item block mb-2 nav-link text-white hover:bg-yellow-300 hover:text-green-900 rounded p-2 transition flex items-center group">
                        <i class="fa-solid fa-calendar-days nav-icon mr-3 text-green-300"></i> Horarios
                    </a>
                    <a href="#"
                        class="menu-item block mb-2 nav-link text-white hover:bg-yellow-300 hover:text-green-900 rounded p-2 transition flex items-center group">
                        <i class="fa-solid fa-tasks nav-icon mr-3 text-green-300"></i> Actividades de Clases
                    </a>
                    <a href="#"
                        class="menu-item block mb-2 nav-link text-white hover:bg-yellow-300 hover:text-green-900 rounded p-2 transition flex items-center group">
                        <i class="fa-solid fa-chalkboard-teacher nav-icon mr-3 text-green-300"></i> Profesores
                    </a>
                    <a href="#"
                        class="menu-item block mb-2 nav-link text-white hover:bg-yellow-300 hover:text-green-900 rounded p-2 transition flex items-center group">
                        <i class="fa-solid fa-users nav-icon mr-3 text-green-300"></i> Alumnos
                    </a>
                    <a href="#"
                        class="menu-item block mb-2 nav-link text-white hover:bg-yellow-300 hover:text-green-900 rounded p-2 transition flex items-center group">
                        <i class="fa-solid fa-clipboard-list nav-icon mr-3 text-green-300"></i> Calificaciones
                    </a>
                    <a href="#"
                        class="menu-item block mb-2 nav-link text-white hover:bg-yellow-300 hover:text-green-900 rounded p-2 transition flex items-center group">
                        <i class="fa-solid fa-book nav-icon mr-3 text-green-300"></i> Materias
                    </a>
                    <a href="#"
                        class="menu-item submenu-toggle block mb-2 nav-link text-white hover:bg-yellow-300 hover:text-green-900 rounded p-2 transition flex items-center group"
                        onclick="toggleSubmenu(event, 'configuraciones-submenu')">
                        <i class="fa-solid fa-cog nav-icon mr-3 text-green-300"></i> Configuraciones
                        <i class="fa-solid fa-chevron-down arrow ml-auto text-white transition-transform"></i>
                    </a>
                    <div class="submenu nav-treeview hidden" id="configuraciones-submenu">
                        <ul class="submenu-list pl-4">
                            <li><a href="#"
                                    class="nav-link text-white hover:bg-yellow-300 hover:text-green-900 rounded p-1 transition flex items-center text-sm"><i
                                        class="far fa-circle nav-icon mr-2"></i> Gestionar Usuarios</a></li>
                            <li><a href="#"
                                    class="nav-link text-white hover:bg-yellow-300 hover:text-green-900 rounded p-1 transition flex items-center text-sm"><i
                                        class="far fa-circle nav-icon mr-2"></i> Roles y Permisos</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </aside>
        <!-- Main Content -->
        <main class="flex-1 main-content ml-[260px] p-8">
            @yield('content')
        </main>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>

    <!-- JavaScript Enhancements -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar Toggle
            const sidebarToggle = document.querySelector('[data-widget="pushmenu"]');
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.body.classList.toggle('sidebar-collapse');
                    const sidebar = document.querySelector('.sidebar');
                    const mainContent = document.querySelector('.main-content');
                    if (document.body.classList.contains('sidebar-collapse')) {
                        sidebar.style.width = '80px';
                        mainContent.style.marginLeft = '80px';
                    } else {
                        sidebar.style.width = '260px';
                        mainContent.style.marginLeft = '260px';
                    }
                });
            }

            // Auto-expand Sidebar on Hover
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');
            sidebar.addEventListener('mouseenter', function() {
                if (document.body.classList.contains('sidebar-collapse')) {
                    sidebar.style.width = '260px';
                    mainContent.style.marginLeft = '260px';
                    document.querySelectorAll('.sidebar .nav-link span').forEach(span => {
                        span.style.opacity = '1';
                    });
                }
            });
            sidebar.addEventListener('mouseleave', function() {
                if (document.body.classList.contains('sidebar-collapse')) {
                    sidebar.style.width = '80px';
                    mainContent.style.marginLeft = '80px';
                    document.querySelectorAll('.sidebar .nav-link span').forEach(span => {
                        span.style.opacity = '0';
                    });
                }
            });

            // Submenu Toggle with Hover
            document.querySelectorAll('.menu-item').forEach(item => {
                item.addEventListener('mouseenter', function(e) {
                    const submenu = this.querySelector('.submenu');
                    if (submenu) {
                        document.querySelectorAll('.submenu').forEach(sub => sub.classList.add(
                            'hidden'));
                        document.querySelectorAll('.submenu-toggle').forEach(toggle => {
                            toggle.classList.remove('menu-open');
                            toggle.querySelector('.arrow').classList.remove('rotate-180');
                        });
                        submenu.classList.remove('hidden');
                        submenu.classList.add('block');
                        this.classList.add('menu-open');
                        this.querySelector('.arrow').classList.add('rotate-180');
                    }
                });
                item.addEventListener('mouseleave', function(e) {
                    const submenu = this.querySelector('.submenu');
                    if (submenu) {
                        submenu.classList.add('hidden');
                        submenu.classList.remove('block');
                        this.classList.remove('menu-open');
                        this.querySelector('.arrow').classList.remove('rotate-180');
                    }
                });
            });

            // Dark Mode Toggle
            const darkModeToggle = document.getElementById('darkModeToggle');
            if (darkModeToggle) {
                darkModeToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.body.classList.toggle('dark-mode');
                    const icon = this.querySelector('i');
                    icon.classList.toggle('fa-moon');
                    icon.classList.toggle('fa-sun');
                    localStorage.setItem('darkMode', document.body.classList.contains('dark-mode') ?
                        'enabled' : 'disabled');
                });
            }

            // Load dark mode preference
            if (localStorage.getItem('darkMode') === 'enabled') {
                document.body.classList.add('dark-mode');
                if (darkModeToggle) {
                    darkModeToggle.querySelector('i').classList.replace('fa-moon', 'fa-sun');
                }
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
