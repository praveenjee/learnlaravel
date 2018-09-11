<?php

namespace App\Http\Controllers\Back;

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
	
	public function index()
    {
    	$total = CommentReply::count(); 
    	$replies = CommentReply::all();
    	return view('back.replies.index', compact(['total', 'replies']));		
    } 
	
	public function show($comment_id)
	{
		$comment = Comment::where('id','=',$comment_id)->firstOrFail(); 
		$replies = $comment->replies;
		$total = count($replies);
	
		return view('back.replies.show', compact(['replies', 'total']));	
	}

	public function update(Request $request, CommentReply $reply)
	{
		$input = $request->all(); 
		CommentReply::findOrFail($reply->id)->update($input);		
		$request->session()->flash('message', 'Successfully updated! ');
		
		//return redirect('admin/comment/replies/' . $reply->comment_id);
		return redirect()->back();
	}
	
	public function destroy(Request $request, CommentReply $reply)
	{
		CommentReply::findOrFail($reply->id)->delete();		
		$request->session()->flash('message', 'Successfully deleted! ');
		
		//return redirect('admin/comment/replies/' . $reply->comment_id);
		return redirect()->back();		
	}
}
