@extends('layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-3">Grados</h2>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

    <a href="{{ route('admin.grados.create') }}" class="btn btn-primary mb-3">+ Nuevo Grado</a>

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
                @forelse($grados as $g)
                    <tr>
                        <td>{{ $g->id }}</td>
                        <td>{{ $g->nombre }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.grados.edit', $g) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('admin.grados.destroy', $g) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar grado?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3">No hay grados registrados.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $grados->links() }}
</div>
@endsection
