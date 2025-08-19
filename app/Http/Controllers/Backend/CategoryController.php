<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ImagePresets;
use App\Traits\CommonTrait;
use App\Traits\ImageGenTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    use CommonTrait, ImageGenTrait;

    public $path = 'upload/category/thumbnail/';

    public $image_preset;

    public $image_preset_main;

    public function __construct()
    {
        $this->image_preset = ImagePresets::whereIn('id', [4])->get();
        $this->image_preset_main = ImagePresets::find(14);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->executeWithNotification(
            function () {
                $category = Category::get();

                return view('backend.category.all_category', compact('category'));
            },
            '', // No success message needed
            'Failed to load categories.'
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.add_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:200',
            'image' => 'mimes:jpeg,jpg,png|max:2048',
        ]);

        return $this->executeWithNotification(function () use ($request) {
            $save_url = '';
            if ($request->hasFile('image')) {
                $save_url = $this->imageGenrator(
                    $request->file('image'),
                    $this->image_preset_main,
                    $this->image_preset,
                    $this->path
                );
            }

            Category::create([
                'name' => $request->name,
                'image' => $save_url,
                'front' => $request->front,
                'slug' => Str::slug($request->name),
                'text' => $request->text,
            ]);
        }, 'Category Added Successfully', 'Failed to add category.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:200',
            'image' => 'mimes:jpeg,jpg,png|max:2048',
        ]);

        return $this->executeWithNotification(function () use ($request, $category) {
            $save_url = $category->image;

            if ($request->hasFile('image')) {
                $this->deleteCategoryImages($category->image);
                $save_url = $this->imageGenrator(
                    $request->file('image'),
                    $this->image_preset_main,
                    $this->image_preset,
                    $this->path
                );
            }

            $category->update([
                'name' => $request->name,
                'image' => $save_url,
                'front' => $request->front,
                'slug' => Str::slug($request->name),
                'text' => $request->text,
            ]);
        }, 'Category Updated Successfully', 'Failed to update category.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        return $this->executeWithNotification(function () use ($request) {
            $categories = is_array($request->id)
                ? Category::whereIn('id', $request->id)->get()
                : collect([Category::findOrFail($request->id)]);

            foreach ($categories as $category) {
                if ($category) {
                    $this->deleteCategoryImages($category->image);
                    $category->delete();
                }
            }
        }, 'Category Deleted successfully', 'Failed to delete category.');
    }

    /**
     * Helper to delete category images based on presets.
     */
    protected function deleteCategoryImages($imagePath)
    {
        if (! $imagePath || empty($this->image_preset)) {
            return;
        }

        $img_parts = explode('.', $imagePath);
        if (count($img_parts) < 2) {
            return;
        }

        // Base image path
        if (file_exists($imagePath)) {
            @unlink($imagePath);
        }

        // Preset-based image paths
        $base_name = $img_parts[0];
        $extension = $img_parts[1];

        foreach ($this->image_preset as $preset) {
            $preset_path = public_path($base_name.'_'.$preset->name.'.'.$extension);
            if (file_exists($preset_path)) {
                @unlink($preset_path);
            }
        }
    }
}
