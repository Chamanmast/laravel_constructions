<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ImagePresets;
use App\Models\Module;
use App\Traits\CommonTrait;
use App\Traits\ImageGenTrait;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    use CommonTrait, ImageGenTrait;

    public $path = 'upload/module/thumbnail/';

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
        $modules = Module::latest()->get();

        return view('backend.module.all_module', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.module.add_module');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:modules|max:200',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:2048',
        ]);

        return $this->executeWithNotification(
            function () use ($request) {
                $save_url = '';
                if ($request->hasFile('image')) {
                    $save_url = $this->imageGenrator(
                        $request->file('image'),
                        $this->image_preset_main,
                        $this->image_preset,
                        $this->path
                    );
                }
                Module::create([
                    'name' => $request->name,
                    'heading' => $request->heading,
                    'link' => $request->link,
                    'image' => $save_url,
                    'small_text' => $request->small_text,
                    'text' => $request->text,
                    'status' => 0,
                ]);
            },
            'Module Added Successfully',
            'Failed to add module.'
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Module $module)
    {
        return view('backend.module.edit_module', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Module $module)
    {
        $request->validate([
            'name' => 'required|max:200',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:2048',
        ]);

        return $this->executeWithNotification(
            function () use ($request, $module) {
                $save_url = $module->image ?? '';
                if ($request->hasFile('image')) {
                    // Delete old images safely
                    if ($module->image && file_exists(public_path($module->image))) {
                        $img = pathinfo($module->image);
                        $basename = $img['dirname'].'/'.$img['filename'];
                        $extension = $img['extension'];
                        foreach ($this->image_preset as $preset) {
                            $thumbPath = public_path("{$basename}_{$preset->name}.{$extension}");
                            if (file_exists($thumbPath)) {
                                @unlink($thumbPath);
                            }
                        }
                        @unlink(public_path($module->image));
                    }
                    $save_url = $this->imageGenrator(
                        $request->file('image'),
                        $this->image_preset_main,
                        $this->image_preset,
                        $this->path
                    );
                }
                $module->update([
                    'name' => $request->name,
                    'heading' => $request->heading,
                    'link' => $request->link,
                    'image' => $save_url,
                    'small_text' => $request->small_text,
                    'text' => $request->text,
                ]);
            },
            'Module Updated Successfully',
            'Failed to update module.'
        );
    }

    /**
     * Reusable try/catch with notification and redirect.
     */
}
