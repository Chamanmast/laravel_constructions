<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Menu extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Menugroup::class);
    }

    public function title(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
        );
    }

    public function page(): HasOne
    {
        return $this->hasOne(Page::class);
    }

    public function scopeActive($query, $status)
    {
        return $query->where('status', $status);
    }

    public function meta()
    {
        return $this->morphOne(Metainfo::class, 'metable');
    }

    protected function megamenu(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => (bool) $value,           // Cast 1/0 to true/false
            set: fn ($value) => $value ? 1 : 0
        );
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Menu::class, 'parent_id')
            ->where('status', 0)
            ->orderBy('position');
    }

    public function megaMenus(): HasMany
    {
        return $this->hasMany(Megamenu::class, 'menu_id');
    }

    public function getUrl(): string
    {
        if ($this->url === '#') {
            return '#';
        }

        return $this->type == 2 ? route($this->url) : $this->url;
    }

    public function scopeRootMenus($query)
    {
        return $query->whereNull('parent_id')
            ->where('status', true)
            ->orderBy('position');
    }
}
