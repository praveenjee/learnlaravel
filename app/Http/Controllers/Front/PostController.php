<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\PostRepository;

class PostController extends Controller
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
            $post = $this->postRepository->getPostDetailBySlug($slug); 	
			$comments = $this->postRepository->getPostComments($post->id, $this->nbrPages); 
			
            return view('front.posts.index', compact(['post', 'comments']));
        } else {
            //abort(404);  
            //return view('errors.404'); 

            $data['title'] = '404';
            $data['errmsg'] = 'Page not found';
            return response()->view('errors.404', $data, 404);
        }
    }

    public function search(Request $request)
    {
        $posts = []; $keyword = "";
        $pageTitle = "Search Post";
        $input = $request->all(); 
        if($input){
            $keyword = $s = $input['s']; 
            $posts = $this->postRepository->search($this->nbrPages, $keyword); 
            foreach($posts as $post){
                $post->categories = $post->categories;
                $post->image = $post->photo;
            } 
            
            $info = count($posts) . __(' SEARCH RESULTS FOR : ') . $keyword;           
            $posts = $posts->appends(compact(['s'])); 
        } 
       
        return view('front.posts.search', 
            compact(['pageTitle', 'posts', 'keyword', 'info']));
    } 

    public function tag($tagid)
    {
        if($tagid !=""){
            $posts = $this->postRepository->getTaggedPost($tagid);            
            return view('front.featured.index', compact(['posts']));
        } else {
            //abort(404);  
            //return view('errors.404'); 

            $data['title'] = '404';
            $data['errmsg'] = 'Page not found';
            return response()->view('errors.404', $data, 404); 
        }
    }
	

}
