<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{


    public function __construct()
    {     #here is how to protect routes using the middlewares via the role and permission i make this is as exxampele for it
            #protect some routes of the permissions routes and  make some simple test free to add the same thing for other routes.
        $this->middleware('permission:add role',['only'=>['create']]);
        $this->middleware('permission:delet role',['only'=>['destroy']]); #maybe some admins don't have the permission for the delet:)
        $this->middleware('permission:edit role',['only'=>['edit','update']]);
        
    } 


   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::get();
        return view('permissionandrole.permission.index', ['permissions' => $permissions]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permissionandrole.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            "name" => ['required', 'string', 'unique:permissions,name']

        ]);

        $input = $request->only('name');

        Permission::create($input);

        return redirect()
            ->route('permission.index')
            ->with('status', "the permission is added successfully");
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('permissionandrole.permission.edit', ['permission' => $permission]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $permission->update($request->only('name'));
        return redirect()
            ->route('permission.index')
            ->with('status', "the permission is updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()
            ->route('permission.index')
            ->with('status', "the permission is deleteted successfully");
    }
}
