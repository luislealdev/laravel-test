@extends('layouts.app')

@section('title', 'Lista de Rentas')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <h1>Lista de Rentas</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('rentals.create') }}" class="btn btn-primary">
                Nueva Renta
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha de Renta</th>
                        <th>ID Inventario</th>
                        <th>ID Cliente</th>
                        <th>Fecha de Devolución</th>
                        <th>ID Staff</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rentals as $rental)
                        <tr>
                            <td>{{ $rental->id }}</td>
                            <td>{{ $rental->rental_date->format('d/m/Y H:i') }}</td>
                            <td>{{ $rental->inventory_id }}</td>
                            <td>{{ $rental->customer_id }}</td>
                            <td>{{ $rental->return_date ? $rental->return_date->format('d/m/Y H:i') : 'No devuelto' }}</td>
                            <td>{{ $rental->staff_id }}</td>
                            <td>
                                @if($rental->return_date)
                                    <span class="badge bg-success">Devuelto</span>
                                @else
                                    <span class="badge bg-warning">Activo</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('rentals.show', $rental) }}" class="btn btn-info">
                                        Ver
                                    </a>
                                    <a href="{{ route('rentals.edit', $rental) }}" class="btn btn-warning">
                                        Editar
                                    </a>
                                    <form action="{{ route('rentals.destroy', $rental) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta renta?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No hay rentas registradas</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection