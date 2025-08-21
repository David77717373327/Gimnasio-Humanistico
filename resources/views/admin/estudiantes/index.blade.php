@extends('layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-3">Todos los Usuarios</h2>

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
                <th>Aprobado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name ?? 'N/A' }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->document ?? 'N/A' }}</td>
                    <td>{{ $usuario->role }}</td>
                    <td>{{ $usuario->is_approved ? 'Sí' : 'No' }}</td>
                    <td>
                        <form action="{{ route('admin.estudiantes.eliminar', $usuario->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7">No hay usuarios</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection