<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blogcategory;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogcategoryController extends Controller
{
    use CommonTrait;

    public function index()
    {
        return $this->executeWithNotification(
            function () {
                $category = Blogcategory::latest()->get(['id', 'category_name', 'category_slug']);

                return view('backend.blogcategory.all_blogcategory', compact('category'));
            },
            '', // No success message needed
            'Failed to load blog categories.'
        );
    }

    public function create()
    {
        return $this->executeWithNotification(
            function () {
                return view('backend.blogcategory.add_blogcategory');
            },
            '',
            'Failed to open create category page.'
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:blogcategories|max:200',
        ]);

        return $this->executeWithNotification(
            function () use ($request) {
                Blogcategory::create([
                    'category_name' => $request->category_name,
                    'category_slug' => Str::slug($request->category_name),
                ]);
            },
            'Blog Category Added Successfully',
            'Failed to add blog category.'
        );
    }

    public function edit(Blogcategory $blogcategory)
    {
        return $this->executeWithNotification(
            function () use ($blogcategory) {
                return view('backend.blogcategory.edit_blogcategory', compact('blogcategory'));
            },
            '',
            'Failed to open edit category page.'
        );
    }

    public function update(Request $request, Blogcategory $blogcategory)
    {
        $request->validate([
            'category_name' => 'required|max:200',
        ]);

        return $this->executeWithNotification(
            function () use ($request, $blogcategory) {
                $blogcategory->update([
                    'category_name' => $request->category_name,
                    'category_slug' => Str::slug($request->category_name),
                ]);
            },
            'Blog Category Updated Successfully',
            'Failed to update blog category.'
        );
    }

    public function destroy(Blogcategory $blogcategory)
    {
        return $this->executeWithNotification(
            function () use ($blogcategory) {
                $blogcategory->delete();
            },
            'Blog Category Deleted successfully',
            'Failed to delete blog category.'
        );
    }
}
