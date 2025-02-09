<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;

class Tag extends Model
{
    protected $guarded = [];
    
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->where(function ($query) use ($search) {
            $query
            ->where('title', 'like', "%{$search}%")
            ->orWhere('slug', 'like', "%{$search}%");
        });
    }
}
