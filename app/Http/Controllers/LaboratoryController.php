<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Laboratory;
use App\Models\Status;


class LaboratoryController extends Controller implements HasMiddleware
{
    /**
     * middleware to check if the user is authenticated
     * and has the role of 'admin' or 'super-admin'
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:laboratory-list', only: ['index']),
            new Middleware('permission:laboratory-create', only: ['create', 'store']),
            new Middleware('permission:laboratory-show', only: ['show']),
            new Middleware('permission:laboratory-edit', only: ['edit', 'update']),
            new Middleware('permission:laboratory-delete', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Fetch all laboratories from the database
        $laboratories = Laboratory::with('status')->get();
        return view('laboratories.index', compact('laboratories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // Return a view to create a new laboratory
        $statuses = Status::all();
        return view('laboratories.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'laboratory_name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'status_id' => 'required|integer',
        ]);
        // Create a new laboratory instance
        Laboratory::create([
            'name' => $request->laboratory_name,
            'address' => $request->address,
            'status_id' => $request->status_id,
        ]);
        Alert::toast('Create Laboratory successfully!', 'success')
            ->position('top-right')
            ->autoClose(3000)
            ->timerProgressBar();
        // Redirect to the index page
        return redirect()->route('laboratories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // Fetch the laboratory by ID
        $laboratory = Laboratory::with('status')->findOrFail($id);
        // Return the laboratory details view
        return view('laboratories.show', compact('laboratory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // Fetch the laboratory to edit
        $laboratory = Laboratory::findOrFail($id);
        $statuses = Status::all();
        // Return the edit view with the laboratory data
        return view('laboratories.edit', compact('laboratory', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'laboratory_name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'status_id' => 'required|integer',
        ]);
        // Find the laboratory to update
        $laboratory = Laboratory::findOrFail($id);
        // Update the laboratory data
        $laboratory->update([
            'name' => $request->laboratory_name,
            'address' => $request->address,
            'status_id' => $request->status_id,
        ]);
        Alert::toast('Update Laboratory successfully!', 'success')
            ->position('top-right')
            ->autoClose(3000)
            ->timerProgressBar();
        // Redirect to the index page
        return redirect()->route('laboratories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
