<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceTypeResource;
use App\Models\ServiceType;
use Database\Seeders\ServiceTypeSeeder;
use Illuminate\Http\Response;

class ServiceTypeController extends Controller
{
    public function findByServiceId($service_id){
        $service_types = ServiceType::where('service_id', $service_id)
            ->first();
        // dd($service_types->first());

        if (!$service_types->first()) {
            return Response::error('نوع های خدمات برای این خدمت یافت نشد !');
        }

        return Response::success(null, new ServiceTypeResource($service_types));
    }
}
