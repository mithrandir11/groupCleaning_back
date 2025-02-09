<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeoResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'keywords' => explode(',', $this->keywords), // تبدیل کلمات کلیدی به آرایه
            'canonical_url' => $this->canonical_url,
            // 'open_graph' => $this->open_graph, // اگر دارای Open Graph باشد
            // 'json_ld' => $this->json_ld, // اگر دارای JSON-LD باشد
        ];
    }
}
