<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoData extends Model
{
    protected $fillable = [
        'title',
        'description',
        'keywords',
        'canonical_url',
        'open_graph',
        'json_ld',
    ];
    
    public function seotable()
    {
        return $this->morphTo();
    }
}
