<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MegaMenu extends Model
{
    protected $table = 'mega_menus';

    protected $guarded = [];

    public $timestamps = false;

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
