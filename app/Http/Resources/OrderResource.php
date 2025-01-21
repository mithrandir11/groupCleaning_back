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
        return [
            "id" => $this->id,
            "user_id" => $this->user_id,
            "service_type" => $this->service_type,
            "service_options" => $this->service_options,
            "extra_details" => $this->extra_details,
            "selected_date" => $this->selected_date,
            "selected_time" => $this->selected_time,
            "contact_number" => $this->contact_number,
            "address" => $this->address,
            "order_code" => $this->order_code,
        ];
    }
}
