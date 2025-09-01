@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Mi Horario</h2>
    <a href="{{ route('student.horario.descargar') }}" class="btn btn-primary mb-3">Descargar PDF</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Día</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Asignatura</th>
                <th>Profesor</th>
            </tr>
        </thead>
        <tbody>
            @forelse($horarios as $horario)
                <tr>
                    <td>{{ $horario->dia }}</td>
                    <td>{{ $horario->hora_inicio }}</td>
                    <td>{{ $horario->hora_fin }}</td>
                    <td>{{ $horario->asignatura->nombre }}</td>
                    <td>{{ $horario->user ? $horario->user->name : 'Sin profesor' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No tienes horarios asignados aún.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
