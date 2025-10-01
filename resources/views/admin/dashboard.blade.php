<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-shield-check"></i> Panel Admin
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('admin.users') }}">Usuarios</a>
                <a class="nav-link" href="{{ route('moderator.panel') }}">Panel Moderador</a>
                <a class="nav-link" href="{{ url('/') }}">Volver al sitio</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1><i class="bi bi-speedometer2"></i> Dashboard de Administración</h1>
                    <span class="badge bg-success fs-6">Solo Administradores</span>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Estadística de Usuarios -->
            <div class="col-md-6 col-lg-3">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="card-title">{{ $stats['users'] }}</h3>
                                <p class="card-text">Usuarios</p>
                            </div>
                            <div class="align-self-center">
                                <i class="bi bi-people fs-1"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estadística de Actores -->
            <div class="col-md-6 col-lg-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="card-title">{{ $stats['actors'] }}</h3>
                                <p class="card-text">Actores</p>
                            </div>
                            <div class="align-self-center">
                                <i class="bi bi-person-video3 fs-1"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estadística de Películas -->
            <div class="col-md-6 col-lg-3">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="card-title">{{ $stats['films'] }}</h3>
                                <p class="card-text">Películas</p>
                            </div>
                            <div class="align-self-center">
                                <i class="bi bi-film fs-1"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estadística de Tareas -->
            <div class="col-md-6 col-lg-3">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="card-title">{{ $stats['tasks'] }}</h3>
                                <p class="card-text">Tareas</p>
                            </div>
                            <div class="align-self-center">
                                <i class="bi bi-list-task fs-1"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="bi bi-gear"></i> Acciones de Administrador</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <a href="{{ route('admin.users') }}" class="btn btn-outline-primary w-100">
                                    <i class="bi bi-people"></i><br>
                                    Gestionar Usuarios
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('moderator.panel') }}" class="btn btn-outline-success w-100">
                                    <i class="bi bi-clipboard-data"></i><br>
                                    Panel Moderador
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('reports.index') }}" class="btn btn-outline-info w-100">
                                    <i class="bi bi-graph-up"></i><br>
                                    Ver Reportes
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Información sobre middleware -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="alert alert-info">
                    <h5><i class="bi bi-info-circle"></i> Protección por Middleware</h5>
                    <p class="mb-0">Esta página está protegida por el middleware <code>admin</code>. Solo usuarios con rol de administrador pueden acceder aquí.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>