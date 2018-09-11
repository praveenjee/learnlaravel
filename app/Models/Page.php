<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	use Sluggable;
	/**
	* Return the sluggable configuration array for this model.
	*
	* @return array
	*/
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'unique' => true
            ]
        ];
    }
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    public $fillable = ['title','slug','body','meta_title', 'meta_keyword', 'meta_description', 'status']; 

}
