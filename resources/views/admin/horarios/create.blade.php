@extends('layouts.master')

@section('content')
<div class="container-fluid py-4">

    <!-- Encabezado -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h3 class="mb-1">
                        <i class="fas fa-calendar-plus text-primary"></i>
                        Crear Nuevo Horario
                    </h3>
                    <p class="text-muted mb-0">
                        Complete el formulario para registrar un nuevo horario académico.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Errores -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Hay errores en el formulario:</strong>
            <ul class="mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- FORMULARIO GENERAL -->
    <form action="{{ route('admin.horarios.store') }}" method="POST">
        @csrf

        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Información General</h5>
            </div>

            <div class="card-body row">

                <!-- NIVEL -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Nivel Educativo <span class="text-danger">*</span></label>
                    <select name="nivel_id" id="nivel_id" class="form-select" required>
                        <option value="">-- Seleccione un nivel --</option>
                        @foreach ($niveles as $nivel)
                            <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- GRADO -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Grado <span class="text-danger">*</span></label>
                    <select name="grado_id" id="grado_id" class="form-select" disabled required>
                        <option value="">-- Primero seleccione un nivel --</option>
                    </select>
                </div>

                <!-- ASIGNATURA -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Asignatura <span class="text-danger">*</span></label>
                    <select name="asignatura_id" class="form-select" required>
                        <option value="">-- Seleccione una asignatura --</option>
                        @foreach ($asignaturas as $asignatura)
                            <option value="{{ $asignatura->id }}">{{ $asignatura->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- PROFESOR -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Profesor <span class="text-danger">*</span></label>
                    <select name="profesor_id" class="form-select" required>
                        <option value="">-- Seleccione un profesor --</option>
                        @foreach ($profesores as $profe)
                            <option value="{{ $profe->id }}">{{ $profe->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- DÍA -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Día <span class="text-danger">*</span></label>
                    <select name="dia" class="form-select" required>
                        <option value="">-- Seleccione un día --</option>
                        @foreach ($dias as $dia)
                            <option value="{{ $dia }}">{{ $dia }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- HORA INICIO -->
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold">Hora Inicio <span class="text-danger">*</span></label>
                    <input type="time" name="hora_inicio" class="form-control" required>
                </div>

                <!-- HORA FIN -->
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold">Hora Fin <span class="text-danger">*</span></label>
                    <input type="time" name="hora_fin" class="form-control" required>
                </div>

            </div>
        </div>

        <!-- BOTONES -->
        <div class="text-end mt-3">
            <a href="{{ route('admin.horarios.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Cancelar
            </a>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Guardar Horario
            </button>
        </div>

    </form>
</div>

<!-- SCRIPT PARA CARGAR GRADOS DINÁMICOS -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const nivelSelect = document.getElementById("nivel_id");
    const gradoSelect = document.getElementById("grado_id");

    nivelSelect.addEventListener("change", function () {
        const nivelId = this.value;
        gradoSelect.innerHTML = '<option>Cargando...</option>';

        if (!nivelId) {
            gradoSelect.innerHTML = '<option>-- Primero seleccione un nivel --</option>';
            gradoSelect.disabled = true;
            return;
        }

        fetch(`/admin/horarios/niveles/${nivelId}/grados`)
            .then(response => response.json())
            .then(data => {
                gradoSelect.innerHTML = "";

                if (data.success && data.grados.length > 0) {
                    gradoSelect.innerHTML = '<option value="">-- Seleccione un grado --</option>';
                    data.grados.forEach(g => {
                        gradoSelect.innerHTML += `<option value="${g.id}">${g.nombre}</option>`;
                    });
                    gradoSelect.disabled = false;
                } else {
                    gradoSelect.innerHTML = '<option>No hay grados disponibles</option>';
                    gradoSelect.disabled = true;
                }
            })
            .catch(() => {
                gradoSelect.innerHTML = '<option>Error al cargar grados</option>';
                gradoSelect.disabled = true;
            });
    });
});
</script>

@endsection
