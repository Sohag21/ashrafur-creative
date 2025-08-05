<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Show all categories
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('pages.back.category.index', compact('categories'));
    }

    // Show create form
    public function create()
    {
        return view('pages.back.category.create');
    }

    // Store new category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255'
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully');
    }

    // Show edit form
    public function edit(Category $category)
    {
        return view('pages.back.category.edit', compact('category'));
    }

    // Update category
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name,'.$category->id
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully');
    }

    // Delete category
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()
            ->with('error', 'Category deleted successfully');
    }
}
