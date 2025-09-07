<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Megamenu;
use App\Models\Menu;
use App\Models\Service;
use Illuminate\Http\Request;

class MegaMenuController extends Controller
{
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
        $megamenu = Megamenu::all();
        $menus = Menu::where('megamenu',1)->pluck('title', 'id');
        $services = Service::pluck('name', 'id');
        return view('backend.megamenu.add_megamenu', compact('megamenu','menus','services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $links=implode(',',$request->links);
        $validated = $request->validate([
            'title' =>'required|unique:mega_menus|max:255',
            'links' =>'required',
        ]);


        megamenu::insert([
            'menu_id' => $request->menu_id,
            'title' => $request->title,
            'links' => $links
        ]);
        $notification = array(
            'message' => 'Mega Menu Section Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Megamenu $megaMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Megamenu $megamenu)
    {
        $menus = Menu::pluck('title', 'id');
        $services = Service::pluck('name', 'id');
        return view('backend.megamenu.edit_megamenu', compact('megamenu','menus','services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Megamenu $megamenu)
    {

        $links=implode(',',$request->links);


        $megamenu->update([
            'menu_id' => $request->menu_id,
            'title' => $request->title,
            'links' => $links,
        ]);
        $notification = array(
            'message' => 'Mega Menu Section Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MegaMenu $megaMenu)
    {
        //
    }
}
