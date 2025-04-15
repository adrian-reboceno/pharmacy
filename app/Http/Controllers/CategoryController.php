<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Fetch all categories from the database
        $categories = Category::all();
        $categories = DB::table('categories as c')
        ->leftJoin('categories as p', 'c.parent_id', '=', 'p.id')
        ->select('c.id', 'c.category_name as category_name', 'p.category_name as parent_name', 'c.description','c.created_at', 'c.updated_at')
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
        return view('categories.create', compact('categories'));
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
        ]);
        Category::create([
            'parent_id' => $request->parent_id == 'Select' ? 0 : $request->parent_id,
            'category_name' => $request->category_name,
            'description' => $request->description,
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
        // Return the edit view with the category and parent categories
        return view('categories.edit', compact('category', 'categories'));
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
        ]);
        // Find the category to update
        $category = Category::findOrFail($id);
        // Update the category
        $category->update([
            'parent_id' => $request->parent_id == 'Select' ? 0 : $request->parent_id,
            'category_name' => $request->category_name,
            'description' => $request->description,
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
