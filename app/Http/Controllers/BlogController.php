<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Blog::with('category')->latest()->paginate(9);
        // return $data;
        return view('pages.back.article.index', compact('data'));
    }


    public function create()
    {
        $categories = BlogCategory::all();
        return view('pages.back.article.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cat_id' => 'required|exists:blog_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'cover' => 'required|image|max:800',
            'status' => 'nullable',
        ]);

        $data = $request->only('cat_id', 'title', 'description', 'cover');
        $data['status'] = $request->status === "on" ? 1 : 0;

        // Save cover photo
        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('blog', 'public');
        }

        // return $data;
        Blog::create($data);

        return redirect()->route('articles.index')->with('success', 'Blog added successfully.');
    }

    public function edit($id)
    {
        $categories = BlogCategory::all();
        $data = Blog::select('id', 'title', 'cat_id', 'description', 'cover', 'status')->find($id);
        return view('pages.back.article.edit', compact('data', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::select('id', 'title', 'cat_id', 'description', 'cover', 'status')->find($id);

        $request->validate([
            'cat_id' => 'required|exists:blog_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'cover' => 'nullable|image|max:800',
            'status' => 'nullable',
        ]);

        $data = $request->only('cat_id', 'title', 'description', 'cover');
        $data['status'] = $request->status === "on" ? 1 : 0;

        // Update cover photo
        if ($request->hasFile('cover')) {
            if ($blog->cover) {
                Storage::disk('public')->delete($blog->cover);
            }
            $data['cover'] = $request->file('cover')->store('blog', 'public');
        }

        $blog->update($data);

        return redirect()->route('articles.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        $blog = Blog::select('id', 'cover')->find($id);
        if ($blog->cover) {
            Storage::disk('public')->delete($blog->cover);
        }
        $blog->delete();
        return redirect()->back()->with('success', 'Blog deleted.');
    }

    public function status($id)
    {
        $data = Blog::select('id', 'status')->find($id);

        if($data->status === 0){
            $data->status = 1;
        }else{
            $data->status = 0;
        }
        $data->update();
        return redirect()->back()->with('success', 'Status has been updated!');
    }
}
