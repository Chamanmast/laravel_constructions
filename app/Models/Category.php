<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'categories';

    public $timestamps = false;

    protected $guarded = [];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }
}
