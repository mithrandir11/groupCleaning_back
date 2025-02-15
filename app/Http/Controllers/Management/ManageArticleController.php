<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManageArticleController extends Controller
{
    public function index(){
        $articles = Article::latest()->paginate(10);
        return view('management.content.articles.index', compact('articles'));
    }

    public function create(){
        $tags = Tag::get();
        return view('management.content.articles.create', compact('tags'));
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

            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

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

        if (isset($validated['tags'])) {
            $article->tags()->sync($validated['tags']);
        }
        return redirect()->route('admin.articles')->with('success', 'مقاله با موفقیت ایجاد شد.');
    }


    public function edit(Article $article){
        $tags = Tag::get();
        return view('management.content.articles.edit', compact('article','tags'));
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

            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);


        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::delete(str_replace(url('/storage'), 'public', $article->image));
            }
            $path = $request->file('image')->store('articles/images', 'public');
            $validated['image'] = url('storage/' . str_replace('public/', '', $path));
        } else {
            $validated['image'] = $article->image;
        }

        $article->update([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'text' => $validated['text'],
            'is_visible' => $validated['is_visible'],
            'image' => $validated['image'],
        ]);

        if (isset($validated['seo'])) $article->seo()->updateOrCreate([], $validated['seo']);

        if (isset($validated['tags'])) {
            $article->tags()->sync($validated['tags']); 
        } else {
            $article->tags()->detach();
        }

        return redirect()->route('admin.articles')->with('success', 'مقاله با موفقیت بروزرسانی شد.');
    }



    public function destroy(Article $article){
        $article->delete();
        return redirect()->route('admin.articles')->with('success', 'مقاله با موفقیت حذف شد.');
    }
}
