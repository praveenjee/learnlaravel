<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
     protected $fillable = ['author', 'comment_id', 'email', 'body', 'photo', 'is_active'];

     public function comment()
     {
     	return $this->belongsTo(Comment::class); 
     }
}
