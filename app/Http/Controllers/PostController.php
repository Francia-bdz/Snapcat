<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StorePostRequest;
use App\Notifications\PostCreated;
use Spatie\Permission\Models\Permission;

class PostController extends Controller
{
    public function index(User $user)
    {

        $excludedUserId = auth()->user()->id;
        $posts = Post::where('user_id', '!=', $excludedUserId)->get(); 
        
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

        // $user = User::find(auth()->user()->id);
        // $user->notify(new PostCreated($this));

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        $model = Post::findOrfail($post->id);

        $created_at = Carbon::parse($model->created_at)->format('d M Y');

        return view('posts.show', compact('post','created_at'));
    }

    public function edit(Post $post)
    {
                
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
    

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $posts = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%")
            //ou si la recherche est égal à " "

            // ->orWhere("%{$search}%", '!=', "")
            ->get();

        // Return the search view with the resluts compacted
        return view('search', compact('posts'));
    }

    public function showAndIndexInWelcomePage()
    {
        $lastPost = Post::latest()->with('user')->firstOrFail();
        $posts = Post::latest()->with('user')->skip(1)->take(6)->get();

        return view('welcome', ['post' => $lastPost], ['posts' => $posts]);
    }

    
}


