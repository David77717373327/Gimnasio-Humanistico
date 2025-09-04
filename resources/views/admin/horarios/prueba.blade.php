Necesito que me ayudes a mejorar la vista de esta página.

Elimina o ajusta algunos colores que hacen que la interfaz se vea poco profesional ejemplo el morado en tre otros si me entides todo muy profesinal.

La tabla actual es demasiado grande: reduce su tamaño y mejora la proporción de filas y columnas.

Algunos elementos (como textos, contenedores y botones) están demasiado grandes: ajusta su tamaño para lograr una apariencia más profesional.

Mantén la funcionalidad actual, ya que me gusta cómo funciona.

Incluye el uso de @extend ya que se está utilizando una plantilla base.
En general, quiero que la vista se mantenga profesional, ordenada y fácil de usar.
"@extends('layouts.master')

@section('content')


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios Pendientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --danger-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            --warning-gradient: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            --dark-gradient: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
            --glass-bg: rgba(255, 255, 255, 0.9);
            --glass-border: rgba(255, 255, 255, 0.2);
            --shadow-light: 0 8px 32px rgba(31, 38, 135, 0.15);
            --shadow-hover: 0 15px 35px rgba(31, 38, 135, 0.2);
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        .page-header {
            background: var(--primary-gradient);
            color: white;
            padding: 3rem 0;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="white" opacity="0.1"><polygon points="0,20 50,40 100,10 150,50 200,20 250,60 300,30 350,70 400,40 450,80 500,50 550,90 600,60 650,100 700,70 750,110 800,80 850,120 900,90 950,130 1000,100 1000,200 0,200"/></svg>') repeat-x;
            background-size: 1000px 100px;
        }

        .page-header .container {
            position: relative;
            z-index: 2;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stats-card {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: var(--shadow-light);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
        }

        .stats-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-hover);
        }

        .stats-icon {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            position: relative;
        }

        .stats-icon.primary { background: var(--primary-gradient); }
        .stats-icon.success { background: var(--success-gradient); }
        .stats-icon.info { background: var(--dark-gradient); }
        .stats-icon.dark { background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%); }

        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .stats-label {
            color: #64748b;
            font-weight: 500;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .main-card {
            background: var(--glass-bg);
            backdrop-filter: blur(15px);
            border: 1px solid var(--glass-border);
            border-radius: 25px;
            box-shadow: var(--shadow-light);
            overflow: hidden;
        }

        .card-header-custom {
            background: linear-gradient(90deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            border-bottom: 2px solid #e2e8f0;
            padding: 2rem;
            position: relative;
        }

        .card-header-custom::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--primary-gradient);
            border-radius: 2px;
        }

        .table-container {
            padding: 2rem;
        }

        .custom-table {
            margin: 0;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .custom-table thead th {
            background: linear-gradient(90deg, #1e293b 0%, #334155 100%);
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 1.5rem 1rem;
            border: none;
            font-size: 0.85rem;
            position: relative;
        }

        .custom-table thead th::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--primary-gradient);
        }

        .custom-table tbody td {
            padding: 1.25rem 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #e2e8f0;
            font-size: 0.9rem;
        }

        .custom-table tbody tr {
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.7);
        }

        .custom-table tbody tr:nth-child(even) {
            background: rgba(248, 250, 252, 0.7);
        }

        .custom-table tbody tr:hover {
            background: linear-gradient(90deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            transform: scale(1.01);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-right: 1rem;
            background: var(--primary-gradient);
            color: white;
            font-weight: 600;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-name {
            font-weight: 600;
            color: #1e293b;
            font-size: 1rem;
        }

        .user-email {
            color: #667eea;
            font-size: 0.85rem;
            text-decoration: none;
        }

        .user-email:hover {
            color: #764ba2;
        }

        .document-code {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            padding: 0.5rem 1rem;
            border-radius: 10px;
            font-family: 'Monaco', 'Consolas', monospace;
            font-weight: 500;
            border: 1px solid #cbd5e1;
        }

        .role-badge {
            padding: 0.6rem 1.2rem;
            border-radius: 25px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .role-student {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            color: white;
        }

        .role-professor {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
        }

        .role-admin {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
        }

        .btn-action {
            padding: 0.6rem 1.2rem;
            font-size: 0.8rem;
            border-radius: 12px;
            margin: 0.2rem;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }

        .btn-action::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }

        .btn-action:hover::before {
            left: 100%;
        }

        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }

        .btn-approve {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
        }

        .btn-reject {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
        }

        .btn-assign {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
        }

        .btn-remove {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
        }

        .alert-custom {
            border-radius: 15px;
            border: none;
            box-shadow: var(--shadow-light);
            margin-bottom: 2rem;
            padding: 1.5rem;
            backdrop-filter: blur(10px);
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%);
            color: #065f46;
            border-left: 4px solid #10b981;
        }

        .alert-danger {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(220, 38, 38, 0.1) 100%);
            color: #991b1b;
            border-left: 4px solid #ef4444;
        }

        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 1.5rem;
        }

        .dataTables_wrapper .dataTables_filter input {
            border-radius: 25px;
            border: 2px solid #e2e8f0;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            width: 300px !important;
            background: rgba(255, 255, 255, 0.9);
        }

        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            outline: none;
        }

        .dataTables_wrapper .dataTables_length select {
            border-radius: 12px;
            border: 2px solid #e2e8f0;
            padding: 0.5rem 2rem 0.5rem 1rem;
            background: rgba(255, 255, 255, 0.9);
        }

        .dataTables_wrapper .dt-buttons {
            margin-bottom: 1.5rem;
        }

        .dt-button {
            background: var(--primary-gradient) !important;
            color: white !important;
            border: none !important;
            border-radius: 12px !important;
            padding: 0.75rem 1.5rem !important;
            margin-right: 0.5rem !important;
            font-weight: 600 !important;
            transition: all 0.3s ease !important;
        }

        .dt-button:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 25px rgba(0,0,0,0.2) !important;
        }

        .no-data-message {
            text-align: center;
            color: #64748b;
            padding: 4rem 2rem;
            background: linear-gradient(135deg, rgba(248, 250, 252, 0.8) 0%, rgba(241, 245, 249, 0.8) 100%);
            border-radius: 20px;
            margin: 2rem 0;
        }

        .no-data-icon {
            font-size: 4rem;
            color: #cbd5e1;
            margin-bottom: 1.5rem;
        }

        .action-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            justify-content: center;
        }

        @media (max-width: 768px) {
            .page-header {
                padding: 2rem 0;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn-action {
                width: 100%;
                margin: 0.1rem 0;
            }
            
            .dataTables_wrapper .dataTables_filter input {
                width: 100% !important;
            }
        }

        /* Animaciones personalizadas */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Scrollbar personalizado */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-gradient);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="mb-2 display-5 fw-bold">
                        <i class="fas fa-user-check me-3"></i>
                        Gestión de Usuarios Pendientes
                    </h1>
                    <p class="mb-0 fs-5 opacity-90">Administra las solicitudes de registro y roles de usuarios del sistema</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <div class="d-flex flex-column align-items-lg-end">
                        <span class="badge bg-light text-dark px-4 py-2 mb-2">
                            <i class="fas fa-clock me-2"></i>
                            04/Sep/2025 13:09
                        </span>
                        <span class="badge bg-success px-4 py-2">
                            <i class="fas fa-circle-check me-2"></i>
                            Sistema Activo
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Estadísticas -->
        <div class="stats-grid fade-in-up">
            <div class="stats-card">
                <div class="stats-icon primary text-white">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stats-number">12</div>
                <div class="stats-label">Total Pendientes</div>
            </div>
            <div class="stats-card">
                <div class="stats-icon success text-white">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="stats-number">5</div>
                <div class="stats-label">Estudiantes</div>
            </div>
            <div class="stats-card">
                <div class="stats-icon info text-white">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="stats-number">6</div>
                <div class="stats-label">Profesores</div>
            </div>
            <div class="stats-card">
                <div class="stats-icon dark text-white">
                    <i class="fas fa-user-shield"></i>
                </div>
                <div class="stats-number">1</div>
                <div class="stats-label">Administradores</div>
            </div>
        </div>

        <!-- Mensaje de estado -->
        <div class="alert alert-danger alert-custom fade-in-up">
            <i class="fas fa-exclamation-triangle me-2"></i>
            El estudiante fue rechazado.
        </div>

        <!-- Tabla principal -->
        <div class="main-card fade-in-up">
            <div class="card-header-custom">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-2 fw-bold">
                            <i class="fas fa-table me-3 text-primary"></i>
                            Lista de Usuarios Pendientes
                        </h3>
                        <p class="text-muted mb-0">Revisa y gestiona las solicitudes de registro de forma eficiente</p>
                    </div>
                    <div class="col-auto">
                        <span class="badge bg-primary fs-6 px-3 py-2">
                            <i class="fas fa-hourglass-half me-1"></i>
                            12 Pendientes
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="table-container">
                <table id="usuariosTable" class="table custom-table table-hover w-100">
                    <thead>
                        <tr>
                            <th><i class="fas fa-user me-2"></i>Usuario</th>
                            <th><i class="fas fa-envelope me-2"></i>Contacto</th>
                            <th><i class="fas fa-id-card me-2"></i>Documento</th>
                            <th><i class="fas fa-user-tag me-2"></i>Rol</th>
                            <th><i class="fas fa-cogs me-2"></i>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">A</div>
                                    <div>
                                        <div class="user-name">Administrador</div>
                                        <small class="text-muted">Usuario del sistema</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="mailto:admin@example.com" class="user-email">
                                    <i class="fas fa-envelope me-1"></i>
                                    admin@example.com
                                </a>
                            </td>
                            <td>
                                <span class="document-code">123456789</span>
                            </td>
                            <td>
                                <span class="role-badge role-admin">
                                    <i class="fas fa-user-shield"></i>
                                    Administrador
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-action btn-approve" title="Aprobar usuario">
                                        <i class="fas fa-check me-1"></i>Aprobar
                                    </button>
                                    <button class="btn btn-action btn-reject" title="Rechazar usuario">
                                        <i class="fas fa-times me-1"></i>Rechazar
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">JP</div>
                                    <div>
                                        <div class="user-name">Juan Pérez</div>
                                        <small class="text-muted">Docente de matemáticas</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="mailto:juan.perez@example.com" class="user-email">
                                    <i class="fas fa-envelope me-1"></i>
                                    juan.perez@example.com
                                </a>
                            </td>
                            <td>
                                <span class="document-code">100000007</span>
                            </td>
                            <td>
                                <span class="role-badge role-professor">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                    Profesor
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-action btn-approve" title="Aprobar usuario">
                                        <i class="fas fa-check me-1"></i>Aprobar
                                    </button>
                                    <button class="btn btn-action btn-reject" title="Rechazar usuario">
                                        <i class="fas fa-times me-1"></i>Rechazar
                                    </button>
                                    <button class="btn btn-action btn-remove" title="Quitar rol de profesor">
                                        <i class="fas fa-user-minus me-1"></i>Quitar Profesor
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">MC</div>
                                    <div>
                                        <div class="user-name">María Castro</div>
                                        <small class="text-muted">Estudiante de ingeniería</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="mailto:maria.castro@example.com" class="user-email">
                                    <i class="fas fa-envelope me-1"></i>
                                    maria.castro@example.com
                                </a>
                            </td>
                            <td>
                                <span class="document-code">200300008</span>
                            </td>
                            <td>
                                <span class="role-badge role-student">
                                    <i class="fas fa-user-graduate"></i>
                                    Estudiante
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-action btn-approve" title="Aprobar usuario">
                                        <i class="fas fa-check me-1"></i>Aprobar
                                    </button>
                                    <button class="btn btn-action btn-reject" title="Rechazar usuario">
                                        <i class="fas fa-times me-1"></i>Rechazar
                                    </button>
                                    <button class="btn btn-action btn-assign" title="Asignar como profesor">
                                        <i class="fas fa-user-plus me-1"></i>Asignar Profesor
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inicializar DataTable con configuración avanzada
            const table = $('#usuariosTable').DataTable({
                responsive: true,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                    search: "Buscar:",
                    searchPlaceholder: "Buscar por nombre, email o documento..."
                },
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel me-2"></i>Exportar Excel',
                        className: 'btn-excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf me-2"></i>Exportar PDF', 
                        className: 'btn-pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        text: '<i class="fas fa-sync-alt me-2"></i>Actualizar',
                        className: 'btn-refresh',
                        action: function (e, dt, node, config) {
                            dt.ajax.reload();
                        }
                    }
                ],
                pageLength: 10,
                lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
                order: [[0, 'asc']],
                columnDefs: [
                    {
                        targets: 4,
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    }
                ],
                initComplete: function() {
                    // Personalizar elementos después de la inicialización
                    $('.dataTables_filter input').addClass('form-control-lg');
                    $('.dataTables_filter input').attr('placeholder', 'Buscar usuarios...');
                    
                    // Añadir contador dinámico
                    updateUserCount();
                },
                drawCallback: function() {
                    // Reinicializar tooltips y efectos después de cada redraw
                    $('[data-bs-toggle="tooltip"]').tooltip();
                    updateUserCount();
                }
            });

            // Función para actualizar contador de usuarios
            function updateUserCount() {
                const info = table.page.info();
                $('.badge:contains("Pendientes")').html(
                    '<i class="fas fa-hourglass-half me-1"></i>' + info.recordsDisplay + ' Pendientes'
                );
            }

            // Confirmaciones mejoradas con SweetAlert style
            function showConfirmDialog(title, text, icon, confirmButtonText, callback) {
                if (confirm(title + '\n\n' + text)) {
                    callback();
                }
            }

            // Eventos para botones de acción
            $('.btn-approve').on('click', function(e) {
                e.preventDefault();
                const userName = $(this).closest('tr').find('.user-name').text();
                showConfirmDialog(
                    '¿Aprobar usuario?',
                    `¿Estás seguro de aprobar a ${userName}? Tendrá acceso completo al sistema.`,
                    'question',
                    'Sí, aprobar',
                    () => {
                        // Simular aprobación
                        showSuccessMessage(`Usuario ${userName} aprobado exitosamente`);
                        $(this).closest('tr').fadeOut(500);
                    }
                );
            });

            $('.btn-reject').on('click', function(e) {
                e.preventDefault();
                const userName = $(this).closest('tr').find('.user-name').text();
                showConfirmDialog(
                    '¿Rechazar usuario?',
                    `¿Estás seguro de rechazar a ${userName}? Esta acción no se puede deshacer.`,
                    'warning',
                    'Sí, rechazar',
                    () => {
                        // Simular rechazo
                        showErrorMessage(`Usuario ${userName} rechazado`);
                        $(this).closest('tr').fadeOut(500);
                    }
                );
            });

            $('.btn-assign').on('click', function(e) {
                e.preventDefault();
                const userName = $(this).closest('tr').find('.user-name').text();
                showConfirmDialog(
                    '¿Asignar como profesor?',
                    `¿Deseas asignar a ${userName} como profesor del sistema?`,
                    'info',
                    'Sí, asignar',
                    () => {
                        // Simular asignación
                        showSuccessMessage(`${userName} asignado como profesor exitosamente`);
                        // Cambiar badge y botones
                        const row = $(this).closest('tr');
                        row.find('.role-badge').removeClass('role-student').addClass('role-professor')
                           .html('<i class="fas fa-chalkboard-teacher"></i> Profesor');
                        $(this).removeClass('btn-assign').addClass('btn-remove')
                               .html('<i class="fas fa-user-minus me-1"></i>Quitar Profesor');
                    }
                );
            });

            $('.btn-remove').on('click', function(e) {
                e.preventDefault();
                const userName = $(this).closest('tr').find('.user-name').text();
                showConfirmDialog(
                    '¿Quitar rol de profesor?',
                    `¿Deseas quitar el rol de profesor a ${userName}?`,
                    'warning',
                    'Sí, quitar',
                    () => {
                        // Simular remoción
                        showSuccessMessage(`Rol de profesor removido a ${userName}`);
                        // Cambiar badge y botones
                        const row = $(this).closest('tr');
                        row.find('.role-badge').removeClass('role-professor').addClass('role-student')
                           .html('<i class="fas fa-user-graduate"></i> Estudiante');
                        $(this).removeClass('btn-remove').addClass('btn-assign')
                               .html('<i class="fas fa-user-plus me-1"></i>Asignar Profesor');
                    }
                );
            });

            // Función para mostrar mensajes de éxito
            function showSuccessMessage(message) {
                const alertHtml = `
                    <div class="alert alert-success alert-custom alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        ${message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `;
                $('.container').prepend(alertHtml);
                
                // Auto-hide después de 5 segundos
                setTimeout(() => {
                    $('.alert').fadeOut(500, function() {
                        $(this).remove();
                    });
                }, 5000);
            }

            // Función para mostrar mensajes de error
            function showErrorMessage(message) {
                const alertHtml = `
                    <div class="alert alert-danger alert-custom alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        ${message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `;
                $('.container').prepend(alertHtml);
                
                // Auto-hide después de 5 segundos
                setTimeout(() => {
                    $('.alert').fadeOut(500, function() {
                        $(this).remove();
                    });
                }, 5000);
            }

            // Efectos de hover mejorados
            $('.stats-card').hover(
                function() {
                    $(this).find('.stats-icon').addClass('animate__pulse');
                },
                function() {
                    $(this).find('.stats-icon').removeClass('animate__pulse');
                }
            );

            // Búsqueda en tiempo real mejorada
            let searchTimeout;
            $('.dataTables_filter input').on('keyup', function() {
                clearTimeout(searchTimeout);
                const searchTerm = $(this).val();
                
                searchTimeout = setTimeout(() => {
                    if (searchTerm.length >= 2 || searchTerm.length === 0) {
                        table.search(searchTerm).draw();
                    }
                }, 300);
            });

            // Inicializar tooltips
            $('[data-bs-toggle="tooltip"]').tooltip();

            // Función para refrescar datos (simulada)
            $('.btn-refresh').on('click', function() {
                const btn = $(this);
                const originalHtml = btn.html();
                
                // Mostrar loading
                btn.html('<i class="fas fa-spinner fa-spin me-2"></i>Actualizando...');
                btn.prop('disabled', true);
                
                // Simular carga
                setTimeout(() => {
                    btn.html(originalHtml);
                    btn.prop('disabled', false);
                    showSuccessMessage('Datos actualizados correctamente');
                }, 2000);
            });

            // Animaciones de entrada
            setTimeout(() => {
                $('.stats-card, .main-card').addClass('fade-in-up');
            }, 100);

            // Función para filtrar por rol
            function filterByRole(role) {
                if (role === 'all') {
                    table.column(3).search('').draw();
                } else {
                    table.column(3).search(role).draw();
                }
            }

            // Agregar filtros rápidos
            const quickFilters = `
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="d-flex flex-wrap gap-2">
                            <button class="btn btn-outline-primary btn-sm filter-btn" data-role="all">
                                <i class="fas fa-users me-1"></i>Todos
                            </button>
                            <button class="btn btn-outline-success btn-sm filter-btn" data-role="Estudiante">
                                <i class="fas fa-user-graduate me-1"></i>Estudiantes
                            </button>
                            <button class="btn btn-outline-info btn-sm filter-btn" data-role="Profesor">
                                <i class="fas fa-chalkboard-teacher me-1"></i>Profesores
                            </button>
                            <button class="btn btn-outline-dark btn-sm filter-btn" data-role="Administrador">
                                <i class="fas fa-user-shield me-1"></i>Administradores
                            </button>
                        </div>
                    </div>
                </div>
            `;
            
            $('.table-container').prepend(quickFilters);

            // Eventos para filtros rápidos
            $('.filter-btn').on('click', function() {
                $('.filter-btn').removeClass('active');
                $(this).addClass('active');
                const role = $(this).data('role');
                filterByRole(role);
            });

            // Activar filtro "Todos" por defecto
            $('.filter-btn[data-role="all"]').addClass('active');
        });

        // Función para exportar datos personalizados
        function exportCustomData() {
            // Implementar exportación personalizada
            console.log('Exportando datos personalizados...');
        }

        // Función para imprimir tabla
        function printTable() {
            window.print();
        }

        // Media queries y responsive behavior
        function handleResize() {
            if (window.innerWidth < 768) {
                $('.action-buttons').addClass('flex-column');
            } else {
                $('.action-buttons').removeClass('flex-column');
            }
        }

        // Ejecutar al cargar y redimensionar
        $(window).on('load resize', handleResize);
    </script>
</body>
</html>"