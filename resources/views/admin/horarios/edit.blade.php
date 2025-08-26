@extends('layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-4">✏️ Editar Horario</h2>

    {{-- Mostrar errores de validación o conflictos --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.horarios.update', $horario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="grado_id" class="form-label">Grado</label>
            <select name="grado_id" id="grado_id" class="form-control" required>
                <option value="">-- Seleccionar grado --</option>
                @foreach($grados as $grado)
                    <option value="{{ $grado->id }}" {{ $horario->grado_id == $grado->id ? 'selected' : '' }}>
                        {{ $grado->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="asignatura_id" class="form-label">Asignatura</label>
            <select name="asignatura_id" id="asignatura_id" class="form-control" required>
                <option value="">-- Seleccionar asignatura --</option>
                @foreach($asignaturas as $asignatura)
                    <option value="{{ $asignatura->id }}" {{ $horario->asignatura_id == $asignatura->id ? 'selected' : '' }}>
                        {{ $asignatura->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">Profesor</label>
            <select name="user_id" id="user_id" class="form-control">
                <option value="">-- Sin asignar --</option>
                @foreach($profesores as $profesor)
                    <option value="{{ $profesor->id }}" {{ $horario->user_id == $profesor->id ? 'selected' : '' }}>
                        {{ $profesor->name }}
                    </option>
                @endforeach
            </select>
            @if($profesores->isEmpty())
                <small class="text-warning">No hay profesores registrados. Puedes guardar el horario sin asignar uno.</small>
            @endif
        </div>

        <div class="mb-3">
            <label for="dia" class="form-label">Día</label>
            <select name="dia" id="dia" class="form-control" required>
                <option value="">-- Seleccionar día --</option>
                @foreach(['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'] as $dia)
                    <option value="{{ $dia }}" {{ $horario->dia == $dia ? 'selected' : '' }}>{{ $dia }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="hora_inicio" class="form-label">Hora de inicio</label>
            <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" value="{{ $horario->hora_inicio }}" required>
        </div>

        <div class="mb-3">
            <label for="hora_fin" class="form-label">Hora de fin</label>
            <input type="time" name="hora_fin" id="hora_fin" class="form-control" value="{{ $horario->hora_fin }}" required>
        </div>

        <button type="submit" class="btn btn-success">💾 Actualizar</button>
        <a href="{{ route('admin.horarios.index') }}" class="btn btn-secondary">↩️ Volver</a>
    </form>
</div>
@endsection