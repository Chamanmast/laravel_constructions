<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blogtag;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogtagController extends Controller
{
    use CommonTrait;

    /**
     * Show all tags.
     */
    public function index()
    {
        $tags = Blogtag::latest()->get(['id', 'tag_name', 'tag_slug']);

        return view('backend.blog_tag.all_tag', compact('tags'));
    }

    /**
     * Form for creating a new tag.
     */
    public function create()
    {
        return view('backend.blog_tag.add_tag');
    }

    /**
     * Store a new tag.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tag_name' => 'required|unique:blogtags|max:200',
        ]);

        return $this->executeWithNotification(
            function () use ($request) {
                Blogtag::create([
                    'tag_name' => $request->tag_name,
                    'tag_slug' => Str::slug($request->tag_name),
                ]);
            },
            'Tag Added Successfully',
            'Failed to add tag.'
        );
    }

    /**
     * Edit tag form.
     */
    public function edit(Blogtag $tag)
    {
        return view('backend.blog_tag.edit_tag', compact('tag'));
    }

    /**
     * Update the tag.
     */
    public function update(Request $request, Blogtag $tag)
    {
        $request->validate([
            'tag_name' => 'required|max:200',
        ]);

        return $this->executeWithNotification(
            function () use ($request, $tag) {
                $tag->update([
                    'tag_name' => $request->tag_name,
                    'tag_slug' => Str::slug($request->tag_name),
                ]);
            },
            'Tag Updated Successfully',
            'Failed to update tag.'
        );
    }

    /**
     * Delete (single or multiple) tags.
     */
    public function delete(Request $request)
    {
        return $this->executeWithNotification(
            function () use ($request) {
                if (is_array($request->id)) {
                    $tags = Blogtag::whereIn('id', $request->id)->get();
                    foreach ($tags as $tag) {
                        $tag->delete();
                    }
                } else {
                    $tag = Blogtag::find($request->id);
                    if ($tag) {
                        $tag->delete();
                    }
                }
            },
            'Tag Deleted successfully',
            'Failed to delete tag.'
        );
    }
}
