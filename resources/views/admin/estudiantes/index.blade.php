@extends('layouts.master')

@section('content')
<div id="pending-users">
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">

    <style>
        /* Extend base styles from master layout */
        @extend .container;
        @extend .btn;
        @extend .card;
        @extend .table;

        #pending-users {
            --primary-color: #003087; /* ESPOL navy blue */
            --secondary-color: #6B7280; /* Neutral gray */
            --background-color: #F9FAFB; /* Off-white background */
            --card-bg: #FFFFFF; /* White for cards */
            --border-color: #E5E7EB; /* Subtle gray border */
            --text-primary: #111827; /* Dark text */
            --text-muted: #6B7280; /* Muted text */
            --shadow: 0 2px 8px rgba(0, 0, 0, 0.05); /* Subtle shadow */
            --success-color: #15803D; /* Muted green for approve */
            --danger-color: #991B1B; /* Muted red for reject */
            --action-color: #F58025; /* ESPOL orange for assign/remove */
        }

        #pending-users .page-header {
            background: var(--primary-color);
            color: white;
            padding: 1.25rem;
            margin-bottom: 1.5rem;
            border-radius: 8px;
        }

        #pending-users .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        #pending-users .stats-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 1.25rem;
            box-shadow: var(--shadow);
            transition: transform 0.2s ease;
        }

        #pending-users .stats-card:hover {
            transform: translateY(-2px);
        }

        #pending-users .stats-icon {
            width: 40px;
            height: 40px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
            background: var(--primary-color);
            color: white;
        }

        #pending-users .stats-number {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.25rem;
        }

        #pending-users .stats-label {
            color: var(--text-muted);
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        #pending-users .main-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        #pending-users .card-header-custom {
            background: var(--card-bg);
            border-bottom: 1px solid var(--border-color);
            padding: 1.25rem;
        }

        #pending-users .table-container {
            padding: 1.25rem;
        }

        #pending-users .custom-table {
            margin: 0;
            border-radius: 8px;
            box-shadow: var(--shadow);
            font-size: 0.9rem;
        }

        #pending-users .custom-table thead th {
            background: var(--primary-color);
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 0.75rem;
            border: none;
            font-size: 0.85rem;
        }

        #pending-users .custom-table tbody td {
            padding: 0.75rem;
            vertical-align: middle;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.9rem;
            color: var(--text-primary);
        }

        #pending-users .custom-table tbody tr {
            background: var(--card-bg);
            transition: background 0.2s ease;
        }

        #pending-users .custom-table tbody tr:nth-child(even) {
            background: #F9FAFB;
        }

        #pending-users .custom-table tbody tr:hover {
            background: #F3F4F6;
        }

        #pending-users .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            margin-right: 0.5rem;
            background: var(--primary-color);
            color: white;
            font-weight: 600;
        }

        #pending-users .user-info {
            display: flex;
            align-items: center;
        }

        #pending-users .user-name {
            font-weight: 600;
            color: var(--text-primary);
            font-size: 0.95rem;
        }

        #pending-users .user-email {
            color: var(--primary-color);
            font-size: 0.85rem;
            text-decoration: none;
        }

        #pending-users .user-email:hover {
            color: #3B82F6;
        }

        #pending-users .document-code {
            background: #F3F4F6;
            padding: 0.25rem 0.75rem;
            border-radius: 6px;
            font-family: 'Monaco', 'Consolas', monospace;
            font-size: 0.85rem;
            border: 1px solid var(--border-color);
        }

        #pending-users .role-badge {
            padding: 0.4rem 0.75rem;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }

        #pending-users .role-student {
            background: #ECFDF5;
            color: var(--success-color);
            border: 1px solid #6EE7B7;
        }

        #pending-users .role-professor {
            background: #FEF2E8;
            color: var(--action-color);
            border: 1px solid #FDBA74;
        }

        #pending-users .role-admin {
            background: #E6F0FA;
            color: var(--primary-color);
            border: 1px solid #93C5FD;
        }

        #pending-users .btn-action {
            padding: 0.4rem 0.75rem;
            font-size: 0.8rem;
            border-radius: 6px;
            margin: 0.15rem;
            font-weight: 600;
            transition: all 0.2s ease;
            border: none;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        #pending-users .btn-action:hover {
            transform: translateY(-1px);
            box-shadow: var(--shadow);
        }

        #pending-users .btn-approve {
            background: var(--success-color);
            color: white;
        }

        #pending-users .btn-reject {
            background: var(--danger-color);
            color: white;
        }

        #pending-users .btn-assign, #pending-users .btn-remove {
            background: var(--action-color);
            color: white;
        }

        #pending-users .alert-custom {
            border-radius: 8px;
            border: none;
            box-shadow: var(--shadow);
            margin-bottom: 1.5rem;
            padding: 1rem;
            font-size: 0.9rem;
        }

        #pending-users .alert-success {
            background: #ECFDF5;
            color: var(--success-color);
            border-left: 4px solid #6EE7B7;
        }

        #pending-users .alert-danger {
            background: #FEF2E8;
            color: var(--danger-color);
            border-left: 4px solid #FDBA74;
        }

        #pending-users .dataTables_wrapper .dataTables_filter {
            margin-bottom: 1rem;
        }

        #pending-users .dataTables_wrapper .dataTables_filter input {
            border-radius: 8px;
            border: 1px solid var(--border-color);
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            width: 250px !important;
            background: var(--card-bg);
        }

        #pending-users .dataTables_wrapper .dataTables_filter input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.15rem rgba(0, 48, 135, 0.2);
            outline: none;
        }

        #pending-users .dataTables_wrapper .dataTables_length select {
            border-radius: 6px;
            border: 1px solid var(--border-color);
            padding: 0.25rem 1.5rem 0.25rem 0.75rem;
            background: var(--card-bg);
            font-size: 0.9rem;
        }

        #pending-users .dataTables_wrapper .dt-buttons {
            margin-bottom: 1rem;
        }

        #pending-users .dt-button {
            background: var(--primary-color) !important;
            color: white !important;
            border: none !important;
            border-radius: 6px !important;
            padding: 0.5rem 1rem !important;
            margin-right: 0.25rem !important;
            font-weight: 600 !important;
            font-size: 0.85rem !important;
        }

        #pending-users .dt-button:hover {
            transform: translateY(-1px) !important;
            box-shadow: var(--shadow) !important;
        }

        #pending-users .no-data-message {
            text-align: center;
            color: var(--text-muted);
            padding: 2rem;
            background: var(--card-bg);
            border-radius: 8px;
            margin: 1.5rem 0;
            font-size: 1rem;
        }

        #pending-users .no-data-icon {
            font-size: 2.5rem;
            color: var(--border-color);
            margin-bottom: 1rem;
        }

        #pending-users .action-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 0.25rem;
            justify-content: center;
        }

        #pending-users .filter-btn.filter-btn-active {
            background-color: rgba(0, 48, 135, 0.1);
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        #pending-users .filter-btn {
            padding: 0.4rem 0.75rem;
            font-size: 0.8rem;
            border-radius: 6px;
            border: 1px solid var(--border-color);
            background: var(--card-bg);
            color: var(--text-primary);
            transition: all 0.2s ease;
        }

        #pending-users .filter-btn:hover {
            background-color: rgba(0, 48, 135, 0.05);
        }

        @media (max-width: 768px) {
            #pending-users .page-header {
                padding: 1rem;
            }
            
            #pending-users .stats-grid {
                grid-template-columns: 1fr;
                gap: 0.75rem;
            }
            
            #pending-users .action-buttons {
                flex-direction: column;
            }
            
            #pending-users .btn-action {
                width: 100%;
                margin: 0.1rem 0;
            }
            
            #pending-users .dataTables_wrapper .dataTables_filter input {
                width: 100% !important;
            }
        }

        /* Animaciones personalizadas */
        #pending-users .fade-in-up {
            animation: fadeInUp 0.4s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Scrollbar personalizado */
        #pending-users ::-webkit-scrollbar {
            width: 6px;
        }

        #pending-users ::-webkit-scrollbar-track {
            background: var(--background-color);
            border-radius: 8px;
        }

        #pending-users ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 8px;
        }

        #pending-users ::-webkit-scrollbar-thumb:hover {
            background: #3B82F6;
        }
    </style>

    <div class="container">
        <!-- Estadísticas -->
        <div class="stats-grid fade-in-up">
            <div class="stats-card">
                <div class="stats-icon text-white">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stats-number">{{ $usuarios->count() }}</div>
                <div class="stats-label">Total Pendientes</div>
            </div>
            <div class="stats-card">
                <div class="stats-icon text-white">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="stats-number">{{ $usuarios->where('role', 'student')->count() }}</div>
                <div class="stats-label">Estudiantes</div>
            </div>
            <div class="stats-card">
                <div class="stats-icon text-white">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="stats-number">{{ $usuarios->where('role', 'professor')->count() }}</div>
                <div class="stats-label">Profesores</div>
            </div>
            <div class="stats-card">
                <div class="stats-icon text-white">
                    <i class="fas fa-user-shield"></i>
                </div>
                <div class="stats-number">{{ $usuarios->where('role', 'admin')->count() }}</div>
                <div class="stats-label">Administradores</div>
            </div>
        </div>

        <!-- Mensaje de estado -->
        @if (session('success'))
            <div class="alert alert-success alert-custom fade-in-up">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-custom fade-in-up">
                <i class="fas fa-exclamation-triangle me-2"></i>
                {{ session('error') }}
            </div>
        @endif

        <!-- Tabla principal -->
        <div class="main-card fade-in-up">
            <div class="card-header-custom">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-1 fs-5 fw-bold">
                            <i class="fas fa-table me-2 text-primary"></i>
                            Lista de Usuarios Pendientes
                        </h3>
                        <p class="text-muted mb-0 fs-6">Revisa y gestiona las solicitudes de registro de forma eficiente</p>
                    </div>
                    <div class="col-auto">
                        <span class="badge bg-primary fs-6 px-2 py-1">
                            <i class="fas fa-hourglass-half me-1"></i>
                            {{ $usuarios->count() }} Pendientes
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="table-container">
                <table id="usuariosTable" class="table custom-table table-hover w-100">
                    <thead>
                        <tr>
                            <th><i class="fas fa-user me-1"></i>Usuario</th>
                            <th><i class="fas fa-envelope me-1"></i>Contacto</th>
                            <th><i class="fas fa-id-card me-1"></i>Documento</th>
                            <th><i class="fas fa-user-tag me-1"></i>Rol</th>
                            <th><i class="fas fa-cogs me-1"></i>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $user)
                            <tr>
                                <td>
                                    <div class="user-info">
                                        <div class="user-avatar">{{ strtoupper(substr($user->name, 0, 2)) }}</div>
                                        <div>
                                            <div class="user-name">{{ $user->name }}</div>
                                            <small class="text-muted">
                                                @if ($user->role === 'student')
                                                    Estudiante
                                                @elseif ($user->role === 'professor')
                                                    Docente
                                                @else
                                                    Usuario del sistema
                                                @endif
                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="mailto:{{ $user->email }}" class="user-email">
                                        <i class="fas fa-envelope me-1"></i>
                                        {{ $user->email }}
                                    </a>
                                </td>
                                <td>
                                    <span class="document-code">{{ $user->document }}</span>
                                </td>
                                <td>
                                    <span class="role-badge role-{{ $user->role }}">
                                        @if ($user->role === 'student')
                                            <i class="fas fa-user-graduate"></i> Estudiante
                                        @elseif ($user->role === 'professor')
                                            <i class="fas fa-chalkboard-teacher"></i> Profesor
                                        @else
                                            <i class="fas fa-user-shield"></i> Administrador
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <form action="{{ route('admin.estudiantes.aprobar', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-action btn-approve" title="Aprobar usuario">
                                                <i class="fas fa-check-circle me-1"></i>Aprobar
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.estudiantes.rechazar', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-action btn-reject" title="Rechazar usuario">
                                                <i class="fas fa-times-circle me-1"></i>Rechazar
                                            </button>
                                        </form>
                                        @if ($user->role === 'student')
                                            <form action="{{ route('admin.asignarProfesor', $user->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-action btn-assign" title="Asignar como profesor">
                                                    <i class="fas fa-user-plus me-1"></i>Asignar Profesor
                                                </button>
                                            </form>
                                        @elseif ($user->role === 'professor')
                                            <form action="{{ route('admin.removerProfesor', $user->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-action btn-remove" title="Quitar rol de profesor">
                                                    <i class="fas fa-user-minus me-1"></i>Quitar Profesor
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
            // Mapa de roles para traducir de inglés a español
            const roleMap = {
                'admin': 'Administrador',
                'professor': 'Profesor',
                'student': 'Estudiante'
            };

            // Inicializar DataTable
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
                            window.location.reload();
                        }
                    }
                ],
                pageLength: -1,
                lengthMenu: [[3, 10, 25, 50, 100, -1], [3, 10, 25, 50, 100, "Todos"]],
                order: [[0, 'asc']],
                columnDefs: [
                    {
                        targets: 4,
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        targets: 3,
                        render: function(data, type, row) {
                            if (type === 'sort' || type === 'filter') {
                                const roleText = $(data).text().trim();
                                console.log('Processed role text:', roleText);
                                return roleText;
                            }
                            return data;
                        }
                    }
                ],
                initComplete: function() {
                    $('#pending-users .dataTables_filter input').addClass('form-control-lg');
                    $('#pending-users .dataTables_filter input').attr('placeholder', 'Buscar usuarios...');
                    updateUserCount();
                    console.log('Initial table data:', table.data().toArray());
                },
                drawCallback: function() {
                    $('#pending-users [data-bs-toggle="tooltip"]').tooltip();
                    updateUserCount();
                }
            });

            function updateUserCount() {
                const info = table.page.info();
                $('#pending-users .badge:contains("Pendientes")').html(
                    '<i class="fas fa-hourglass-half me-1"></i>' + info.recordsDisplay + ' Pendientes'
                );
            }

            function showSuccessMessage(message) {
                const alertHtml = `
                    <div class="alert alert-success alert-custom alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        ${message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `;
                $('#pending-users .container').prepend(alertHtml);
                setTimeout(() => {
                    $('#pending-users .alert').fadeOut(500, function() {
                        $(this).remove();
                    });
                }, 5000);
            }

            function showErrorMessage(message) {
                const alertHtml = `
                    <div class="alert alert-danger alert-custom alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        ${message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `;
                $('#pending-users .container').prepend(alertHtml);
                setTimeout(() => {
                    $('#pending-users .alert').fadeOut(500, function() {
                        $(this).remove();
                    });
                }, 5000);
            }

            $('#pending-users .stats-card').hover(
                function() {
                    $(this).find('.stats-icon').addClass('animate__pulse');
                },
                function() {
                    $(this).find('.stats-icon').removeClass('animate__pulse');
                }
            );

            let searchTimeout;
            $('#pending-users .dataTables_filter input').on('keyup', function() {
                clearTimeout(searchTimeout);
                const searchTerm = $(this).val();
                searchTimeout = setTimeout(() => {
                    if (searchTerm.length >= 2 || searchTerm.length === 0) {
                        table.search(searchTerm).draw();
                    }
                }, 300);
            });

            $('#pending-users [data-bs-toggle="tooltip"]').tooltip();

            $('#pending-users .btn-refresh').on('click', function() {
                const btn = $(this);
                const originalHtml = btn.html();
                btn.html('<i class="fas fa-spinner fa-spin me-2"></i>Actualizando...');
                btn.prop('disabled', true);
                setTimeout(() => {
                    btn.html(originalHtml);
                    btn.prop('disabled', false);
                    showSuccessMessage('Datos actualizados correctamente');
                }, 2000);
            });

            setTimeout(() => {
                $('#pending-users .stats-card, #pending-users .main-card').addClass('fade-in-up');
            }, 100);

            function filterByRole(role) {
                console.log('Filtering by role:', role);
                table.column(3).search('').draw(); // Reset previous search
                if (role !== 'all') {
                    table.column(3).search(role, false, true).draw();
                } else {
                    table.search('').columns().search('').draw(); // Clear all filters
                }
                console.log('Filtered rows count:', table.rows({ filter: 'applied' }).count());
                console.log('Visible rows data:', table.rows({ filter: 'applied' }).data().toArray());
            }

            const quickFilters = `
                <div class="row mb-2">
                    <div class="col-12">
                        <div class="d-flex flex-wrap gap-1">
                            <button class="btn btn-outline-primary btn-sm filter-btn filter-btn-active" data-role="all">
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
            $('#pending-users .table-container').prepend(quickFilters);

            $('#pending-users').on('click', '.filter-btn', function() {
                $('#pending-users .filter-btn').removeClass('filter-btn-active');
                $(this).addClass('filter-btn-active');
                const role = $(this).data('role');
                filterByRole(role);
            });
        });

        function exportCustomData() {
            console.log('Exportando datos personalizados...');
        }

        function printTable() {
            window.print();
        }

        function handleResize() {
            if (window.innerWidth < 768) {
                $('#pending-users .action-buttons').addClass('flex-column');
            } else {
                $('#pending-users .action-buttons').removeClass('flex-column');
            }
        }

        $(window).on('load resize', handleResize);
    </script>
</div>
@endsection