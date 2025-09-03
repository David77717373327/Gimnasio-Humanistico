@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Lista de Profesores</h1>

    <!-- Botón para abrir modal de Crear -->
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#crearProfesorModal">+ Nuevo Profesor</button>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($profesores->isEmpty())
        <p>No hay profesores registrados.</p>
    @else
        <table id="tablaProfesores" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($profesores as $profesor)
                    <tr>
                        <td>{{ $profesor->id }}</td>
                        <td>{{ $profesor->document }}</td>
                        <td>{{ $profesor->name }}</td>
                        <td>{{ $profesor->email }}</td>
                        <td>
                            <!-- Botón Editar -->
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editarProfesorModal{{ $profesor->id }}">Editar</button>

                            <!-- Botón Eliminar -->
                            <form action="{{ route('admin.profesores.destroy', $profesor->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este profesor?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Editar -->
                    <div class="modal fade" id="editarProfesorModal{{ $profesor->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('admin.profesores.update', $profesor->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title">Editar Profesor</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label>Nombre</label>
                                            <input type="text" name="name" class="form-control" value="{{ $profesor->name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Documento</label>
                                            <input type="text" name="document" class="form-control" value="{{ $profesor->document }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" value="{{ $profesor->email }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Contraseña (opcional)</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button class="btn btn-primary" type="submit">Guardar cambios</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                @endforeach
            </tbody>
        </table>
    @endif
</div>

<!-- Modal Crear -->
<div class="modal fade" id="crearProfesorModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.profesores.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Crear Profesor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nombre</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Documento</label>
                        <input type="text" name="document" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Contraseña</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">

    <script>
        $(document).ready(function() {
            $('#tablaProfesores').DataTable({
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json"
                },
                columnDefs: [
                    { orderable: false, targets: 4 } // Desactiva orden en columna Acciones
                ]
            });
        });
    </script>
@endpush
