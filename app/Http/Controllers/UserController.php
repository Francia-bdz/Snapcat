<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('users.index', compact('roles', 'permissions'));
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
