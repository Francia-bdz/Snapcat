<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'roles' => 'required',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'), 
            'password' => bcrypt($request->input('password')),
        ]);

        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }
    
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
