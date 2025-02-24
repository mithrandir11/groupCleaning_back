<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function editInfo(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'family' => 'required|string',
        ]);

        try {
            auth()->user()->update([
                'name' => $request->name,
                'family' => $request->family,
            ]);

            return Response::success(null, 'با موفقیت ذخیره شد');
        } catch (Exception $e) {
            return Response::error($e->getMessage());
        }
    }
}
