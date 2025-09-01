@extends('layouts.master')

@section('content')

<style>
    /* Variables CSS personalizadas */
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --danger-gradient: linear-gradient(135deg, #fc466b 0%, #3f5efb 100%);

        --asignatura-primary: #667eea;
        --asignatura-primary-light: rgba(102, 126, 234, 0.1);
        --asignatura-success: #10b981;
        --asignatura-warning: #f59e0b;
        --asignatura-danger: #ef4444;
        --asignatura-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --asignatura-border-radius: 12px;
        --asignatura-transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Estilos para el contenedor principal */
    .asignaturas-container {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        min-height: 100vh;
    }

    /* Estilos para las tarjetas */
    .asignatura-card {
        background: white;
        border-radius: var(--asignatura-border-radius);
        box-shadow: var(--asignatura-shadow);
        border: none;
        transition: var(--asignatura-transition);
        overflow: hidden;
    }

    .asignatura-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    /* Estilos para los botones */
    .btn-asignatura-primary {
        background: linear-gradient(135deg, var(--asignatura-primary), #764ba2);
        border: none;
        border-radius: 8px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: var(--asignatura-transition);
        position: relative;
        overflow: hidden;
    }

    .btn-asignatura-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s;
    }

    .btn-asignatura-primary:hover::before {
        left: 100%;
    }

    .btn-asignatura-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
    }

    /* Estilos para la tabla */
    .asignaturas-table {
        background: white;
        border-radius: var(--asignatura-border-radius);
        overflow: hidden;
        box-shadow: var(--asignatura-shadow);
    }

    .asignaturas-table thead {
        background: linear-gradient(135deg, #f8fafc, #e2e8f0);
    }

    .asignaturas-table tbody tr {
        transition: var(--asignatura-transition);
        border: none;
    }

    .asignaturas-table tbody tr:hover {
        background: var(--asignatura-primary-light);
        transform: scale(1.01);
    }

    /* Estilos para los modales */
    .modal-asignatura .modal-content {
        border-radius: var(--asignatura-border-radius);
        border: none;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        backdrop-filter: blur(10px);
    }

    .modal-asignatura .modal-header {
        border-radius: var(--asignatura-border-radius) var(--asignatura-border-radius) 0 0;
        border-bottom: none;
        padding: 1.5rem;
    }

    .modal-asignatura .modal-body {
        padding: 2rem 1.5rem;
    }

    .modal-asignatura .modal-footer {
        border-top: none;
        padding: 1.5rem;
        background: #f8fafc;
        border-radius: 0 0 var(--asignatura-border-radius) var(--asignatura-border-radius);
    }

    /* Estilos para los inputs */
    .form-control-asignatura {
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        padding: 12px 16px;
        font-size: 16px;
        transition: var(--asignatura-transition);
        background: #f9fafb;
    }

    .form-control-asignatura:focus {
        border-color: var(--asignatura-primary);
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        background: white;
    }

    /* Estilos para las alertas */
    .alert-asignatura {
        border-radius: var(--asignatura-border-radius);
        border: none;
        box-shadow: var(--asignatura-shadow);
        padding: 1rem 1.5rem;
    }

    .alert-asignatura-success {
        background: linear-gradient(135deg, #d1fae5, #a7f3d0);
        color: #065f46;
    }

    .alert-asignatura-danger {
        background: linear-gradient(135deg, #fee2e2, #fca5a5);
        color: #991b1b;
    }

    /* Estilos para el loading */
    .asignatura-loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.95);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        backdrop-filter: blur(5px);
    }

    .asignatura-spinner {
        width: 40px;
        height: 40px;
        border: 4px solid var(--asignatura-primary-light);
        border-top: 4px solid var(--asignatura-primary);
        border-radius: 50%;
        animation: asignatura-spin 1s linear infinite;
    }

    @keyframes asignatura-spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Estilos para las animaciones */
    .fade-in-asignatura {
        animation: fadeInAsignatura 0.6s ease-out forwards;
    }

    .fade-out-asignatura {
        animation: fadeOutAsignatura 0.3s ease-in forwards;
    }

    @keyframes fadeInAsignatura {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeOutAsignatura {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(-20px);
        }
    }

    /* Estilos para badges */
    .badge-asignatura {
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 12px;
        letter-spacing: 0.5px;
    }

    .badge-asignatura-primary {
        background: var(--asignatura-primary-light);
        color: var(--asignatura-primary);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .asignaturas-table {
            font-size: 14px;
        }
        
        .btn-group-vertical .btn {
            margin-bottom: 0.5rem;
            border-radius: 6px !important;
        }
        
        .modal-asignatura .modal-body {
            padding: 1.5rem 1rem;
        }
        
        .asignatura-card {
            margin-bottom: 1rem;
        }
    }

    @media (max-width: 576px) {
        .asignaturas-container {
            padding: 1rem 0.5rem;
        }
        
        .modal-asignatura .modal-dialog {
            margin: 0.5rem;
        }
        
        .asignaturas-table thead {
            font-size: 12px;
        }
        
        .btn-asignatura-primary {
            font-size: 14px;
            padding: 8px 16px;
        }
    }

    /* Dark mode support (opcional) */
    @media (prefers-color-scheme: dark) {
        :root {
            --asignatura-bg: #1f2937;
            --asignatura-card-bg: #374151;
            --asignatura-text: #f9fafb;
            --asignatura-border: #4b5563;
        }
        
        .asignaturas-container {
            background: var(--asignatura-bg);
            color: var(--asignatura-text);
        }
        
        .asignatura-card {
            background: var(--asignatura-card-bg);
            border-color: var(--asignatura-border);
        }
        
        .asignaturas-table {
            background: var(--asignatura-card-bg);
            color: var(--asignatura-text);
        }
        
        .form-control-asignatura {
            background: var(--asignatura-card-bg);
            border-color: var(--asignatura-border);
            color: var(--asignatura-text);
        }
    }
</style>

<div class="container-fluid py-4">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="fw-bold text-dark mb-1">Gestión de Asignaturas</h2>
                    <p class="text-muted mb-0">Administra las asignaturas del sistema académico</p>
                </div>
                <button type="button" class="btn btn-primary btn-lg shadow-sm" data-bs-toggle="modal" data-bs-target="#createAsignaturaModal">
                    <i class="fas fa-plus me-2"></i>Nueva Asignatura
                </button>
            </div>
        </div>
    </div>

    <!-- Alerts Container -->
    <div id="alertContainer">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
    </div>

    <!-- Main Content Card -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom-0 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0 text-dark fw-semibold">
                            <i class="fas fa-book me-2 text-primary"></i>Lista de Asignaturas
                        </h5>
                        <span class="badge bg-light text-dark fs-6">{{ $asignaturas->total() }} asignaturas</span>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="asignaturasTable">
                            <thead class="bg-light">
                                <tr>
                                    <th class="border-0 py-3 px-4 fw-semibold text-dark">ID</th>
                                    <th class="border-0 py-3 px-4 fw-semibold text-dark">Nombre de la Asignatura</th>
                                    <th class="border-0 py-3 px-4 fw-semibold text-dark text-end">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($asignaturas as $asignatura)
                                    <tr class="asignatura-row" data-id="{{ $asignatura->id }}">
                                        <td class="py-3 px-4 align-middle">
                                            <span class="badge bg-primary bg-opacity-10 text-primary">#{{ $asignatura->id }}</span>
                                        </td>
                                        <td class="py-3 px-4 align-middle">
                                            <div class="d-flex align-items-center">
                                                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                    <i class="fas fa-book text-primary"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 fw-semibold text-dark asignatura-nombre">{{ $asignatura->nombre }}</h6>
                                                    <small class="text-muted">Asignatura académica</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3 px-4 align-middle text-end">
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-outline-warning btn-sm edit-asignatura-btn" 
                                                        data-id="{{ $asignatura->id }}" 
                                                        data-nombre="{{ $asignatura->nombre }}"
                                                        data-bs-toggle="tooltip" 
                                                        title="Editar asignatura">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger btn-sm delete-asignatura-btn" 
                                                        data-id="{{ $asignatura->id }}"
                                                        data-nombre="{{ $asignatura->nombre }}"
                                                        data-bs-toggle="tooltip" 
                                                        title="Eliminar asignatura">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-5">
                                            <div class="text-muted">
                                                <i class="fas fa-book fa-3x mb-3 opacity-50"></i>
                                                <h5 class="text-muted">No hay asignaturas registradas</h5>
                                                <p class="mb-0">Comienza creando tu primera asignatura</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($asignaturas->hasPages())
                    <div class="card-footer bg-white border-top">
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                Mostrando {{ $asignaturas->firstItem() }} - {{ $asignaturas->lastItem() }} de {{ $asignaturas->total() }} resultados
                            </small>
                            {{ $asignaturas->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal para Crear Asignatura -->
<div class="modal fade" id="createAsignaturaModal" tabindex="-1" aria-labelledby="createAsignaturaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white border-0">
                <h5 class="modal-title fw-bold" id="createAsignaturaModalLabel">
                    <i class="fas fa-plus-circle me-2"></i>Crear Nueva Asignatura
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form id="createAsignaturaForm">
                @csrf
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="createNombre" class="form-label fw-semibold">Nombre de la Asignatura</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="fas fa-book text-primary"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0" id="createNombre" name="nombre" 
                                   placeholder="Ej: Matemáticas, Historia, Ciencias, etc." required>
                        </div>
                        <div class="invalid-feedback" id="createNombreError"></div>
                    </div>
                </div>
                <div class="modal-footer border-0 bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Guardar Asignatura
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para Editar Asignatura -->
<div class="modal fade" id="editAsignaturaModal" tabindex="-1" aria-labelledby="editAsignaturaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-warning text-dark border-0">
                <h5 class="modal-title fw-bold" id="editAsignaturaModalLabel">
                    <i class="fas fa-edit me-2"></i>Editar Asignatura
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editAsignaturaForm">
                @csrf
                @method('PUT')
                <input type="hidden" id="editAsignaturaId" name="asignatura_id">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="editNombre" class="form-label fw-semibold">Nombre de la Asignatura</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="fas fa-book text-warning"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0" id="editNombre" name="nombre" required>
                        </div>
                        <div class="invalid-feedback" id="editNombreError"></div>
                    </div>
                </div>
                <div class="modal-footer border-0 bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save me-2"></i>Actualizar Asignatura
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de Confirmación para Eliminar -->
<div class="modal fade" id="deleteAsignaturaModal" tabindex="-1" aria-labelledby="deleteAsignaturaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-danger text-white border-0">
                <h5 class="modal-title fw-bold" id="deleteAsignaturaModalLabel">
                    <i class="fas fa-exclamation-triangle me-2"></i>Confirmar Eliminación
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4 text-center">
                <div class="mb-4">
                    <i class="fas fa-trash-alt fa-3x text-danger opacity-50"></i>
                </div>
                <h6 class="fw-semibold">¿Estás seguro de que deseas eliminar esta asignatura?</h6>
                <p class="text-muted mb-0">Esta acción no se puede deshacer.</p>
                <div class="mt-3 p-3 bg-light rounded">
                    <strong>Asignatura: <span id="deleteAsignaturaNombre"></span></strong>
                </div>
            </div>
            <div class="modal-footer border-0 bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                    <i class="fas fa-trash me-2"></i>Eliminar Asignatura
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Loading Overlay -->
<div id="loadingOverlay" class="d-none">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Cargando...</span>
    </div>
</div>

@endsection

@push('styles')
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --danger-gradient: linear-gradient(135deg, #fc466b 0%, #3f5efb 100%);
    }

    .btn-primary {
        background: var(--primary-gradient);
        border: none;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        background: var(--primary-gradient);
        border: none;
    }

    .card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        border-radius: 15px !important;
        overflow: hidden;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1) !important;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(102, 126, 234, 0.05);
        transform: scale(1.02);
        transition: all 0.2s ease;
    }

    .modal-content {
        border-radius: 15px !important;
        backdrop-filter: blur(10px);
    }

    .btn-group .btn {
        transition: all 0.2s ease;
    }

    .btn-group .btn:hover {
        transform: translateY(-2px);
        z-index: 10;
    }

    #loadingOverlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        backdrop-filter: blur(5px);
    }

    .fade-in {
        animation: fadeIn 0.5s ease-in;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .alert {
        border-radius: 10px;
        border: none;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .input-group-text {
        border-color: #e9ecef;
    }

    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }

    @media (max-width: 768px) {
        .btn-group {
            flex-direction: column;
        }
        
        .btn-group .btn {
            border-radius: 0.375rem !important;
            margin-bottom: 0.25rem;
        }
        
        .table-responsive {
            font-size: 0.875rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // CSRF Token
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                     document.querySelector('input[name="_token"]')?.value;

    // Utility functions
    function showLoading() {
        document.getElementById('loadingOverlay').classList.remove('d-none');
    }

    function hideLoading() {
        document.getElementById('loadingOverlay').classList.add('d-none');
    }

    function showAlert(message, type = 'success') {
        const alertContainer = document.getElementById('alertContainer');
        const alertHtml = `
            <div class="alert alert-${type} alert-dismissible fade show fade-in" role="alert">
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-2"></i>${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;
        alertContainer.innerHTML = alertHtml;
        
        // Auto hide after 5 seconds
        setTimeout(() => {
            const alert = alertContainer.querySelector('.alert');
            if (alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 5000);
    }

    function clearFormErrors(formId) {
        const form = document.getElementById(formId);
        form.querySelectorAll('.is-invalid').forEach(input => {
            input.classList.remove('is-invalid');
        });
        form.querySelectorAll('.invalid-feedback').forEach(feedback => {
            feedback.textContent = '';
        });
    }

    function showFormErrors(errors, formPrefix) {
        Object.keys(errors).forEach(field => {
            const input = document.getElementById(formPrefix + field.charAt(0).toUpperCase() + field.slice(1));
            const errorDiv = document.getElementById(formPrefix + field.charAt(0).toUpperCase() + field.slice(1) + 'Error');
            
            if (input && errorDiv) {
                input.classList.add('is-invalid');
                errorDiv.textContent = errors[field][0];
            }
        });
    }

    function addAsignaturaToTable(asignatura) {
        const tbody = document.querySelector('#asignaturasTable tbody');
        const emptyRow = tbody.querySelector('td[colspan="3"]');
        
        if (emptyRow) {
            tbody.innerHTML = '';
        }

        const newRow = document.createElement('tr');
        newRow.className = 'asignatura-row fade-in';
        newRow.setAttribute('data-id', asignatura.id);
        newRow.innerHTML = `
            <td class="py-3 px-4 align-middle">
                <span class="badge bg-primary bg-opacity-10 text-primary">#${asignatura.id}</span>
            </td>
            <td class="py-3 px-4 align-middle">
                <div class="d-flex align-items-center">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                        <i class="fas fa-book text-primary"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 fw-semibold text-dark asignatura-nombre">${asignatura.nombre}</h6>
                        <small class="text-muted">Asignatura académica</small>
                    </div>
                </div>
            </td>
            <td class="py-3 px-4 align-middle text-end">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-warning btn-sm edit-asignatura-btn" 
                            data-id="${asignatura.id}" 
                            data-nombre="${asignatura.nombre}"
                            data-bs-toggle="tooltip" 
                            title="Editar asignatura">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-outline-danger btn-sm delete-asignatura-btn" 
                            data-id="${asignatura.id}"
                            data-nombre="${asignatura.nombre}"
                            data-bs-toggle="tooltip" 
                            title="Eliminar asignatura">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        `;
        
        tbody.appendChild(newRow);

        // Initialize tooltips for new buttons
        newRow.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
            new bootstrap.Tooltip(el);
        });
    }

    function updateAsignaturaInTable(asignatura) {
        const row = document.querySelector(`.asignatura-row[data-id="${asignatura.id}"]`);
        if (row) {
            const nombreElement = row.querySelector('.asignatura-nombre');
            const editBtn = row.querySelector('.edit-asignatura-btn');
            const deleteBtn = row.querySelector('.delete-asignatura-btn');

            if (nombreElement) nombreElement.textContent = asignatura.nombre;
            if (editBtn) editBtn.setAttribute('data-nombre', asignatura.nombre);
            if (deleteBtn) deleteBtn.setAttribute('data-nombre', asignatura.nombre);

            // Add update animation
            row.classList.add('fade-in');
        }
    }

    function removeAsignaturaFromTable(asignaturaId) {
        const row = document.querySelector(`.asignatura-row[data-id="${asignaturaId}"]`);
        if (row) {
            row.style.transition = 'all 0.3s ease';
            row.style.transform = 'translateX(-100%)';
            row.style.opacity = '0';
            
            setTimeout(() => {
                row.remove();
                
                // Check if table is empty
                const tbody = document.querySelector('#asignaturasTable tbody');
                if (!tbody.children.length) {
                    tbody.innerHTML = `
                        <tr>
                            <td colspan="3" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="fas fa-book fa-3x mb-3 opacity-50"></i>
                                    <h5 class="text-muted">No hay asignaturas registradas</h5>
                                    <p class="mb-0">Comienza creando tu primera asignatura</p>
                                </div>
                            </td>
                        </tr>
                    `;
                }
            }, 300);
        }
    }

    // Create Asignatura Form
    document.getElementById('createAsignaturaForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        showLoading();
        clearFormErrors('createAsignaturaForm');

        const formData = new FormData(this);

        try {
            const response = await fetch('{{ route("admin.asignaturas.store") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            });

            const data = await response.json();

            if (data.success) {
                showAlert(data.message, 'success');
                addAsignaturaToTable(data.asignatura);
                bootstrap.Modal.getInstance(document.getElementById('createAsignaturaModal')).hide();
                this.reset();
            } else {
                if (data.errors) {
                    showFormErrors(data.errors, 'create');
                } else {
                    showAlert(data.message || 'Error al crear la asignatura', 'danger');
                }
            }
        } catch (error) {
            console.error('Error:', error);
            showAlert('Error de conexión. Intente nuevamente.', 'danger');
        } finally {
            hideLoading();
        }
    });

    // Edit Asignatura Buttons
    document.addEventListener('click', function(e) {
        if (e.target.closest('.edit-asignatura-btn')) {
            const btn = e.target.closest('.edit-asignatura-btn');
            const asignaturaId = btn.getAttribute('data-id');
            const asignaturaNombre = btn.getAttribute('data-nombre');

            document.getElementById('editAsignaturaId').value = asignaturaId;
            document.getElementById('editNombre').value = asignaturaNombre;
            
            clearFormErrors('editAsignaturaForm');
            
            const editModal = new bootstrap.Modal(document.getElementById('editAsignaturaModal'));
            editModal.show();
        }
    });

    // Edit Asignatura Form
    document.getElementById('editAsignaturaForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        showLoading();
        clearFormErrors('editAsignaturaForm');

        const formData = new FormData(this);
        const asignaturaId = document.getElementById('editAsignaturaId').value;

        try {
            const response = await fetch(`{{ route('admin.asignaturas.index') }}/${asignaturaId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            });

            const data = await response.json();

            if (data.success) {
                showAlert(data.message, 'success');
                updateAsignaturaInTable(data.asignatura);
                bootstrap.Modal.getInstance(document.getElementById('editAsignaturaModal')).hide();
            } else {
                if (data.errors) {
                    showFormErrors(data.errors, 'edit');
                } else {
                    showAlert(data.message || 'Error al actualizar la asignatura', 'danger');
                }
            }
        } catch (error) {
            console.error('Error:', error);
            showAlert('Error de conexión. Intente nuevamente.', 'danger');
        } finally {
            hideLoading();
        }
    });

    // Delete Asignatura Buttons
    let asignaturaToDelete = null;

    document.addEventListener('click', function(e) {
        if (e.target.closest('.delete-asignatura-btn')) {
            const btn = e.target.closest('.delete-asignatura-btn');
            asignaturaToDelete = {
                id: btn.getAttribute('data-id'),
                nombre: btn.getAttribute('data-nombre')
            };

            document.getElementById('deleteAsignaturaNombre').textContent = asignaturaToDelete.nombre;
            
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteAsignaturaModal'));
            deleteModal.show();
        }
    });

    // Confirm Delete
    document.getElementById('confirmDeleteBtn').addEventListener('click', async function() {
        if (!asignaturaToDelete) return;
        
        showLoading();

        try {
            const response = await fetch(`{{ route('admin.asignaturas.index') }}/${asignaturaToDelete.id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            const data = await response.json();

            if (data.success) {
                showAlert(data.message, 'success');
                removeAsignaturaFromTable(asignaturaToDelete.id);
                bootstrap.Modal.getInstance(document.getElementById('deleteAsignaturaModal')).hide();
            } else {
                showAlert(data.message || 'Error al eliminar la asignatura', 'danger');
            }
        } catch (error) {
            console.error('Error:', error);
            showAlert('Error de conexión. Intente nuevamente.', 'danger');
        } finally {
            hideLoading();
            asignaturaToDelete = null;
        }
    });

    // Clear forms when modals are hidden
    document.getElementById('createAsignaturaModal').addEventListener('hidden.bs.modal', function() {
        document.getElementById('createAsignaturaForm').reset();
        clearFormErrors('createAsignaturaForm');
    });

    document.getElementById('editAsignaturaModal').addEventListener('hidden.bs.modal', function() {
        clearFormErrors('editAsignaturaForm');
    });

    // Auto-hide alerts
    document.addEventListener('DOMContentLoaded', function() {
        const existingAlerts = document.querySelectorAll('.alert');
        existingAlerts.forEach(alert => {
            setTimeout(() => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }, 5000);
        });
    });
});
</script>
@endpush