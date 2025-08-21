@extends('layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-3">Estudiantes pendientes de aprobación</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Documento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pendientes as $estudiante)
                <tr>
                    <td>{{ $estudiante->name }}</td>
                    <td>{{ $estudiante->email }}</td>
                    <td>{{ $estudiante->document ?? 'N/A' }}</td>
                    <td>
                        <form action="{{ route('admin.aprobar', $estudiante->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-success btn-sm">Aprobar</button>
                        </form>
                        <form action="{{ route('admin.rechazar', $estudiante->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-danger btn-sm">Rechazar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">No hay estudiantes pendientes</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
