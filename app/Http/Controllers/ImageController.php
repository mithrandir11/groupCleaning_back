<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $path = $request->file('file')->store('images', 'public');
        $imageUrl = url('storage/' . str_replace('public/', '', $path));
        return response()->json([
            'location' => $imageUrl
        ]);
    }
}
