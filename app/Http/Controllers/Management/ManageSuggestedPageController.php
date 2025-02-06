<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\SuggestedPage;
use Illuminate\Http\Request;

class ManageSuggestedPageController extends Controller
{
    public function index(){
        $menus = Menu::whereNull('parent_id')
        ->with('children') // بارگذاری فرزندان
        ->get();
        return view('management.content.suggested-pages.index', compact('menus'));
    }

    public function show(Menu $menu){
        $suggested_pages = SuggestedPage::with('menu')->where('menu_id',$menu->id)->latest()->paginate(10);
        return view('management.content.suggested-pages.show', compact('suggested_pages'));
    }

    public function create(){
        $allMenus = Menu::all();
        return view('management.content.suggested-pages.create', compact('allMenus'));
    }





    public function store(Request $request){
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'url'      => 'required|string|max:255',
            'menu_id' => 'required|exists:menus,id',
        ]);

        SuggestedPage::create($validated);

        return redirect()->route('admin.suggestedPages', )->with('success', ' با موفقیت ایجاد شد.');
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
        ]);
        $menu->update($validated);
        return redirect()->route('admin.menu')->with('success', 'منو با موفقیت بروزرسانی شد.');
    }
}
