<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServiceController extends Controller
{
    public function findBySlug($slug){
        $service = Service::where('slug', $slug)
            ->first();

        if (!$service) {
            return Response::error('خدمتی یافت نشد');
        }

        return Response::success(null, $service);
    }
}
