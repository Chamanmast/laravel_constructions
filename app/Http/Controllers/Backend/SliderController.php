<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ImagePresets;
use App\Models\Slider;
use App\Traits\CommonTrait;
use App\Traits\ImageGenTrait;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use CommonTrait, ImageGenTrait;

    public $path = 'upload/slider/thumbnail/';

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
        $slider = Slider::latest()->get(['id', 'name', 'title', 'image', 'status', 'created_at']);

        return view('backend.slider.all_slider', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.slider.add_slider');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:sliders|max:200',
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

            Slider::create([
                'name' => $request->name,
                'title' => $request->title,
                'link' => $request->link,
                'sub_title' => $request->sub_title,
                'image' => $save_url,
                'text' => $request->text,
                'status' => $request->status ?? 0,
            ]);
        }, 'Slider Added Successfully', 'Failed to add slider.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('backend.slider.edit_slider', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'name' => 'required|max:200',
            'image' => 'mimes:jpeg,jpg,png|max:2048',
        ]);

        return $this->executeWithNotification(function () use ($request, $slider) {
            $save_url = $slider->image;

            if ($request->hasFile('image')) {
                $this->deleteSliderImages($slider->image);
                $save_url = $this->imageGenrator(
                    $request->file('image'),
                    $this->image_preset_main,
                    $this->image_preset,
                    $this->path
                );
            }

            $slider->update([
                'name' => $request->name,
                'title' => $request->title,
                'link' => $request->link,
                'sub_title' => $request->sub_title,
                'image' => $save_url,
                'text' => $request->text,
                'status' => $request->status ?? 0,
            ]);
        }, 'Slider Updated Successfully', 'Failed to update slider.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->executeWithNotification(function () use ($request) {
            $sliders = is_array($request->id)
                ? Slider::whereIn('id', $request->id)->get()
                : collect([Slider::findOrFail($request->id)]);

            foreach ($sliders as $slider) {
                if ($slider) {
                    $this->deleteSliderImages($slider->image);
                    $slider->delete();
                }
            }
        }, 'Slider(s) Deleted successfully', 'Failed to delete slider(s).');
    }

    /**
     * Helper to delete slider images based on presets.
     */
    protected function deleteSliderImages($imagePath)
    {
        if (! $imagePath || $this->image_preset->isEmpty()) {
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
