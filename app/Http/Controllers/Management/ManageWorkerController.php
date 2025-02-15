<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ManageWorkerController extends Controller
{
    public function index(Request $request){
        $search = $request->input('search');
        $users = User::with(['roles','resume'])
            ->whereHas('roles', function ($query) {
                $query->where('name', 'worker');
            })
            ->when($search, function ($query, $search) {
                return $query->search($search);
            })
            ->latest()
            ->paginate(10);

        return view('management.workers.index', compact('users'));
    }
}
