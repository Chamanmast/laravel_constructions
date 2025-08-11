<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    protected $guarded = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Blogcategory::class, 'blogcat_id', 'id')->withDefault([
            'category_name' => 'No Category',
        ]);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault([
            'user_id' => 'No User',
        ]);
    }

    public function getRelatedTags($postTags)
    {
        // Split the comma-separated string into an array
        $tagsArray = explode(',', $postTags);

        // Retrieve the related tags from the Tag model
        $tags = Blogtag::whereIn('id', $tagsArray)->get();

        return $tags;
    }

    public function tags($ids)
    {
        return Blogtag::whereIn('id', explode(',', $ids))->get();
    }

    public function next()
    {
        // get next user
        return blog::where('id', '>', $this->id)->orderBy('id', 'asc')->first();
    }

    public function previous()
    {
        // get previous  user
        return blog::where('id', '<', $this->id)->orderBy('id', 'desc')->first();
    }

    public function scopeActive($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopePopular($query, $status)
    {
        return $query->where('popular', $status);
    }

    public function meta()
    {
        return $this->morphOne(Metainfo::class, 'metable');
    }
}
