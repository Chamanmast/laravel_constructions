<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Blogcategory;
use App\Models\Blogtag;
use App\Models\ImagePresets;
use App\Traits\CommonTrait;
use App\Traits\ImageGenTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    use CommonTrait, ImageGenTrait;

    public $path = 'upload/blog/thumbnail/';

    public $image_preset;

    public $image_preset_main;

    public function __construct()
    {
        $this->image_preset = ImagePresets::whereIn('id', [4, 12])->get();
        $this->image_preset_main = ImagePresets::find(14);
    }

    public function index()
    {
        // Viewing is safe, doesn't need try/catch
        $blog = Blog::latest()->with(['category:id,category_name'])
            ->get(['id', 'blogcat_id', 'popular', 'post_title', 'post_image', 'status', 'created_at']);

        return view('backend.blog.all_blog', compact('blog'));
    }

    public function create()
    {
        $blogCategories = Blogcategory::pluck('category_name', 'id');
        $postTags = Blogtag::pluck('tag_name', 'id');

        return view('backend.blog.add_blog', compact('blogCategories', 'postTags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required|unique:blogs|max:200',
            'post_image' => 'mimes:jpeg,jpg,png|max:5048',
        ]);

        return $this->executeWithNotification(function () use ($request) {
            $post_tags = $this->postTagsToString($request->post_tags ?? []);
            $save_url = '';
            if ($request->hasFile('post_image')) {
                $save_url = $this->imageGenrator(
                    $request->file('post_image'),
                    $this->image_preset_main,
                    $this->image_preset,
                    $this->path
                );
            }

            Blog::create([
                'blogcat_id' => $request->blogcat_id,
                'popular' => $request->popular,
                'user_id' => Auth::user()->id,
                'post_title' => $request->post_title,
                'post_slug' => Str::slug($request->post_title),
                'post_image' => $save_url,
                'short_descp' => $request->short_descp,
                'long_descp' => $request->long_descp,
                'post_tags' => $post_tags,
            ]);
        },
            'Blog Added Successfully',
            'Failed to add blog.');
    }

    public function edit(Blog $blog)
    {
        $blogCategories = Blogcategory::pluck('category_name', 'id');
        $postTags = Blogtag::pluck('tag_name', 'id');

        return view('backend.blog.edit_blog', compact('blog', 'blogCategories', 'postTags'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'post_image' => 'mimes:jpeg,jpg,png|max:5048',
        ]);

        return $this->executeWithNotification(function () use ($request, $blog) {
            $post_tags = $this->postTagsToString($request->post_tags ?? []);
            $save_url = $blog->post_image;

            if ($request->hasFile('post_image')) {
                $this->deleteBlogImages($blog->post_image);
                $save_url = $this->imageGenrator(
                    $request->file('post_image'),
                    $this->image_preset_main,
                    $this->image_preset,
                    $this->path
                );
            }

            $blog->update([
                'blogcat_id' => $request->blogcat_id,
                'popular' => $request->popular,
                'post_title' => $request->post_title,
                'post_slug' => Str::slug($request->post_title),
                'post_image' => $save_url,
                'short_descp' => $request->short_descp,
                'long_descp' => $request->long_descp,
                'post_tags' => $post_tags,
            ]);
            $blog->meta()->updateOrCreate([], [
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
            ]);
        },
            'Blog Updated Successfully',
            'Failed to update blog.');
    }

    public function BlogDelete(Request $request)
    {
        return $this->executeWithNotification(function () use ($request) {
            $blogs = is_array($request->id)
                ? Blog::whereIn('id', $request->id)->get()
                : collect([Blog::find($request->id)]);

            foreach ($blogs as $blog) {
                if ($blog) {
                    $this->deleteBlogImages($blog->post_image);
                    $blog->delete();
                }
            }
        },
            'Blog Deleted successfully',
            'Failed to delete blog.');
    }

    /* ----- Helpers & public (frontend) methods ----- */

    protected function postTagsToString($tags)
    {
        return is_array($tags) ? implode(',', $tags) : '';
    }

    protected function deleteBlogImages($imagePath)
    {
        if (! $imagePath) {
            return;
        }
        $img = explode('.', $imagePath);
        if (count($img) < 2) {
            return;
        }
        $presets = $this->image_preset;
        $paths = [
            public_path($imagePath),
            public_path($img[0].'_'.$presets[0]->name.'.'.$img[1] ?? ''),
            public_path($img[0].'_'.$presets[1]->name.'.'.$img[1] ?? ''),
            public_path($img[0].'_thumb.'.$img[1] ?? ''),
            public_path($img[0].'_blog_image_front.'.$img[1] ?? ''),
            public_path($img[0].'_blog_image_large.'.$img[1] ?? ''),
        ];
        foreach ($paths as $path) {
            if ($path && file_exists($path)) {
                @unlink($path);
            }
        }
    }

    // Public frontend blog views (unchanged; no DB writes, so no try/catch)
    public function BlogDetails($slug)
    {
        $blog = Blog::where('post_slug', $slug)->first();
        $tags_all = $blog ? explode(',', $blog->post_tags) : [];
        $bcategory = Blogcategory::latest()->get();
        $dpost = Blog::latest()->limit(3)->get();

        return view('frontend.blog.blog_details', compact('blog', 'tags_all', 'bcategory', 'dpost'));
    }

    public function BlogCatList($id)
    {
        $blog = Blog::where('blogcat_id', $id)->paginate(3);
        $breadcat = Blogcategory::find($id);
        $bcategory = Blogcategory::latest()->get();
        $dpost = Blog::latest()->limit(3)->get();

        return view('frontend.blog.blog_cat_list', compact('blog', 'breadcat', 'bcategory', 'dpost'));
    }

    public function BlogList()
    {
        $blog = Blog::latest()->get();
        $bcategory = Blogcategory::latest()->get();
        $dpost = Blog::latest()->limit(3)->get();

        return view('frontend.blog.blog_list', compact('blog', 'bcategory', 'dpost'));
    }
}
