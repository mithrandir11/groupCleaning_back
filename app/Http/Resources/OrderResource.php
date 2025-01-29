<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        $data = [
            "order_code" => $this->order_code,
            "id" => $this->id,
            "status" =>  $this->status,
            "user_id" => $this->user_id,
            "service_type" => $this->service_type,
            "service_options" => $this->service_options,
            "extra_details" => $this->extra_details,
            "selected_date" => $this->selected_date,
            "selected_time" => $this->selected_time,
            "contact_number" => $this->contact_number,
            "address" => $this->address,
            
            
        ];

        if($this->total_amount){
            $data["total_amount"] = number_format($this->total_amount).' '.'تومان';
        }

        return $data;
    }
}
