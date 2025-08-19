<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\ImagePresets;
use App\Traits\CommonTrait;
use App\Traits\ImageGenTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    use CommonTrait, ImageGenTrait;

    public $path = 'upload/gallery/thumbnail/';

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
                $galleries = Gallery::get();

                return view('backend.gallery.all_gallery', compact('galleries'));
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
        $categories = Category::pluck('name', 'id');
        return view('backend.gallery.add_gallery', compact('categories'));
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

            Gallery::create([
                'name' => $request->name,
                'image' => $save_url,
                'front' => $request->front,
                'slug' => Str::slug($request->name),
                'text' => $request->text,
            ]);
        }, 'Gallery Added Successfully', 'Failed to add gallery.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return view('backend.gallery.edit_gallery', compact('gallery', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'name' => 'required|max:200',
            'image' => 'mimes:jpeg,jpg,png|max:2048',
        ]);

        return $this->executeWithNotification(function () use ($request, $gallery) {
            $save_url = $gallery->image;

            if ($request->hasFile('image')) {
                $this->deleteProductImages($gallery->image);
                $save_url = $this->imageGenrator(
                    $request->file('image'),
                    $this->image_preset_main,
                    $this->image_preset,
                    $this->path
                );
            }

            $gallery->update([
                'name' => $request->name,
                'image' => $save_url,
                'front' => $request->front,
                'slug' => Str::slug($request->name),
                'text' => $request->text,
            ]);
        }, 'Gallery Updated Successfully', 'Failed to update gallery.');
    }

    protected function deleteProductImages($imagePath)
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
            $preset_path = public_path($base_name . '_' . $preset->name . '.' . $extension);
            if (file_exists($preset_path)) {
                @unlink($preset_path);
            }
        }
    }
}
