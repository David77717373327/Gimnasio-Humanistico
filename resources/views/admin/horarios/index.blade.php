@extends('layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-4">📅 Lista de Horarios</h2>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Mensaje de error (para redirecciones como falta de profesores) --}}
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Enlaces rápidos --}}
    <div class="mb-3">
        <a href="{{ route('admin.horarios.create') }}" class="btn btn-primary">➕ Nuevo Horario</a>
        <a href="{{ route('admin.grados.index') }}" class="btn btn-success">🏫 Gestionar Grados</a>
        <a href="{{ route('admin.asignaturas.index') }}" class="btn btn-info">📚 Gestionar Asignaturas</a>
    </div>

    {{-- Tabla de horarios --}}
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Grado</th>
                <th>Asignatura</th>
                <th>Profesor</th>
                <th>Día</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($horarios as $horario)
                <tr>
                    <td>{{ $horario->id }}</td>
                    <td>{{ $horario->grado?->nombre ?? 'Sin grado' }}</td>
                    <td>{{ $horario->asignatura?->nombre ?? 'Sin asignatura' }}</td>
                    <td>{{ $horario->user?->name ?? 'Sin asignar' }}</td> <!-- Cambiado de profesor a user -->
                    <td>{{ $horario->dia }}</td>
                    <td>{{ $horario->hora_inicio }}</td>
                    <td>{{ $horario->hora_fin }}</td>
                    <td>
                        <a href="{{ route('admin.horarios.edit', $horario->id) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
                        <form action="{{ route('admin.horarios.destroy', $horario->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este horario?')">🗑 Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">⚠️ No hay horarios registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection