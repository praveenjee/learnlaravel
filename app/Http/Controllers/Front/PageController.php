<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Page;

class PageController extends Controller
{
    public function __construct()
    {
    	parent::__construct();
        //$this->middleware('auth');
    }

    public function index($slug)
    {
        $page = Page::where('slug', '=', $slug)->firstOrFail();
        if($page)
            return view('front.pages.index', compact(['page']));
        else {
            $data['title'] = '404';
            $data['errmsg'] = 'Page not found';
            return response()->view('errors.404', $data, 404);
        }
    } 

    public function authordetail()
    {
    	$slug = 'author-detail';
    	$page = Page::where('slug', '=', $slug)->firstOrFail();
        return view('front.pages.index', compact(['page']));
    }
}
