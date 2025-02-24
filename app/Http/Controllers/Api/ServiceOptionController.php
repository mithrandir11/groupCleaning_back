<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceOptionResource;
use App\Models\ServiceOption;
use Illuminate\Http\Response;

class ServiceOptionController extends Controller
{
    public function findByServiceId($service_id){
        $service_options = ServiceOption::where('service_id', $service_id)->get();

        if (!$service_options->first()) {
            return Response::error('گزینه های خدمات برای این خدمت یافت نشد !');
        }

        return Response::success(null, ServiceOptionResource::collection($service_options));
    }
}
