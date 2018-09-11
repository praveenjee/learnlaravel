<?php

namespace App\Http\Controllers\Back;

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
	
	public function show($post_id)
	{
		$post = Post::where('id','=',$post_id)->firstOrFail();
		$comments = $post->comments;
		$total = count($comments);
	
		return view('back.comments.show', compact(['comments', 'total']));		 
	} 

	public function update(Request $request, Comment $comment)
	{
		$input = $request->all();
		Comment::findOrFail($comment->id)->update($input);
		
		$request->session()->flash('message', 'Successfully updated! ');
    	return redirect('admin/comments');
	}
	
	public function destroy(Request $request, Comment $comment)
	{
		Comment::findOrFail($comment->id)->delete();
		
		$request->session()->flash('message', 'Successfully deleted! ');
    	return redirect('admin/comments');
	}
}
