<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;

class ManageResumeController extends Controller
{
    public function index(Request $request){
        $resumes = Resume::with('user')
        ->latest()
        ->paginate(10);

        // dd($resumes);

        return view('management.resumes.index', compact('resumes'));
    }
}
