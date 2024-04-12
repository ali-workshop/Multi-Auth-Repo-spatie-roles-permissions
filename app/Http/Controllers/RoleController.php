<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleController extends Controller
{
   public function __construct()
{     #here is how to protect routes using the middlewares via the role and permission i make this as as exxampele for it
        #protect some routes of the roles routes and  make some simple test free to add the same thing for other routes.
    $this->middleware('permission:add role',['only'=>['create']]);
    $this->middleware('permission:delet role',['only'=>['destroy']]); #maybe some admins don't have the permission for the delet:)
    $this->middleware('permission:edit role',['only'=>['edit','update']]);
    
}    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::get();
        return view('permissionandrole.role.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permissionandrole.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            "name" => ['required', 'string', 'unique:roles,name']

        ]);

        $input = $request->only('name');

        Role::create($input);

        return redirect()
            ->route('role.index')
            ->with('status', "the Role is added successfully");
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('permissionandrole.role.edit', ['role' => $role]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $role->update($request->only('name'));
        return redirect()
            ->route('role.index')
            ->with('status', "the role is updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role )
    {
        $role->delete();
        return redirect()
            ->route('role.index')
            ->with('status', "the role is deleteted successfully");
    }
    public function addpermission($ss){
        // dd($ss);
        $permissions=Permission::get();
        $role=Role::find($ss);
        // dd($role);
        #https://spatie.be/docs/laravel-permission/v6/basic-usage/role-permissions#content-what-permissions-does-a-role-have
       #get all the permissions related to the Role object. i can use the DB:: instead but this is easier:) man
        $rolePermissions = $role->permissions;
        dd($rolePermissions);
        // dd($role);
        
        return view('permissionandrole.role.addpermission',[
            'role'=>$role,
            'permissions'=>$permissions,
            'rolePermissions'=>$rolePermissions
        
        ]);
    }

    public function updatepermission(Request $request,Role $roleid){
        // dd($roleid);
        $role=Role::find($roleid); #this will return collection.
        // dd($role);
        
        $role[0]->syncPermissions($request->permission);
        return redirect()->back()->with('status','the permission added sucessfully');
    }
}
