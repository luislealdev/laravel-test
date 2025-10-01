@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4><i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión</h4>
            </div>
            <div class="card-body">
                <!-- <div class="alert alert-info">
                    <h6><i class="bi bi-info-circle"></i> Vista de Demostración</h6>
                    <p class="mb-0">Esta es solo una plantilla de diseño. Para funcionalidad real, implementa Laravel Breeze, Jetstream o tu propio sistema de autenticación.</p>
                </div> -->

                <form>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">
                            Recordarme
                        </label>
                    </div>
                    
                    <div class="d-grid">
                        <button type="button" class="btn btn-primary" onclick="showDemo()">
                            <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
                        </button>
                    </div>
                    
                    <div class="text-center mt-3">
                        <a href="#" class="text-decoration-none">¿Olvidaste tu contraseña?</a>
                    </div>
                </form>

                <hr>
                
                <div class="card">
                    <div class="card-header">
                        <h6><i class="bi bi-key"></i> Credenciales de Prueba</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <strong>Admin:</strong> admin@example.com / password
                            </div>
                            <div class="col-12 mb-2">
                                <strong>Moderador:</strong> moderator@example.com / password
                            </div>
                            <div class="col-12">
                                <strong>Usuario:</strong> user@example.com / password
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-3">
            <a href="{{ url('/') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Volver al Inicio
            </a>
        </div>
    </div>
</div>

<script>
function showDemo() {
    alert('Esta es solo una vista de demostración. Para funcionalidad real, implementa un sistema de autenticación como Laravel Breeze.');
}
</script>
@endsection