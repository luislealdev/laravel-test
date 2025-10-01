@extends('layouts.app')

@section('title', 'Editar Renta')

@section('content')
    <h1>Editar Renta</h1>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('rentals.update', $rental) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="rental_date" class="form-label">Fecha de Renta</label>
                            <input type="datetime-local" class="form-control @error('rental_date') is-invalid @enderror" 
                                   id="rental_date" name="rental_date" value="{{ old('rental_date', $rental->rental_date->format('Y-m-d\TH:i')) }}" required>
                            @error('rental_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="inventory_id" class="form-label">ID del Inventario</label>
                            <input type="number" class="form-control @error('inventory_id') is-invalid @enderror" 
                                   id="inventory_id" name="inventory_id" value="{{ old('inventory_id', $rental->inventory_id) }}" required>
                            @error('inventory_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="customer_id" class="form-label">ID del Cliente</label>
                            <input type="number" class="form-control @error('customer_id') is-invalid @enderror" 
                                   id="customer_id" name="customer_id" value="{{ old('customer_id', $rental->customer_id) }}" required>
                            @error('customer_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="return_date" class="form-label">Fecha de Devolución (opcional)</label>
                            <input type="datetime-local" class="form-control @error('return_date') is-invalid @enderror" 
                                   id="return_date" name="return_date" value="{{ old('return_date', $rental->return_date ? $rental->return_date->format('Y-m-d\TH:i') : '') }}">
                            @error('return_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="staff_id" class="form-label">ID del Staff</label>
                            <input type="number" class="form-control @error('staff_id') is-invalid @enderror" 
                                   id="staff_id" name="staff_id" value="{{ old('staff_id', $rental->staff_id) }}" required>
                            @error('staff_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary me-2">Actualizar Renta</button>
                    <a href="{{ route('rentals.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection