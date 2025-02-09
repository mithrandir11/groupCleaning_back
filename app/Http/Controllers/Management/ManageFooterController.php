<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use App\Models\FooterSymbol;
use Illuminate\Http\Request;

class ManageFooterController extends Controller
{
    public function index(){
        $footers = Footer::latest()->get();
        $symbols = FooterSymbol::latest()->get();
        return view('management.content.footer.index', compact('footers', 'symbols'));
    }

    public function create(){
        return view('management.content.footer.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'text'      => 'nullable|string',
        ]);

        Footer::create($validated);

        return redirect()->route('admin.footer')->with('success', 'آیتم با موفقیت ایجاد شد.');
    }


    public function destroy(Footer $footer){
        $footer->delete();
        return redirect()->route('admin.footer')->with('success', 'آیتم با موفقیت حذف شد.');
    }

    public function edit(Footer $footer){
        return view('management.content.footer.edit', compact('footer'));
    }

    public function update(Request $request, Footer $footer){
        
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'text'      => 'nullable|string',
        ]);

        $footer->update($validated);

        return redirect()->route('admin.footer')->with('success', 'آیتم با موفقیت بروزرسانی شد.');
    }
}
