@extends('layouts.app')

@section('title', 'Lista de Películas')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <h1>Lista de Películas</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('films.create') }}" class="btn btn-primary">
                Nueva Película
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Año</th>
                        <th>Duración</th>
                        <th>Clasificación</th>
                        <th>Precio Renta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($films as $film)
                        <tr>
                            <td>{{ $film->id }}</td>
                            <td>{{ $film->title }}</td>
                            <td>{{ $film->release_year ?? 'N/A' }}</td>
                            <td>{{ $film->length ?? 'N/A' }} min</td>
                            <td>
                                @if($film->rating)
                                    <span class="badge bg-secondary">{{ $film->rating }}</span>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>${{ number_format($film->rental_rate, 2) }}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('films.show', $film) }}" class="btn btn-info">
                                        Ver
                                    </a>
                                    <a href="{{ route('films.edit', $film) }}" class="btn btn-warning">
                                        Editar
                                    </a>
                                    <form action="{{ route('films.destroy', $film) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta película?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No hay películas registradas</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection