@extends('layouts.app')

@section('title', 'Lista de Actores')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <h1>Lista de Actores</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('actors.create') }}" class="btn btn-primary">
                Nuevo Actor
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Nombre Completo</th>
                        <th>Última Actualización</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($actors as $actor)
                        <tr>
                            <td>{{ $actor->id }}</td>
                            <td>{{ $actor->first_name }}</td>
                            <td>{{ $actor->last_name }}</td>
                            <td>{{ $actor->full_name }}</td>
                            <td>{{ $actor->last_update ? $actor->last_update->format('d/m/Y H:i') : 'N/A' }}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('actors.show', $actor) }}" class="btn btn-info">
                                        Ver
                                    </a>
                                    <a href="{{ route('actors.edit', $actor) }}" class="btn btn-warning">
                                        Editar
                                    </a>
                                    <form action="{{ route('actors.destroy', $actor) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este actor?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay actores registrados</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection