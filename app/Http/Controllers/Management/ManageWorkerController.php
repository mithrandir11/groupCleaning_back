<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ManageWorkerController extends Controller
{
    public function index(Request $request){
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'worker');
        })
        ->with('roles') // برای جلوگیری از مشکل N+1
        ->latest()
        ->paginate(10);


        // $search = $request->input('search');
        // $users = User::with('roles')
        //     ->whereDoesntHave('roles', function ($query) {
        //         $query->whereIn('name', ['admin', 'operator']);
        //     })
        //     ->when($search, function ($query, $search) {
        //         return $query->search($search);
        //     })
        //     ->latest()
        //     ->paginate(10);

        return view('management.workers.index', compact('users'));
    }
}
