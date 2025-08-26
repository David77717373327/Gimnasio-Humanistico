@extends('layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-3">Editar Grado</h2>

    <form method="POST" action="{{ route('admin.grados.update', $grado->id) }}" class="row g-3">
        @csrf @method('PUT')

        <div class="col-md-6">
            <label class="form-label">Nombre del grado</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $grado->nombre) }}" required>
            @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="col-12">
            <button class="btn btn-primary">Actualizar</button>
            <a href="{{ route('admin.grados.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>
@endsection
