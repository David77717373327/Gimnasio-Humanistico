@extends('layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-3">Usuarios Eliminados</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Documento</th>
                <th>Rol</th>
                <th>Eliminado en</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($eliminados as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name ?? 'N/A' }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->document ?? 'N/A' }}</td>
                    <td>{{ $usuario->role }}</td>
                    <td>{{ $usuario->deleted_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <form action="{{ route('admin.estudiantes.restaurar', $usuario->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-primary btn-sm" onclick="return confirm('¿Estás seguro de restaurar este usuario?')">Restaurar</button>
                        </form>
                        <form action="{{ route('admin.estudiantes.eliminarPermanente', $usuario->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar permanentemente este usuario?')">Eliminar Permanente</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7">No hay usuarios eliminados</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection