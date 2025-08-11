<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    use CommonTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::latest()->get(['id', 'name']);

        return view('backend.other.roles.all_roles', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.other.roles.add_roles');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name|max:100',
        ]);

        $successMessage = 'Role Created Successfully';

        // The trait returns a RedirectResponse on error, or null on success (with 'false' flag)
        $errorResponse = $this->executeWithNotification(
            function () use ($request) {
                Role::create(['name' => $request->name]);
            },
            $successMessage,
            'Failed to create role.',
            false // Prevent the trait from auto-redirecting
        );

        // If the trait caught an exception, it returned a redirect. We return that.
        if ($errorResponse) {
            return $errorResponse;
        }

        // Otherwise, we build our own success response to redirect to the index page.
        $notification = [
            'message' => $successMessage,
            'alert-type' => 'success',
        ];

        return redirect()->route('roles.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('backend.other.roles.edit_roles', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|max:100|unique:roles,name,'.$role->id,
        ]);

        $successMessage = 'Role Updated Successfully';

        $errorResponse = $this->executeWithNotification(
            function () use ($request, $role) {
                $role->update(['name' => $request->name]);
            },
            $successMessage,
            'Failed to update role.',
            false // Prevent the trait from auto-redirecting
        );

        if ($errorResponse) {
            return $errorResponse;
        }

        $notification = [
            'message' => $successMessage,
            'alert-type' => 'success',
        ];

        return redirect()->route('roles.index')->with($notification);
    }
}
