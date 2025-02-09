<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\FooterSymbol;
use Illuminate\Http\Request;

class ManageFooterSymbolController extends Controller
{
    public function create(){
        return view('management.content.footer.symbols.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'text'      => 'required',
        ]);

        FooterSymbol::create($validated);

        return redirect()->route('admin.footer')->with('success', 'آیتم با موفقیت ایجاد شد.');
    }

    public function destroy(FooterSymbol $symbol){
        $symbol->delete();
        return redirect()->route('admin.footer')->with('success', 'آیتم با موفقیت حذف شد.');
    }

    public function edit(FooterSymbol $symbol){
        return view('management.content.footer.symbols.edit', compact('symbol'));
    }

    public function update(Request $request, FooterSymbol $symbol){
        
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'text'      => 'required',
        ]);

        $symbol->update($validated);

        return redirect()->route('admin.footer')->with('success', 'آیتم با موفقیت بروزرسانی شد.');
    }
}
