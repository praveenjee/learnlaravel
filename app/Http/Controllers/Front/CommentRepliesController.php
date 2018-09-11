<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Auth;
use App\Models\ {
	Post,
	Comment,
	CommentReply
};

class CommentRepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function store(Request $request)
	{	
		$request->validate([
		    'body' => 'required',
		]);

		$user = Auth::user();
		$data = [
			'comment_id' => $request->comment_id,
			'body' => $request->body,
			'author' => $user->name,
			'email' => $user->email,			
			'photo' => $user->profileimage
		];

		CommentReply::create($data);		
		//$request->session()->flash('message', 'Your reply has been submitted successfully and waiting for moderation.');
		//return redirect()->back();
		$message = 'Your reply has been submitted successfully and waiting for moderation.';
		return response()->json(array('msg'=> $message), 200);
	} 
}
