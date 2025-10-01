<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Film;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rentals = Rental::orderBy('rental_date', 'desc')->get();
        return view('rentals.index', compact('rentals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $films = Film::all();
        return view('rentals.create', compact('films'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'rental_date' => 'required|date',
            'inventory_id' => 'required|integer',
            'customer_id' => 'required|integer',
            'return_date' => 'nullable|date|after:rental_date',
            'staff_id' => 'required|integer'
        ]);

        Rental::create($validated);

        return redirect()->route('rentals.index')
            ->with('success', 'Renta creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rental $rental)
    {
        return view('rentals.show', compact('rental'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rental $rental)
    {
        $films = Film::all();
        return view('rentals.edit', compact('rental', 'films'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rental $rental)
    {
        $validated = $request->validate([
            'rental_date' => 'required|date',
            'inventory_id' => 'required|integer',
            'customer_id' => 'required|integer',
            'return_date' => 'nullable|date|after:rental_date',
            'staff_id' => 'required|integer'
        ]);

        $rental->update($validated);

        return redirect()->route('rentals.index')
            ->with('success', 'Renta actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rental $rental)
    {
        $rental->delete();

        return redirect()->route('rentals.index')
            ->with('success', 'Renta eliminada exitosamente');
    }
}
