<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Blogtag extends Model
{
    protected $guarded = [];

    protected function tagname(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => strtolower($value),
        );
    }

    public function scopeActive($query, $status)
    {
        return $query->where('status', $status);
    }
}
