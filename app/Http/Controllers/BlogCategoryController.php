<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    // Show all categories
    public function index()
    {
        $categories = BlogCategory::latest()->paginate(10);
        return view('pages.back.blog-category.index', compact('categories'));
    }

    // Show create form
    public function create()
    {
        return view('pages.back.blog-category.create');
    }

    // Store new category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255'
        ]);

        BlogCategory::create($request->all());

        return redirect()->route('blog-categories.index')
            ->with('success', 'Category created successfully');
    }

    // Show edit form
    public function edit(BlogCategory $blogCategory)
    {
        return view('pages.back.blog-category.edit', compact('blogCategory'));
    }

    // Update category
    public function update(Request $request, BlogCategory $blogCategory)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name,'.$blogCategory->id
        ]);

        $blogCategory->update($request->all());

        return redirect()->route('blog-categories.index')
            ->with('success', 'Blogs Category updated successfully');
    }

    // Delete category
    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();

        return redirect()->back()
            ->with('error', 'Blogs Category deleted successfully');
    }
}