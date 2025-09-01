@extends('layouts.master')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h2 class="m-0 fw-bold" style="color:#1E88E5;">📋 Gestión de Horarios Escolares</h2>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.horarios.create') }}" class="btn btn-primary">📅 Crear Horario</a>
            <a href="{{ route('admin.grados.index') }}" class="btn btn-success">🏫 Gestionar Grados</a>
            <a href="{{ route('admin.asignaturas.index') }}" class="btn btn-info">📚 Gestionar Asignaturas</a>
        </div>
    </div>

    {{-- Mensajes de estado --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Filtros y búsqueda --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.horarios.index') }}" class="row g-3">
                <div class="col-md-3">
                    <label class="form-label fw-bold">Filtrar por Grado:</label>
                    <select name="grado_id" class="form-select" onchange="this.form.submit()">
                        <option value="">-- Todos los grados --</option>
                        @foreach($grados as $grado)
                            <option value="{{ $grado->id }}" {{ request('grado_id') == $grado->id ? 'selected' : '' }}>
                                {{ $grado->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Día:</label>
                    <select name="dia" class="form-select" onchange="this.form.submit()">
                        <option value="">-- Todos los días --</option>
                        <option value="Lunes" {{ request('dia') == 'Lunes' ? 'selected' : '' }}>Lunes</option>
                        <option value="Martes" {{ request('dia') == 'Martes' ? 'selected' : '' }}>Martes</option>
                        <option value="Miércoles" {{ request('dia') == 'Miércoles' ? 'selected' : '' }}>Miércoles</option>
                        <option value="Jueves" {{ request('dia') == 'Jueves' ? 'selected' : '' }}>Jueves</option>
                        <option value="Viernes" {{ request('dia') == 'Viernes' ? 'selected' : '' }}>Viernes</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Asignatura:</label>
                    <select name="asignatura_id" class="form-select" onchange="this.form.submit()">
                        <option value="">-- Todas las asignaturas --</option>
                        @foreach($asignaturas as $asignatura)
                            <option value="{{ $asignatura->id }}" {{ request('asignatura_id') == $asignatura->id ? 'selected' : '' }}>
                                {{ $asignatura->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <a href="{{ route('admin.horarios.index') }}" class="btn btn-outline-secondary">
                        🔄 Limpiar Filtros
                    </a>
                </div>
            </form>
        </div>
    </div>

    {{-- Vista por grados (tarjetas) - Solo cuando hay filtro de grado específico --}}
    @if(request('grado_id'))
    @php 
        $gradoSeleccionado = $grados->find(request('grado_id')); 
        // Usar SOLO $todosHorarios que viene del controlador
        $horariosGrado = $todosHorarios ?? collect();
    @endphp
    @if($gradoSeleccionado)
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">📅 Horario de {{ $gradoSeleccionado->nombre }}</h5>
                <small>
                    Total de horarios para este grado: {{ $horariosGrado->count() }}
                    @if($horariosGrado->count() === 0)
                        <span class="text-warning"> - ⚠️ No hay horarios asignados</span>
                    @endif
                </small>
            </div>
            <div class="card-body p-0">
                @if($horariosGrado->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th width="100">Hora</th>
                                    <th>Lunes</th>
                                    <th>Martes</th>
                                    <th>Miércoles</th>
                                    <th>Jueves</th>
                                    <th>Viernes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $horas = ['07:00', '08:00', '09:00', '10:00', '11:00', '12:00'];
                                    $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];
                                @endphp
                                @foreach($horas as $hora)
                                <tr>
                                    <td class="fw-bold bg-light">{{ $hora }}</td>
                                    @foreach($dias as $dia)
                                        @php
                                            // Buscar horarios para este día y hora (pueden ser múltiples)
                                            $horariosEnFranja = $horariosGrado->filter(function($item) use ($dia, $hora) {
                                                $horaItem = substr($item->hora_inicio, 0, 5); // Obtener solo HH:MM
                                                return $item->dia === $dia && $horaItem === $hora;
                                            });
                                            
                                            // Tomar el primer horario encontrado (o usar lógica más compleja si necesitas)
                                            $horario = $horariosEnFranja->first();
                                            $cantidadHorarios = $horariosEnFranja->count();
                                        @endphp
                                        <td class="p-2">
                                            @if($horario)
                                                <div class="horario-cell {{ $cantidadHorarios > 1 ? 'border-warning' : '' }}">
                                                    <div class="fw-bold text-primary">
                                                        📚 {{ $horario->asignatura->nombre ?? 'Sin asignatura' }}
                                                    </div>
                                                    <div class="small text-muted">
                                                        👨‍🏫 {{ $horario->user->name ?? 'Sin profesor' }}
                                                    </div>
                                                    
                                                    {{-- Mostrar alerta si hay conflictos --}}
                                                    @if($cantidadHorarios > 1)
                                                        <div class="small text-warning mt-1">
                                                            ⚠️ {{ $cantidadHorarios }} horarios en esta franja
                                                        </div>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="text-muted small">
                                                    <em>Sin asignar</em>
                                                </div>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                                {{-- Fila de descanso --}}
                                @if($hora === '09:00')
                                    <tr class="table-warning">
                                        <td colspan="6" class="text-center fw-bold">
                                            ⏸️ DESCANSO (09:00 - 09:30)
                                        </td>
                                    </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <div class="mb-3">
                            <i class="fas fa-calendar-times fa-3x text-muted"></i>
                        </div>
                        <h6 class="text-muted">No hay horarios asignados para {{ $gradoSeleccionado->nombre }}</h6>
                        <p class="text-muted mb-3">
                            Este grado no tiene ningún horario configurado aún.
                        </p>
                        <a href="{{ route('admin.horarios.create') }}?grado_id={{ $gradoSeleccionado->id }}" 
                           class="btn btn-primary btn-sm">
                            📅 Crear Primer Horario
                        </a>
                    </div>
                @endif
            </div>
        </div>
    @endif
    @else
    {{-- Vista de todos los grados cuando NO hay filtros aplicados --}}
    @if($grados->count() > 0)
        <div class="row">
            <div class="col-12">
                <h5 class="mb-4 text-primary">📚 Horarios por Grado</h5>
            </div>
        </div>

        @foreach($grados as $grado)
            @php
                // Obtener todos los horarios de este grado desde la nueva variable
                $horariosDelGrado = $todosLosHorarios->where('grado_id', $grado->id);
            @endphp
            
            <div class="card shadow-sm mb-4">
                <div class="card-header d-flex justify-content-between align-items-center" 
                     style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                    <div>
                        <h6 class="mb-0">🏫 {{ $grado->nombre }}</h6>
                        <small class="text-light">
                            {{ $horariosDelGrado->count() }} horarios programados
                            @if($horariosDelGrado->count() === 0)
                                - ⚠️ Sin horarios asignados
                            @endif
                        </small>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="{{ route('admin.horarios.index') }}?grado_id={{ $grado->id }}" 
                           class="btn btn-light btn-sm" title="Ver horario completo">
                            👁️ Ver Detalle
                        </a>
                        <a href="{{ route('admin.horarios.create') }}?grado_id={{ $grado->id }}" 
                           class="btn btn-warning btn-sm" title="Agregar horario">
                            ➕ Agregar
                        </a>
                    </div>
                </div>
                
                <div class="card-body p-0">
                    @if($horariosDelGrado->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0">
                                <thead class="table-secondary">
                                    <tr>
                                        <th width="100" class="text-center">Hora</th>
                                        <th class="text-center">Lunes</th>
                                        <th class="text-center">Martes</th>
                                        <th class="text-center">Miércoles</th>
                                        <th class="text-center">Jueves</th>
                                        <th class="text-center">Viernes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $horas = ['07:00', '08:00', '09:00', '10:00', '11:00', '12:00'];
                                        $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];
                                    @endphp
                                    @foreach($horas as $hora)
                                    <tr>
                                        <td class="fw-bold bg-light text-center">{{ $hora }}</td>
                                        @foreach($dias as $dia)
                                            @php
                                                // Buscar horario para este día y hora específicos
                                                $horarioEspecifico = $horariosDelGrado->filter(function($item) use ($dia, $hora) {
                                                    $horaItem = substr($item->hora_inicio, 0, 5);
                                                    return $item->dia === $dia && $horaItem === $hora;
                                                })->first();
                                            @endphp
                                            <td class="p-2 text-center" style="min-height: 60px; vertical-align: middle;">
                                                @if($horarioEspecifico)
                                                    <div class="horario-mini-cell">
                                                        <div class="fw-bold text-primary small">
                                                            {{ $horarioEspecifico->asignatura->nombre ?? 'Sin asignatura' }}
                                                        </div>
                                                        <div class="text-muted" style="font-size: 0.75em;">
                                                            {{ $horarioEspecifico->user->name ?? 'Sin profesor' }}
                                                        </div>
                                                    </div>
                                                @else
                                                    <span class="text-muted small">-</span>
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                    
                                    {{-- Fila de descanso --}}
                                    @if($hora === '09:00')
                                        <tr class="table-warning">
                                            <td colspan="6" class="text-center fw-bold small">
                                                ⏸️ DESCANSO (09:00 - 09:30)
                                            </td>
                                        </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <div class="mb-2">
                                <i class="fas fa-calendar-plus fa-2x text-muted"></i>
                            </div>
                            <p class="text-muted mb-3">Este grado no tiene horarios asignados</p>
                            <a href="{{ route('admin.horarios.create') }}?grado_id={{ $grado->id }}" 
                               class="btn btn-primary btn-sm">
                                📅 Crear Horarios
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    @endif
    @endif


    {{-- Resumen estadístico --}}
    @if($horarios->count() > 0)
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body text-center">
                        <h4>{{ $horarios->total() }}</h4>
                        <small>Total Horarios</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body text-center">
                        <h4>{{ $grados->count() }}</h4>
                        <small>Grados Activos</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body text-center">
                        <h4>{{ $asignaturas->count() }}</h4>
                        <small>Asignaturas</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-white">
                    <div class="card-body text-center">
                        @php
                            $profesoresUnicos = $horarios->pluck('user_id')->unique()->count();
                        @endphp
                        <h4>{{ $profesoresUnicos }}</h4>
                        <small>Profesores Asignados</small>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

{{-- Modal de creación rápida --}}
<div class="modal fade" id="quickCreateModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.horarios.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">📅 Crear Horario Rápido</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Grado</label>
                            <select name="grado_id" class="form-select" required>
                                <option value="">-- Selecciona --</option>
                                @foreach($grados as $grado)
                                    <option value="{{ $grado->id }}">{{ $grado->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Asignatura</label>
                            <select name="asignatura_id" class="form-select" required>
                                <option value="">-- Selecciona --</option>
                                @foreach($asignaturas as $asignatura)
                                    <option value="{{ $asignatura->id }}">{{ $asignatura->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Profesor</label>
                            <select name="user_id" class="form-select" required>
                                <option value="">-- Selecciona --</option>
                                @foreach($profesores as $profesor)
                                    <option value="{{ $profesor->id }}">{{ $profesor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Día</label>
                            <select name="dia" class="form-select" required>
                                <option value="">-- Selecciona --</option>
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miércoles">Miércoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Hora Inicio</label>
                            <input type="time" name="hora_inicio" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Hora Fin</label>
                            <input type="time" name="hora_fin" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">💾 Guardar Horario</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .horario-cell {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 8px;
        border-left: 4px solid #007bff;
    }
    
    .horario-mini-cell {
        background: #f8f9fa;
        border-radius: 6px;
        padding: 6px;
        border-left: 3px solid #007bff;
        min-height: 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    
    .horario-cell.border-warning {
        border-left-color: #ffc107 !important;
        background: #fff3cd;
    }
    
    .horario-actions {
        display: flex;
        gap: 4px;
    }
    
    .btn-group .btn {
        border-radius: 4px !important;
    }
    
    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.05);
    }
    
    .card {
        border: none;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .badge {
        font-size: 0.85em;
    }

    /* Mejorar la visualización de las tablas de horario */
    .table-bordered td {
        border: 1px solid #dee2e6;
    }
    
    .table-hover tbody tr:hover td {
        background-color: rgba(0, 123, 255, 0.05);
    }
    
    /* Cards con gradiente mejorado */
    .card-header {
        border-bottom: 1px solid rgba(255,255,255,0.2);
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // Función para exportar horarios
    window.exportarHorarios = function() {
        const params = new URLSearchParams(window.location.search);
        params.append('export', 'true');
        window.open(`{{ route('admin.horarios.index') }}?${params.toString()}`, '_blank');
    };
    
    // Auto-submit en filtros
    document.querySelectorAll('select[onchange]').forEach(select => {
        select.addEventListener('change', function() {
            this.form.submit();
        });
    });
    
    // Confirmar eliminaciones
    document.querySelectorAll('form[method="POST"]').forEach(form => {
        form.addEventListener('submit', function(e) {
            if (this.querySelector('button[onclick*="confirm"]')) {
                if (!confirm('¿Está seguro de realizar esta acción?')) {
                    e.preventDefault();
                    return false;
                }
            }
        });
    });
    
    // Tooltip para botones pequeños
    document.querySelectorAll('[title]').forEach(element => {
        if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
            new bootstrap.Tooltip(element);
        }
    });
    
    // Función para imprimir horario
    window.imprimirHorario = function() {
        const gradoId = new URLSearchParams(window.location.search).get('grado_id');
        if (gradoId) {
            window.print();
        }
    };
    
    // Auto-recargar cuando se cambia el filtro de grado
    const gradoSelect = document.querySelector('select[name="grado_id"]');
    if (gradoSelect) {
        gradoSelect.addEventListener('change', function() {
            // Agregar un pequeño delay para mostrar loading
            const form = this.form;
            if (this.value) {
                // Mostrar indicador de carga
                const button = form.querySelector('a[href*="Limpiar"]');
                if (button) {
                    button.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Cargando...';
                    button.classList.add('disabled');
                }
            }
            setTimeout(() => form.submit(), 100);
        });
    }

    // Función para alternar entre vista de grado y lista
    window.toggleView = function(view) {
        const gradeView = document.getElementById('grade-view');
        const listView = document.getElementById('list-view');
        const toggleBtns = document.querySelectorAll('.view-toggle');
        
        if (view === 'grade') {
            gradeView.style.display = 'block';
            listView.style.display = 'none';
            toggleBtns.forEach(btn => {
                btn.classList.toggle('active', btn.dataset.view === 'grade');
            });
        } else {
            gradeView.style.display = 'none';
            listView.style.display = 'block';
            toggleBtns.forEach(btn => {
                btn.classList.toggle('active', btn.dataset.view === 'list');
            });
        }
        
        // Guardar preferencia en localStorage
        localStorage.setItem('horarios_view_preference', view);
    };
    
    // Cargar preferencia de vista guardada
    const savedView = localStorage.getItem('horarios_view_preference') || 'grade';
    if (typeof window.toggleView === 'function') {
        window.toggleView(savedView);
    }
    
    // Función para colapsar/expandir grados
    window.toggleGrade = function(gradoId) {
        const gradeCard = document.getElementById(`grade-${gradoId}`);
        const gradeBody = gradeCard.querySelector('.card-body');
        const toggleIcon = gradeCard.querySelector('.toggle-icon');
        
        if (gradeBody.style.display === 'none') {
            gradeBody.style.display = 'block';
            toggleIcon.textContent = '−';
            gradeCard.classList.remove('collapsed');
        } else {
            gradeBody.style.display = 'none';
            toggleIcon.textContent = '+';
            gradeCard.classList.add('collapsed');
        }
    };
});
</script>
@endpush