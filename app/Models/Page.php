<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    protected $guarded = [];

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function scopeActive($query, $status)
    {
        return $query->where('status', $status);
    }

    public function meta()
    {
        return $this->morphOne(Metainfo::class, 'metable');
    }
}
