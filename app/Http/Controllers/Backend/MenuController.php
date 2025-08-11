<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Menugroup;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;
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
        $request->validate([
            'title' => 'required|unique:menus|max:255',
            'type' => 'required',
            'group_id' => 'nullable|exists:menugroups,id',
        ]);

        return $this->executeWithNotification(
            function () use ($request) {
                $position = Menu::max('position') + 1;
                $menu = Menu::create([
                    'parent_id' => $request->parent_id ?? 0,
                    'title' => $request->title,
                    'url' => Str::slug($request->title),
                    'type' => $request->type,
                    'position' => $position,
                    'group_id' => $request->group_id,
                    'megamenu' => $request->megamenu ? 1 : 0,
                ]);
                $menu->meta()->create([
                    'meta_description' => $request->meta_description,
                    'meta_keywords' => $request->meta_keywords,
                ]);
            },
            'Menu Added Successfully',
            'Failed to add menu.'
        );
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
        $request->validate([
            'title' => 'required|max:255|unique:menus,title,'.$menu->id,
            'type' => 'required',
            'group_id' => 'nullable|exists:menugroups,id',
        ]);

        return $this->executeWithNotification(
            function () use ($request, $menu) {
                $menu->update([
                    'parent_id' => $request->parent_id ?? 0,
                    'title' => $request->title,
                    'url' => $request->url ?? Str::slug($request->title),
                    'type' => $request->type,
                    'position' => $request->position ?? $menu->position,
                    'group_id' => $request->group_id,
                    'megamenu' => $request->megamenu ? 1 : 0,
                ]);
                $menu->meta()->updateOrCreate([], [
                    'meta_description' => $request->meta_description,
                    'meta_keywords' => $request->meta_keywords,
                ]);
            },
            'Menu Updated Successfully',
            'Failed to update menu.'
        );
    }
}
