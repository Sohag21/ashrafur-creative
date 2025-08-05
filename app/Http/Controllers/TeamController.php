<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $teamMembers = Team::latest()->paginate(10);
        return view('pages.back.team.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('pages.back.team.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'about' => 'required',
            'image' => 'required|image|max:2048',
        ]);

        $data = $request->only('name', 'designation', 'about');
        $data['status'] = $request->has('status') ? 1 : 1;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('team_members', 'public');
        }

        Team::create($data);
        return redirect()->route('teams.index')->with('success', 'Team member added.');
    }

    public function edit(Team $team)
    {
        return view('pages.back.team.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'about' => 'required',
            'image' => $team->image ? 'nullable|image|max:2048' : 'required|image|max:2048',
        ]);

        $data = $request->only('name', 'designation', 'about');

        if ($request->hasFile('image')) {
            if ($team->image) {
                Storage::disk('public')->delete($team->image);
            }
            $data['image'] = $request->file('image')->store('team_members', 'public');
        }

        $team->update($data);
        return redirect()->route('teams.index')->with('success', 'Team member updated.');
    }

    public function destroy(Team $team)
    {
        if ($team->image) {
            Storage::disk('public')->delete($team->image);
        }

        $team->delete();
        return redirect()->back()->with('error', 'Team member deleted.');
    }

    public function status(Team $team, $id)
    {
        $data = Team::select('id', 'status')->find($id);

        if($data->status === 0){
            $data->status = 1;
        }else{
            $data->status = 0;
        }
        $data->update();
        return redirect()->back()->with('success', 'Status has been updated!');
    }
}
