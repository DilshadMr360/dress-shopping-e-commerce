<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // public function showCategory() {
    //     $nextId = Category::max('id') + 1;
    //     // dd($nextId);

    //     // Return the view with the next ID
    //     return view('auth.admin.addproduct', compact('nextId'));
    // }

    public function addCategory(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'category_type' => 'required|string|max:255',
        ]);

        // Create a new category
        Category::create($validated);

        // Redirect back with a success message
        return redirect()->route('allcategories');

    }

    public function allCategories()
    {
        $categories = Category::all();
        // dd($categories);

        return view('auth.admin.categories.allCategories', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
