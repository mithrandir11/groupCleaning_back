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

    public function edit(Service $service){
        return view('management.services.edit', compact('service'));
    }

    public function destroy(Service $service){
        $service->delete();
        return redirect()->route('admin.services')->with('success', 'آیتم با موفقیت حذف شد.');
    }

}
