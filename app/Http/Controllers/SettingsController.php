<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data = Settings::select('phone', 'public_email', 'about', 'motivation', 'address', 'photo', 'cover', 'interests', 'awards', 'designation')->first();
        return view('pages.back.settings.index', compact('user', 'data'));
    }

    public function update(Request $request, Settings $settings)
    {
        $auth = Auth::user();
        $userOld = User::find($auth->id);
        $settings = Settings::find($auth->id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'phone' => 'required|string|max:255',
            'public_email' => 'nullable|string|email|max:255',
            'photo' => $settings->photo ? 'nullable|image|max:2048' : 'nullable|image|max:2048',
            'cover' => $settings->cover ? 'nullable|image|max:2048' : 'nullable|image|max:2048',
            'resume' => $settings->resume ? 'nullable|max:3072' : 'nullable|max:3072',
            'about' => 'required',
            'motivation' => 'nullable',
            'address' => 'required',
            'interests' => 'nullable|array',
            'interests.*' => 'string',
            'awards' => 'nullable|array',
            'awards.*' => 'string',
            'designation' => 'nullable|array',
            'designation.*' => 'string',
        ]);

        $dataOne = $request->only('name', 'email');
        $data = $request->only('phone', 'public_email', 'photo', 'cover', 'resume', 'about', 'motivation', 'address', 'interests', 'awards', 'designation');

        if ($request->hasFile('photo')) {
            if ($settings->photo) {
                Storage::disk('public')->delete($settings->photo);
            }
            $data['photo'] = $request->file('photo')->store('user', 'public');
        }

        if ($request->hasFile('cover')) {
            if ($settings->cover) {
                Storage::disk('public')->delete($settings->cover);
            }
            $data['cover'] = $request->file('cover')->store('user', 'public');
        }

        if ($request->hasFile('resume')) {
            if ($settings->resume) {
                Storage::disk('public')->delete($settings->resume);
            }
            $data['resume'] = $request->file('resume')->store('user', 'public');
        }

        $userOld->update($dataOne);
        $settings->update($data);
        return redirect()->back()->with('success', 'Information updated.');
    }

    public function indexEdu($user)
    {
        $user = User::find(1);
        $data = Settings::select('institute', 'degree', 'educations', 'experiences')->first();
        return view('pages.back.settings.education', compact('user', 'data'));
    }

    public function updateEdu(Request $request, $id)
    {
        $auth = Auth::user();
        $settings = Settings::find($auth->id);

        $validated = $request->validate([
            'institute' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'educations' => 'nullable|array',
            'educations.*.institution' => 'nullable|string',
            'educations.*.degree' => 'nullable|string',
            'educations.*.start' => 'nullable|string',
            'educations.*.end' => 'nullable|string',

            'experiences' => 'nullable|array',
            'experiences.*.company' => 'nullable|string',
            'experiences.*.role' => 'nullable|string',
            'experiences.*.start' => 'nullable|string',
            'experiences.*.end' => 'nullable|string',
        ]);

        $settings->update([
            'institute' => $validated['institute'],
            'degree' => $validated['degree'],
            'educations' => $validated['educations'],
            'experiences' => $validated['experiences'],
        ]);

        return redirect()->back()->with('success', 'Information updated.');
    }
    public function indexSkill()
    {
        $user = Auth::user();
        $data = Settings::select('skills', 'languages')->first();
        return view('pages.back.settings.skills', compact('user', 'data'));
    }

    public function updateSkill(Request $request, Settings $settings)
    {
        $auth = Auth::user();
        $settings = Settings::find($auth->id);

        $validated = $request->validate([
            'skills' => 'nullable|array',
            'skills.*.name' => 'nullable|string',
            'skills.*.level' => 'nullable|string',

            'languages' => 'nullable|array',
            'languages.*.name' => 'nullable|string',
            'languages.*.proficiency' => 'nullable|string',
        ]);

        $settings->update([
            'skills' => $validated['skills'],
            'languages' => $validated['languages'],
        ]);

        return redirect()->back()->with('success', 'Information updated.');
    }
    public function indexSocial()
    {
        $user = Auth::user();
        $data = Settings::select('links', 'facts')->first();
        return view('pages.back.settings.social', compact('user', 'data'));
    }

    public function updateSocial(Request $request, Settings $settings)
    {
        $auth = Auth::user();
        $settings = Settings::find($auth->id);

        $validated = $request->validate([
            'links' => 'nullable|array',
            'links.*.name' => 'nullable|string',
            'links.*.url' => 'nullable|url',

            'facts' => 'nullable|array',
            'facts.*.name' => 'nullable|string',
            'facts.*.projects' => 'nullable|string',
        ]);

        $settings->update([
            'links' => $validated['links'],
            'facts' => $validated['facts'],
        ]);

        return redirect()->back()->with('success', 'Information updated.');
    }

    public function indexPass($user)
    {
        $user = User::find(1);
        return view('pages.back.settings.pass', compact('user'));
    }
}
