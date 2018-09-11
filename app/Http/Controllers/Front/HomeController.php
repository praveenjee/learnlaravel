<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\PostRepository;
use App\Models\Newsletter; 

class HomeController extends Controller
{
    protected $postRepository;
    /**
     * The pagination number.
     *
     * @var int
     */
    protected $nbrPages;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostRepository $postRepository)
    {
        parent::__construct();
        //$this->middleware('auth');

        $this->postRepository = $postRepository;
        $this->nbrPages = config('app.nbrPages.front.posts');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postRepository->getLatestActivePost($this->nbrPages);        
        return view('front.home.index', compact(['posts']));
    }

    public function featuredpost()
    {
        $posts = $this->postRepository->getFeaturedPost($this->nbrPages);        
        return view('front.featured.index', compact(['posts']));
    }

    public function subscribenewsletter(Request $request)
    {
        $input = $request->all();
        if($request->isMethod('post') && $input) {
            $chkNewsletter = Newsletter::where('email', '=', $request->email)->count();

            if($chkNewsletter > 0){
                $msg = "You are already subscribed.<br>Thank you!";
            } else {
                $input['email'] = $request->email;
                $input['status'] = 1;
                $newsletter = Newsletter::create($input);                
                $msg = "Thanks for subscribe.";
            }
            return response()->json(array('msg'=> $msg), 200);
        }
        
    }

    
}
