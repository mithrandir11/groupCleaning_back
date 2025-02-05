<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManageArticleController extends Controller
{
    public function index(){
        $articles = Article::latest()->paginate(10);
        return view('management.articles.index', compact('articles'));
    }

    public function create(){
        return view('management.articles.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'slug'       => 'required|string|max:255|unique:articles,slug',
            'text'      => 'nullable|string',
            'is_visible'      => 'required|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

       
            // $path = $request->file('image')->store('articles/images', 'public'); // ذخیره در public/articles/images
            // $validated['image'] = Storage::url(env('APP_URL').$path); // ذخیره آدرس مطلق تصویر

            $path = $request->file('image')->store('articles/images', 'public');
            $validated['image'] = url('storage/' . str_replace('public/', '', $path));
        

        // dd($validated);

        Article::create($validated);

        return redirect()->route('admin.articles')->with('success', 'مقاله با موفقیت ایجاد شد.');
    }
}
