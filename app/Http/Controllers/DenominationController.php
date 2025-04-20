<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Denomination;
use App\Models\Status;

class DenominationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Fetch all denominations from the database
        $denominations = Denomination::with('status')->get();
        return view('denominations.index', compact('denominations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // Return a view to create a new denomination
        $statuses = Status::all();
        return view('denominations.create', compact('statuses'));
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
            'status_id' => 'required|integer',

        ]);
        // Create a new denomination instance
        Denomination::create([
            'name' => $request->denomination_name,
            'description' => $request->description,
            'status_id' => $request->status_id,
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
        // Fetch the denomination by ID
        $denomination = Denomination::with('status')->findOrFail($id);
        // Return the show view with the denomination
        return view('denominations.show', compact('denomination'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // Fetch the denomination to edit
        $denomination = Denomination::findOrFail($id);
        // Fetch all statuses
        $statuses = Status::all();
        // Return the edit view with the denomination
        return view('denominations.edit', compact('denomination', 'statuses'));
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
            'status_id' => 'required|integer',
        ]);
        // Find the denomination by ID
        $denomination = Denomination::findOrFail($id);
        // Update the denomination
        $denomination->update([
            'name' => $request->denomination_name,
            'description' => $request->description,
            'status_id' => $request->status_id,
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
