<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ManageServiceController extends Controller
{
    public function index(Request $request){
        $services = Service::latest()->paginate(10);
        return view('management.services.index', compact('services'));
    }

    public function create(){
        return view('management.services.create');
    }

    public function store(Request $request){
        dd($request->all());
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'title_fa'      => 'required|string|max:255',
            'slug'       => 'required|string|max:255|unique:articles,slug',
        ]);

        Service::create($validated);

        return redirect()->route('admin.services')->with('success', 'آیتم با موفقیت ایجاد شد.');
    }

    public function edit(Service $service){
        return view('management.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service){
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'title_fa'      => 'required|string|max:255',
            'slug'       => 'required|string|max:255|unique:services,slug,'.$service->id,
        ]);
        $service->update($validated);
        return redirect()->route('admin.services')->with('success', 'آیتم با موفقیت بروزرسانی شد.');
    }

    public function destroy(Service $service){
        $service->delete();
        return redirect()->route('admin.services')->with('success', 'آیتم با موفقیت حذف شد.');
    }

}
