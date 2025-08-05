<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $tests = Testimonial::latest()->paginate(10);
        return view('pages.back.testimonial.index', compact('tests'));
    }

    public function create()
    {
        return view('pages.back.testimonial.create');
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
            $data['image'] = $request->file('image')->store('testimonial', 'public');
        }

        Testimonial::create($data);
        return redirect()->route('testimonials.index')->with('success', 'Testimonial added.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('pages.back.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'about' => 'required',
            'image' => $testimonial->image ? 'nullable|image|max:2048' : 'required|image|max:2048',
        ]);

        $data = $request->only('name', 'designation', 'about');

        if ($request->hasFile('image')) {
            if ($testimonial->image) {
                Storage::disk('public')->delete($testimonial->image);
            }
            $data['image'] = $request->file('image')->store('testimonial', 'public');
        }

        $testimonial->update($data);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial  updated.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image) {
            Storage::disk('public')->delete($testimonial->image);
        }

        $testimonial->delete();
        return redirect()->back()->with('error', 'Testimonial deleted.');
    }

    public function status(Testimonial $Testimonial, $id)
    {
        $data = Testimonial::select('id', 'status')->find($id);

        if($data->status === 0){
            $data->status = 1;
        }else{
            $data->status = 0;
        }
        $data->update();
        return redirect()->back()->with('success', 'Status has been updated!');
    }
}
