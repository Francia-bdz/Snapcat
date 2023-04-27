<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request, Post $post)
    {

        $request->validate([
            'content' => 'required',
            'parent_id' => '',
        ]);

        Comment::create([
            'content' => $request->input('content'),
            'post_id' => $post->id,
            'user_id' => auth()->user()->id,
            'parent_id' => $request->input('parent_id'),
        ]);

        return redirect()->route('posts.show', $post);
          
    }

    public function index(Comment $comment)
    {

    }

    public function destroy(Comment $comment, Post $post)
    {
         if (auth()->user()->id != $comment->user_id ){

         return to_route('posts.show', $comment->post)->with('error', 'Vous n\'avez pas le droit de supprimer ce commentaire');

        } else {

        $comment->delete();

        return redirect()->route('posts.show', $comment->post)->with('success', 'Commentaire supprimé avec succès');

         }
    }







}
