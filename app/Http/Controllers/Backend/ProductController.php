<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ImagePresets;
use App\Models\Product;
use App\Traits\CommonTrait;
use App\Traits\ImageGenTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use CommonTrait, ImageGenTrait;

    public $path = 'upload/products/thumbnail/';

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
                $products = Product::get();

                return view('backend.product.all_product', compact('products'));
            },
            '', // No success message needed
            'Failed to load products.'
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('backend.product.add_product', compact('categories'));
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

            Product::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $save_url,
                'front' => $request->front,
                'stext' => $request->stext,
                'text' => $request->text,
            ]);
        }, 'Product Added Successfully', 'Failed to add category.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('name', 'id');

        return view('backend.product.edit_product', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:200',
            'image' => 'mimes:jpeg,jpg,png|max:2048',
        ]);

        return $this->executeWithNotification(function () use ($request, $product) {
            $save_url = $product->image;

            if ($request->hasFile('image')) {
                $this->deleteProductImages($product->image);
                $save_url = $this->imageGenrator(
                    $request->file('image'),
                    $this->image_preset_main,
                    $this->image_preset,
                    $this->path
                );
            }

            $product->update([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $save_url,
                'front' => $request->front,
                'stext' => $request->stext,
                'text' => $request->text,
            ]);
        }, 'Product Updated Successfully', 'Failed to update category.');
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
            $preset_path = public_path($base_name.'_'.$preset->name.'.'.$extension);
            if (file_exists($preset_path)) {
                @unlink($preset_path);
            }
        }
    }
}
