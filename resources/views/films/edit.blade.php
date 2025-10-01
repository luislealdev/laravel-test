@extends('layouts.app')

@section('title', 'Editar Película')

@section('content')
    <h1>Editar Película</h1>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('films.update', $film) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Título</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title', $film->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="3">{{ old('description', $film->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="release_year" class="form-label">Año de Estreno</label>
                            <input type="number" class="form-control @error('release_year') is-invalid @enderror" 
                                   id="release_year" name="release_year" value="{{ old('release_year', $film->release_year) }}" 
                                   min="1900" max="{{ date('Y') }}">
                            @error('release_year')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="language_id" class="form-label">ID del Idioma</label>
                            <input type="number" class="form-control @error('language_id') is-invalid @enderror" 
                                   id="language_id" name="language_id" value="{{ old('language_id', $film->language_id) }}" required>
                            @error('language_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="length" class="form-label">Duración (minutos)</label>
                            <input type="number" class="form-control @error('length') is-invalid @enderror" 
                                   id="length" name="length" value="{{ old('length', $film->length) }}" min="1">
                            @error('length')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="rental_duration" class="form-label">Duración de Renta (días)</label>
                            <input type="number" class="form-control @error('rental_duration') is-invalid @enderror" 
                                   id="rental_duration" name="rental_duration" value="{{ old('rental_duration', $film->rental_duration) }}" 
                                   min="1" required>
                            @error('rental_duration')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="rental_rate" class="form-label">Precio de Renta</label>
                            <input type="number" step="0.01" class="form-control @error('rental_rate') is-invalid @enderror" 
                                   id="rental_rate" name="rental_rate" value="{{ old('rental_rate', $film->rental_rate) }}" 
                                   min="0" required>
                            @error('rental_rate')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="replacement_cost" class="form-label">Costo de Reemplazo</label>
                            <input type="number" step="0.01" class="form-control @error('replacement_cost') is-invalid @enderror" 
                                   id="replacement_cost" name="replacement_cost" value="{{ old('replacement_cost', $film->replacement_cost) }}" 
                                   min="0" required>
                            @error('replacement_cost')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="rating" class="form-label">Clasificación</label>
                            <select class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating">
                                <option value="">Seleccionar clasificación</option>
                                <option value="G" {{ old('rating', $film->rating) == 'G' ? 'selected' : '' }}>G - General</option>
                                <option value="PG" {{ old('rating', $film->rating) == 'PG' ? 'selected' : '' }}>PG - Parental Guidance</option>
                                <option value="PG-13" {{ old('rating', $film->rating) == 'PG-13' ? 'selected' : '' }}>PG-13 - Parental Guidance 13+</option>
                                <option value="R" {{ old('rating', $film->rating) == 'R' ? 'selected' : '' }}>R - Restricted</option>
                                <option value="NC-17" {{ old('rating', $film->rating) == 'NC-17' ? 'selected' : '' }}>NC-17 - No Children 17-</option>
                            </select>
                            @error('rating')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="special_features" class="form-label">Características Especiales</label>
                            <textarea class="form-control @error('special_features') is-invalid @enderror" 
                                      id="special_features" name="special_features" rows="3" 
                                      placeholder="Ej: Comentarios del director, Escenas eliminadas">{{ old('special_features', $film->special_features) }}</textarea>
                            @error('special_features')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary me-2">Actualizar Película</button>
                    <a href="{{ route('films.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection