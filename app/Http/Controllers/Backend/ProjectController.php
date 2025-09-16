<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ImagePresets;
use App\Models\Project;
use App\Models\Service;
use App\Traits\CommonTrait;
use App\Traits\ImageGenTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    use CommonTrait, ImageGenTrait;

    public $path = 'upload/projects/thumbnail/';

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
                $projects = Project::get();

                return view('backend.project.all_project', compact('projects'));
            },
            '', // No success message needed
            'Failed to load projects.'
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $brands = Brand::pluck('name', 'id');

        return view('backend.project.add_project', compact('categories', 'brands'));
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
            $brands = $this->postBrandToString($request->brand ?? []);
            $save_url = '';
            if ($request->hasFile('image')) {
                $save_url = $this->imageGenrator(
                    $request->file('image'),
                    $this->image_preset_main,
                    $this->image_preset,
                    $this->path
                );
            }

            Project::create([
                'service_id' => $request->service_id,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $save_url,
                'stext' => $request->stext,
                'text' => $request->text,
                'front' => $request->front ? $request->front : 0,
                'client' => $request->client,
                'contractor' => $request->contractor,
                'specialist_supplier' => $request->specialist_supplier,
                'brand' => $brands,
                'location' => $request->location,
            ]);
        }, 'project Added Successfully', 'Failed to add category.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    protected function postBrandToString($brands)
    {
        return is_array($brands) ? implode(',', $brands) : '';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $categories = Service::pluck('name', 'id');
        $brands = Brand::pluck('name', 'id');

        return view('backend.project.edit_project', compact('categories', 'project', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|max:200',
            'image' => 'mimes:jpeg,jpg,png|max:2048',
        ]);

        return $this->executeWithNotification(function () use ($request, $project) {
            $save_url = $project->image;
            $brands = $this->postBrandToString($request->brand ?? []);
            if ($request->hasFile('image')) {
                $this->deleteprojectImages($project->image);
                $save_url = $this->imageGenrator(
                    $request->file('image'),
                    $this->image_preset_main,
                    $this->image_preset,
                    $this->path
                );
            }

            $project->update([
                'service_id' => $request->service_id,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $save_url,
                'stext' => $request->stext,
                'text' => $request->text,
                'front' => $request->front ? $request->front : 0,
                'client' => $request->client,
                'contractor' => $request->contractor,
                'specialist_supplier' => $request->specialist_supplier,
                'brand' => $brands,
                'location' => $request->location,
            ]);
        }, 'project Updated Successfully', 'Failed to update project.');
    }

    protected function deleteprojectImages($imagePath)
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
