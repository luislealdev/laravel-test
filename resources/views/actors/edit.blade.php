@extends('layouts.app')

@section('title', 'Editar Actor')

@section('content')
    <h1>Editar Actor</h1>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('actors.update', $actor) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="first_name" class="form-label">Nombre</label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" 
                           id="first_name" name="first_name" value="{{ old('first_name', $actor->first_name) }}" required>
                    @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="last_name" class="form-label">Apellido</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" 
                           id="last_name" name="last_name" value="{{ old('last_name', $actor->last_name) }}" required>
                    @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary me-2">Actualizar Actor</button>
                    <a href="{{ route('actors.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection