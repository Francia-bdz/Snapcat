<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\Home;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    
    public function index()
    {
        $users = User::with('roles')->get();
        return view('home', compact('users'));


    }
}
