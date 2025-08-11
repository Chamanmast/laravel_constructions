<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blogcategory extends Model
{
    protected $guarded = [];

    public function blogs(): HasMany
    {
        return $this->hasMany(blog::class, 'blogcat_id');
    }
}
