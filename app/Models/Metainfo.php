<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Metainfo extends Model
{
    protected $fillable = ['meta_description', 'meta_keywords'];

    public $timestamps = false;

    public function metable()
    {
        return $this->morphTo();
    }
}
