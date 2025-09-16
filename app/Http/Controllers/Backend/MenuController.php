<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Menugroup;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    use CommonTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();

        return view('backend.menu.all_menu', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $type = ['Page', 'Url', 'External Page', 'Category'];
        $menugroup = Menugroup::pluck('title', 'id');
        $menus = Menu::pluck('title', 'id');

        return view('backend.menu.add_menu', compact('menus', 'type', 'menugroup'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'attachment' => 'file|mimes:pdf,doc,docx|max:5048',
        ]);
        $groups = $request->group_ids;
        if (is_array($groups)) {
            $groupids = implode(',', $groups);
        }
        if ($request->hasFile('attachment')) {
            $filePath = $request->file('attachment')->store('attachment', 'public');
        }
        $menu = Menu::insert([
            'parent_id' => ($request->parent_id != null) ? $request->parent_id : 0,
            'title' => $request->title,
            'url' => Str::slug($request->title),
            'type' => $request->type,
            'position' => count(menu::all()) + 1,
            'group_id' => $groupids,
            'megamenu' => $request->megamenu ? 1 : 0,
            'attachment' => $filePath,
        ]);

        $notification = [
            'message' => 'Menu Added Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {

        $type = ['Page', 'Url', 'External Page', 'Category'];
        $menugroup = Menugroup::pluck('title', 'id');
        $menus = Menu::pluck('title', 'id');

        return view('backend.menu.edit_menu', compact('menu', 'menus', 'type', 'menugroup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'attachment' => 'nullable|file|mimes:pdf,doc,docx|max:5048',
        ]);

        $groups = $request->group_ids;
        if (is_array($groups)) {
            $groupids = implode(',', $groups);
        }
        // Handle file upload if a new file is provided
        if ($request->hasFile('attachment')) {
            // Optionally delete the old file
            if ($menu->attachment && Storage::disk('public')->exists($menu->attachment)) {
                Storage::disk('public')->delete($menu->attachment);
            }

            // Store new file
            $filePath = $request->file('attachment')->store('attachment', 'public');

            // Update file path in the menu
            $menu->attachment = $filePath;
        }
        $menu->update([
            'parent_id' => ($request->parent_id != null) ? $request->parent_id : 0,
            'title' => $request->title,
            'url' => $request->url,
            'type' => $request->type,
            'position' => $request->position,
            'group_id' => $groupids,
            'megamenu' => $request->megamenu,
        ]);
        if ($request->meta_description) {
            $menu->meta()->updateOrCreate([], [
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
            ]);
        }
        $notification = [
            'message' => 'Menu Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
