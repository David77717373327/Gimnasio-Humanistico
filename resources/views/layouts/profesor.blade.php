<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Profesor - {{ config('app.name') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/profesor.css') }}">
</head>

<body>
    <!-- Navbar Superior -->
    <nav class="navbar navbar-expand-lg custom-navbar fixed-top">
        <div class="container-fluid px-4">
            <!-- Logo y nombre del colegio -->
            <div class="navbar-brand d-flex align-items-center">
                <div class="logo-container me-3">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <span class="college-name">GIMNASIO HUMANISTICO DEL ALTO MAGDALENA</span>
            </div>

            <!-- Buscador central -->
            <div class="search-container d-none d-md-flex">
                <div class="input-group">
                    <input type="text" class="form-control search-input" placeholder="Buscar...">
                    <button class="btn search-btn" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>

            <!-- Íconos de notificaciones y perfil -->
            <div class="navbar-nav flex-row">
                <!-- Notificaciones -->
                <div class="nav-item dropdown me-3">
                    <a class="nav-link notification-btn position-relative" href="#" role="button"
                        data-bs-toggle="dropdown">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end notification-dropdown">
                        <li class="dropdown-header">Notificaciones</li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-message me-2"></i>Nuevo mensaje de
                                padre</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-calendar me-2"></i>Clase programada
                                para mañana</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-clipboard me-2"></i>Tarea por
                                revisar</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-center" href="#">Ver todas</a></li>
                    </ul>
                </div>

                <!-- Perfil -->
                <div class="nav-item dropdown">
                    <a class="nav-link profile-btn d-flex align-items-center" href="#" role="button"
                        data-bs-toggle="dropdown">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=40&h=40&fit=crop&crop=face"
                            alt="Perfil" class="profile-img me-2">
                        <span class="d-none d-md-inline">Prof. Juan Pérez</span>
                        <i class="fas fa-chevron-down ms-2"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end profile-dropdown">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Mi Perfil</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Configuración</a>
                        </li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-question-circle me-2"></i>Ayuda</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form-top').submit();">
                                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                            </a>
                        </li>

                        <form id="logout-form-top" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>

                <!-- Botón menú móvil -->
                <button class="btn sidebar-toggle d-lg-none ms-2" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#sidebar">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <div class="main-wrapper">
        <!-- Sidebar Lateral -->
        <div class="offcanvas-lg offcanvas-start custom-sidebar" tabindex="-1" id="sidebar">
            <div class="offcanvas-header d-lg-none">
                <h5 class="offcanvas-title">Menú Profesor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebar"></button>
            </div>

            <div class="offcanvas-body p-0">
                <div class="sidebar-content">
                    <nav class="sidebar-nav">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="#"><i
                                        class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-chalkboard-teacher"></i><span>Mis
                                        Clases</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i
                                        class="fas fa-tasks"></i><span>Actividades</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i
                                        class="fas fa-user-check"></i><span>Asistencia</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i
                                        class="fas fa-folder-open"></i><span>Recursos</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i
                                        class="fas fa-comments"></i><span>Mensajes</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i
                                        class="fas fa-chart-bar"></i><span>Reportes</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Área Principal -->
        <main class="main-content">
            <!-- Breadcrumb y título -->
            <div class="content-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="page-title">Dashboard</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newActivityModal">
                        <i class="fas fa-plus me-2"></i>Nueva Actividad
                    </button>
                </div>
            </div>

            <!-- Tarjetas de métricas -->
            <div class="row g-4 mb-4">
                <div class="col-lg-3 col-md-6">
                    <div class="metric-card">
                        <div class="metric-icon classes-today">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                        <div class="metric-info">
                            <h3>5</h3>
                            <p>Clases de Hoy</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="metric-card">
                        <div class="metric-icon pending-activities">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="metric-info">
                            <h3>12</h3>
                            <p>Actividades Pendientes</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="metric-card">
                        <div class="metric-icon absences">
                            <i class="fas fa-user-times"></i>
                        </div>
                        <div class="metric-info">
                            <h3>8</h3>
                            <p>Ausencias por Revisar</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="metric-card">
                        <div class="metric-icon messages">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="metric-info">
                            <h3>3</h3>
                            <p>Mensajes Nuevos</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenido principal en dos columnas -->
            <div class="row g-4">
                <!-- Lista de clases -->
                <div class="col-lg-8">
                    <div class="content-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Mis Clases de Hoy</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="class-list">
                                <div class="class-item">
                                    <div class="class-time">
                                        <span class="time">08:00</span>
                                        <span class="duration">90 min</span>
                                    </div>
                                    <div class="class-info">
                                        <h6>Matemáticas Avanzadas</h6>
                                        <p class="mb-1">Grado 10-A • Aula 205</p>
                                        <span class="class-status active">En Progreso</span>
                                    </div>
                                    <div class="class-actions">
                                        <button class="btn btn-outline-primary btn-sm">Ver</button>
                                        <button class="btn btn-warning btn-sm">Enviar Tarea</button>
                                    </div>
                                </div>

                                <div class="class-item">
                                    <div class="class-time">
                                        <span class="time">10:30</span>
                                        <span class="duration">90 min</span>
                                    </div>
                                    <div class="class-info">
                                        <h6>Álgebra Básica</h6>
                                        <p class="mb-1">Grado 8-B • Aula 103</p>
                                        <span class="class-status upcoming">Próxima</span>
                                    </div>
                                    <div class="class-actions">
                                        <button class="btn btn-outline-primary btn-sm">Ver</button>
                                        <button class="btn btn-warning btn-sm">Enviar Tarea</button>
                                    </div>
                                </div>

                                <div class="class-item">
                                    <div class="class-time">
                                        <span class="time">14:00</span>
                                        <span class="duration">90 min</span>
                                    </div>
                                    <div class="class-info">
                                        <h6>Geometría</h6>
                                        <p class="mb-1">Grado 9-A • Aula 201</p>
                                        <span class="class-status upcoming">Próxima</span>
                                    </div>
                                    <div class="class-actions">
                                        <button class="btn btn-outline-primary btn-sm">Ver</button>
                                        <button class="btn btn-warning btn-sm">Enviar Tarea</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Panel de actividades recientes -->
                <div class="col-lg-4">
                    <div class="content-card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Actividades Recientes</h5>
                        </div>
                        <div class="card-body">
                            <div class="activity-list">
                                <div class="activity-item">
                                    <div class="activity-icon submitted">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="activity-content">
                                        <p class="mb-1">Tarea de Álgebra entregada</p>
                                        <small class="text-muted">Ana García • Hace 2 horas</small>
                                    </div>
                                </div>

                                <div class="activity-item">
                                    <div class="activity-icon message">
                                        <i class="fas fa-message"></i>
                                    </div>
                                    <div class="activity-content">
                                        <p class="mb-1">Mensaje de padre de familia</p>
                                        <small class="text-muted">Sr. Rodríguez • Hace 3 horas</small>
                                    </div>
                                </div>

                                <div class="activity-item">
                                    <div class="activity-icon grade">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="activity-content">
                                        <p class="mb-1">Calificación actualizada</p>
                                        <small class="text-muted">Examen Geometría • Hace 1 día</small>
                                    </div>
                                </div>

                                <div class="activity-item">
                                    <div class="activity-icon absence">
                                        <i class="fas fa-user-times"></i>
                                    </div>
                                    <div class="activity-content">
                                        <p class="mb-1">Ausencia registrada</p>
                                        <small class="text-muted">Carlos López • Hace 2 días</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal Nueva Actividad -->
    <div class="modal fade" id="newActivityModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nueva Actividad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Título de la Actividad</label>
                                <input type="text" class="form-control" placeholder="Ej: Tarea de Álgebra">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Clase</label>
                                <select class="form-select">
                                    <option>Matemáticas Avanzadas - 10A</option>
                                    <option>Álgebra Básica - 8B</option>
                                    <option>Geometría - 9A</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tipo</label>
                                <select class="form-select">
                                    <option>Tarea</option>
                                    <option>Examen</option>
                                    <option>Proyecto</option>
                                    <option>Quiz</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Fecha de Entrega</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Descripción</label>
                                <textarea class="form-control" rows="4" placeholder="Describe la actividad..."></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Archivos Adjuntos</label>
                                <input type="file" class="form-control" multiple>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Crear Actividad</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast de notificación -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fas fa-check-circle me-2"></i>
                    ¡Actividad creada exitosamente!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto"
                    data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="custom-footer">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">&copy; 2024 Instituto Educativo San Martín. Todos los derechos reservados.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">Versión 2.1.0 | <a href="#" class="footer-link">Soporte Técnico</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        // Función para mostrar toast de notificación
        function showToast(message, type = 'success') {
            const toast = document.getElementById('successToast');
            const toastBody = toast.querySelector('.toast-body');

            // Cambiar contenido del toast
            toastBody.innerHTML = `<i class="fas fa-check-circle me-2"></i>${message}`;

            // Cambiar color según el tipo
            toast.className = `toast align-items-center text-white bg-${type} border-0`;

            const bsToast = new bootstrap.Toast(toast);
            bsToast.show();
        }

        // Ejemplo de uso del toast al crear actividad
        document.querySelector('#newActivityModal .btn-primary').addEventListener('click', function() {
            // Aquí iría la lógica para enviar el formulario

            // Cerrar modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('newActivityModal'));
            modal.hide();

            // Mostrar notificación
            setTimeout(() => {
                showToast('¡Actividad creada exitosamente!');
            }, 300);
        });

        // Cerrar sidebar en móviles al hacer clic en un enlace
        document.querySelectorAll('.sidebar-nav .nav-link').forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth < 992) {
                    const offcanvas = bootstrap.Offcanvas.getInstance(document.getElementById('sidebar'));
                    if (offcanvas) {
                        offcanvas.hide();
                    }
                }
            });
        });

        // Actualizar estado activo de enlaces del sidebar
        document.querySelectorAll('.sidebar-nav .nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                // Remover clase active de todos los enlaces
                document.querySelectorAll('.sidebar-nav .nav-link').forEach(l => l.classList.remove(
                    'active'));

                // Agregar clase active al enlace clickeado
                this.classList.add('active');
            });
        });

        // Simulación de actualización en tiempo real (opcional)
        setInterval(function() {
            // Aquí podrías hacer llamadas AJAX para actualizar métricas
            // o recibir notificaciones en tiempo real
        }, 30000); // Cada 30 segundos
    </script>
</body>

</html>
