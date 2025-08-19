<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ImagePresets;
use App\Models\Testimonial;
use App\Traits\CommonTrait;
use App\Traits\ImageGenTrait;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public $path = 'upload/testimonials/thumbnail/';

    public $image_preset;

    public $image_preset_main;

    use CommonTrait;
    use ImageGenTrait;

    public function __construct()
    {

        $this->image_preset = ImagePresets::whereIn('id', [3, 4])->get();
        $this->image_preset_main = ImagePresets::find(6);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::all();

        return view('backend.testimonials.all_testimonial', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('backend.testimonials.add_testimonial');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:testimonials|max:200',
        ]);
        if ($request->file('image') != null) {
            $image = $request->file('image');
            $save_url = $this->imageGenrator($image, $this->image_preset_main, $this->image_preset, $this->path);
        } else {
            $save_url = '';
        }
        $socials = implode(',', $request->social);
        Testimonial::insert([
            'type' => $request->type,
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $save_url,
            'text' => $request->text,
            'social' => $socials,
            'status' => 0,
        ]);
        $notification = [
            'message' => 'Testimonial Added Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {

        return view('backend.testimonials.edit_testimonial', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|max:200|unique:testimonials,name,'.$testimonial->id,
        ]);
        if ($request->file('image') != null) {
            $image = $request->file('image');
            $save_url = $this->imageGenrator($image, $this->image_preset_main, $this->image_preset, $this->path);
        } else {

            if ($testimonial->image != '') {
                $save_url = $testimonial->image;
            } else {
                $save_url = '';
            }

        }
        $socials = implode(',', $request->social);
        // dd($socials);
        $testimonial->update([
            'type' => $request->type,
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $save_url,
            'social' => $socials,
            'text' => $request->text,

        ]);
        $notification = [
            'message' => 'Testimonial Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        //
    }

    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            $blogs = Testimonial::whereIn('id', $request->id);
            foreach ($blogs as $blog) {
                if (file_exists($blog->image)) {
                    $img = explode('.', $blog->image);
                    $small_img = $img[0].'_'.$this->image_preset[0]->name.'.'.$img[1];
                    unlink($small_img);
                    unlink($blog->image);
                }
            }
        } else {
            $blogs = Testimonial::find($request->id);
            if (file_exists($blogs->image)) {
                $img = explode('.', $blogs->image);
                $small_img = $img[0].'_'.$this->image_preset[0]->name.'.'.$img[1];
                unlink($small_img);
                unlink($blogs->image);
            }
        }

        $blogs->delete();
        $notification = [
            'message' => 'Testimonial Deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
