<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Service;
use App\Models\Settings;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::select('id', 'name', 'icon', 'features')->where('status', 1)->get();

        $profile = Settings::select('institute', 'degree', 'public_email', 'phone', 'photo', 'cover', 'resume', 'about', 'address', 'interests', 'awards', 'languages', 'facts', 'skills', 'educations', 'experiences', 'links', 'designation')->get();
        $data = $profile[0];

        $partners = Partner::select('name', 'image')->where('status', 1)->get();
        $categories = Category::select('name', 'slug')->get();
        $projects = Project::select('category_id', 'client_name', 'project_title', 'slug', 'project_details', 'cover_photo', 'gallery_photos', 'created_at')->with('category')->where('status', 1)->get();
        $members = Team::select('name', 'designation', 'image', 'about')->where('status', 1)->get();
        $tests = Testimonial::select('name', 'designation', 'image', 'about')->where('status', 1)->get();
        $articles = Blog::select('cat_id', 'title', 'description', 'cover', 'created_at')->with('category')->where('status', 1)->get();

        // return $categories;
        return view('layouts.frontend', compact('services', 'data', 'partners', 'members', 'tests', 'articles', 'categories', 'projects'));
    }

}
