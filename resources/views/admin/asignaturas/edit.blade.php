@extends('layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-3">Editar Asignatura</h2>

    <form method="POST" action="{{ route('asignaturas.update', $asignatura) }}" class="row g-3">
        @csrf @method('PUT')

        <div class="col-md-6">
            <label class="form-label">Nombre de la asignatura</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $asignatura->nombre) }}" required>
            @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="col-12">
            <button class="btn btn-primary">Actualizar</button>
            <a href="{{ route('asignaturas.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>
@endsection
