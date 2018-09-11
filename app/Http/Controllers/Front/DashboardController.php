<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	
	public function __construct()
    {
    	parent::__construct();
        $this->middleware('auth');
    }
	
	public function show(){
		$pageTitle = 'Dashboard | MyBlog';
		return view('front.dashboard.show', compact(['pageTitle']));
	}
    
}
