@extends('layouts.app')

@section('title', 'Detalles de la Renta')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <h1>Detalles de la Renta</h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('rentals.edit', $rental) }}" class="btn btn-warning">
                Editar
            </a>
            <a href="{{ route('rentals.index') }}" class="btn btn-secondary">
                Volver a la lista
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Información de la Renta</h5>
                    <table class="table table-borderless">
                        <tr>
                            <th>ID:</th>
                            <td>{{ $rental->id }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Renta:</th>
                            <td>{{ $rental->rental_date->format('d/m/Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>ID del Inventario:</th>
                            <td>{{ $rental->inventory_id }}</td>
                        </tr>
                        <tr>
                            <th>ID del Cliente:</th>
                            <td>{{ $rental->customer_id }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Devolución:</th>
                            <td>
                                @if($rental->return_date)
                                    {{ $rental->return_date->format('d/m/Y H:i:s') }}
                                @else
                                    <span class="text-warning">No devuelto</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>ID del Staff:</th>
                            <td>{{ $rental->staff_id }}</td>
                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td>
                                @if($rental->return_date)
                                    <span class="badge bg-success">Devuelto</span>
                                @else
                                    <span class="badge bg-warning">Activo</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h5>Información Adicional</h5>
                    @if($rental->return_date && $rental->rental_date)
                        @php
                            $duracion = $rental->rental_date->diffInDays($rental->return_date);
                        @endphp
                        <p><strong>Duración de la renta:</strong> {{ $duracion }} día(s)</p>
                    @endif
                    
                    @if(!$rental->return_date)
                        @php
                            $diasTranscurridos = $rental->rental_date->diffInDays(now());
                        @endphp
                        <p><strong>Días transcurridos:</strong> {{ $diasTranscurridos }} día(s)</p>
                        
                        <div class="alert alert-info">
                            <strong>Renta activa:</strong> Esta película aún no ha sido devuelta.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection