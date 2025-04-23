<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\Supplier;
use App\Models\State;
use App\Models\Status;

class SupplierController extends Controller implements HasMiddleware
{
    /**
     * middleware to check if the user is authenticated
     * and has the role of 'admin' or 'super-admin'
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:supplier-list', only: ['index']),
            new Middleware('permission:supplier-create', only: ['create', 'store']),
            new Middleware('permission:supplier-show', only: ['show']),
            new Middleware('permission:supplier-edit', only: ['edit', 'update']),
            new Middleware('permission:supplier-delete', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Fetch all suppliers with their related country, state, and status
        $suppliers = Supplier::with(['country', 'state', 'status'])->get();
        // Return the suppliers to a view (you can create a view for this)
        return view('suppliers.index', compact('suppliers'));       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //  Fetch all countries, states, and statuses       
        $states = State::all();
        $statuses = Status::all();
        // Return the create view with the countries, states, and statuses
        return view('suppliers.create', compact('countries', 'states', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        //      
        // Validate the request data
        $request->validate([            
            'state' => 'required|exists:states,id',
            'status_id' => 'required|exists:statuses,id',
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'zip' => 'nullable|string|max:20',
            'phonenumber' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'namecontact' => 'nullable|string|max:255',
            'phonecontact' => 'nullable|string|max:20',
            'emailcontact' => 'nullable|email|max:255'
        ]);
        // Create a new supplier
        $states = State::find($request->state);       
        $supplier = Supplier::create([
            'country_id' => $states->country_id,
            'state_id' => $request->state,
            'status_id' => $request->status_id,
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'zip' => $request->zip,
            'phone' => $request->phonenumber,
            'email' => $request->email,
            'website' => null,
            'contact_person' => $request->namecontact,
            'contact_phone' => $request->phonecontact,
            'contact_email' => $request->emailcontact
        ]);

        // Show success message
        Alert::toast('Create Supplier successfully!', 'success')
        ->position('top-right')
        ->autoClose(3000)
        ->timerProgressBar();
        // Redirect to the index page
        return redirect()->route('suppliers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $supplier = Supplier::findOrFail($id);

        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $states = State::all();
        $statuses = Status::all();
        $supplier = Supplier::findOrFail($id);
        return view('suppliers.edit', compact('supplier', 'states', 'statuses'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([            
            'state' => 'required|exists:states,id',
            'status_id' => 'required|exists:statuses,id',
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'zip' => 'nullable|string|max:20',
            'phonenumber' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'namecontact' => 'nullable|string|max:255',
            'phonecontact' => 'nullable|string|max:20',
            'emailcontact' => 'nullable|email|max:255'
        ]);
        $states = State::find($request->state);   
        $supplier = Supplier::findOrFail($id);
        $supplier->update([
            'country_id' => $states->country_id,
            'state_id' => $request->state,
            'status_id' => $request->status_id,
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'zip' => $request->zip,
            'phone' => $request->phonenumber,
            'email' => $request->email,
            'website' => null,
            'contact_person' => $request->namecontact,
            'contact_phone' => $request->phonecontact,
            'contact_email' => $request->emailcontact
        ]);
        // Show success message
        Alert::toast('Update Supplier successfully!', 'success')
        ->position('top-right')
        ->autoClose(3000)
        ->timerProgressBar();
        // Redirect to the index page
        return redirect()->route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
