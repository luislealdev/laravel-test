<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-shield-check"></i> Panel Admin
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a class="nav-link" href="{{ route('moderator.panel') }}">Panel Moderador</a>
                <a class="nav-link" href="{{ url('/') }}">Volver al sitio</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1><i class="bi bi-people"></i> Gestión de Usuarios</h1>
                    <span class="badge bg-danger fs-6">Solo Administradores</span>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4><i class="bi bi-table"></i> Lista de Usuarios</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol Actual</th>
                                <th>Fecha Registro</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->role === 'admin')
                                            <span class="badge bg-danger">
                                                <i class="bi bi-shield-check"></i> Administrador
                                            </span>
                                        @elseif($user->role === 'moderator')
                                            <span class="badge bg-warning">
                                                <i class="bi bi-eye"></i> Moderador
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                <i class="bi bi-person"></i> Usuario
                                            </span>
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <!-- Modal trigger para cambiar rol -->
                                            <button type="button" class="btn btn-sm btn-outline-primary" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#changeRoleModal{{ $user->id }}">
                                                <i class="bi bi-pencil"></i> Cambiar Rol
                                            </button>
                                        </div>

                                        <!-- Modal para cambiar rol -->
                                        <div class="modal fade" id="changeRoleModal{{ $user->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Cambiar Rol - {{ $user->name }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form action="{{ route('admin.users.update-role', $user) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="role{{ $user->id }}" class="form-label">Seleccionar nuevo rol:</label>
                                                                <select name="role" id="role{{ $user->id }}" class="form-select" required>
                                                                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>
                                                                        Usuario Regular
                                                                    </option>
                                                                    <option value="moderator" {{ $user->role === 'moderator' ? 'selected' : '' }}>
                                                                        Moderador
                                                                    </option>
                                                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>
                                                                        Administrador
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-primary">Actualizar Rol</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No hay usuarios registrados</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>

        <!-- Información sobre roles -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="bi bi-info-circle"></i> Información sobre Roles</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h6><span class="badge bg-secondary"><i class="bi bi-person"></i></span> Usuario</h6>
                                <p class="small">Acceso básico a la aplicación. Solo puede ver contenido público.</p>
                            </div>
                            <div class="col-md-4">
                                <h6><span class="badge bg-warning"><i class="bi bi-eye"></i></span> Moderador</h6>
                                <p class="small">Puede acceder al panel de moderación y gestionar contenido específico.</p>
                            </div>
                            <div class="col-md-4">
                                <h6><span class="badge bg-danger"><i class="bi bi-shield-check"></i></span> Administrador</h6>
                                <p class="small">Acceso completo a todas las funcionalidades del sistema.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>