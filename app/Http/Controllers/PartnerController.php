<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::latest()->paginate(10);
        return view('pages.back.partner.index', compact('partners'));
    }

    public function create()
    {
        return view('pages.back.partner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|max:2048',
            'status' => 'boolean'
        ]);

        $data = $request->only('name', 'status');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('partners', 'public');
        }

        Partner::create($data);
        return redirect()->route('partners.index')->with('success', 'Partner created.');
    }

    public function edit(Partner $partner)
    {
        return view('pages.back.partner.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => $partner->image ? 'nullable|image|max:2048' : 'required|image|max:2048',
            'status' => 'boolean'
        ]);

        $data = $request->only('name', 'status');

        if ($request->hasFile('image')) {
            if ($partner->image) {
                Storage::disk('public')->delete($partner->image);
            }
            $data['image'] = $request->file('image')->store('partners', 'public');
        }

        $partner->update($data);
        return redirect()->route('partners.index')->with('success', 'Partner updated.');
    }

    public function destroy(Partner $partner)
    {
        if ($partner->image) {
            Storage::disk('public')->delete($partner->image);
        }
        $partner->delete();
        return redirect()->route('partners.index')->with('error', 'Partner deleted.');
    }

    public function status(Partner $partner, $id)
    {
        $data = Partner::select('id', 'status')->find($id);

        if($data->status === 0){
            $data->status = 1;
        }else{
            $data->status = 0;
        }
        $data->update();
        return redirect()->back()->with('success', 'Status has been updated!');
    }
}
