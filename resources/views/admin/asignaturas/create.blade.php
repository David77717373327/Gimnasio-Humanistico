@extends('layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-3">Nueva Asignatura</h2>

    <form method="POST" action="{{ route('admin.asignaturas.store') }}" class="row g-3">
        @csrf
        <div class="col-md-6">
            <label class="form-label">Nombre de la asignatura</label>
            <input type="text" name="nombre" class="form-control" placeholder="Ej: Matemáticas" value="{{ old('nombre') }}" required>
            @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="col-12">
            <button class="btn btn-primary">Guardar</button>
            <a href="{{ route('admin.asignaturas.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>
@endsection
