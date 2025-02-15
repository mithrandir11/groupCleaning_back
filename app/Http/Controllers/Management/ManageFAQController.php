<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Menu;
use Illuminate\Http\Request;

class ManageFAQController extends Controller
{
    public function index(){
        $menus = Menu::whereNull('parent_id')
        ->with('children')
        ->get();
        return view('management.content.faqs.index', compact('menus'));
    }

    public function create(){
        $allMenus = Menu::all();
        return view('management.content.faqs.create', compact('allMenus'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'question'      => 'required|string|max:255',
            'answer'      => 'required|string',
            'menu_id' => 'required|exists:menus,id',
        ]);

        Faq::create($validated);

        return redirect()->route('admin.faqs')->with('success', ' با موفقیت ایجاد شد.');
    }

    public function show(Menu $menu){
        $faqs = Faq::with('menu')->where('menu_id',$menu->id)->latest()->paginate(10);
        return view('management.content.faqs.show', compact('faqs'));
    }

    public function edit(Faq $faq){
        $allMenus = Menu::all();
        return view('management.content.faqs.edit', compact('faq', 'allMenus'));
    }

    public function update(Request $request, Faq $faq){
        $validated = $request->validate([
            'question'      => 'required|string|max:255',
            'answer'      => 'required|string',
            'menu_id' => 'required|exists:menus,id',
        ]);
        $faq->update($validated);
        return redirect()->route('admin.faqs.show', $faq->menu_id)->with('success', 'آیتم با موفقیت بروزرسانی شد.');
    }
}
