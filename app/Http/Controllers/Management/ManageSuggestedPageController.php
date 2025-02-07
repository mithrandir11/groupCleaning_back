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

        return redirect()->route('admin.suggestedPages')->with('success', ' با موفقیت ایجاد شد.');
    }

    public function destroy(SuggestedPage $suggested_page){
        $suggested_page->delete();
        return redirect()->route('admin.suggestedPages.show', $suggested_page->menu_id)->with('success', 'آیتم با موفقیت حذف شد.');
    }

    public function edit(SuggestedPage $suggested_page){
        $allMenus = Menu::all();
        return view('management.content.suggested-pages.edit', compact('suggested_page', 'allMenus'));
    }

    public function update(Request $request, SuggestedPage $suggested_page){
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'url'      => 'required|string|max:255',
            'menu_id' => 'required|exists:menus,id',
        ]);
        $suggested_page->update($validated);
        return redirect()->route('admin.suggestedPages.show', $suggested_page->menu_id)->with('success', 'آیتم با موفقیت بروزرسانی شد.');
    }
}
