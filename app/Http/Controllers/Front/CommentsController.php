<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Auth;
use App\Models\ {
	Post,
	Comment
};

class CommentsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$total = Comment::count(); 
    	$comments = Comment::all();
    	return view('back.comments.index', compact(['total', 'comments']));		
    }

	public function store(Request $request)
	{	
		//dd($request->all());
		$request->validate([
		    'comment' => 'required',
		]);

		$user = Auth::user();
		$data = [
			'post_id' => $request->post_id,
			//'user_id' => $user->id,
			'author' => $user->name,
			'email' => $user->email,
			'body' => $request->comment,
			'photo' => $user->profileimage
		];
		
		Comment::create($data);		
		$request->session()->flash('comment_message', 'Your message has been submitted successfully and waiting for moderation.');
		return redirect()->back();
	} 
	
}
