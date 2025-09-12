<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Brand extends Model
{
    protected $guarded = [];


    public function scopeActive($query, $status)
    {
        return $query->where('status', $status);
    }
}
