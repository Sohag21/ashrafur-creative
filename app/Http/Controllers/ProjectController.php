<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $portfolios = Project::with('category')->latest()->paginate(10);
        // return $portfolios;
        return view('pages.back.project.index', compact('portfolios'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('pages.back.project.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'client_name' => 'required|string|max:255',
            'project_title' => 'required|string|max:255',
            'project_details' => 'required',
            'cover_photo' => 'required|image|max:800',
            'gallery_photos.*' => 'image|max:800',
            'gallery_photos' => 'array|max:5'
        ]);

        $data = $request->only('category_id', 'client_name', 'project_title', 'project_details');

        // Save cover photo
        if ($request->hasFile('cover_photo')) {
            $data['cover_photo'] = $request->file('cover_photo')->store('portfolio/cover', 'public');
        }

        // Save gallery photos
        $galleryPhotos = [];
        if ($request->hasFile('gallery_photos')) {
            foreach ($request->file('gallery_photos') as $photo) {
                $galleryPhotos[] = $photo->store('portfolio/gallery', 'public');
            }
        }
        $data['gallery_photos'] = $galleryPhotos;

        Project::create($data);

        return redirect()->route('projects.index')->with('success', 'Project added successfully.');
    }

    public function edit(Project $project)
    {
        $categories = Category::all();
        return view('pages.back.project.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'client_name' => 'required|string|max:255',
            'project_title' => 'required|string|max:255',
            'project_details' => 'required',
            'cover_photo' => 'nullable|image|max:800',
            'gallery_photos.*' => 'image|max:800',
            'gallery_photos' => 'array|max:5'
        ]);

        $data = $request->only('category_id', 'client_name', 'project_title', 'project_details');

        // Update cover photo
        if ($request->hasFile('cover_photo')) {
            if ($project->cover_photo) {
                Storage::disk('public')->delete($project->cover_photo);
            }
            $data['cover_photo'] = $request->file('cover_photo')->store('project/cover', 'public');
        }

        // Replace gallery photos
        if ($request->hasFile('gallery_photos')) {
            if ($project->gallery_photos) {
                foreach ($project->gallery_photos as $photo) {
                    Storage::disk('public')->delete($photo);
                }
            }
            $galleryPhotos = [];
            foreach ($request->file('gallery_photos') as $photo) {
                $galleryPhotos[] = $photo->store('project/gallery', 'public');
            }
            $data['gallery_photos'] = $galleryPhotos;
        }

        $project->update($data);

        return redirect()->route('projects.index')->with('success', 'Portfolio updated successfully.');
    }

    public function destroy(Project $project)
    {
        if ($project->cover_photo) {
            Storage::disk('public')->delete($project->cover_photo);
        }
        if ($project->gallery_photos) {
            foreach ($project->gallery_photos as $photo) {
                Storage::disk('public')->delete($photo);
            }
        }
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Portfolio deleted.');
    }

    public function status(Project $project, $id)
    {
        $data = Project::select('id', 'status')->find($id);

        if($data->status === 0){
            $data->status = 1;
        }else{
            $data->status = 0;
        }

        $data->update();
        return redirect()->back()->with('success', 'Status has been updated!');
    }
}
