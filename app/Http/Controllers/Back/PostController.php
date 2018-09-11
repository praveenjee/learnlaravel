<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Auth;

use App\Models\ {
	Post,
	Category,
	Photo,
	Tag
};

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {		
		/*
		//$total = User::count();	
		//$users = User::all();
		$users = User::select('id', 'name', 'email', 'valid', 'role', 'created_at')
				->where([['id', '>', 1], ['valid', '=', 1]])
				->paginate(5);
				
		return view('back.users.index', compact(['users', 'total']))
				->with('i', (request()->input('page', 1) - 1) * 5);		
		*/		
		//$posts = Post::where([['status', '=', 1]])->get();
		$posts = Post::all();		
		$total = count($posts);	
		
		return view('back.posts.index', compact(['posts', 'total']));	
	}

    public function create()
	{
		$pageTitle = 'Create Your Post | MyBlog';
		$categories = Category::select(['id', 'title', 'slug'])
			->where([['status','=','1']])->get(); 
		
		return view('back.posts.create', compact(['pageTitle', 'categories']));
	}

	public function store(Request $request)
	{		
		if($request->isMethod('POST')){
			$user = Auth::user();
			$validate = [
	            'title' => 'required|min:3',
	            'category' => 'required',			
				//'seo_url' => 'required',
				'excerpt' => 'required'
	        ];		
			$this->validate($request, $validate);

			/*//FIRST METHOD
			$post = new Post;
			$post->title = $request->title;
			$post->seo_url = $request->seo_url;
			$post->user_id = $user->id; 
			$post->excerpt = $request->excerpt;
			$post->body = $request->body;
			$post->meta_title = $request->meta_title;
			$post->meta_keyword= $request->meta_keyword;
			$post->meta_description= $request->meta_description;
			$post->status = $request->status;
			$post->featured = $request->featured ? $request->featured : 0;
		
			if($file = $request->file('photo_id')){ 							
				$filename = time() . "-". $file->getClientOriginalName(); 
				$file->move('uploads/posts', $filename);
				
				$photo = Photo::create(['name' => $filename]);
				$post->photo_id = $photo->id;
			}
			$post->save();
			//END: FIRST 
			*/
			
			//SECOND METHOD
			$input = $request->all();
			$cat_ids = $input['category'];
			
			// Upload new image for post
			if($file = $request->file('photo_id')){ 							
				$filename = time() . "-". $file->getClientOriginalName(); 
				$file->move('uploads/posts', $filename);
				
				$photo = Photo::create(['name' => $filename]);
				$input['photo_id'] = $photo->id;
			}
			//echo '<pre>'; print_r($input); die;
			// Insert data into post table
			$post = $user->posts()->create($input);
			// Insert data in pivot table
			$post->categories()->sync($cat_ids, $post->id); 
			//END: SECOND

			//Save tags
	        $this->saveTags($post, $request); 

			$request->session()->flash('message', 'Post added successfully!');
        	return redirect('admin/posts');	
		}		
	}

	public function edit(Post $post)
    {		
    	$pageTitle = 'Create Your Post | MyBlog';
    	$post = Post::findOrFail($post->id);
    	$categories = Category::select(['id', 'title', 'slug'])
			->where([['status','=','1']])->get(); 

		$selectCat = [];	
		foreach($post->categories as $key => $cat){
			$selectCat[] = $cat->id;
		}

		$tags = []; 
		foreach($post->tags as $tag){			
			$tag = Tag::findOrFail($tag->id);
			$tags[] = trim($tag->tag);
		}
		$tagstr = implode($tags, ',');
				
		return view('back.posts.edit', 
			compact(['post', 'pageTitle', 'categories', 'selectCat', 'tagstr']));
	} 

	public function update(Request $request, Post $post)
	{
		$post = Post::findOrFail($post->id);

		if($request->isMethod('PUT') && $post)
		{
			$user = Auth::user();
			$validate = [
	            'title' => 'required|min:3',
	            'category' => 'required',			
				//'seo_url' => 'required',
				'excerpt' => 'required'
	        ];		
			$this->validate($request, $validate);

			// All input value here
			$input = $request->all();
			$cat_ids = $input['category'];

			if($file = $request->file('photo_id')){ 
				// Delete old image of post
				if($post->photo && \File::exists(public_path('uploads/posts/' . $post->photo->name))){
					\File::delete(public_path('uploads/posts/' . $post->photo->name));
				}
				// Upload new image for post
				$filename = time() . "-". $file->getClientOriginalName(); 
				$file->move('uploads/posts', $filename);
				
				// Update imagename in photo table	
				$photo_id = "";
				if($post->photo){
					$photo = Photo::find($post->photo_id);
					$photo->name = $filename;
					$photo->save();
					$photo_id = $post->photo_id;
				} else {
					$photo = new Photo;
					$photo->name = $filename;
					$photo->save();
					$photo_id = $photo->id;
				}

				//$post->photo_id = $request->photo_id; 
				if($photo_id !="") { 
					$post->photo_id = $photo_id; 
				}
			}
		
			$post->title = $request->title; 
			$post->user_id = $user->id; 
			$post->seo_url = $request->seo_url;
			$post->excerpt = $request->excerpt;
			$post->body = $request->body;
			$post->meta_title = $request->meta_title;
			$post->meta_keyword = $request->meta_keyword;
			$post->meta_description = $request->meta_description;
			$post->status = $request->status;
			$post->featured = ($request->featured) ? $request->featured : 0;

			$post->save(); 

			// Update data in pivot table
			$post->categories()->sync($cat_ids, $post->id); 

			//Save tags
	        $this->saveTags($post, $request);

			$request->session()->flash('message', 'Post updated successfully!');
        	return redirect('admin/posts');	
		}
	} 

	public function destroy(Request $request, Post $post)
	{
		$post = Post::findOrFail($post->id);
		if($post){
			// Remove specific row from pivot table 
			// $post->categories()->detach($post->id);
			$post->categories()->wherePivot('post_id','=', $post->id)->detach(); 

			// Delete image of this post.
			if($post->photo && 
				\File::exists(public_path('uploads/posts/' . $post->photo->name))){
					\File::delete(public_path('uploads/posts/' . $post->photo->name));
				}
			$post->photo()->whereId($post->photo_id)->delete();

			$post->delete();
	        $request->session()->flash('message', 'Post deleted successfully!');
	        return redirect('admin/posts');
	    }
	} 

	protected function saveTags($post, $request)
    {
        //$post->categories()->sync($request->category, $post->id);

        $tags_id = [];

        if ($request->tags) {
            $tags = explode(',', $request->tags);
            foreach ($tags as $tag) {
                //$tag_ref = Tag::firstOrCreate(['tag' => $tag]);
                //$tag_ref = Tag::where('tag', '=', $tag)->first();
                //if(count($tag_ref) == 0) {
                	$tagref = Tag::firstOrCreate(['tag' => $tag]);
                	$tags_id[] = $tagref->id; 
                //}            
            }
        }

        $post->tags()->sync($tags_id); 
    }
	//
}
