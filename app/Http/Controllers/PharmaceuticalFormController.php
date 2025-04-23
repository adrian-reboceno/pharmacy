<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\PharmaceuticalForm;
use RealRashid\SweetAlert\Facades\Alert;

class PharmaceuticalFormController extends Controller implements HasMiddleware
{
    /**
     * middleware to check if the user is authenticated
     * and has the role of 'admin' or 'super-admin'
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:pharmaceuticalform-list', only: ['index']),
            new Middleware('permission:pharmaceuticalform-create', only: ['create', 'store']),
            new Middleware('permission:pharmaceuticalform-show', only: ['show']),
            new Middleware('permission:pharmaceuticalform-edit', only: ['edit', 'update']),
            new Middleware('permission:pharmaceuticalform-delete', only: ['destroy']),
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
        // Fetch all pharmaceutical forms from the database
        $pharmaceuticalForms = PharmaceuticalForm::all();
        return view('pharmaceuticalforms.index', compact('pharmaceuticalForms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // Show the form to create a new pharmaceutical form
        return view('pharmaceuticalforms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validate the request data
        $request->validate([
            'pharmaceuticalform_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);
        // Create a new sale type
        PharmaceuticalForm::create([
            'name' => $request->pharmaceuticalform_name,
            'description' => $request->description,
        ]);
        // Show a success message       
        Alert::toast('Create Pharmaceutical form successfully!', 'success')
        ->position('top-right')
        ->autoClose(3000)
        ->timerProgressBar();
        // Redirect to the index page
        return redirect()->route('pharmaceuticalforms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Fetch the pharmaceutical form by ID
        $pharmaceuticalForm = PharmaceuticalForm::findOrFail($id);
        // Show the details of the pharmaceutical form
        return view('pharmaceuticalforms.show', compact('pharmaceuticalForm'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // Fetch the pharmaceutical form by ID
        $pharmaceuticalForm = PharmaceuticalForm::findOrFail($id);
        // Show the form to edit the pharmaceutical form
        return view('pharmaceuticalforms.edit', compact('pharmaceuticalForm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // Validate the request data
        $request->validate([
            'pharmaceuticalform_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);
        // Fetch the pharmaceutical form by ID
        $pharmaceuticalForm = PharmaceuticalForm::findOrFail($id);
        // Update the pharmaceutical form
        $pharmaceuticalForm->update([
            'name' => $request->pharmaceuticalform_name,
            'description' => $request->description,
        ]);
        // Show a success message
        Alert::toast('Create Pharmaceutical form successfully!', 'success')
        ->position('top-right')
        ->autoClose(3000)
        ->timerProgressBar();
        // Redirect to the index page
        return redirect()->route('pharmaceuticalforms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
