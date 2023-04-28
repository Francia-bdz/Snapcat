<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\View\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    
    public function index()
    {
        $users = User::with('roles')->get();
        $myPosts = Post::where('user_id', Auth::user()->id)->get();

        return view('home', compact('users', 'myPosts'));

    }
}
