@extends('layouts.master')

@section('content')

<style>
    /* resources/css/grados.css - Archivo CSS específico para el módulo de grados */

/* Variables CSS personalizadas */
:root {

 --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    --danger-gradient: linear-gradient(135deg, #fc466b 0%, #3f5efb 100%);

    --grado-primary: #667eea;
    --grado-primary-light: rgba(102, 126, 234, 0.1);
    --grado-success: #10b981;
    --grado-warning: #f59e0b;
    --grado-danger: #ef4444;
    --grado-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --grado-border-radius: 12px;
    --grado-transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Estilos para el contenedor principal */
.grados-container {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    min-height: 100vh;
}

/* Estilos para las tarjetas */
.grado-card {
    background: white;
    border-radius: var(--grado-border-radius);
    box-shadow: var(--grado-shadow);
    border: none;
    transition: var(--grado-transition);
    overflow: hidden;
}

.grado-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

/* Estilos para los botones */
.btn-grado-primary {
    background: linear-gradient(135deg, var(--grado-primary), #764ba2);
    border: none;
    border-radius: 8px;
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: var(--grado-transition);
    position: relative;
    overflow: hidden;
}

.btn-grado-primary::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.btn-grado-primary:hover::before {
    left: 100%;
}

.btn-grado-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
}

/* Estilos para la tabla */
.grados-table {
    background: white;
    border-radius: var(--grado-border-radius);
    overflow: hidden;
    box-shadow: var(--grado-shadow);
}

.grados-table thead {
    background: linear-gradient(135deg, #f8fafc, #e2e8f0);
}

.grados-table tbody tr {
    transition: var(--grado-transition);
    border: none;
}

.grados-table tbody tr:hover {
    background: var(--grado-primary-light);
    transform: scale(1.01);
}

/* Estilos para los modales */
.modal-grado .modal-content {
    border-radius: var(--grado-border-radius);
    border: none;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    backdrop-filter: blur(10px);
}

.modal-grado .modal-header {
    border-radius: var(--grado-border-radius) var(--grado-border-radius) 0 0;
    border-bottom: none;
    padding: 1.5rem;
}

.modal-grado .modal-body {
    padding: 2rem 1.5rem;
}

.modal-grado .modal-footer {
    border-top: none;
    padding: 1.5rem;
    background: #f8fafc;
    border-radius: 0 0 var(--grado-border-radius) var(--grado-border-radius);
}

/* Estilos para los inputs */
.form-control-grado {
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    padding: 12px 16px;
    font-size: 16px;
    transition: var(--grado-transition);
    background: #f9fafb;
}

.form-control-grado:focus {
    border-color: var(--grado-primary);
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    background: white;
}

/* Estilos para las alertas */
.alert-grado {
    border-radius: var(--grado-border-radius);
    border: none;
    box-shadow: var(--grado-shadow);
    padding: 1rem 1.5rem;
}

.alert-grado-success {
    background: linear-gradient(135deg, #d1fae5, #a7f3d0);
    color: #065f46;
}

.alert-grado-danger {
    background: linear-gradient(135deg, #fee2e2, #fca5a5);
    color: #991b1b;
}

/* Estilos para el loading */
.grado-loading-overlay {
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

.grado-spinner {
    width: 40px;
    height: 40px;
    border: 4px solid var(--grado-primary-light);
    border-top: 4px solid var(--grado-primary);
    border-radius: 50%;
    animation: grado-spin 1s linear infinite;
}

@keyframes grado-spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Estilos para las animaciones */
.fade-in-grado {
    animation: fadeInGrado 0.6s ease-out forwards;
}

.fade-out-grado {
    animation: fadeOutGrado 0.3s ease-in forwards;
}

@keyframes fadeInGrado {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeOutGrado {
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
.badge-grado {
    padding: 6px 12px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 12px;
    letter-spacing: 0.5px;
}

.badge-grado-primary {
    background: var(--grado-primary-light);
    color: var(--grado-primary);
}

/* Responsive Design */
@media (max-width: 768px) {
    .grados-table {
        font-size: 14px;
    }
    
    .btn-group-vertical .btn {
        margin-bottom: 0.5rem;
        border-radius: 6px !important;
    }
    
    .modal-grado .modal-body {
        padding: 1.5rem 1rem;
    }
    
    .grado-card {
        margin-bottom: 1rem;
    }
}

@media (max-width: 576px) {
    .grados-container {
        padding: 1rem 0.5rem;
    }
    
    .modal-grado .modal-dialog {
        margin: 0.5rem;
    }
    
    .grados-table thead {
        font-size: 12px;
    }
    
    .btn-grado-primary {
        font-size: 14px;
        padding: 8px 16px;
    }
}

/* Dark mode support (opcional) */
@media (prefers-color-scheme: dark) {
    :root {
        --grado-bg: #1f2937;
        --grado-card-bg: #374151;
        --grado-text: #f9fafb;
        --grado-border: #4b5563;
    }
    
    .grados-container {
        background: var(--grado-bg);
        color: var(--grado-text);
    }
    
    .grado-card {
        background: var(--grado-card-bg);
        border-color: var(--grado-border);
    }
    
    .grados-table {
        background: var(--grado-card-bg);
        color: var(--grado-text);
    }
    
    .form-control-grado {
        background: var(--grado-card-bg);
        border-color: var(--grado-border);
        color: var(--grado-text);
    }
}
</style>

<div class="container-fluid py-4">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="fw-bold text-dark mb-1">Gestión de Grados</h2>
                    <p class="text-muted mb-0">Administra los grados académicos del sistema</p>
                </div>
                <button type="button" class="btn btn-primary btn-lg shadow-sm" data-bs-toggle="modal" data-bs-target="#createGradoModal">
                    <i class="fas fa-plus me-2"></i>Nuevo Grado
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
                            <i class="fas fa-graduation-cap me-2 text-primary"></i>Lista de Grados
                        </h5>
                        <span class="badge bg-light text-dark fs-6">{{ $grados->total() }} grados</span>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="gradosTable">
                            <thead class="bg-light">
                                <tr>
                                    <th class="border-0 py-3 px-4 fw-semibold text-dark">ID</th>
                                    <th class="border-0 py-3 px-4 fw-semibold text-dark">Nombre del Grado</th>
                                    <th class="border-0 py-3 px-4 fw-semibold text-dark text-end">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($grados as $grado)
                                    <tr class="grado-row" data-id="{{ $grado->id }}">
                                        <td class="py-3 px-4 align-middle">
                                            <span class="badge bg-primary bg-opacity-10 text-primary">#{{ $grado->id }}</span>
                                        </td>
                                        <td class="py-3 px-4 align-middle">
                                            <div class="d-flex align-items-center">
                                                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                    <i class="fas fa-graduation-cap text-primary"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 fw-semibold text-dark grado-nombre">{{ $grado->nombre }}</h6>
                                                    <small class="text-muted">Grado académico</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3 px-4 align-middle text-end">
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-outline-warning btn-sm edit-grado-btn" 
                                                        data-id="{{ $grado->id }}" 
                                                        data-nombre="{{ $grado->nombre }}"
                                                        data-bs-toggle="tooltip" 
                                                        title="Editar grado">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger btn-sm delete-grado-btn" 
                                                        data-id="{{ $grado->id }}"
                                                        data-nombre="{{ $grado->nombre }}"
                                                        data-bs-toggle="tooltip" 
                                                        title="Eliminar grado">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-5">
                                            <div class="text-muted">
                                                <i class="fas fa-graduation-cap fa-3x mb-3 opacity-50"></i>
                                                <h5 class="text-muted">No hay grados registrados</h5>
                                                <p class="mb-0">Comienza creando tu primer grado académico</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($grados->hasPages())
                    <div class="card-footer bg-white border-top">
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                Mostrando {{ $grados->firstItem() }} - {{ $grados->lastItem() }} de {{ $grados->total() }} resultados
                            </small>
                            {{ $grados->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal para Crear Grado -->
<div class="modal fade" id="createGradoModal" tabindex="-1" aria-labelledby="createGradoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white border-0">
                <h5 class="modal-title fw-bold" id="createGradoModalLabel">
                    <i class="fas fa-plus-circle me-2"></i>Crear Nuevo Grado
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form id="createGradoForm">
                @csrf
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="createNombre" class="form-label fw-semibold">Nombre del Grado</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="fas fa-graduation-cap text-primary"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0" id="createNombre" name="nombre" 
                                   placeholder="Ej: 6A, Primero A, etc." required>
                        </div>
                        <div class="invalid-feedback" id="createNombreError"></div>
                    </div>
                </div>
                <div class="modal-footer border-0 bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Guardar Grado
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para Editar Grado -->
<div class="modal fade" id="editGradoModal" tabindex="-1" aria-labelledby="editGradoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-warning text-dark border-0">
                <h5 class="modal-title fw-bold" id="editGradoModalLabel">
                    <i class="fas fa-edit me-2"></i>Editar Grado
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editGradoForm">
                @csrf
                @method('PUT')
                <input type="hidden" id="editGradoId" name="grado_id">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="editNombre" class="form-label fw-semibold">Nombre del Grado</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="fas fa-graduation-cap text-warning"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0" id="editNombre" name="nombre" required>
                        </div>
                        <div class="invalid-feedback" id="editNombreError"></div>
                    </div>
                </div>
                <div class="modal-footer border-0 bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save me-2"></i>Actualizar Grado
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de Confirmación para Eliminar -->
<div class="modal fade" id="deleteGradoModal" tabindex="-1" aria-labelledby="deleteGradoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-danger text-white border-0">
                <h5 class="modal-title fw-bold" id="deleteGradoModalLabel">
                    <i class="fas fa-exclamation-triangle me-2"></i>Confirmar Eliminación
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4 text-center">
                <div class="mb-4">
                    <i class="fas fa-trash-alt fa-3x text-danger opacity-50"></i>
                </div>
                <h6 class="fw-semibold">¿Estás seguro de que deseas eliminar este grado?</h6>
                <p class="text-muted mb-0">Esta acción no se puede deshacer.</p>
                <div class="mt-3 p-3 bg-light rounded">
                    <strong>Grado: <span id="deleteGradoNombre"></span></strong>
                </div>
            </div>
            <div class="modal-footer border-0 bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                    <i class="fas fa-trash me-2"></i>Eliminar Grado
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

    function addGradoToTable(grado) {
        const tbody = document.querySelector('#gradosTable tbody');
        const emptyRow = tbody.querySelector('td[colspan="3"]');
        
        if (emptyRow) {
            tbody.innerHTML = '';
        }

        const newRow = document.createElement('tr');
        newRow.className = 'grado-row fade-in';
        newRow.setAttribute('data-id', grado.id);
        newRow.innerHTML = `
            <td class="py-3 px-4 align-middle">
                <span class="badge bg-primary bg-opacity-10 text-primary">#${grado.id}</span>
            </td>
            <td class="py-3 px-4 align-middle">
                <div class="d-flex align-items-center">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                        <i class="fas fa-graduation-cap text-primary"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 fw-semibold text-dark grado-nombre">${grado.nombre}</h6>
                        <small class="text-muted">Grado académico</small>
                    </div>
                </div>
            </td>
            <td class="py-3 px-4 align-middle text-end">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-warning btn-sm edit-grado-btn" 
                            data-id="${grado.id}" 
                            data-nombre="${grado.nombre}"
                            data-bs-toggle="tooltip" 
                            title="Editar grado">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-outline-danger btn-sm delete-grado-btn" 
                            data-id="${grado.id}"
                            data-nombre="${grado.nombre}"
                            data-bs-toggle="tooltip" 
                            title="Eliminar grado">
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

    function updateGradoInTable(grado) {
        const row = document.querySelector(`.grado-row[data-id="${grado.id}"]`);
        if (row) {
            const nombreElement = row.querySelector('.grado-nombre');
            const editBtn = row.querySelector('.edit-grado-btn');
            const deleteBtn = row.querySelector('.delete-grado-btn');

            if (nombreElement) nombreElement.textContent = grado.nombre;
            if (editBtn) editBtn.setAttribute('data-nombre', grado.nombre);
            if (deleteBtn) deleteBtn.setAttribute('data-nombre', grado.nombre);

            // Add update animation
            row.classList.add('fade-in');
        }
    }

    function removeGradoFromTable(gradoId) {
        const row = document.querySelector(`.grado-row[data-id="${gradoId}"]`);
        if (row) {
            row.style.transition = 'all 0.3s ease';
            row.style.transform = 'translateX(-100%)';
            row.style.opacity = '0';
            
            setTimeout(() => {
                row.remove();
                
                // Check if table is empty
                const tbody = document.querySelector('#gradosTable tbody');
                if (!tbody.children.length) {
                    tbody.innerHTML = `
                        <tr>
                            <td colspan="3" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="fas fa-graduation-cap fa-3x mb-3 opacity-50"></i>
                                    <h5 class="text-muted">No hay grados registrados</h5>
                                    <p class="mb-0">Comienza creando tu primer grado académico</p>
                                </div>
                            </td>
                        </tr>
                    `;
                }
            }, 300);
        }
    }

    // Create Grado Form
    document.getElementById('createGradoForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        showLoading();
        clearFormErrors('createGradoForm');

        const formData = new FormData(this);

        try {
            const response = await fetch('{{ route("admin.grados.store") }}', {
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
                addGradoToTable(data.grado);
                bootstrap.Modal.getInstance(document.getElementById('createGradoModal')).hide();
                this.reset();
            } else {
                if (data.errors) {
                    showFormErrors(data.errors, 'create');
                } else {
                    showAlert(data.message || 'Error al crear el grado', 'danger');
                }
            }
        } catch (error) {
            console.error('Error:', error);
            showAlert('Error de conexión. Intente nuevamente.', 'danger');
        } finally {
            hideLoading();
        }
    });

    // Edit Grado Buttons
    document.addEventListener('click', function(e) {
        if (e.target.closest('.edit-grado-btn')) {
            const btn = e.target.closest('.edit-grado-btn');
            const gradoId = btn.getAttribute('data-id');
            const gradoNombre = btn.getAttribute('data-nombre');

            document.getElementById('editGradoId').value = gradoId;
            document.getElementById('editNombre').value = gradoNombre;
            
            clearFormErrors('editGradoForm');
            
            const editModal = new bootstrap.Modal(document.getElementById('editGradoModal'));
            editModal.show();
        }
    });

    // Edit Grado Form
    document.getElementById('editGradoForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        showLoading();
        clearFormErrors('editGradoForm');

        const formData = new FormData(this);
        const gradoId = document.getElementById('editGradoId').value;

        try {
            const response = await fetch(`{{ route('admin.grados.index') }}/${gradoId}`, {
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
                updateGradoInTable(data.grado);
                bootstrap.Modal.getInstance(document.getElementById('editGradoModal')).hide();
            } else {
                if (data.errors) {
                    showFormErrors(data.errors, 'edit');
                } else {
                    showAlert(data.message || 'Error al actualizar el grado', 'danger');
                }
            }
        } catch (error) {
            console.error('Error:', error);
            showAlert('Error de conexión. Intente nuevamente.', 'danger');
        } finally {
            hideLoading();
        }
    });

    // Delete Grado Buttons
    let gradoToDelete = null;

    document.addEventListener('click', function(e) {
        if (e.target.closest('.delete-grado-btn')) {
            const btn = e.target.closest('.delete-grado-btn');
            gradoToDelete = {
                id: btn.getAttribute('data-id'),
                nombre: btn.getAttribute('data-nombre')
            };

            document.getElementById('deleteGradoNombre').textContent = gradoToDelete.nombre;
            
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteGradoModal'));
            deleteModal.show();
        }
    });

    // Confirm Delete
    document.getElementById('confirmDeleteBtn').addEventListener('click', async function() {
        if (!gradoToDelete) return;
        
        showLoading();

        try {
            const response = await fetch(`{{ route('admin.grados.index') }}/${gradoToDelete.id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            const data = await response.json();

            if (data.success) {
                showAlert(data.message, 'success');
                removeGradoFromTable(gradoToDelete.id);
                bootstrap.Modal.getInstance(document.getElementById('deleteGradoModal')).hide();
            } else {
                showAlert(data.message || 'Error al eliminar el grado', 'danger');
            }
        } catch (error) {
            console.error('Error:', error);
            showAlert('Error de conexión. Intente nuevamente.', 'danger');
        } finally {
            hideLoading();
            gradoToDelete = null;
        }
    });

    // Clear forms when modals are hidden
    document.getElementById('createGradoModal').addEventListener('hidden.bs.modal', function() {
        document.getElementById('createGradoForm').reset();
        clearFormErrors('createGradoForm');
    });

    document.getElementById('editGradoModal').addEventListener('hidden.bs.modal', function() {
        clearFormErrors('editGradoForm');
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

<!-- BARRA DE BÚSQUEDA EN TIEMPO REAL -->
<div class="row mb-4">
    <div class="col-md-6">
        <div class="input-group">
            <span class="input-group-text bg-light border-end-0">
                <i class="fas fa-search text-muted"></i>
            </span>
            <input type="text" class="form-control border-start-0" 
                   id="searchGrados" 
                   placeholder="Buscar grados..."
                   autocomplete="off">
        </div>
    </div>
    <div class="col-md-6 text-end">
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-outline-success" id="importGradosBtn">
                <i class="fas fa-file-import me-2"></i>Importar
            </button>
            <button type="button" class="btn btn-outline-info" id="exportGradosBtn">
                <i class="fas fa-file-export me-2"></i>Exportar
            </button>
            <button type="button" class="btn btn-outline-primary" id="statsGradosBtn">
                <i class="fas fa-chart-bar me-2"></i>Estadísticas
            </button>
        </div>
    </div>
</div>

<!-- MODAL DE IMPORTACIÓN -->
<div class="modal fade" id="importGradosModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-success text-white border-0">
                <h5 class="modal-title fw-bold">
                    <i class="fas fa-file-import me-2"></i>Importar Grados
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form id="importGradosForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="importFile" class="form-label fw-semibold">Archivo CSV</label>
                        <input type="file" class="form-control" id="importFile" name="file" 
                               accept=".csv,.txt" required>
                        <div class="form-text">
                            <i class="fas fa-info-circle me-1"></i>
                            El archivo debe tener el formato: Nombre del Grado
                        </div>
                    </div>
                    <div class="alert alert-info border-0">
                        <h6 class="fw-semibold mb-2">
                            <i class="fas fa-lightbulb me-1"></i>Formato esperado:
                        </h6>
                        <code>
                            Nombre<br>
                            6A<br>
                            6B<br>
                            7A<br>
                            ...
                        </code>
                    </div>
                </div>
                <div class="modal-footer border-0 bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-upload me-2"></i>Importar Archivo
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL DE ESTADÍSTICAS -->
<div class="modal fade" id="statsGradosModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white border-0">
                <h5 class="modal-title fw-bold">
                    <i class="fas fa-chart-bar me-2"></i>Estadísticas de Grados
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-4" id="statsContainer">
                    <!-- Las estadísticas se cargarán dinámicamente -->
                    <div class="col-12 text-center">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Cargando...</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 bg-light">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- FLOATING ACTION BUTTON (Alternativa para móviles) -->
<div class="fab-container d-md-none">
    <button type="button" class="fab fab-primary" data-bs-toggle="modal" data-bs-target="#createGradoModal">
        <i class="fas fa-plus"></i>
    </button>
</div>

<!-- FILTROS AVANZADOS (Opcional) -->
<div class="collapse" id="advancedFilters">
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Ordenar por</label>
                    <select class="form-select" id="sortBy">
                        <option value="nombre">Nombre</option>
                        <option value="created_at">Fecha de creación</option>
                        <option value="id">ID</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Orden</label>
                    <select class="form-select" id="sortOrder">
                        <option value="asc">Ascendente</option>
                        <option value="desc">Descendente</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Mostrar por página</label>
                    <select class="form-select" id="perPage">
                        <option value="15">15</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <button type="button" class="btn btn-primary" id="applyFilters">
                        <i class="fas fa-filter me-2"></i>Aplicar Filtros
                    </button>
                    <button type="button" class="btn btn-outline-secondary ms-2" id="clearFilters">
                        <i class="fas fa-times me-2"></i>Limpiar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ESTILOS ADICIONALES -->
<style>
/* FAB Styles */
.fab-container {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    z-index: 1050;
}

.fab {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    border: none;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    transition: all 0.3s ease;
    color: white;
}

.fab-primary {
    background: linear-gradient(135deg, #667eea, #764ba2);
}

.fab:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
}

/* Search Input Animation */
#searchGrados:focus {
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    border-color: #667eea;
}

/* Stats Cards */
.stat-card {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.2s ease;
}

.stat-card:hover {
    transform: translateY(-2px);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 0.875rem;
    color: #6b7280;
    font-weight: 500;
}

/* Loading States */
.btn-loading {
    position: relative;
    color: transparent !important;
}

.btn-loading::after {
    content: "";
    position: absolute;
    width: 16px;
    height: 16px;
    top: 50%;
    left: 50%;
    margin-left: -8px;
    margin-top: -8px;
    border: 2px solid #ffffff;
    border-radius: 50%;
    border-top-color: transparent;
    animation: spin 1s ease-in-out infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .fab-container {
        bottom: 1rem;
        right: 1rem;
    }
    
    .fab {
        width: 48px;
        height: 48px;
        font-size: 1rem;
    }
}
</style>

<!-- JAVASCRIPT ADICIONAL -->
<script>
// Búsqueda en tiempo real
let searchTimeout;
document.getElementById('searchGrados').addEventListener('input', function(e) {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
        performSearch(e.target.value);
    }, 300);
});

async function performSearch(query) {
    try {
        const response = await fetch(`/admin/grados/search?q=${encodeURIComponent(query)}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        
        const data = await response.json();
        
        if (data.success) {
            document.querySelector('#gradosTable tbody').innerHTML = data.html;
            // Actualizar paginación si existe
            const paginationContainer = document.querySelector('.pagination');
            if (paginationContainer && data.pagination) {
                paginationContainer.innerHTML = data.pagination;
            }
        }
    } catch (error) {
        console.error('Error en búsqueda:', error);
    }
}

// Exportar datos
document.getElementById('exportGradosBtn').addEventListener('click', function() {
    window.location.href = '/admin/grados/export?format=csv';
});

// Mostrar estadísticas
document.getElementById('statsGradosBtn').addEventListener('click', async function() {
    const modal = new bootstrap.Modal(document.getElementById('statsGradosModal'));
    modal.show();
    
    try {
        const response = await fetch('/admin/grados/stats', {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });
        const data = await response.json();
        
        if (data.success) {
            const statsHtml = `
                <div class="col-md-6">
                    <div class="stat-card">
                        <div class="stat-number text-primary">${data.stats.total_grados}</div>
                        <div class="stat-label">Total de Grados</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="stat-card">
                        <div class="stat-number text-success">${data.stats.grados_con_horarios}</div>
                        <div class="stat-label">Con Horarios</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="stat-card">
                        <div class="stat-number text-warning">${data.stats.grados_sin_horarios}</div>
                        <div class="stat-label">Sin Horarios</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="stat-card">
                        <div class="stat-number text-info">
                            <small style="font-size: 1rem;">${data.stats.ultimo_creado || 'N/A'}</small>
                        </div>
                        <div class="stat-label">Último Creado</div>
                    </div>
                </div>
            `;
            document.getElementById('statsContainer').innerHTML = statsHtml;
        }
    } catch (error) {
        console.error('Error cargando estadísticas:', error);
    }
});
</script>