<?php

namespace App\Http\Controllers\Management;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ManageUserController extends Controller
{
    public function export(){
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function index(Request $request){
        $search = $request->input('search');
        $users = User::with('roles')
            ->whereDoesntHave('roles', function ($query) {
                $query->whereIn('name', ['admin']);
            })
            ->when($search, function ($query, $search) {
                return $query->search($search);
            })
            ->latest()
            ->paginate(10);

        return view('management.users.index', compact('users'));
    }

    public function edit(User $user){
        $roles = Role::where('name', 'operator')->get();
        return view('management.users.edit', compact('user','roles'));
    }


    public function update(Request $request, User $user){
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'family' => 'nullable|string|max:100',
            'cellphone' => 'required|numeric|unique:users,cellphone,' . $user->id,
            'status' => 'required',
            'is_operator' => 'nullable|boolean',
            // 'role_id' => 'nullable|exists:roles,id',
        ]);

    //   dd($request->all());
      
        try {
            if($request->is_operator && $request->is_operator == '1'){
                $role = Role::where('name','operator')->first();
                $user->roles()->syncWithoutDetaching([$role->id]);    
            }else{
                $role = Role::where('name','operator')->first();
                $user->roles()->detach($role->id);
            }
            $user->update($validated);
            return redirect()->route('admin.users')->with('success', 'اطلاعات کاربر با موفقیت به‌روزرسانی شد.');
        } catch (\Exception  $e) {
            return redirect()->back()->with('error', 'خطا در به‌روزرسانی اطلاعات کاربر.');
        }
    }
}
