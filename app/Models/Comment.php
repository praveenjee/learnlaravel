<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
#use Baum\Node;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['author', 'post_id', 'email', 'body', 'photo', 'is_active'];

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
	
    public function replies()
    {
        return $this->hasMany(CommentReply::class);
    }

}
