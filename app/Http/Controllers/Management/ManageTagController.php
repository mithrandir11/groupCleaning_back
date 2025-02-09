<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class ManageTagController extends Controller
{
    public function index(Request $request){
        $search = $request->input('search');
        $tags = Tag::when($search, function ($query, $search) {
            return $query->search($search);
        })
        ->latest()
        ->paginate(10);
        return view('management.content.tags.index', compact('tags'));
    }

    public function create(){
        return view('management.content.tags.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'slug'       => 'required|string|max:255|unique:tags,slug',
        ]);

        Tag::create($validated);

        return redirect()->route('admin.tags')->with('success', 'آیتم با موفقیت ایجاد شد.');
    }

    public function destroy(Tag $tag){
        $tag->delete();
        return redirect()->route('admin.tags')->with('success', 'آیتم با موفقیت حذف شد.');
    }

    public function edit(Tag $tag){
        return view('management.content.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag){
        
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'slug'       => 'required|string|max:255|unique:tags,slug,'.$tag->id,
        ]);

        $tag->update($validated);

        return redirect()->route('admin.tags')->with('success', 'آیتم با موفقیت بروزرسانی شد.');
    }
}
