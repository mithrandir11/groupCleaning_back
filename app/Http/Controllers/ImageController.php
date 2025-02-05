<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // اندازه حداکثر 2MB
        ]);
        $path = $request->file('file')->store('images', 'public');
        $imageUrl = url('storage/' . str_replace('public/', '', $path));
        // $imageUrl = asset('storage/' . $path);
        // $imageUrl = rtrim(config('app.url'), '/') . '/storage/' . $path;
        // $imageUrl = URL::to('/storage/' . $path);
        return response()->json([
            'location' => $imageUrl
        ]);
    }
}
