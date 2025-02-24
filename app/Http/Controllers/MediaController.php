<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:mp4,mov,ogg,qt|max:50000', 
        ]);
        $path = $request->file('file')->store('videos', 'public');
        $videoUrl = url('storage/' . str_replace('public/', '', $path));
        return response()->json([
            'location' => $videoUrl
        ]);
    }
}
