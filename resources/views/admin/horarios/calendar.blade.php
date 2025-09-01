@extends('layouts.master')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
    <h2 class="m-0 fw-bold" style="color:#1E88E5;">📅 Horario Escolar Interactivo</h2>
    <div class="d-flex gap-2">
      <button id="resetHorario" class="btn btn-outline-danger">🔁 Reiniciar</button>
      <button id="guardarTodo" class="btn btn-primary">💾 Guardar Horario</button>
      <button id="downloadHorario" class="btn btn-success">📥 Descargar PDF</button>
      <a href="{{ route('admin.horarios.index') }}" class="btn btn-info">📋 Ver Horarios</a>
    </div>
  </div>

  {{-- Selector de Grado --}}
  <div class="row mb-3">
    <div class="col-md-4">
      <label class="form-label fw-bold">Seleccionar Grado:</label>
      <select id="gradoSelect" class="form-select">
        <option value="">-- Selecciona un grado --</option>
        @foreach($grados as $grado)
          <option value="{{ $grado->id }}" {{ ($grados->first()?->id == $grado->id) ? 'selected' : '' }}>
            {{ $grado->nombre }}
          </option>
        @endforeach
      </select>
    </div>
    <div class="col-md-8">
      {{-- Indicador de estado de carga --}}
      <div id="loading-indicator" class="d-none">
        <div class="alert alert-info d-flex align-items-center">
          <div class="spinner me-2"></div>
          <span>Cargando horarios existentes...</span>
        </div>
      </div>
      {{-- Indicador de horarios cargados --}}
      <div id="horarios-status" class="d-none">
        <div class="alert alert-success">
          <strong>✅ Horarios cargados:</strong> <span id="horarios-count">0</span> clases programadas
        </div>
      </div>
    </div>
  </div>

  <div class="row g-3">
    <!-- Panel izquierdo: asignaturas y profesores -->
    <div class="col-12 col-lg-3">
      <div class="card shadow-sm border-0 rounded-4 mb-3">
        <div class="card-body">
          <h5 class="fw-bold mb-3" style="color:#43A047;">📚 Asignaturas</h5>
          <ul id="lista-asignaturas" class="list-unstyled d-grid gap-2">
            @foreach($asignaturas as $asignatura)
              <li class="chip draggable asignatura"
                  draggable="true"
                  data-type="asignatura"
                  data-id="{{ $asignatura->id }}"
                  data-text="{{ e($asignatura->nombre) }}">
                <span class="chip-icon">📘</span>
                <span class="chip-text">{{ $asignatura->nombre }}</span>
              </li>
            @endforeach
          </ul>
        </div>
      </div>

      <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
          <h5 class="fw-bold mb-3" style="color:#FB8C00;">👩‍🏫 Profesores</h5>
          <ul id="lista-profesores" class="list-unstyled d-grid gap-2">
            @foreach($profesores as $profesor)
              <li class="chip draggable profesor"
                  draggable="true"
                  data-type="profesor"
                  data-id="{{ $profesor->id }}"
                  data-text="{{ e($profesor->name) }}">
                <span class="chip-icon">🧑‍🏫</span>
                <span class="chip-text">{{ $profesor->name }}</span>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>

    <!-- Panel derecho: tabla de horario -->
    <div class="col-12 col-lg-9">
      <div id="wrap-horario" class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="card-body p-0">
          <!-- Versión para edición (visible por defecto) -->
          <div id="horario-editor" class="table-responsive">
            <table id="tabla-horario" class="table m-0 table-borderless align-middle text-center">
              <thead>
                <tr class="thead-row">
                  <th class="col-hora">Hora</th>
                  <th data-dia="1">Lunes</th>
                  <th data-dia="2">Martes</th>
                  <th data-dia="3">Miércoles</th>
                  <th data-dia="4">Jueves</th>
                  <th data-dia="5">Viernes</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $inicio = 7; $fin = 13; // 7:00 a 13:00
                @endphp

                @for ($h = $inicio; $h < $fin; $h++)
                  <tr>
                    <td class="hora-cell fw-bold">{{ sprintf('%02d:00', $h) }} – {{ sprintf('%02d:00', $h+1) }}</td>
                    @for ($d = 1; $d <= 5; $d++)
                      <td class="dropzone"
                          data-dia="{{ $d }}"
                          data-inicio="{{ sprintf('%02d:00', $h) }}"
                          data-fin="{{ sprintf('%02d:00', $h+1) }}">
                        <div class="slot-placeholder">Arrastra aquí</div>
                      </td>
                    @endfor
                  </tr>

                  {{-- Descanso a las 9:00–9:30 --}}
                  @if ($h == 9)
                    <tr class="row-break">
                      <td colspan="6" class="break-cell">
                        <div class="break-pill">⏸️ Descanso — 09:00 a 09:30</div>
                      </td>
                    </tr>
                  @endif
                @endfor
              </tbody>
            </table>
          </div>

          <!-- Incluir la vista PDF separada -->
          @include('admin.horarios.horarios-pdf')

          <div class="p-3 small text-muted" id="editor-help">
            💡 Consejo: Arrastra una <b>asignatura</b> o un <b>profesor</b> a la casilla. Usa el botón 💾 <b>Guardar Horario</b> para guardar todos los cambios. Usa 🗑 para borrar casillas individuales.
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal para seleccionar profesor -->
<div id="modal-profesor" class="modal fade" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Selecciona un profesor</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <select id="modal-profesor-select" class="form-select"></select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="modal-profesor-ok" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal de confirmación para guardar -->
<div id="modal-confirm-save" class="modal fade" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Confirmar Guardado</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>¿Deseas guardar el horario completo? Se guardará:</p>
        <ul id="save-summary"></ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="confirm-save-btn" class="btn btn-success">💾 Guardar Todo</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('styles')
{{-- Incluir estilos principales --}}
<link rel="stylesheet" href="{{ asset('css/horarios.css') }}">
{{-- Incluir estilos del PDF --}}
<link rel="stylesheet" href="{{ asset('css/horarios-pdf.css') }}">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script src="{{ asset('js/horario.js') }}"></script>
<script>
    window.Laravel = {
        csrfToken: @json(csrf_token()),
        currentGradoId: @json(optional($grados->first())->id ?? null),
        profesores: @json($profesores->map(function($p){ return ['id'=>$p->id,'name'=>$p->name]; })->toArray()),
        asignaturas: @json($asignaturas->mapWithKeys(function($a){ return [$a->id => $a->nombre]; })->toArray()),
        grados: @json($grados->pluck('nombre', 'id')),
        routes: {
            horarios_index: @json(route('admin.horarios.index')),
            horarios_store: @json(route('admin.horarios.store'))
        }
    };
</script>
@endpush