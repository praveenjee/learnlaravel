<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\PostRepository;

class CategoryController extends Controller
{
    protected $postRepository; 

    protected $nbrPages;

    public function __construct(PostRepository $postRepository)
    {
    	parent::__construct();
        //$this->middleware('auth');
        $this->postRepository = $postRepository;
        $this->nbrPages = config('app.nbrPages.front.posts');
    }

    public function index($slug = null)
    {
        if($slug !=""){
			$selectedcat = $this->postRepository->getCategoryDetail($slug);
            $posts = $this->postRepository->getPostsByCategory($slug, $this->nbrPages); 
            return view('front.categories.index', compact(['posts', 'selectedcat']));
        } else {
            //abort(404);  
            //return view('errors.404'); 

            $data['title'] = '404';
            $data['errmsg'] = 'Page not found';
            return response()->view('errors.404', $data, 404);
        }
    }
}
