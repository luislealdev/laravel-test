<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actors = Actor::orderBy('last_update', 'desc')->get();
        return view('actors.index', compact('actors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('actors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
        ]);

        Actor::create($validated);

        return redirect()->route('actors.index')
            ->with('success', 'Actor creado exitosamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Actor $actor)
    {
        return view('actors.show', compact('actor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actor $actor)
    {
        return view('actors.edit', compact('actor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Actor $actor)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
        ]);

        $actor->update($validated);

        return redirect()->route('actors.index')
            ->with('success', 'Actor actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actor $actor)
    {
        $actor->delete();

        return redirect()->route('actors.index')
            ->with('success', 'Actor eliminado exitosamente');
    }
}
