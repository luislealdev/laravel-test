@extends('layouts.app')

@section('title', 'Detalles del Actor')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <h1>Detalles del Actor</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('actors.edit', $actor) }}" class="btn btn-warning">
                Editar
            </a>
            <a href="{{ route('actors.index') }}" class="btn btn-secondary">
                Volver a la lista
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Información Personal</h5>
                    <table class="table table-borderless">
                        <tr>
                            <th>ID:</th>
                            <td>{{ $actor->id }}</td>
                        </tr>
                        <tr>
                            <th>Nombre:</th>
                            <td>{{ $actor->first_name }}</td>
                        </tr>
                        <tr>
                            <th>Apellido:</th>
                            <td>{{ $actor->last_name }}</td>
                        </tr>
                        <tr>
                            <th>Nombre Completo:</th>
                            <td><strong>{{ $actor->full_name }}</strong></td>
                        </tr>
                        <tr>
                            <th>Última Actualización:</th>
                            <td>{{ $actor->last_update ? $actor->last_update->format('d/m/Y H:i:s') : 'N/A' }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h5>Películas</h5>
                    @if($actor->films->count() > 0)
                        <ul class="list-group">
                            @foreach($actor->films as $film)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $film->title }}
                                    <a href="{{ route('films.show', $film) }}" class="btn btn-sm btn-outline-primary">Ver Película</a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">No hay películas asignadas a este actor.</p>
                        <small class="text-info">Las relaciones aparecerán aquí cuando se creen películas y se asocien con este actor.</small>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection