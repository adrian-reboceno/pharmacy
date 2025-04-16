<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Status;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Fetch all categories from the database
        
        $categories = DB::table('categories as c')
        ->leftJoin('categories as p', 'c.parent_id', '=', 'p.id')
        ->leftJoin('statuses as s', 'c.status_id', '=', 's.id') // Join the statuses table
        ->select('c.id', 'c.category_name as category_name', 'p.category_name as parent_name', 'c.description','c.created_at', 'c.updated_at', 's.status_name', 's.status_color')
        ->orderBy('c.category_name')
        ->get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // Return a view to create a new category
        $categories = Category::all();      
        $statuses = Status::all();
        return view('categories.create', compact('categories', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'category_name' => ['required', 'string', 'max:255'],            
            'description' => ['required', 'string'], 
            'status_id' => ['required', 'integer'],           
        ]);
        Category::create([
            'parent_id' => $request->parent_id == 'Select' ? 0 : $request->parent_id,
            'category_name' => $request->category_name,
            'description' => $request->description,
            'status_id' => $request->status_id,
        ]);
        Alert::toast('Create Category successfully!', 'success')
        ->position('top-right')
        ->autoClose(3000)
        ->timerProgressBar();
        // Redirect to the index page
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // Fetch the category by ID
        $category = Category::findOrFail($id);
        // Return the show view with the category
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // Fetch the category to edit
        $category = Category::findOrFail($id);
        // Fetch all categories for the parent dropdown
        $categories = Category::all();
        // Fetch all statuses for the status dropdown
        $statuses = Status::all();
        // Return the edit view with the category and parent categories
        return view('categories.edit', compact('category', 'categories', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'category_name' => ['required', 'string', 'max:255'],            
            'description' => ['required', 'string'],
            'status_id' => ['required', 'integer'],            
        ]);
        // Find the category to update
        $category = Category::findOrFail($id);
        // Update the category
        $category->update([
            'parent_id' => $request->parent_id == 'Select' ? 0 : $request->parent_id,
            'category_name' => $request->category_name,
            'description' => $request->description,
            'status_id' => $request->status_id,
        ]);
        Alert::toast('Update Category successfully!', 'success')
        ->position('top-right')
        ->autoClose(3000)
        ->timerProgressBar();
        // Redirect to the index page
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
