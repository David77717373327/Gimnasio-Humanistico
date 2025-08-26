@extends('layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-4">Estudiantes pendientes de aprobación</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @php
        // Toma la colección que corresponda (pendientes o usuarios)
        $items = $usuarios ?? ($pendientes ?? collect());
    @endphp

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
                    @forelse($items as $usuario)
                        @php
                            $rol = strtolower(trim($usuario->role ?? ''));
                        @endphp
                        <tr>
                            <td>{{ $usuario->name ?? 'N/A' }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->document ?? 'N/A' }}</td>
                            <td>
                                @if($rol === 'student')
                                    <span class="badge bg-secondary">Estudiante</span>
                                @elseif($rol === 'professor')
                                    <span class="badge bg-success">Profesor</span>
                                @elseif($rol === 'admin')
                                    <span class="badge bg-dark">Administrador</span>
                                @else
                                    <span class="badge bg-light text-dark">{{ $usuario->role }}</span>
                                @endif
                            </td>
                            <td>
                                {{-- Aprobar --}}
                                @isset($usuario->is_approved)
                                    @if(!$usuario->is_approved)
                                        <form action="{{ route('admin.estudiantes.aprobar', $usuario->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn btn-success btn-sm">Aprobar</button>
                                        </form>

                                        <form action="{{ route('admin.estudiantes.rechazar', $usuario->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn btn-danger btn-sm">Rechazar</button>
                                        </form>
                                    @endif
                                @endisset

                                {{-- Asignar Profesor (solo si es student) --}}
                                @if($rol === 'student')
                                    <form action="{{ route('admin.asignarProfesor', $usuario->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="btn btn-primary btn-sm"
                                                onclick="return confirm('¿Asignar este usuario como Profesor?')">
                                            Asignar Profesor
                                        </button>
                                    </form>
                                @endif

                                {{-- (Opcional) Eliminar --}}
                                <form action="{{ route('admin.estudiantes.eliminar', $usuario->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-outline-danger btn-sm"
                                            onclick="return confirm('¿Eliminar este usuario?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No hay usuarios para mostrar.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
