<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function brands($ids)
    {
        return Brand::whereIn('id', explode(',', $ids))->get();
    }

    public function projects($ids)
    {
        return Project::whereIn('id', explode(',', $ids))->get();
    }

    public function meta()
    {
        return $this->morphOne(Metainfo::class, 'metable');
    }
}
