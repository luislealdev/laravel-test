@extends('layouts.app')

@section('title', 'Detalles de la Película')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <h1>Detalles de la Película</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('films.edit', $film) }}" class="btn btn-warning">
                Editar
            </a>
            <a href="{{ route('films.index') }}" class="btn btn-secondary">
                Volver a la lista
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Información General</h5>
                    <table class="table table-borderless">
                        <tr>
                            <th>ID:</th>
                            <td>{{ $film->id }}</td>
                        </tr>
                        <tr>
                            <th>Título:</th>
                            <td><strong>{{ $film->title }}</strong></td>
                        </tr>
                        <tr>
                            <th>Descripción:</th>
                            <td>{{ $film->description ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Año de Estreno:</th>
                            <td>{{ $film->release_year ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>ID del Idioma:</th>
                            <td>{{ $film->language_id }}</td>
                        </tr>
                        <tr>
                            <th>Duración:</th>
                            <td>{{ $film->length ?? 'N/A' }} minutos</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h5>Información de Renta</h5>
                    <table class="table table-borderless">
                        <tr>
                            <th>Duración de Renta:</th>
                            <td>{{ $film->rental_duration }} días</td>
                        </tr>
                        <tr>
                            <th>Precio de Renta:</th>
                            <td>${{ number_format($film->rental_rate, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Costo de Reemplazo:</th>
                            <td>${{ number_format($film->replacement_cost, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Clasificación:</th>
                            <td>
                                @if($film->rating)
                                    <span class="badge bg-secondary">{{ $film->rating }}</span>
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Características Especiales:</th>
                            <td>{{ $film->special_features ?? 'N/A' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            
            @if($film->actors->count() > 0)
                <div class="row mt-4">
                    <div class="col-12">
                        <h5>Actores</h5>
                        <div class="row">
                            @foreach($film->actors as $actor)
                                <div class="col-md-3 mb-2">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h6 class="card-title">{{ $actor->full_name }}</h6>
                                            <a href="{{ route('actors.show', $actor) }}" class="btn btn-sm btn-outline-primary">
                                                Ver Actor
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <div class="row mt-4">
                    <div class="col-12">
                        <h5>Actores</h5>
                        <p class="text-muted">No hay actores asignados a esta película.</p>
                        <small class="text-info">Las relaciones aparecerán aquí cuando se creen actores y se asocien con esta película.</small>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection