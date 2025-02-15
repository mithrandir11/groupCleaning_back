<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class ManageMenuController extends Controller
{
    public function index(){
        $menus = Menu::whereNull('parent_id')
        ->with('children')
        ->get();
        return view('management.content.menu.index', compact('menus'));
    }

    public function create(){
        $allMenus = Menu::all();
        return view('management.content.menu.create', compact('allMenus'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'slug'      => 'required|string|max:255|unique:menus',
            'parent_id' => 'nullable|exists:menus,id',
            'text'      => 'nullable|string',

            'seo.title' => 'nullable|string|max:255',
            'seo.description' => 'nullable|string',
            'seo.keywords' => 'nullable|string',
            'seo.canonical_url' => 'nullable|url',
        ]);

        $menu = Menu::create([
            'name'      => $validated['name'],
            'slug'      => $validated['slug'],
            'parent_id' => $validated['parent_id'],
            'text'      => $validated['text'],
        ]);

        if (isset($validated['seo'])) {
            $menu->seo()->create($validated['seo']);
        }

        return redirect()->route('admin.menu')->with('success', 'منو با موفقیت ایجاد شد.');
    }

    public function destroy(Menu $menu){
        $menu->delete();
        return redirect()->route('admin.menu')->with('success', 'منو با موفقیت حذف شد.');
    }

    public function edit(Menu $menu){
        $allMenus = Menu::all();
        return view('management.content.menu.edit', compact('menu', 'allMenus'));
    }

    public function update(Request $request, Menu $menu){
        
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'slug'      => "required|string|max:255|unique:menus,slug,".$menu->id,
            'parent_id' => 'nullable|exists:menus,id',
            'text'      => 'nullable|string',

            'seo.title' => 'nullable|string|max:255',
            'seo.description' => 'nullable|string',
            'seo.keywords' => 'nullable|string',
            'seo.canonical_url' => 'nullable|url',
        ]);

        $menu->update([
            'name'      => $validated['name'],
            'slug'      => $validated['slug'],
            'parent_id' => $validated['parent_id'],
            'text'      => $validated['text'],
        ]);

        if (isset($validated['seo'])) $menu->seo()->updateOrCreate([], $validated['seo']);

        return redirect()->route('admin.menu')->with('success', 'منو با موفقیت بروزرسانی شد.');
    }




}
