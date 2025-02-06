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
        return view('management.content.articles.index', compact('articles'));
    }

    public function create(){
        return view('management.content.articles.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'slug'       => 'required|string|max:255|unique:articles,slug',
            'text'      => 'nullable|string',
            'is_visible'      => 'required|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        $path = $request->file('image')->store('articles/images', 'public');
        $validated['image'] = url('storage/' . str_replace('public/', '', $path));
        Article::create($validated);
        return redirect()->route('admin.articles')->with('success', 'مقاله با موفقیت ایجاد شد.');
    }


    public function edit(Article $article){
        return view('management.content.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article){
        // dd($request->all());
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'slug'       => 'required|string|max:255|unique:articles,slug,'.$article->id,
            'text'      => 'nullable|string',
            'is_visible'      => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        // dd($article->image);

        // $lockfilePath = $this->lockFilePath('http://127.0.0.1:8000/images/1738742993.png234');
        // Storage::disk('public')->delete('/images/1738742993.png');
        // $g = Storage::exists('public/images/bg.png');
        // $t = Storage::delete('http://127.0.0.1:8000/images/1738742993.png234');
        // dd($g);

        // $ff = Storage::delete( str_replace(url('/storage'), '/storage234', $article->image) );
        // $g = Storage::exists('public/images/bg.png');
        // $g = Storage::disk('public')->exists('images/bg.png');

        // dd($g, '/public'.str_replace(url('/storage'), '/storage', $article->image));
        // dd(str_replace(url('/storage'), 'public/storage', $article->image));

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::delete(str_replace(url('/storage'), 'public', $article->image));
            }
            $path = $request->file('image')->store('articles/images', 'public');
            $validated['image'] = url('storage/' . str_replace('public/', '', $path));
        } else {
            // اگر تصویر جدیدی انتخاب نشده باشد، تصویر قبلی را حفظ کنید
            $validated['image'] = $article->image;
        }
        




        $article->update($validated);

        return redirect()->route('admin.articles')->with('success', 'مقاله با موفقیت بروزرسانی شد.');
    }



    public function destroy(Article $article){
        $article->delete();
        return redirect()->route('admin.articles')->with('success', 'مقاله با موفقیت حذف شد.');
    }
}
