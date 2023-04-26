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
        ]);

        Comment::create([
            'content' => $request->input('content'),
            'post_id' => $post->id,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('posts.show', $post);
          
    }


    // public function update(Request $request, Comment $comment, Post $post)
    // {
    //     $request->validate([
    //         'content' => 'required',
    //     ]);

    //     $comment->update([
    //         'content' => $request->input('content'),
    //     ]);

    //     return redirect()->route('posts.post', $post->id)->with('success', 'Commentaire mis à jour avec succès');
    // }


    public function destroy(Comment $comment, Post $post)
    {
        $comment->delete();

        return redirect()->route('posts.post', $post->id)->with('success', 'Commentaire supprimé avec succès');
    }





}
