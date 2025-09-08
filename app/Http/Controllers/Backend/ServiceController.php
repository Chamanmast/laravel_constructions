<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ImagePresets;
use App\Models\Service;
use App\Traits\CommonTrait;
use App\Traits\ImageGenTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public $path = 'upload/services/thumbnail/';

    public $image_preset;

    public $image_preset_main;

    use CommonTrait;
    use ImageGenTrait;

    public function __construct()
    {
        $this->image_preset = ImagePresets::whereIn('id', [4, 8])->get();
        $this->image_preset_main = ImagePresets::find(14);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();

        return view('backend.services.all_service', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::type(0)->pluck('name', 'id');
        $brands = Brand::pluck('name', 'id');
        return view('backend.services.add_service', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'name' => 'required|max:200',
            'image' => 'mimes:jpeg,jpg,png|max:2048',
        ]);
        if ($request->file('image') != null) {
            $image = $request->file('image');
            $save_url = $this->imageGenrator($image, $this->image_preset_main, $this->image_preset, $this->path);
        } else {
            $save_url = NULL;
        }
        $brands = $this->postBrandToString($request->brands ?? []);
        $service = Service::insert([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'favorite' => $request->favorite ? $request->favorite : 0,
            'image' => $save_url,
            'small_text' => $request->small_text,
            'text' => $request->text,
            'brands'=>$brands,
            'status' => 0,
        ]);
        $service->meta()->create([
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);
        $notification = [
            'message' => 'Services Added Successfully',
            'alert-category_id' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
        $categories = Category::type(0)->pluck('name', 'id');
        $brands = Brand::pluck('name', 'id');
        return view('backend.services.edit_service', compact('service', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {

        $validated = $request->validate([
            'name' => 'required|max:200',
            'image' => 'mimes:jpeg,jpg,png|max:2048',
        ]);
        if ($request->file('image') != null) {
            if (file_exists($service->image)) {
                $img = explode('.', $service->image);
                $small_img = $img[0] . '_' . $this->image_preset[0]->name . '.' . $img[1];
                unlink($small_img);
                unlink($service->image);
            }
            $image = $request->file('image');
            $save_url = $this->imageGenrator($image, $this->image_preset_main, $this->image_preset, $this->path);
        } else {
            if ($service->image != '') {
                $save_url = $service->image;
            } else {
                $save_url = '';
            }
        }
        $brands = $this->postBrandToString($request->brands ?? []);
        $service->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'favorite' => $request->favorite ? $request->favorite : 0,
            'image' => $save_url,
            'small_text' => $request->small_text,
            'text' => $request->text,
            'brands' => $brands,
            'status' => 0,
        ]);
        $service->meta()->updateOrCreate([], [
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);
        $notification = [
            'message' => 'Services Updated Successfully',
            'alert-category_id' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

     protected function postBrandToString($brands)
    {
        return is_array($brands) ? implode(',', $brands) : '';
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }

    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            $blogs = service::whereIn('id', $request->id);
            foreach ($blogs as $blog) {
                if (file_exists($blog->image)) {
                    $img = explode('.', $blog->image);
                    $small_img = $img[0] . '_' . $this->image_preset[0]->name . '.' . $img[1];
                    unlink($small_img);
                    unlink($blog->image);
                }
            }
        } else {
            $blogs = service::find($request->id);
            if (file_exists($blogs->image)) {
                $img = explode('.', $blogs->image);
                $small_img = $img[0] . '_' . $this->image_preset[0]->name . '.' . $img[1];
                unlink($small_img);
                unlink($blogs->image);
            }
        }

        $blogs->delete();
        $notification = [
            'message' => 'Service Deleted successfully',
            'alert-category_id' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
