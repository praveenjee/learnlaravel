<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    
    protected $fillable = ['name'];
    //public $timestamps = false;


    public function post()
    {
    	//return $this->belongsTo('App\Models\Post');
        return $this->hasOne(Post::class);
    }

}
