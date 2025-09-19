@extends('layouts.app')

@section('title', 'Detalles de la Tarea')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Detalles de la Tarea</h1>
        <div>
            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-light">
            <h5 class="card-title mb-0">{{ $task->title }}</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <h6 class="fw-bold">Estado:</h6>
                @if($task->completed)
                    <span class="badge bg-success">Completada</span>
                @else
                    <span class="badge bg-warning">Pendiente</span>
                @endif
            </div>

            <div class="mb-3">
                <h6 class="fw-bold">Descripción:</h6>
                <p class="card-text">{{ $task->description ?: 'Sin descripción' }}</p>
            </div>

            <div class="mb-3">
                <h6 class="fw-bold">Fecha límite:</h6>
                <p>{{ $task->due_date ? $task->due_date->format('d/m/Y') : 'Sin fecha límite' }}</p>
            </div>

            <div class="mb-3">
                <h6 class="fw-bold">Creada el:</h6>
                <p>{{ $task->created_at->format('d/m/Y H:i') }}</p>
            </div>

            <div class="mb-3">
                <h6 class="fw-bold">Última actualización:</h6>
                <p>{{ $task->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>
        <div class="card-footer">
            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('¿Estás seguro de eliminar esta tarea?')">
                    Eliminar Tarea
                </button>
            </form>
        </div>
    </div>
@endsection