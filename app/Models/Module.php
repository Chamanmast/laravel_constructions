<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function scopeActive($query, $status)
    {
        return $query->where('status', $status);
    }
}
