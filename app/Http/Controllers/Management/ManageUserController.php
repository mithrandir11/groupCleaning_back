<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    public function index(Request $request){
        $search = $request->input('search');
        $users = User::with('roles')
            ->whereDoesntHave('roles', function ($query) {
                $query->whereIn('name', ['admin', 'operator']);
            })
            ->when($search, function ($query, $search) {
                return $query->search($search);
            })
            ->latest()
            ->paginate(10);

        return view('management.users.index', compact('users'));
    }

    public function edit(User $user){
        return view('management.users.edit', compact('user'));
    }


    public function update(Request $request, User $user){
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'family' => 'nullable|string|max:100',
            'cellphone' => 'required|numeric|unique:users,cellphone,' . $user->id,
            'status' => 'required',
        ]);

        try {
            $user->update($validated);
            return redirect()->route('admin.users')->with('success', 'اطلاعات کاربر با موفقیت به‌روزرسانی شد.');
        } catch (\Exception  $e) {
            return redirect()->back()->with('error', 'خطا در به‌روزرسانی اطلاعات کاربر.');
        }
    }
}
