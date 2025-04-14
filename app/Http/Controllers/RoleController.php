<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RoleController extends Controller  implements HasMiddleware
{
    /** 
     * middleware to check if the user is authenticated
     * and has the role of 'admin' or 'super-admin'
     */
    public static function middleware(): array
    {
        return [           
            new Middleware('permission:role-list', only: ['index']),
            new Middleware('permission:role-create', only: ['create', 'store']),
            new Middleware('permission:role-show', only: ['show']),
            new Middleware('permission:role-edit', only: ['edit', 'update']),
            new Middleware('permission:role-delete', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Fetch all roles from the database
        $roles = Role::all();
        // Return the roles to a view
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // Return a view to create a new role
        // You can also fetch permissions to assign to the role if needed
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validate the request      
        $request->validate([
            'roleName' => 'required|unique:roles,name',
            'permissions' => 'array'
        ]);
        $role = Role::create(['name' => $request->roleName]);
        $role->syncPermissions($request->permissions);
        // Show success message
        Alert::toast('Create Role successfully!', 'success')
        ->position('top-right')
        ->autoClose(3000)
        ->timerProgressBar();
        // Redirect to the index page
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // Fetch the role by ID
        $role = Role::findOrFail($id);
        // Return the view to show the role
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // Fetch the role by ID
        $role = Role::findOrFail($id);
        // Fetch all permissions
        $permissions = Permission::all();
        // Fetch permissions assigned to the role
       // $rolePermissions = $role->permissions->pluck('id')->toArray();
        // Return the view to edit the role
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        // Validate the request
        $request->validate([
            'roleName' => 'required|unique:roles,name,' . $id,
            'permissions' => 'array'
        ]);
        // Fetch the role by ID
        
        $role = Role::find($id);
        // Update the role name
        $role->name = $request->roleName;
        // Update the role instance
        $role->save();
        // Sync the permissions with the role
        $role->syncPermissions($request->permissions);
        // Show success message
        Alert::toast('Create Role successfully!', 'success')
        ->position('top-right')
        ->autoClose(3000)
        ->timerProgressBar();
        // Redirect to the index page
        return redirect()->route('roles.index');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
