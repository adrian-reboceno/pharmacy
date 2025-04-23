<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\SaleType;
use RealRashid\SweetAlert\Facades\Alert;


class SaleTypeController extends Controller implements HasMiddleware
{
     /** 
     * middleware to check if the user is authenticated
     * and has the role of 'admin' or 'super-admin'
     */
    public static function middleware(): array
    {
        return [           
            new Middleware('permission:saletype-list', only: ['index']),
            new Middleware('permission:saletype-create', only: ['create', 'store']),
            new Middleware('permission:saletype-show', only: ['show']),
            new Middleware('permission:saletype-edit', only: ['edit', 'update']),
            new Middleware('permission:saletype-delete', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Fetch all sale types from the database
        $saleTypes = SaleType::all();
        return view('saletypes.index', compact('saleTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // Show the form to create a new sale type
        return view('saletypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validate the request data
        $request->validate([
            'saletype_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);
        // Create a new sale type
        SaleType::create([
            'name' => $request->saletype_name,
            'description' => $request->description,
        ]);
        // Show success message
        Alert::toast('Create Status successfully!', 'success')
        ->position('top-right')
        ->autoClose(3000)
        ->timerProgressBar();
        // Redirect to the index page
        return redirect()->route('saletypes.index');       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // Fetch the sale type by ID
        $saleType = SaleType::findOrFail($id);
        // Show the sale type details
        return view('saletypes.show', compact('saleType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // Fetch the sale type by ID
        $saleType = SaleType::findOrFail($id);
        // Show the form to edit the sale type
        return view('saletypes.edit', compact('saleType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // Validate the request data
        $request->validate([
            'saletype_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);
        // Fetch the sale type by ID
        $saleType = SaleType::findOrFail($id);
        // Update the sale type
        $saleType->update([
            'name' => $request->saletype_name,
            'description' => $request->description,
        ]);
        // Show success message
        // Show success message
        Alert::toast('Create Status successfully!', 'success')
        ->position('top-right')
        ->autoClose(3000)
        ->timerProgressBar();
        // Redirect to the index page
        return redirect()->route('saletypes.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
