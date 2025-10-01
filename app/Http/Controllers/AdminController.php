<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Actor;
use App\Models\Film;
use App\Models\Rental;
use App\Models\Task;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Panel principal de administración
     */
    public function dashboard()
    {
        // Estadísticas básicas
        $stats = [
            'users' => User::count(),
            'actors' => Actor::count(),
            'films' => Film::count(),
            'rentals' => Rental::count(),
            'tasks' => Task::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    /**
     * Gestión de usuarios
     */
    public function users()
    {
        $users = User::paginate(10);
        return view('admin.users', compact('users'));
    }

    /**
     * Actualizar rol de usuario
     */
    public function updateUserRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:admin,moderator,user'
        ]);

        $user->update([
            'role' => $request->role
        ]);

        return redirect()->back()->with('success', 'Rol actualizado correctamente');
    }

    /**
     * Vista solo para moderadores
     */
    public function moderatorPanel()
    {
        $recentRentals = Rental::with(['actor', 'film'])
            ->latest()
            ->take(10)
            ->get();

        return view('admin.moderator-panel', compact('recentRentals'));
    }
}
