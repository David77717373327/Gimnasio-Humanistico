@extends('layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-3">Asignaturas</h2>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

    <a href="{{ route('admin.asignaturas.create') }}" class="btn btn-primary mb-3">+ Nueva Asignatura</a>

    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($asignaturas as $a)
                    <tr>
                        <td>{{ $a->id }}</td>
                        <td>{{ $a->nombre }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.asignaturas.edit', $a) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('admin.asignaturas.destroy', $a) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar asignatura?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3">No hay asignaturas registradas.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $asignaturas->links() }}
</div>
@endsection
