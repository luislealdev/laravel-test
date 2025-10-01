<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = Film::orderBy('title', 'asc')->get();
        return view('films.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('films.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'release_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'language_id' => 'required|integer',
            'rental_duration' => 'required|integer|min:1',
            'rental_rate' => 'required|numeric|min:0',
            'length' => 'nullable|integer|min:1',
            'replacement_cost' => 'required|numeric|min:0',
            'rating' => 'nullable|in:G,PG,PG-13,R,NC-17',
            'special_features' => 'nullable'
        ]);

        Film::create($validated);

        return redirect()->route('films.index')
            ->with('success', 'Película creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        return view('films.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        return view('films.edit', compact('film'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'release_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'language_id' => 'required|integer',
            'rental_duration' => 'required|integer|min:1',
            'rental_rate' => 'required|numeric|min:0',
            'length' => 'nullable|integer|min:1',
            'replacement_cost' => 'required|numeric|min:0',
            'rating' => 'nullable|in:G,PG,PG-13,R,NC-17',
            'special_features' => 'nullable'
        ]);

        $film->update($validated);

        return redirect()->route('films.index')
            ->with('success', 'Película actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        $film->delete();

        return redirect()->route('films.index')
            ->with('success', 'Película eliminada exitosamente');
    }
}
