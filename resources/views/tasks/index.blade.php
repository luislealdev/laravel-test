@extends('layouts.app')

@section('title', 'Lista de Tareas')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <h1>Lista de Tareas</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                Nueva Tarea
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
                        <th>Estado</th>
                        <th>Fecha Límite</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->title }}</td>
                            <td>
                                @if($task->completed)
                                    <span class="badge bg-success">Completada</span>
                                @else
                                    <span class="badge bg-warning">Pendiente</span>
                                @endif
                            </td>
                            <td>{{ $task->due_date ? $task->due_date->format('d/m/Y') : 'N/A' }}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('tasks.show', $task) }}" class="btn btn-info">
                                        Ver
                                    </a>
                                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">
                                        Editar
                                    </a>
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta tarea?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No hay tareas registradas</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

