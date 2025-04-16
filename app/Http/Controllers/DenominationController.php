<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Denomination;

class DenominationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Fetch all denominations from the database
        $denominations = Denomination::all();
        return view('denominations.index', compact('denominations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // Return a view to create a new denomination
        return view('denominations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'denomination_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        // Create a new denomination instance
        Denomination::create([
            'name' => $request->denomination_name,
            'description' => $request->description,
        ]);
        Alert::toast('Create Denomination successfully!', 'success')
            ->position('top-right')
            ->autoClose(3000)
            ->timerProgressBar();
        // Redirect to the index page   
        return redirect()->route('denominations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // Fetch the denomination to edit
        $denomination = Denomination::findOrFail($id);
        // Return the edit view with the denomination
        return view('denominations.edit', compact('denomination'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'denomination_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        // Find the denomination by ID
        $denomination = Denomination::findOrFail($id);
        // Update the denomination
        $denomination->update([
            'name' => $request->denomination_name,
            'description' => $request->description,
        ]);
        Alert::toast('Update Denomination successfully!', 'success')
            ->position('top-right')
            ->autoClose(3000)
            ->timerProgressBar();
        // Redirect to the index page
        return redirect()->route('denominations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
