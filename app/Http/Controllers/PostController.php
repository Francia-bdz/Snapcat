<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class PostController extends Controller
{
    public function index(User $user)
    {

        $excludedUserId = auth()->user()->id;
        $posts = Post::where('user_id', '!=', $excludedUserId)->get(); 

        //$posts= Post::all();
        
        $myPosts = Post::where('user_id', Auth::user()->id)->get();
        
        return view('posts.index', compact('myPosts','posts'));
    }

    public function create()
    {        
        return view('posts.create');
    }

    public function store(Request $request, Post $post)
    {
        
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'), 
            'user_id' => auth()->user()->id,
        ] );

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    public function show(Post $post)

    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        
        // Si l'ID de l'utilisateur connecté est différent de l'ID de l'auteur du post alors on redirige vers la page d'accueil 
        
        if (auth()->user()->id != $post->user_id ){
            return to_route('posts.index');
        }

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }
    
    
}
