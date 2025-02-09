<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            "id" => $this->id,
            "author_name" => $this->user?->name,
            "title" => $this->title,
            "slug" => $this->slug,
            "image" => $this->image,
            'summary' => Str::limit(strip_tags($this->text), 130),
            "created_at" => $this->created_at,

            // 'seo' => new SeoResource($this->whenLoaded('seo')), 
        ];

        if ($request->query('include_details', false)) {
            $data['text'] = $this->text;
            $data['seo'] = new SeoResource($this->whenLoaded('seo'));
        }

        return $data;
    }
}
