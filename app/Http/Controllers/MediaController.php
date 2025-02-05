<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function upload(Request $request)
    {
        // اعتبارسنجی فایل
        $request->validate([
            'file' => 'required|mimes:mp4,mov,ogg,qt|max:50000', // اندازه حداکثر 50MB
        ]);

        // ذخیره فایل در دایرکتوری public/videos
        // $path = $request->file('file')->store('public/videos');

        // // تولید URL مطلق برای ویدئو
        // $videoUrl = url('storage/' . str_replace('public/', '', $path));

        

        $path = $request->file('file')->store('videos', 'public');

        // تولید URL مطلق برای تصویر
        $videoUrl = url('storage/' . str_replace('public/', '', $path));

        // بازگرداندن مسیر ویدئو آپلود شده
        return response()->json([
            'location' => $videoUrl
        ]);
    }
}
