<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\Symptom;
use RealRashid\SweetAlert\Facades\Alert;

class SymptomController extends Controller implements HasMiddleware
{
    /**
     * middleware to check if the user is authenticated
     * and has the role of 'admin' or 'super-admin'
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:symptom-list', only: ['index']),
            new Middleware('permission:symptom-create', only: ['create', 'store']),
            new Middleware('permission:symptom-show', only: ['show']),
            new Middleware('permission:symptom-edit', only: ['edit', 'update']),
            new Middleware('permission:symptom-delete', only: ['destroy']),
        ];
    }

    /**
     * The constructor method to apply middleware
     */

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Fetch all symptoms from the database
        $symptoms = Symptom::all();
        return view('symptoms.index', compact('symptoms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // Show the form to create a new symptom
        return view('symptoms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validate the request data
        $request->validate([
            'symptom_name' => 'required|string|max:255',            
        ]);
        // Create a new symptom
        $symptom = Symptom::create([
            'symptom_name' => $request->symptom_name,         
        ]);
        // Show success message       

        Alert::toast('Create Symptom successfully!', 'success')
        ->position('top-right')
        ->autoClose(3000)
        ->timerProgressBar();
        // Redirect to the index page
        return redirect()->route('symptoms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Fetch the symptom by ID
        $symptom = Symptom::findOrFail($id);
        // Return the view to show the symptom
        return view('symptoms.show', compact('symptom'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // Fetch the symptom by ID
        $symptom = Symptom::findOrFail($id);
        // Return the view to edit the symptom
        return view('symptoms.edit', compact('symptom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // Validate the request data
        $request->validate([
            'symptom_name' => 'required|string|max:255',            
        ]);
        // Fetch the symptom by ID
        $symptom = Symptom::findOrFail($id);
        // Update the symptom
        $symptom->update([
            'symptom_name' => $request->symptom_name,         
        ]);
        // Show success message
        Alert::toast('Update Symptom successfully!', 'success')
        ->position('top-right')
        ->autoClose(3000)
        ->timerProgressBar();
        // Redirect to the index page
        return redirect()->route('symptoms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
