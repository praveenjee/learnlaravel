<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use View;
use App\Models\ {
	Post,
	Category,
    Tag
};

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests; 

    protected $categories = "";
    protected $featured = ""; 

    public function __construct() 
    {
    	// Get categories name in top navigation through out the application
        $this->categories = Category::select(['id', 'title', 'slug'])
            ->where([['status','=','1']])
            ->withCount('posts')->get();   
        //dd($this->categories); die;     

        // Get featured posts in top navigation through out the application
        $this->featured = Post::select('posts.id as postid', 'title', 'seo_url', 'excerpt', 'posts.created_at', 'photos.name as image')
            ->leftJoin('photos', 'photos.id', '=', 'posts.photo_id') 
            ->whereFeatured(true) 
            ->latest() 
            ->limit(4)
            ->get();     

    	View::share ( 'categories', $this->categories ); 
    	View::share ( 'featured', $this->featured ); 
        View::share ( 'tags', Tag::all() ); 
    } 

}
