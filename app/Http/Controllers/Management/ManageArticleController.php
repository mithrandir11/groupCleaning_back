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

            'seo.title' => 'nullable|string|max:255',
            'seo.description' => 'nullable|string',
            'seo.keywords' => 'nullable|string',
            'seo.canonical_url' => 'nullable|url',
            // 'seo.open_graph' => 'nullable|json',
            // 'seo.json_ld' => 'nullable|json',
        ]);

        // dd($request->all());
        $path = $request->file('image')->store('articles/images', 'public');
        $validated['image'] = url('storage/' . str_replace('public/', '', $path));
        $article = Article::create([
            'user_id' => auth()->user()->id,
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'text' => $validated['text'],
            'is_visible' => $validated['is_visible'],
            'image' => $validated['image'],
        ]);

        if (isset($validated['seo'])) {
            $article->seo()->create($validated['seo']);
        }
        return redirect()->route('admin.articles')->with('success', 'مقاله با موفقیت ایجاد شد.');
    }


    public function edit(Article $article){
        return view('management.content.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article){
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'slug'       => 'required|string|max:255|unique:articles,slug,'.$article->id,
            'text'      => 'nullable|string',
            'is_visible'      => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            
            'seo.title' => 'nullable|string|max:255',
            'seo.description' => 'nullable|string',
            'seo.keywords' => 'nullable|string',
            'seo.canonical_url' => 'nullable|url',
        ]);


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
        


        $article->update([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'text' => $validated['text'],
            'is_visible' => $validated['is_visible'],
            'image' => $validated['image'],
        ]);


        // if (isset($validated['seo'])) $article->seo?->updateOrCreate([], $validated['seo']);
        if (isset($validated['seo'])) $article->seo()->updateOrCreate([], $validated['seo']);

        return redirect()->route('admin.articles')->with('success', 'مقاله با موفقیت بروزرسانی شد.');
    }



    public function destroy(Article $article){
        $article->delete();
        return redirect()->route('admin.articles')->with('success', 'مقاله با موفقیت حذف شد.');
    }
}
