<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Megamenu extends Model
{
    protected $table = 'mega_menus';

    protected $guarded = [];

    public $timestamps = false;

    public function getLinkedServiceNamesAttribute()
    {
        $ids = explode(',', $this->links);

        return Service::whereIn('id', $ids)->pluck('name');
    }

    /**
     * Get associated menu
     */
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    /**
     * Get services for this mega menu
     */
    public function getServicesAttribute()
    {
        if (empty($this->links)) {
            return collect();
        }

        $serviceIds = array_filter(explode(',', $this->links));

        return \App\Models\Service::select('name', 'slug')
            ->whereIn('id', $serviceIds)
            ->get();
    }

    /**
     * Alternative method approach
     */
    public function services()
    {
        if (empty($this->links)) {
            return collect();
        }

        $serviceIds = array_filter(explode(',', $this->links));

        return \App\Models\Service::select('name', 'slug')
            ->whereIn('id', $serviceIds)
            ->get();
    }

    /**
     * Check if mega menu should be hidden
     */
    public function isHidden(): bool
    {
        return $this->title === '<span class="text-white">.</span>';
    }
}
