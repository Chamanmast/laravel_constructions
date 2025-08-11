<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menugroup;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;

class MenugroupController extends Controller
{
    use CommonTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menugroup = Menugroup::all();

        return view('backend.menugroup.all_menugroup', compact('menugroup'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menugroup = Menugroup::all();

        return view('backend.menugroup.add_menugroup', compact('menugroup'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:menugroups|max:255',
        ]);

        return $this->executeWithNotification(
            function () use ($request) {
                Menugroup::create([
                    'title' => $request->title,
                ]);
            },
            'Menu Group Title Added Successfully',
            'Failed to add menu group title.'
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menugroup $menugroup)
    {
        return view('backend.menugroup.edit_menugroup', compact('menugroup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menugroup $menugroup)
    {
        $request->validate([
            'title' => 'required|unique:menugroups,title,'.$menugroup->id.'|max:255',
        ]);

        return $this->executeWithNotification(
            function () use ($request, $menugroup) {
                $menugroup->update([
                    'title' => $request->title,
                ]);
            },
            'Menu Group Title Updated Successfully',
            'Failed to update menu group title.'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menugroup $menugroup)
    {
        return $this->executeWithNotification(
            function () use ($menugroup) {
                $menugroup->delete();
            },
            'Menu Group Deleted Successfully',
            'Failed to delete menu group.'
        );
    }
}
