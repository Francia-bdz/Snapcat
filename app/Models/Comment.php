<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory; 

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function commentParent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function commentChild()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    protected $fillable = [
        'content',
        'user_id',
        'post_id',
        'parent_id',  
    ];


}
