@extends('layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-4">Estudiantes pendientes de aprobación</h2>

    {{-- Mensajes de éxito o error --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Documento</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->documento }}</td>
                            <td>
                                @if($usuario->role === 'student')
                                    <span class="badge bg-secondary">Estudiante</span>
                                @elseif($usuario->role === 'professor')
                                    <span class="badge bg-success">Profesor</span>
                                @elseif($usuario->role === 'admin')
                                    <span class="badge bg-dark">Administrador</span>
                                @endif
                            </td>
                            <td>
                                {{-- Aprobar --}}
                                <form action="{{ route('admin.estudiantes.aprobar', $usuario->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-success btn-sm">Aprobar</button>
                                </form>

                                {{-- Rechazar --}}
                                <form action="{{ route('admin.estudiantes.rechazar', $usuario->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Rechazar</button>
                                </form>

                                {{-- Asignar Profesor --}}
                                @if($usuario->role === 'student')
                                    <form action="{{ route('admin.asignarProfesor', $usuario->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="btn btn-primary btn-sm" onclick="return confirm('¿Seguro que deseas asignar este usuario como Profesor?')">
                                            Asignar Profesor
                                        </button>
                                    </form>
                                @elseif($usuario->role === 'professor')
                                    <form action="{{ route('admin.removerProfesor', $usuario->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="btn btn-warning btn-sm" onclick="return confirm('¿Seguro que deseas quitar el rol de Profesor a este usuario?')">
                                            Quitar Profesor
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No hay usuarios pendientes.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
