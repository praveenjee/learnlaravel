<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ {
	Models\User,
	Models\Post,
	Models\Contact,
	Models\Comment,	
	Models\Category		
};

class AdminController extends Controller
{	
	public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {
		
		$totalUsers = User::count();
		
		$totalPosts = Post::count();

		$totalContacts = Contact::count();

		$totalComments = Comment::count();

		$totalCategories = Category::count();	
		
		return view('back.admin.index', compact ('totalUsers', 'totalPosts', 'totalContacts', 'totalComments', 'totalCategories'));
	}
	
	
}
