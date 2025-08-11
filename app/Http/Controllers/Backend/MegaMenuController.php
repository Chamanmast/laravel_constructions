<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MegaMenu;
use App\Models\Menu;
use App\Models\Service;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;

class MegaMenuController extends Controller
{
    use CommonTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $megamenus = MegaMenu::all();

        return view('backend.megamenu.all_megamenu', compact('megamenus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $megamenu = MegaMenu::all();
        $menus = Menu::where('megamenu', 1)->pluck('title', 'id');
        $services = Service::pluck('name', 'id');

        return view('backend.megamenu.add_megamenu', compact('megamenu', 'menus', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:mega_menus|max:255',
            'links' => 'required|array|min:1',
        ]);
        $links = isset($request->links) ? implode(',', $request->links) : '';

        return $this->executeWithNotification(
            function () use ($request, $links) {
                MegaMenu::create([
                    'menu_id' => $request->menu_id,
                    'title' => $request->title,
                    'links' => $links,
                ]);
            },
            'Mega Menu Section Added Successfully',
            'Failed to add mega menu section.'
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MegaMenu $megaMenu)
    {
        $menus = Menu::pluck('title', 'id');

        return view('backend.megamenu.edit_megamenu', compact('megaMenu', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MegaMenu $megaMenu)
    {
        $request->validate([
            'title' => 'required|max:255|unique:mega_menus,title,'.$megaMenu->id,
            'links' => 'required|array|min:1',
        ]);
        $links = isset($request->links) ? implode(',', $request->links) : '';

        return $this->executeWithNotification(
            function () use ($request, $megaMenu, $links) {
                $megaMenu->update([
                    'menu_id' => $request->menu_id,
                    'title' => $request->title,
                    'links' => $links,
                ]);
            },
            'Mega Menu Section Updated Successfully',
            'Failed to update mega menu section.'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MegaMenu $megaMenu)
    {
        return $this->executeWithNotification(
            function () use ($megaMenu) {
                $megaMenu->delete();
            },
            'Mega Menu Section Deleted Successfully',
            'Failed to delete mega menu section.'
        );
    }
}
