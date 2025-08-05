<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Service;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $services = Service::all()->count();
        $projects = Project::all()->count();
        $members = Team::all()->count();
        $comments = Testimonial::all()->count();
        $partners = Partner::all()->count();
        $articles = Blog::all()->count();
        $data = (object) [
            'services' => $services,
            'projects' => $projects,
            'members' => $members,
            'comments' => $comments,
            'partners' => $partners,
            'articles' => $articles,
        ];
        return view('pages.back.dashboard', compact('data'));
    }
}
