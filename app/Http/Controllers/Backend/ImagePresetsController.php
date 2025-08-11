<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ImagePresets;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;

class ImagePresetsController extends Controller
{
    use CommonTrait;

    /**
     * Show all image presets.
     */
    public function index()
    {
        $image_preset = ImagePresets::all(['id', 'name', 'width', 'height', 'status']);

        return view('backend.image_preset.all_image_pre', compact('image_preset'));
    }

    /**
     * Show form for creating an image preset.
     */
    public function create()
    {
        return view('backend.image_preset.add_image_pre');
    }

    /**
     * Store a new image preset.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:image_presets|max:200',
            'width' => 'required',
            'height' => 'required',
        ]);

        return $this->executeWithNotification(
            function () use ($request) {
                ImagePresets::create([
                    'name' => $request->name,
                    'width' => $request->width,
                    'height' => $request->height,
                    'status' => 1,
                ]);
            },
            'Image Preset Added Successfully',
            'Failed to add image preset.'
        );
    }

    /**
     * Edit image preset form.
     */
    public function edit(ImagePresets $imagePreset)
    {
        $image_preset = $imagePreset;

        return view('backend.image_preset.edit_image_pre', compact('image_preset'));
    }

    /**
     * Update the specified image preset.
     */
    public function update(Request $request, ImagePresets $imagePreset)
    {
        $request->validate([
            'name' => 'required|max:200|unique:image_presets,name,'.$imagePreset->id.',id',
            'width' => 'required',
            'height' => 'required',
        ]);

        return $this->executeWithNotification(
            function () use ($request, $imagePreset) {
                $imagePreset->update([
                    'name' => $request->name,
                    'width' => $request->width,
                    'height' => $request->height,
                ]);
            },
            'Image Preset Updated Successfully',
            'Failed to update image preset.'
        );
    }
}
