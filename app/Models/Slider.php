<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function scopeActive($query, $status)
    {
        return $query->where('status', $status);
    }
}
