<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function scopeActive($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeType($query, $type)
    {
        return $query->where('category_id', $type);
    }

    public function category(): BelongsTo
    {

        return $this->belongsTo(Category::class, 'category_id');
    }
     public function brands(): HasMany
    {

        return $this->hasMany(Brand::class);
    }

    public function meta()
    {
        return $this->morphOne(Metainfo::class, 'metable');
    }
}
