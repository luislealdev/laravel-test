<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Moderador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
        <div class="container">
            <a class="navbar-brand text-dark" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-eye"></i> Panel Moderador
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link text-dark" href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
                <a class="nav-link text-dark" href="{{ url('/') }}">Volver al sitio</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1><i class="bi bi-clipboard-data"></i> Panel de Moderación</h1>
                    <span class="badge bg-warning text-dark fs-6">Admin + Moderadores</span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-warning text-dark">
                <h4><i class="bi bi-clock-history"></i> Rentas Recientes</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-warning">
                            <tr>
                                <th>ID Renta</th>
                                <th>Actor</th>
                                <th>Película</th>
                                <th>Fecha Renta</th>
                                <th>Fecha Retorno</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentRentals as $rental)
                                <tr>
                                    <td>{{ $rental->rental_id }}</td>
                                    <td>
                                        @if($rental->actor)
                                            <strong>{{ $rental->actor->first_name }} {{ $rental->actor->last_name }}</strong>
                                        @else
                                            <span class="text-muted">Sin actor asignado</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($rental->film)
                                            {{ $rental->film->title }}
                                            <br><small class="text-muted">{{ $rental->film->category ?? 'Sin categoría' }}</small>
                                        @else
                                            <span class="text-muted">Sin película asignada</span>
                                        @endif
                                    </td>
                                    <td>{{ $rental->rental_date ? $rental->rental_date->format('d/m/Y H:i') : 'N/A' }}</td>
                                    <td>
                                        @if($rental->return_date)
                                            {{ $rental->return_date->format('d/m/Y H:i') }}
                                        @else
                                            <span class="badge bg-warning text-dark">Pendiente</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($rental->return_date)
                                            <span class="badge bg-success">
                                                <i class="bi bi-check-circle"></i> Devuelta
                                            </span>
                                        @else
                                            <span class="badge bg-danger">
                                                <i class="bi bi-clock"></i> Activa
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('rentals.show', $rental->rental_id) }}" 
                                               class="btn btn-outline-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('rentals.edit', $rental->rental_id) }}" 
                                               class="btn btn-outline-warning">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No hay rentas recientes</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Estadísticas del moderador -->
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card border-warning">
                    <div class="card-header bg-warning text-dark">
                        <h6><i class="bi bi-film"></i> Gestión de Contenido</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="{{ route('films.index') }}" class="btn btn-outline-warning">
                                <i class="bi bi-film"></i> Ver Películas
                            </a>
                            <a href="{{ route('actors.index') }}" class="btn btn-outline-warning">
                                <i class="bi bi-person-video3"></i> Ver Actores
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card border-info">
                    <div class="card-header bg-info text-white">
                        <h6><i class="bi bi-graph-up"></i> Reportes</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="{{ route('reports.index') }}" class="btn btn-outline-info">
                                <i class="bi bi-clipboard-data"></i> Ver Reportes
                            </a>
                            <button class="btn btn-outline-info" disabled>
                                <i class="bi bi-download"></i> Exportar Datos
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-success">
                    <div class="card-header bg-success text-white">
                        <h6><i class="bi bi-tools"></i> Herramientas</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-success" disabled>
                                <i class="bi bi-broom"></i> Limpiar Cache
                            </button>
                            <button class="btn btn-outline-success" disabled>
                                <i class="bi bi-arrow-clockwise"></i> Sincronizar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Información sobre middleware -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="alert alert-warning">
                    <h5><i class="bi bi-shield-exclamation"></i> Protección por Middleware</h5>
                    <p class="mb-0">
                        Esta página está protegida por el middleware <code>role:admin,moderator</code>. 
                        Solo usuarios con rol de <strong>administrador</strong> o <strong>moderador</strong> pueden acceder aquí.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>