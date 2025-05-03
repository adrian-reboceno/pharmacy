<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

use App\Models\Status;
use RealRashid\SweetAlert\Facades\Alert;

class StatusController extends Controller  implements HasMiddleware
{
    /** 
     * middleware to check if the user is authenticated
     * and has the role of 'admin' or 'super-admin'
     */
    public static function middleware(): array
    {
        return [           
            new Middleware('permission:status-list', only: ['index']),
            new Middleware('permission:status-create', only: ['create', 'store']),
            new Middleware('permission:status-show', only: ['show']),
            new Middleware('permission:status-edit', only: ['edit', 'update']),
            new Middleware('permission:status-delete', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Fetch all statuses from the database
        $statuses = Status::all();
        // Return the view with the statuses data
        return view('status.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // Return the view to create a new status
        return view('status.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validate the request data
        $request->validate([
            'status_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'status_color' => 'nullable|string|max:255', 
            'exclusive' => 'nullable|in:system,product', // Ensure exclusive is either 'system' or 'product'
        ]);
        // Create a new status instance
        $status = Status::create([
            'status_name' => $request->status_name,
            'description' => $request->description,
            'status_color' => $request->status_color,
            'exclusive' => $request->exclusive, // Store the exclusive value
        ]);
        // Show success message       

        Alert::toast('Create Status successfully!', 'success')
        ->position('top-right')
        ->autoClose(3000)
        ->timerProgressBar();
        // Redirect to the index page
        return redirect()->route('status.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // Fetch the status by ID
        $status = Status::findOrFail($id);
        // Return the view to show the status
        return view('status.show', compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // Fetch the status by ID
        $status = Status::findOrFail($id);
        // Return the view to edit the status
        return view('status.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $status = Status::findOrFail($id);
        // Validate the request data
        $request->validate([
            'status_name' => 'required|string|max:255',    
            'description' => 'nullable|string|max:255',         
            'status_color' => 'nullable|string|max:255',  
            'exclusive' => 'nullable|in:system,product', // Ensure exclusive is either 'system' or 'product'      
        ]);
        // Update the status instance
        $status->update([
            'status_name' => $request->status_name,
            'description' => $request->description,
            'status_color' => $request->status_color,
            'exclusive' => $request->exclusive, // Store the exclusive value
        ]);
        // Show success message 
        Alert::toast('Status updated successfully!', 'success')
        ->position('top-right')
        ->autoClose(3000)
        ->timerProgressBar();
        // Redirect to the index page
        return redirect()->route('status.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
