<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\ImagePresets;
use App\Models\Service;
use App\Traits\CommonTrait;
use App\Traits\ImageGenTrait;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public $path = 'upload/brand/thumbnail/';

    public $image_preset;

    public $image_preset_main;

    use CommonTrait;
    use ImageGenTrait;

    public function __construct()
    {
        $this->image_preset = ImagePresets::whereIn('id', [4, 10])->get();
        $this->image_preset_main = ImagePresets::find(14);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();

        return view('backend.Brand.all_Brand', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Service::active(0)->pluck('name', 'id');

        return view('backend.Brand.add_Brand', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:Brands|max:200',
            'image' => 'mimes:jpeg,jpg,png|max:2048',
        ]);
        if ($request->file('image') != null) {
            $image = $request->file('image');
            $save_url = $this->imageGenrator($image, $this->image_preset_main, $this->image_preset, $this->path);
        } else {
            $save_url = '';
        }

        $brand = Brand::insert([
            'name' => $request->name,
            'image' => $save_url,
            'small_text' => $request->small_text,
            'text' => $request->text,
            'status' => 0,
        ]);

        $notification = [
            'message' => 'Brand Added Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        $categories = Service::active(0)->pluck('name', 'id');

        return view('backend.Brand.edit_Brand', compact('brand', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {

        $validated = $request->validate([
            'name' => 'required|max:200|unique:Brands,name,'.$brand->id,
            'image' => 'mimes:jpeg,jpg,png|max:2048',
        ]);
        if ($request->file('image') != null) {
            if (file_exists($brand->image)) {
                $img = explode('.', $brand->image);
                $small_img = $img[0].'_'.$this->image_preset[0]->name.'.'.$img[1];
                unlink($small_img);
                unlink($brand->image);
            }
            $image = $request->file('image');
            $save_url = $this->imageGenrator($image, $this->image_preset_main, $this->image_preset, $this->path);
        } else {
            if ($brand->image != '') {
                $save_url = $brand->image;
            } else {
                $save_url = '';
            }

        }

        // dd($categories_ids);

        $brand->update([
            'name' => $request->name,
            'image' => $save_url,
            'small_text' => $request->small_text,
            'text' => $request->text,
        ]);

        $notification = [
            'message' => 'Brand Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
    }

    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            $blogs = Brand::whereIn('id', $request->id);
            foreach ($blogs as $blog) {
                if (file_exists($blog->image)) {
                    $img = explode('.', $blog->image);
                    $small_img = $img[0].'_'.$this->image_preset[0]->name.'.'.$img[1];
                    unlink($small_img);
                    unlink($blog->image);
                }
            }
        } else {
            $blogs = Brand::find($request->id);
            if (file_exists($blogs->image)) {
                $img = explode('.', $blogs->image);
                $small_img = $img[0].'_'.$this->image_preset[0]->name.'.'.$img[1];
                unlink($small_img);
                unlink($blogs->image);
            }
        }

        $blogs->delete();
        $notification = [
            'message' => 'Brand Deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
