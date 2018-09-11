<?php

namespace App\Repositories;

use App\Models\ {
    Post,
    Tag,
    Comment,
    Category,
    CommentReply
};

class PostRepository
{
    /**
     * The Tag instance.
     *
     * @var \App\Models\Tag
     */
    protected $tag;

    /**
     * The Comment instance.
     *
     * @var \App\Models\Comment
     */
    protected $comment;

    protected $category;

    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;


    /**
     * Create a new BlogRepository instance.
     *
     * @param  \App\Models\Post $post
     * @param  \App\Models\Tag $tag
     * @param  \App\Models\Comment $comment
     */
    public function __construct(Post $post, Tag $tag, Comment $comment, Category $category)
    {
        $this->model = $post;
        $this->tag = $tag;
        $this->comment = $comment;
        $this->category = $category;
    }

    /**
     * Get active posts collection paginated.
     *
     * @param  int  $nbrPages
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getLatestActivePost($nbrPages)
    {
        $posts = $this->model 
            ->select('posts.id as postid', 'title', 'seo_url', 'excerpt', 'posts.created_at', 'photos.name as image', 'posts.user_id', 'users.name as authorname')
            ->leftJoin('photos', 'photos.id', '=', 'posts.photo_id') 
            ->leftJoin('users', 'users.id', '=', 'posts.user_id')
            ->whereStatus(true)
            ->latest()
            ->paginate($nbrPages); 

        foreach($posts as $post){
            $post->categories = $this->getPostCategories($post->postid);
        }          

        //dd($posts); die;  
        return $posts;    
    } 

    public function getFeaturedPost($nbrPages) 
    {
        $posts = $this->model 
            ->select('posts.id as postid', 'title', 'seo_url', 'excerpt', 'posts.created_at', 'photos.name as image', 'posts.user_id', 'users.name as authorname')
            ->leftJoin('photos', 'photos.id', '=', 'posts.photo_id') 
            ->leftJoin('users', 'users.id', '=', 'posts.user_id')
            ->whereStatus(true)
            ->whereFeatured(true) 
            ->latest() 
            ->paginate($nbrPages); 

        foreach($posts as $post){
            $post->categories = $this->getPostCategories($post->postid);
        } 

        return $posts;    
    } 

    public function getPostDetailBySlug($slug)
    {
        $post = $this->model
            ->select('posts.id', 'title', 'seo_url', 'excerpt', 'body', 'posts.created_at', 'photos.name as image', 'posts.user_id', 'users.name as authorname')
            ->leftJoin('photos', 'photos.id', '=', 'posts.photo_id') 
            ->leftJoin('users', 'users.id', '=', 'posts.user_id')
            ->where('seo_url', '=', $slug)
            ->firstOrFail();
        
        // Previous post
        $post->previous = $this->getPreviousPost($post->id);

        // Next post
        $post->next = $this->getNextPost($post->id); 

        // You may also like post 
        $othersPost = array();
        if($post->id !="")
            $othersPost[] =  $post->id;
        if($post->previous && $post->previous->id !="") 
            $othersPost[] =  $post->previous->id;
        if($post->next && $post->next->id !="") 
            $othersPost[] =  $post->next->id;
        
        $collection = collect($othersPost);
        $sorted = $collection->sort();
        //$othersPost = implode (',', $sorted->values()->all());
        $othersPost = $sorted->values()->all();         
        $post->others = $this->getOthersPost($othersPost); 

        //get all categories of this post
        if($post->id !="")
            $post->allcategories = $this->getPostCategories($post->id);
        else 
            $post->allcategories = array();
        //dd($post);
        return $post;
    }

    /**
     * Get active posts for specified tag.
     *
     * @param  int  $nbrPages
     * @param  int  $tag_id
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getActiveOrderByDateForTag($nbrPages, $tag_id)
    {
        return $this->queryActiveOrderByDate()
            ->whereHas('tags', function ($q) use ($tag_id) {
                $q->where('tags.id', $tag_id);
            })->paginate($nbrPages);
    }

    /**
     * Get active posts for specified tag.
     *
     * @param  int  $nbrPages
     * @param  string  $category_slug
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getActiveOrderByDateForCategory($nbrPages, $category_slug)
    {
        return $this->queryActiveOrderByDate()
            ->whereHas('categories', function ($q) use ($category_slug) {
                $q->where('categories.slug', $category_slug);
            })->paginate($nbrPages);
    }

    /**
     * Get post by slug.
     *
     * @param  string  $slug
     * @return array
     */
    public function getPostBySlug($slug)
    {
        // Post for slug with user, tags and categories
        $post = $this->model->with([
            'user' => function ($q) {
                $q->select('id', 'name', 'email');
            },
            'tags' => function ($q) {
                $q->select('tags.id', 'tag');
            },
            'categories' => function ($q) {
                $q->select('title', 'slug');
            }
        ])
        ->with(['parentComments' => function ($q) {
            $q->with('user')
                ->latest()
                ->take(config('app.numberParentComments'));
        }])
        ->withCount('validComments')
        ->withCount('parentComments')
        ->whereSlug($slug)
        ->firstOrFail();

        // Previous post
        $post->previous = $this->getPreviousPost($post->id);

        // Next post
        $post->next = $this->getNextPost($post->id); 

        return compact('post');
    }

    /**
     * Get previous post
     *
     * @param  integer  $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function getPreviousPost($id)
    {
        return $this->model
            ->select('posts.id','title','seo_url','posts.created_at','photos.name as image')
            ->leftJoin('photos', 'photos.id', '=', 'posts.photo_id')
            ->where('posts.id', '<', $id)
            ->latest('posts.id')
            ->first();
    }

    /**
     * Get next post
     *
     * @param  integer  $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function getNextPost($id)
    {
        return $this->model
            ->select('posts.id','title','seo_url','posts.created_at','photos.name as image')
            ->leftJoin('photos', 'photos.id', '=', 'posts.photo_id')
            ->where('posts.id', '>', $id)
            ->oldest('posts.id')
            ->first();
    }

    protected function getOthersPost($ids)
    {
         return $this->model
            ->select('title', 'seo_url', 'posts.created_at', 'photos.name as image')
            ->leftJoin('photos', 'photos.id', '=', 'posts.photo_id')
            ->whereNotIn('posts.id', $ids)
            ->oldest('posts.id')
            ->limit(3)
            ->get();  
    } 

    protected function getPostCategories($id)
    {
        $post = $this->model->findOrFail($id);
        return $post->categories;
    } 
	
	public function getCategoryDetail($slug)
	{
		$category = $this->category
			->where('slug','=', $slug)
			->first();
		return $category;  	
	}

    public function getPostsByCategory($slug, $nbrPages)
    {   
        $posts = $this->model
            ->select('posts.id', 'title', 'seo_url', 'excerpt', 'body', 'posts.created_at', 'photos.name as image', 'posts.user_id', 'users.name as authorname')
            ->leftJoin('photos', 'photos.id', '=', 'posts.photo_id')
            ->leftJoin('users', 'users.id', '=', 'posts.user_id')
            ->whereStatus(true)
            ->latest()
            ->whereHas('categories', function ($q) use ($slug) {
                $q->where('categories.slug', $slug);
            })->paginate($nbrPages);
        
        foreach($posts as $post){
            $post->categories = $this->getPostCategories($post->id);
        } 

        //dd($posts);
        return $posts;    
    }

    /**
     * Get posts with search.
     *
     * @param  int  $n
     * @param  string  $search
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function search($n, $search)
    {
        return $this->model
            ->where(function ($q) use ($search) {
                $q->where('excerpt', 'like', "%$search%")
                    ->orWhere('body', 'like', "%$search%")
                    ->orWhere('title', 'like', "%$search%");
            })->paginate($n);
    }

    public function getTaggedPost($tagid) 
    {
        $tag = $this->tag->find($tagid);
        $posts = $tag->posts;

        foreach($posts as $post){
            $post->categories = $this->getPostCategories($post->id);
            $post->image = ($post->photo) ? $post->photo->name : null;
            $post->authorname = $post->user->name;
        } 
       
        //return compact('posts'); 
        return $posts; 
    } 
	
	public function getPostComments($postid, $nbrPages)
	{
		//$post = Post::where('id','=',$postid)->firstOrFail();
		//return $comments = $post->comments;
		//return $this->comment->where('post_id','=',$postid)->paginate($nbrPages);

        $post = Post::findOrFail($postid);
        //return $post->comments()->whereIsActive(1)->get();
        $comments = $post->comments()->whereIsActive(1)->paginate($nbrPages);

        foreach($comments as $comment){
            $comment->allreplies = $this->getActiveReplies($comment->id);
        }
        //dd($comments);
        return $comments;
	} 

    public function getActiveReplies($commentid)
    {
        $comment = $this->comment->findOrFail($commentid);
        return $comment->replies->where('is_active','=','1'); 
    }

}
