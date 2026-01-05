@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="fw-bold">Gestión de Grados</h2>
                    <p class="text-muted">Administra los grados académicos del sistema</p>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createGradoModal">
                    <i class="fas fa-plus me-2"></i>Nuevo Grado
                </button>
            </div>
        </div>
    </div>

    <!-- Alerts -->
    <div id="alertContainer"></div>

    <!-- Tabla de Grados -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="mb-0">
                        <i class="fas fa-graduation-cap me-2 text-primary"></i>Lista de Grados
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="py-3 px-4">ID</th>
                                    <th class="py-3 px-4">Nombre del Grado</th>
                                    <th class="py-3 px-4">Nivel</th>
                                    <th class="py-3 px-4 text-end">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($grados as $grado)
                                    <tr class="grado-row" data-id="{{ $grado->id }}">
                                        <td class="py-3 px-4">
                                            <span class="badge bg-primary">#{{ $grado->id }}</span>
                                        </td>
                                        <td class="py-3 px-4">
                                            <strong class="grado-nombre">{{ $grado->nombre }}</strong>
                                        </td>
                                        <td class="py-3 px-4">
                                            <span class="badge bg-info grado-nivel">{{ $grado->nivel->nombre ?? 'Sin nivel' }}</span>
                                        </td>
                                        <td class="py-3 px-4 text-end">
                                            <button type="button" class="btn btn-warning btn-sm edit-grado-btn" 
                                                    data-id="{{ $grado->id }}" 
                                                    data-nombre="{{ $grado->nombre }}"
                                                    data-nivel_id="{{ $grado->nivel_id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm delete-grado-btn" 
                                                    data-id="{{ $grado->id }}"
                                                    data-nombre="{{ $grado->nombre }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-5">
                                            <i class="fas fa-graduation-cap fa-3x text-muted mb-3"></i>
                                            <h5 class="text-muted">No hay grados registrados</h5>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($grados->hasPages())
                    <div class="card-footer bg-white">
                        {{ $grados->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal Crear Grado -->
<div class="modal fade" id="createGradoModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-plus-circle me-2"></i>Crear Nuevo Grado
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form id="createGradoForm">
                @csrf
                <div class="modal-body">

                        <div class="mb-3">
                        <label for="createNivelId" class="form-label">Nivel</label>
                        <select class="form-select" id="createNivelId" name="nivel_id" required>
                            <option value="">Seleccione un nivel</option>
                            @foreach($niveles as $nivel)
                                <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback" id="createNivel_idError"></div>
                    </div>

                    <div class="mb-3">
                        <label for="createNombre" class="form-label">Nombre del Grado</label>
                        <input type="text" class="form-control" id="createNombre" name="nombre" 
                               placeholder="Ej: 6A, Primero A" required>
                        <div class="invalid-feedback" id="createNombreError"></div>
                    </div>
                    
                    @if($niveles->isEmpty())
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle me-1"></i>
                            No hay niveles creados. <a href="{{ route('admin.niveles.index') }}" class="alert-link">Crear niveles primero</a>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" @if($niveles->isEmpty()) disabled @endif>
                        <i class="fas fa-save me-2"></i>Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar Grado -->
<div class="modal fade" id="editGradoModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2"></i>Editar Grado
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editGradoForm">
                @csrf
                @method('PUT')
                <input type="hidden" id="editGradoId">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editNombre" class="form-label">Nombre del Grado</label>
                        <input type="text" class="form-control" id="editNombre" name="nombre" required>
                        <div class="invalid-feedback" id="editNombreError"></div>
                    </div>
                    <div class="mb-3">
                        <label for="editNivelId" class="form-label">Nivel</label>
                        <select class="form-select" id="editNivelId" name="nivel_id" required>
                            <option value="">Seleccione un nivel</option>
                            @foreach($niveles as $nivel)
                                <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback" id="editNivel_idError"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save me-2"></i>Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Eliminar -->
<div class="modal fade" id="deleteGradoModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle me-2"></i>Confirmar Eliminación
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <i class="fas fa-trash-alt fa-3x text-danger mb-3"></i>
                <h6>¿Estás seguro de eliminar este grado?</h6>
                <p class="text-muted">Esta acción no se puede deshacer.</p>
                <div class="alert alert-warning">
                    <strong>Grado: <span id="deleteGradoNombre"></span></strong>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                    <i class="fas fa-trash me-2"></i>Eliminar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Loading -->
<div id="loadingOverlay" class="d-none">
    <div class="spinner-border text-primary"></div>
</div>

@endsection

@push('styles')
<style>
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
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                     document.querySelector('input[name="_token"]')?.value;

    function showLoading() {
        document.getElementById('loadingOverlay').classList.remove('d-none');
    }

    function hideLoading() {
        document.getElementById('loadingOverlay').classList.add('d-none');
    }

    function showAlert(message, type = 'success') {
        const alertHtml = `
            <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-2"></i>${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;
        document.getElementById('alertContainer').innerHTML = alertHtml;
    }

    function clearFormErrors(formId) {
        const form = document.getElementById(formId);
        form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        form.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');
    }

    function showFormErrors(errors, prefix) {
        Object.keys(errors).forEach(field => {
            const input = document.getElementById(prefix + field.charAt(0).toUpperCase() + field.slice(1));
            const errorDiv = document.getElementById(prefix + field.charAt(0).toUpperCase() + field.slice(1) + 'Error');
            if (input && errorDiv) {
                input.classList.add('is-invalid');
                errorDiv.textContent = errors[field][0];
            }
        });
    }

    // Crear Grado
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
                location.reload();
            } else {
                if (data.errors) {
                    showFormErrors(data.errors, 'create');
                } else {
                    showAlert(data.message || 'Error al crear el grado', 'danger');
                }
            }
        } catch (error) {
            showAlert('Error de conexión', 'danger');
        } finally {
            hideLoading();
        }
    });

    // Editar Grado - Abrir Modal
    document.addEventListener('click', function(e) {
        if (e.target.closest('.edit-grado-btn')) {
            const btn = e.target.closest('.edit-grado-btn');
            document.getElementById('editGradoId').value = btn.getAttribute('data-id');
            document.getElementById('editNombre').value = btn.getAttribute('data-nombre');
            document.getElementById('editNivelId').value = btn.getAttribute('data-nivel_id');
            clearFormErrors('editGradoForm');
            new bootstrap.Modal(document.getElementById('editGradoModal')).show();
        }
    });

    // Editar Grado - Submit
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
                location.reload();
            } else {
                if (data.errors) {
                    showFormErrors(data.errors, 'edit');
                } else {
                    showAlert(data.message || 'Error al actualizar', 'danger');
                }
            }
        } catch (error) {
            showAlert('Error de conexión', 'danger');
        } finally {
            hideLoading();
        }
    });

    // Eliminar Grado - Abrir Modal
    let gradoToDelete = null;
    document.addEventListener('click', function(e) {
        if (e.target.closest('.delete-grado-btn')) {
            const btn = e.target.closest('.delete-grado-btn');
            gradoToDelete = {
                id: btn.getAttribute('data-id'),
                nombre: btn.getAttribute('data-nombre')
            };
            document.getElementById('deleteGradoNombre').textContent = gradoToDelete.nombre;
            new bootstrap.Modal(document.getElementById('deleteGradoModal')).show();
        }
    });

    // Confirmar Eliminación
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
                location.reload();
            } else {
                showAlert(data.message || 'Error al eliminar', 'danger');
            }
        } catch (error) {
            showAlert('Error de conexión', 'danger');
        } finally {
            hideLoading();
            gradoToDelete = null;
        }
    });
});
</script>
@endpush