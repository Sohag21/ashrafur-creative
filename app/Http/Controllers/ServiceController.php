<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $data = Service::latest()->paginate(10);
        return view('pages.back.service.index', compact('data'));
    }

    public function create()
    {
        return view('pages.back.service.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required|image|max:2048',
            'features' => 'required|array',
            'features.*' => 'string',
        ]);

        // return $request;
        $data = $request->only('name', 'icon', 'features');

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('service', 'public');
        }

        Service::create($data);
        return redirect()->route('service.index')->with('success', 'Service created.');
    }

    public function edit(Service $service)
    {
        return view('pages.back.service.create', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => $service->icon ? 'nullable|image|max:2048' : 'required|image|max:2048',
            'features' => 'nullable|array',
            'features.*' => 'string',
        ]);

        $data = $request->only('name', 'icon', 'features');

        if ($request->hasFile('icon')) {
            if ($service->icon) {
                Storage::disk('public')->delete($service->icon);
            }
            $data['icon'] = $request->file('icon')->store('service', 'public');
        }

        $service->update($data);
        return redirect()->route('service.index')->with('success', 'Service updated.');
    }

    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::disk('public')->delete($service->icon);
        }
        $service->delete();
        return redirect()->back()->with('error', 'Service deleted.');
    }

    public function status(Service $service, $id)
    {
        $data = Service::select('id', 'status')->find($id);

        if($data->status === 0){
            $data->status = 1;
        }else{
            $data->status = 0;
        }
        $data->update();
        return redirect()->back()->with('success', 'Status has been updated!');
    }
}
