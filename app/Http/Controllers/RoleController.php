<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('roles.index', compact('roles', 'permissions'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        return redirect()->route('roles.index')->with('success', 'Role created successfully');
    }

    
    public function assignRole(Request $request)
    {
        $user = User::find($request->input('user_id'));
        $user->assignRole($request->input('role'));
        return redirect()->back()->with('success', 'Role assigned successfully');
    }

    public function assignPermission(Request $request)
    {
        $user = User::find($request->input('user_id'));
        $user->givePermissionTo($request->input('permission'));
        return redirect()->back()->with('success', 'Permission assigned successfully');
    }
}
