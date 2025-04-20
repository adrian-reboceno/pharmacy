<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;
use App\Helpers\FileHelper;
use App\Models\User;
use App\Models\Status;

use Hash;
class UserController extends Controller  implements HasMiddleware
{
    /** 
     * middleware to check if the user is authenticated
     * and has the role of 'admin' or 'super-admin'
     */
    public static function middleware(): array
    {
        return [           
            new Middleware('permission:user-list', only: ['index']),
            new Middleware('permission:user-create', only: ['create', 'store']),
            new Middleware('permission:user-show', only: ['show']),
            new Middleware('permission:user-edit', only: ['edit', 'update']),
            new Middleware('permission:user-delete', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Fetch all users from the database
        $users = User::with('status')->get();
        // Return the view with the users data
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // Return the view to create a new user
        // Fetch all statuses from the database
        $statuses = Status::all();
        // fetch all roles from the database
        $roles = Role::all();
        return view('users.create', compact('statuses', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $request->validate([
            'name' => 'required|string|max:255',
            'paternal_surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required','min:8', 'confirmed', Rules\Password::defaults()],            
            'maternal_surname' => 'nullable|string|max:255',
            'phone_numbrer' => 'nullable|string|max:255',
        ]);
        if($request->has('avatar')){            
            $uploadFile = $this->uploadFile($request);         
        }
        
        // Create a new user instance
        $user = User::create([
            'name' => $request->name,
            'paternal_surname' => $request->paternal_surname,
            'maternal_surname' => $request->maternal_surname,
            'phone_numbrer' => $request->phone_numbrer,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $uploadFile,
            'status_id' => $request->status_id],
        );
        $user->syncRoles($request->roles);

        Alert::toast('User updated successfully!', 'success')
        ->position('top-right')
        ->autoClose(3000)
        ->timerProgressBar();
        
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // Fetch the user by ID
        $user = User::findOrFail($id);
        // Return the view to show the user
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // Fetch the user by ID
        $user = User::findOrFail($id);
        // Fetch all statuses from the database
        $statuses = Status::all();        
        // Fetch all roles from the database
        $roles = Role::all();
        // Return the view to edit the user
        return view('users.edit', compact('user', 'statuses','roles'));
    }
    /**
     * Show the form for editing the password of the specified resource.
     */
    public function editPassword(string $id)
    {
        //
        // Fetch the user by ID
        $user = User::findOrFail($id);
        // Return the view to edit the user password
        return view('users.editPassword', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {        
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'paternal_surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,                  
            'maternal_surname' => 'nullable|string|max:255',
            'phone_numbrer' => 'nullable|string|max:255',
            'status_id' => 'required|exists:statuses,id',
        ]);
        // Fetch the user by ID
        $user = User::findOrFail($id);
        // Update the user data
        $user->name = $request->name;
        $user->paternal_surname = $request->paternal_surname;
        $user->maternal_surname = $request->maternal_surname;
        $user->phone_numbrer = $request->phone_numbrer;
        $user->email = $request->email;       
        $user->status_id = $request->status_id;
        // Save the updated user data
        $user->save();
        $user->syncRoles($request->roles);
        Alert::toast('User updated successfully!', 'success')
        ->position('top-right')
        ->autoClose(3000)
        ->timerProgressBar();
        // Redirect to the index page
        return redirect()->route('users.index');
    }
    
    /**
     * Update the password of the specified user.
     */
    public function updatePassword(Request $request, string $id)   {
        //
        // Validate the request data       
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        // Fetch the user by ID
        $user = User::findOrFail($id);
        // Update the user password
        $user->password = Hash::make($request->password);
        // Save the updated user data
        $user->save();
        Alert::toast('Password updated successfully!', 'success')
        ->position('top-right')
        ->autoClose(3000)
        ->timerProgressBar();
        // Redirect to the index page
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function uploadFile(Request $request)
    {
        $archivoArray = json_decode($request->avatar, true);
        $ruta = FileHelper::saveBase64File($archivoArray);    
        
        if (!$ruta) {
            return null;
        }
        return $ruta;
    }
}
